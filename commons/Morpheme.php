<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 16:33
 * To change this template use File | Settings | File Templates.
 */
class Morpheme
{
    // String 文字列
    private $word;
    // String 原型
    private $lemma;
    // String 品詞（"noun.proper"，"noun.common"，"noun.other"，"noun"，"verb"，"adjective"，"adverb"，"other"，"unknown"のいずれか）
    private $partOfSpeech;

    function __construct(/*string*/ $word, /*string*/ $lemma, /*string*/ $partOfSpeech)
    {
        $this->setWord($word);
        $this->setLemma($lemma);
        $this->setPartOfSpeech($partOfSpeech);
    }

    public function setLemma($lemma)
    {
        $this->lemma = $lemma;
    }

    public function getLemma()
    {
        return $this->lemma;
    }

    public function setPartOfSpeech($partOfSpeech)
    {
        $this->partOfSpeech = $partOfSpeech;
    }

    public function getPartOfSpeech()
    {
        return $this->partOfSpeech;
    }

    public function setWord($word)
    {
        $this->word = $word;
    }

    public function getWord()
    {
        return $this->word;
    }
}
