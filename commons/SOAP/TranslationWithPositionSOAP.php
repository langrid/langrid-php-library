<?php
/**
 * Created by IntelliJ IDEA.
 * User: nkjm
 * Date: 12/05/23
 * Time: 11:44
 * To change this template use File | Settings | File Templates.
 */

class TranslationWithPositionSOAP
{
// Translation 対訳
    public $translation;
// int 対訳が合致する形態素配列の開始インデックス
    public $startIndex;
// int 対訳が合致する形態素の数
    public $numberOfMorphemes;

    function __construct($translation = null, $startIndex = -1, $numberOfMorphemes = -1)
    {
        $this->translation = $translation;
        $this->startIndex = $startIndex;
        $this->numberOfMorphemes = $numberOfMorphemes;
    }
}
