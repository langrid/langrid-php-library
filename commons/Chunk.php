<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:30
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/Morpheme.php';
require_once dirname(__FILE__).'/Dependency.php';

class Chunk
{
    // String 文節ID
    private $chunkId;
    // Array<Morpheme> 文節を構成する形態素の配列
    private $morphemes;
    // Dependency 係り受け関係
    private $dependency;

    function __construct($chunkId = '', $morphemes = array(), $dependency = null)
    {
        $this->setChunkId($chunkId);
        $this->setMorphemes($morphemes);
        $this->setDependency($dependency);
    }

    public function setChunkId($chunkId)
    {
        $this->chunkId = $chunkId;
    }

    public function getChunkId()
    {
        return $this->chunkId;
    }

    public function setDependency($dependency)
    {
        $this->dependency = $dependency;
    }

    public function getDependency()
    {
        return $this->dependency;
    }

    public function setMorphemes($morphemes)
    {
        $this->morphemes = $morphemes;
    }

    public function getMorphemes()
    {
        return $this->morphemes;
    }

}
