<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/23
 * Time: 23:38
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../MetadataForParallelTextClient.interface.php';

class MetadataForParallelTextClientImpl extends ServiceClientImpl implements MetadataForParallelTextClient
{
    public function searchCandidatesWithMetadata(String $query, MatchingMethod $matchingMethod)
    {
        return $this->invoke(__FUNCTION__, array(
            'query' => $query,
            'matchingMethod' => $matchingMethod
        ));
    }

    public function getMetadata(String $id)
    {
        return $this->invoke(__FUNCTION__, array(
            'id' => $id
        ));
    }

    public function getMetadataSchema()
    {
        return $this->invoke(__FUNCTION__);
    }
}
