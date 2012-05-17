<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:49
 * To change this template use File | Settings | File Templates.
 */
class ConceptNode
{
    // String nodeID
    private $nodeId;

    // String 語義説明
    private $gloss;

    // Array<String>
    private $synset;

    // Array<String> 用例
    private $usageExamples;

    // Array<String> 関係名とノードID(lemma、concept)の配列((関係名 ノードID))...
    private $relations;

    function __construct($nodeId = '', $gloss = '', $synset = array(), $usageExamples = array(), $relations = array())
    {
        $this->setNodeId($nodeId);
        $this->setGloss($gloss);
        $this->setSynset($synset);
        $this->setUsageExamples($usageExamples);
        $this->setRelations($relations);
    }

    public function setGloss($gloss)
    {
        $this->gloss = $gloss;
    }

    public function getGloss()
    {
        return $this->gloss;
    }

    public function setNodeId($nodeId)
    {
        $this->nodeId = $nodeId;
    }

    public function getNodeId()
    {
        return $this->nodeId;
    }

    public function setRelations($relations)
    {
        $this->relations = $relations;
    }

    public function getRelations()
    {
        return $this->relations;
    }

    public function setSynset($synset)
    {
        $this->synset = $synset;
    }

    public function getSynset()
    {
        return $this->synset;
    }

    public function setUsageExamples($usageExamples)
    {
        $this->usageExamples = $usageExamples;
    }

    public function getUsageExamples()
    {
        return $this->usageExamples;
    }

}
