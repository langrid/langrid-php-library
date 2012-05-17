<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 16:18
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../TranslationClient.interface.php';

class TranslationClientImpl extends ServiceClientImpl implements TranslationClient
{
    public function translate(Language $sourceLang, Language $targetLang, /*String*/ $source)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            'source' => $source
        ));
    }
}
