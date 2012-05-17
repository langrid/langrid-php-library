<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/29
 * Time: 23:12
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../MultiLanguageStudio.php';

class DictionaryLegacyBridge
{
    const TYPE_ID_DICTIONARY = 0;
    const TYPE_PARALLEL_TEXT = 1;

    /*
     * use instead of UserDictionaryController::doCreate
     */
    static public function doCreate($params, $userId = '') {
        $dict = null;

        $typeId = $params['dictionaryTypeId'];

        if($typeId == self::TYPE_ID_DICTIONARY) {
            $dict = Dictionary::create_with_records(array(
                'name' => self::escape($params['dictionaryName']),
                'languages' => $params['supportedLanguages'],
                'records' => $params['records']
            ), $userId);
        }
        
        self::_setPermission($dict, $params);

        if(@$params['deployFlag'] && $params['deployFlag'] === true) {
            $dict->deploy();
        }

        return array(
            'status' => 'OK',
            'dictionaryId' => $dict->id
        );
    }

    /*
     * use instead of UserDictionaryController::doUpdate
     */
    static public function doUpdate($params, $userId = '') {

        $dictionaryId = intval($params['dictionaryId']);
        $result = true;
        $dict = Dictionary::find($dictionaryId);
        // 言語削除分
        if(@$params['removeLanguages']) {
            foreach($params['removeLanguages'] as $language) {
                $result &= $dict->remove_language(Language::get($language), true);
            }
        }

        // 更新分
        $result &= $dict->update_languages($params['valueToSave'][0], true);
        unset($params['valueToSave'][0]);
        foreach($params['valueToSave'] as $recordId => $record) {
            $dictrecord = DictionaryRecord::find($recordId);
            if($dictrecord) {
                if(! self::_isAllEmptyRow($record)) {
                    $dictrecord->update_contents($record);
                } else {
                    $dictrecord->remove();
                }
            }
        }


        // 新規追加分
        if(@$params['newRecord']) {
            foreach($params['newRecord'] as $record) {
                if(! self::_isAllEmptyRow($record)) {
                    $dict->add_record($record);
                }
            }
        }

        self::_setPermission($dict, $params);

//        $dictionary = $this->getDictionary($dictionaryId);
//        // call user hook function
//        $pinfo = pathinfo(__FILE__);
//        $hookfile = $pinfo['dirname'].'/hooks/'.$pinfo['filename'].'.hook.'.$pinfo['extension'];
//        if (file_exists($hookfile)) {
//            require_once($hookfile);
//            $hookclass = get_class($this).'_Hook';
//            if (class_exists($hookclass)) {
//                $hook =& new $hookclass;
//                $hookfunc = 'doUpdateAfter';
//                if (method_exists($hook, $hookfunc)) {
//                    call_user_method($hookfunc, $hook, $dictionary);
//                }
//            }
//        }

        return (boolean)$result;

    }
    
    static private function _isAllEmptyRow($rows) {
        foreach($rows as $row) {
            if(! empty($row)) {
                return false;
            }
        }
        return true;
    }
    
    static private function _setPermission($dict, $params) {
        if(@$params['editPermission'] && $params['editPermission'] == 'all') {
            $dict->update_attributes(array(
                'any_read' => true, 'any_write' => true
            ));
        } else if(@$params['viewPermission'] && $params['viewPermission'] == 'all') {
            $dict->update_attributes(array(
                'any_read' => true, 'any_write' => false
            ));
        } else if(@$params['viewPermission'] && $params['viewPermission'] == 'user') {
            $dict->update_attributes(array(
                'any_read' => false, 'any_write' => false
            ));
        }
    }

    /*
     * use instead of UserDictionaryController::doDownload
     */
    static public function doDownload($dictionaryId) {
        $dict = Dictionary::find(intval($dictionaryId));
        $records = DictionaryRecord::find_by_dictionary_id(intval($dictionaryId));

        $lines = array();
        $languages = $dict->get_languages();
        $lines[] = implode("\t", $languages);
        foreach($dict->dictionary_records as $record) {
            $row = $record->get_contents_as_ordered_array($languages);
            $lines[] = implode("\t", $row);
        }

        $output = implode(PHP_EOL, $lines);
        $output .= PHP_EOL;

        $output = chr(255).chr(254).mb_convert_encoding($output, "UTF-16LE", "UTF-8");
        return array(
            "output" => $output,
            "name" => self::getCleanFileName($dict->name)
        );
    }

