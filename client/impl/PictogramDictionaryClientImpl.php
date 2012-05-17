<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:17
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../PictogramDictionaryClient.interface.php';

class PictogramDictionaryClientImpl extends ServiceClientImpl implements PictogramDictionaryClient
{
    public function search(Language $language, /*String*/ $word, /*MatchingMethod*/ $matchingMethod)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'word' => $word,
            'matchingMethod' => $matchingMethod
        ));
    }
}
