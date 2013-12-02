<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 16:18
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../NamedEntityTaggingClient.interface.php';

class NamedEntityTaggingClientImpl extends ServiceClientImpl implements NamedEntityTaggingClient
{
    public function tag(Language $language, /*String*/ $text)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'text' => $text
        ));
    }
    
    public function getSupportedLanguages()
    {
        return $this->invoke(__FUNCTION__);
    }
}
