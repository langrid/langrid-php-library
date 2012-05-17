<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 15:01
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../AdjacencyPairClient.interface.php';

class AdjacencyPairClientImpl extends ServiceClientImpl implements AdjacencyPairClient
{
    public function search(/*string*/ $category,
                           Language $language,
                           /*string*/ $firstTurn,
                           /*const MatchingMethod*/ $matchingMethod = MatchingMethod::PARTIAL)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'category' => $category,
            'language' => $language,
            'firstTurn' => $firstTurn,
            'matchingMethod' => $matchingMethod
        ));
    }
}
