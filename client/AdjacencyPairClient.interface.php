<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:22
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';


interface AdjacencyPairClient extends ServiceClient {
    /*
     * @param category: カテゴリ
     * @param language: 発話の言語
     * @param firstTurn: 発話
     * @param matchingMethod: 検索方法（"COMPLETE"，"PREFIX"，"SUFFIX"，"PARTIAL"，"REGEX"のいずれか）
     * @return Array<AdjacencyPair>　検索結果
     */
    public function search(/*string*/ $category,
                           Language $language,
                           /*string*/ $firstTurn,
                           /*const MatchingMethod*/ $matchingMethod = MatchingMethod::PARTIAL);
}