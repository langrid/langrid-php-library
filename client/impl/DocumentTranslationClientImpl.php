<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nkjm
 * Date: 12/04/02
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__) . '/../DocumentTranslationClient.interface.php';
require_once dirname(__FILE__) . '/../../commons/Document.php';

class DocumentTranslationClientImpl extends ServiceClientImpl implements DocumentTranslation
{

    /**
     * @override
     */
    public function start(Language $sourceLang,
                          Language $targetLang,
                          Document $doc)
    {
        return $this->invoke(__FUNCTION__, array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            array(
                'data' => $doc->getData(),
                'mimeType' => $doc->getMimeType()
            )
        ));
    }

    /**
     * @override
     */
    public function isFinished( /* string*/
        $token)
    {
        return $this->invoke(__FUNCTION__, array(
            'token' => $token
        ));
    }


    /**
     * @override
     */
    public function getProgress( /* string*/
        $token)
    {
        return $this->invoke(__FUNCTION__, array(
            'token' => $token
        ));
    }

    /**
     * @override
     */
    public function getResult( /* string*/
        $token)
    {
        return $this->invoke(__FUNCTION__, array(
            'token' => $token
        ));
    }


    public function terminate( /* string*/
        $token)
    {
        return $this->invoke(__FUNCTION__, array(
            'token' => $token
        ));
    }
}
