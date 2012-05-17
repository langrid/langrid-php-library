<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:01
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface SimilarityCalculationClient extends ServiceClient {

    /*
     * @param language: テキストの言語
     * @param text1: 比較元テキスト
     * @param text2: 比較先テキスト
     * @return double 計算結果
     */
    public function calculate(Language $language, /*String*/ $text1, /*String*/ $text2);
}