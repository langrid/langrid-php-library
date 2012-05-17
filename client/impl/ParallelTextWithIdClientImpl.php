<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:13
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../ParallelTextWithIdClient.interface.php';

class ParallelTextWithIdClientImpl extends ServiceClientImpl implements ParallelTextWithExternalMetadataClient
{
    public function searchParallelTextsFromCandidates(Language $sourceLang,
                                                      Language $targetLang,
                                                      String $text,
                                                      MatchingMethod $matchingMethod,
                                                      array /*<String>*/
                                                      $candidateIds)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            'text' => $text,
            'matchingMethod' => $matchingMethod,
            'candidateIds' => $candidateIds
        ));
    }
}
