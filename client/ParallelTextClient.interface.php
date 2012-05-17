<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:47
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface ParallelTextClient extends ServiceClient {

    /*
     * @param sourceLang: 用例対訳の元言語
     * @param targetLang: 用例対訳の先言語
     * @param source: 検索する文字列
     * @return Array<ParallelText> 検索結果
     */
    public function search(Language $sourceLang,
                           Language $targetLang,
                           /*String*/ $source,
                           /*MatchingMethod*/ $matchingMethod);
}