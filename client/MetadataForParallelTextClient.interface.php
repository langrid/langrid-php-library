<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:31
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface MetadataForParallelTextClient {

    /*
     * @param query: メタデータの検索クエリ
     * @param matchingMethod: 検索方法
     * @return Array<String> 検索結果が格納された配列。存在しない場合空配列
     */
    public function searchCandidatesWithMetadata(String $query, MatchingMethod $matchingMethod);

    /*
     * @param id: 用例のID
     * @return Array<String> 検索結果が格納された配列。存在しない場合空配列
     */
    public function getMetadata(String $id);

    /*
     * @return Array<String> 検索結果が格納された配列。存在しない場合空配列
     */
    public function getMetadataSchema();
}