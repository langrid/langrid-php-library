<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 18:02
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ParallelTextClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface ParallelTextWithIdClient extends ParallelTextClient {

    /*
     * @param sourceLang: 元言語
     * @param targetLang: 対訳を探す言語
     * @param text: 対訳を探す文章
     * @param matchingMethod: 検索方法
     * @param categoryIds: カテゴリ。省略時空配列
     * @return Array<ParallelTextWithId> 検索結果が格納された配列。存在しない場合空配列
     */
    public function searchParallelTexts(Language $sourceLang,
                                        Language $targetLang,
                                        String $text,
                                        MatchingMethod $matchingMethod,
                                        array/*<String>*/ $categoryIds);

    /*
     * @return Array<Category> カテゴリ一覧
     */
    public function listCategories();
}