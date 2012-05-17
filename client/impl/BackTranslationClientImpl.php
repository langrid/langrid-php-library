<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 15:36
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../BackTranslationClient.interface.php';

class BackTranslationClientImpl extends ServiceClientImpl implements BackTranslationClient
{
    public function backTranslate(Language $sourceLang,
                                  Language $intermediateLang,
                                  $source)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'intermediateLang' => $intermediateLang,
            'source' => $source
        ));
    }
}
