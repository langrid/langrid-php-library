<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 15:58
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../BilingualDictionaryClient.interface.php';

class BilingualDictionaryClientImpl extends ServiceClientImpl implements BilingualDictionaryClient
{
    public function search(Language $headLang,
                           Language $targetLang,
                           $headWord,
                           $matchingMethod)
    {
        return $this->invoke(__FUNCTION__, array(
            'headLang' => $headLang,
            'targetLang' => $targetLang,
            'headWord' => $headWord,
            'matchingMethod' => $matchingMethod
        ));
    }

    public function getSupportedLanguagePairs()
    {
        return $this->invoke(__FUNCTION__);
    }

    public function getSupportedMatchingMethods()
    {
        return $this->invoke(__FUNCTION__);
    }

    public function getLastUpdate()
    {
        return $this->invoke(__FUNCTION__);
    }
}
