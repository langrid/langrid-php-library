<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:04
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../MultihopTranslationClient.interface.php';

class MultihopTranslationClientImpl extends ServiceClientImpl implements MultihopTranslationClient
{
    public function multihopTranslate(Language $sourceLang,
                                      array /*<Language>*/
                                      $intermediateLangs,
                                      Language $targetLang,
                                      /*String*/ $source)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'intermediateLangs' => $intermediateLangs,
            'targetLang' => $targetLang,
            'source' => $source
        ));
    }
}
