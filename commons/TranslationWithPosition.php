<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 16:36
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/Translation.php';

class TranslationWithPosition
{
    // Translation 対訳
    private $translation;
    // int 対訳が合致する形態素配列の開始インデックス
    private $startIndex;
    // int 対訳が合致する形態素の数
    private $numberOfMorphemes;

    function __construct($translation = null, $startIndex = -1, $numberOfMorphemes = -1)
    {
        $this->translation = $translation;
        $this->startIndex = $startIndex;
        $this->numberOfMorphemes = $numberOfMorphemes;
    }

    public function setNumberOfMorphemes($numberOfMorphemes)
    {
        $this->numberOfMorphemes = $numberOfMorphemes;
    }

    public function getNumberOfMorphemes()
    {
        return $this->numberOfMorphemes;
    }

    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    public function getStartIndex()
    {
        return $this->startIndex;
    }

    public function setTranslation($translation)
    {
        $this->translation = $translation;
    }

    public function getTranslation()
    {
        return $this->translation;
    }
}
