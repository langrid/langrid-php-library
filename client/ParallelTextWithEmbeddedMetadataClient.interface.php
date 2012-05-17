<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:54
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface ParallelTextWithEmbeddedMetadataClient extends ServiceClient {

    /*
     * @param sourceLang: 元言語
     * @param targetLang: 対訳を探す言語
     * @param metadata: 検索対象を限定するためのメタデータ
     * @param text: 対訳を探す文章
     * @param matchingMethod: 検索方法
     * @return Array<ParallelTextWithMetadata> 検索結果が格納された配列
     */
    public function searchParallelTextsByMetadata(Language $sourceLang,
                                                  Language $targetLang,
                                                  array/*<String>*/ $metadata,
                                                  String $text,
                                                  MatchingMethod $matchingMethod);

    /*
     * @param メタデータの検索クエリ
     * @param 検索方法
     * @return Array<String> 検索結果が格納された配列
     */
    public function searchSupportedMetadata(String $query, MatchingMethod $matchingMethod);
}