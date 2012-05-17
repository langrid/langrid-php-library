<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 16:43
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/PartOfSpeech.php';

class Concept
{
    // String 概念ID
    private $conceptId;
    // PartOfSpeech synsetの品詞
    private $partOfSpeech;
    // Array<Lemma> 概念見出し語となる同義語集合
    private $synset;
    // Array<Gloss> 概念の説明文
    private $glosses;
    // Array<ConceptualRelation> 他の概念と関連付けられている関係
    private $relations;

    function __construct($conceptId = '', $partOfSpeech = null, $synset = array(), $glosses = array(), $relations = array())
    {
        $this->setConceptId($conceptId);
        $this->setPartOfSpeech($partOfSpeech);
        $this->setSynset($synset);
        $this->setGlosses($glosses);
        $this->setRelations($relations);
    }

    public function setConceptId($conceptId)
    {
        $this->conceptId = $conceptId;
    }

    public function getConceptId()
    {
        return $this->conceptId;
    }

    public function setGlosses($glosses)
    {
        $this->glosses = $glosses;
    }

    public function getGlosses()
    {
        return $this->glosses;
    }

    public function setPartOfSpeech($partOfSpeech)
    {
        $this->partOfSpeech = $partOfSpeech;
    }

    public function getPartOfSpeech()
    {
        return $this->partOfSpeech;
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


}