    /*
     * use instead of UserDictionaryController::doUpload
     */
    static public function doUpload($tmpFilePath, $typeId, $name, $editPermission, $readPermission, $mimeType, $userId) {
        $tmpFileLines = file($tmpFilePath);

        if (ord($tmpFileLines[0]{0}) == 255 && ord($tmpFileLines[0]{1}) == 254) {
            $code = "UTF-16LE";
        } else if (ord($tmpFileLines[0]{0}) == 254 && ord($tmpFileLines[0]{1}) == 255) {
            $code = "UTF-16BE";
        } else {
            $code = '';
        }
        if ($code == '') {
            $error = '_MI_DICTIONARY_ERROR_FILE_FORMAT_INVALID';
            return self::_doUploadErrorResponse($error);
        }

        $tmpFileContent = '';
        foreach($tmpFileLines as $aline) {
            $tmpFileContent .= $aline;
        }

        $utf8content = mb_convert_encoding($tmpFileContent, 'UTF-8', $code);
        if (ord($utf8content{0}) == 0xef && ord($utf8content{1}) == 0xbb && ord($utf8content{2}) == 0xbf) {
            $utf8content = substr($utf8content, 3);
        }

        $lines = array();
        $temp = fopen('php://memory', 'rw');
        fwrite($temp, $utf8content);
        fseek($temp, 0);
        set_error_handler("DictionaryLegacyBridge::error_handler");
        try {
            while (($cells = fgets($temp, 10240)) !== false) {			// chr(0x09) == \t
                $cells = explode("\t", preg_replace("(\\r|\\n)", "", $cells));
                foreach ($cells as $cell) {
                    iconv("UTF-8", "UTF-8", $cell); // validate for can be json_encode
                }
                $lines[] = $cells;
            }
        } catch (Exception $e) {
            $error = _MI_DICTIONARY_ERROR_FILE_FORMAT_INVALID;
            return self::_doUploadErrorResponse($error);
        }
        restore_error_handler("DictionaryLegacyBridge::error_handler");
        fclose($temp);

        $validColNums = false;
        foreach($lines as $aline){
            if ($aline == null || is_array($aline) === false || count($aline) == 0) {
                continue;
            }
            $rowArray = $aline;

            if(!$validColNums){
                $validColNums = array();
                for($i=0; $i<count($rowArray); $i++){
                    if(mb_strlen($rowArray[$i])>0){
                        $validColNums[] = $i;
                    }
                }
            }

            $tableRow = array();
            foreach($validColNums as $colNum){
                $tableRow[] = $rowArray[$colNum] ? $rowArray[$colNum] : "";
            }

            $dictTable[] = $tableRow;
        }

        $response = self::doCreate(array(
            'dictionaryName' => $name,
            'viewPermission' => $editPermission,
            'editPermission' => $readPermission,
            'supportedLanguages' => $dictTable[0],
            'dictionaryTypeId' => $typeId,
            'records' => array_slice($dictTable, 1)
        ), $userId);

        if (strtoupper($response['status']) == 'ERROR') {
            return self::_doUploadErrorResponse($response['message']);
        } else {
            return self::_doUploadSuccessResponse(intval(@$response['dictionaryId']));
        }
    }

    static private function _doUploadErrorResponse($error) {
        $scripts = <<<JS
			alert("{$error}");
			parent.DialogViewController.hideIndicator();
JS;
        return self::_doUploadResponse($scripts);
    }

    static private function _doUploadSuccessResponse($dictionaryId) {
        $scripts = <<<JS
			with(window.parent) {
				DialogViewController.ImportDictionary.afterImport({$dictionaryId});
			}
JS;
        return self::_doUploadResponse($scripts);
    }

    static private function _doUploadResponse($scripts) {
        return <<<HTML
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Langrid ToolBox</title>
			</head>
			<body>
			<script language="JavaScript" type="text/javascript">
			{$scripts}
			</script>
			</body>
			</html>
HTML;
    }

    /*
     * use instead of UserDictionaryController::doDeploy
     */
    static public function deploy($dictionaryId) {
        $dict = Dictionary::find(intval($dictionaryId));
        if($dict) {
            $dict->deploy();
            return true;
        }
        return false;
    }

    /*
     * use instead of UserDictionaryController::doUndeploy
     */
    static public function undeploy($dictionaryId) {
        $dict = Dictionary::find(intval($dictionaryId));
        if($dict && $dict->is_deploy()) {
            $dict->undeploy();
            return true;
        }
        return false;
    }

