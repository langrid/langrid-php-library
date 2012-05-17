<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:09
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../ParallelTextWithEmbeddedMetadataClient.interface.php';

class ParallelTextWithEmbeddedMetadataClientImpl extends ServiceClientImpl implements ParallelTextWithEmbeddedMetadataClient
{
    public function searchParallelTextsByMetadata(Language $sourceLang,
                                                  Language $targetLang,
                                                  array /*<String>*/
                                                  $metadata,
                                                  String $text,
                                                  MatchingMethod $matchingMethod)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            'metadata' => $metadata,
            'text' => $text,
            'matchingMethod' => $matchingMethod
        ));
    }

    public function searchSupportedMetadata(String $query, MatchingMethod $matchingMethod)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'query' => $query,
            'matchingMethod' => $matchingMethod
        ));
    }
}
