<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/23
 * Time: 23:49
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../MultihopBackTranslationClient.interface.php';

class MultihopBackTranslationClientImpl extends ServiceClientImpl implements MultihopBackTranslationClient
{
    public function multihopBackTranslate(Language $sourceLang,
                                          array /*<Language>*/ $intermediateLangs,
                                          Language $targetLang,
                                          /*String*/ $source)
    {
        return $this->invoke(__FUNCTION__, array(
            'sourceLang' => $sourceLang,
            'intermediateLangs' => $intermediateLangs,
            'targetLang' => $targetLang,
            'source' => $source
        ));
    }
}