    /*
     * use instead of UserDictionaryController::getAllDictionariesByTypeId
     */
    static public function getAllDictionariesByTypeId($typeId, $limit = 10, $offset = 0, $userId = '') {
        $resources = array();
        if($typeId == self::TYPE_ID_DICTIONARY) {
            $resources = Dictionary::all(array(
                'offset' => $offset, 'limit' => $limit
            ));
        }

        $results = array();
        foreach($resources as $dict) {
            $results[] = array(
                'id' => $dict->id,
                'userId' => $dict->created_by,
                'uid' => $dict->created_by,
                'userName' => $dict->created_by,
                'typeId' => $typeId,
                'name' => $dict->name,
                'count' => $dict->records_count(),
                'supportedLanguages' => $dict->get_languages(),
                'languages' => implode(',', $dict->get_languages()),
                'createDateFormat' => $dict->created_at->format('Y/m/d H:i'),
                'updateDateFormat' => $dict->updated_at ? $dict->updated_at->format('Y/m/d H:i') : '',
//                'permission_type' => $dict->update_attributes('any_read') == 1 ? 'all' : 'user',
                'view' => $dict->can_view($userId),
                'edit' => $dict->can_edit($userId),
                'deployFlag' => $dict->is_deploy(),
                "deploy_flag" => $dict->is_deploy(),
                'delete' => $dict->is_owner($userId)
            );
        }
        return $results;

    }

    /*
     * use instead of UserDictionaryController::countAllDictionariesByTypeId
     */
    static public function countAllDictionariesByTypeId($typeId) {
        if($typeId == self::TYPE_ID_DICTIONARY) {
            return Dictionary::count();
        }
        return 0;
    }

    /*
     * use instead of UserDictionaryController::getAllDictionaryContentsByDictionaryId
     */
    static public function getAllDictionaryContentsByDictionaryId($dictionaryId, $limit = 10, $offset = 0) {
        $dict = Dictionary::find(intval($dictionaryId));
        $langs = $dict->get_languages();

        $langHash = array("row" => "0");
        foreach($langs as $l) $langHash[$l] = $l;
        $results = array($langHash);

        $records = DictionaryRecord::all(array(
            'conditions' => array(
                'dictionary_id' => intval($dictionaryId)
             ),
            'offset' => $offset,
            'limit' => $limit
        ));

        foreach($records as $record) {
            $tmprow = array();
            foreach($langs as $lang) {
                $tmprow[$lang] = "";
            }
            $tmprow = array_merge($tmprow, $record->get_contents());
            $tmprow['row'] = $record->id;
            $results[] = $tmprow;
        }

        return $results;
    }

    /*
     * use instead of UserDictionaryController::getPermission
     */
    static public function getPermission($dictionaryId) {
        $dict = Dictionary::find($dictionaryId);

        $permission = array(
            'dictionary' => array(
                'edit' => 'user', 'view' => 'user'
            )
        );

        if($dict->any_write) {
            $permission['dictionary']['edit'] = 'all';
        }

        if($dict->any_read) {
            $permission['dictionary']['view'] = 'all';
        }

        return $permission;
    }

    /*
     * use instead of UserDictionaryController::canChangePermission
     */
    static public function canChangePermission($dictionaryId, $userId){
        $dict = Dictionary::find($dictionaryId);
        return $dict->is_owner($userId);
    }

    /*
     * use instead of UserDictionaryController::canEdit
     */
    static public function canEdit($dictionaryId, $userId) {
        $dict = Dictionary::find($dictionaryId);
        return $dict->can_edit($userId);
    }

    static public function canLoad($dictionaryId, $userId) {
        $dict = Dictionary::find($dictionaryId);
        return $dict->can_view($userId);
    }

    static public function canDelete($dictionaryId, $userId) {
        $dict = Dictionary::find($dictionaryId);
        return $dict->is_owner($userId);
    }

    static public function getDictionary($dictionaryId) {
        $dict = Dictionary::first(array('conditions' => array('id' => intval($dictionaryId))));
        if($dict) {
            return array(
                'dictionary_name' => $dict->name,
                'type_id' => self::TYPE_ID_DICTIONARY,
                'deploy_flag' => $dict->is_deploy(),
                'update_date' => $dict->updated_at->getTimestamp().''
            );
        } else {
            return array();
        }
    }

    static public function countAllDictionaryContentsByDictionaryId($dictionaryId) {
        $dict = Dictionary::first(array('conditions' => array('id' => intval($dictionaryId))));
        return $dict ? intval($dict->records_count()) : 0;
    }

    static public function removeDictionary($dictionaryId) {
        $dict = Dictionary::find($dictionaryId);
        $dict->remove();
    }

    static private function escape($str) {
        if ( get_magic_quotes_gpc() ) {
            $str = stripslashes( $str );
        }
        return mysql_real_escape_string($str);
    }

    static private function getCleanFileName($fileName) {
        $fileName = str_replace(array('.', '_', '-', ' '), '', $fileName);
        if (!$fileName) {
            $fileName = 'resource';
        }
        return $fileName.'.txt';
    }
    
    static public function error_handler($errno, $errstr) {
        switch ($errno) {
            case E_NOTICE:
                throw new Exception("mistake casting charset with iconv");
        }
    }
}