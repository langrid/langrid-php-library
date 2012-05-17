<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 16:17
 * To change this template use File | Settings | File Templates.
 */
class Translation
{
    // String 見出し語
    private $headWord;

    // Array<String> 対訳の配列
    private $targetWords;

    function __construct(/*String*/ $headWord = '', array/*<String>*/ $targetWords = array()){
        $this->setHeadWord($headWord);
        $this->setTargetWords($targetWords);
    }

    public function setHeadWord($headWord)
    {
        $this->headWord = $headWord;
    }

    public function getHeadWord()
    {
        return $this->headWord;
    }

    public function setTargetWords($targetWords)
    {
        $this->targetWords = $targetWords;
    }

    public function getTargetWords()
    {
        return $this->targetWords;
    }
}
