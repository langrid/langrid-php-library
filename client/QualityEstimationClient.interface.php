<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface QualityEstimationClient extends ServiceClient {

    /*
     * @param sourceLang: 翻訳元の言語
     * @param targetLang: 翻訳先の言語
     * @param source: 翻訳元の文字列
     * @param target: 翻訳後の文字列
     * @return double 評価結果
     */
    public function estimate(Language $sourceLang,
                             Language $targetLang,
                             /*String*/ $source,
                             /*String*/ $target);
}

class EstimationResult
{
    // double
    private $quality;
    // String
    private $target;
}