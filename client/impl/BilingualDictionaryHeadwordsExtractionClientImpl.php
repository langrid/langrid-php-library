<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 16:08
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/BilingualDictionaryClientImpl.php';
require_once dirname(__FILE__).'/../BilingualDictionaryHeadwordsExtractionClient.interface.php';

class BilingualDictionaryHeadwordsExtractionClientImpl extends BilingualDictionaryClientImpl implements BilingualDictionaryHeadwordsExtractionClient
{
    public function extract(String $headLang, String $targetLang, String $text)
    {
        return $this->invoke(__FUNCTION__, array(
            'headLang' => $headLang,
            'targetLang' => $targetLang,
            'text' => $text
        ));
    }
}
