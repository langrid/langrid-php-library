<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:58
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface ParallelTextWithExternalMetadataClient {

    /*
     * @param sourceLang: 元言語
     * @param targetLang: 対訳を探す言語
     * @param text: 対訳を探す文章
     * @param matchingMethod: 検索方法
     * @param candidateIds: 検索対象となる用例対訳候補のID
     * @return Array<ParallelTextWithId> 検索結果が格納された配列。存在しない場合空配列
     */
    public function searchParallelTextsFromCandidates(Language $sourceLang,
                                                      Language $targetLang,
                                                      String $text,
                                                      MatchingMethod $matchingMethod,
                                                      array/*<String>*/ $candidateIds);

}