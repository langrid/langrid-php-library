<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:07
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../ParallelTextClient.interface.php';

class ParallelTextClientImpl extends ServiceClientImpl implements ParallelTextClient
{
    public function search(Language $sourceLang,
                           Language $targetLang,
                           /*String*/ $source,
                           /*MatchingMethod*/ $matchingMethod)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            'source' => $source,
            'matchingMethod' => $matchingMethod
        ));
    }
}
