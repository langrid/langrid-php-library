<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:15
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../ParaphraseClient.interface.php';

class ParaphraseClientImpl extends ServiceClientImpl implements ParaphraseClient
{
    public function paraphrase(Language $language, /*String*/ $text)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'text' => $text
        ));
    }
}
