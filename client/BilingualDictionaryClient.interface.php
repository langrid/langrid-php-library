<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:44
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface BilingualDictionaryClient extends ServiceClient {

    /*
     * @param headLang: 対訳の元言語
     * @param targetLang: 対訳の対象言語
     * @param headWord: 対訳を検索する語
     * @param matchingMethod: 検索方法
     * @return Array<Translation> 検索結果
     */
    public function search(Language $headLang,
                           Language $targetLang,
                           $headWord,
                           $matchingMethod);


    /*
     * @return Array<LanguagePair> 言語の配列
     */
    public function getSupportedLanguagePairs();

    /*
     * @return Array<String> 対応している検索方法の配列
     */
    public function getSupportedMatchingMethods();

    /*
     * @return int 最終更新日（Unix タイムスタンプ）
     */
    public function getLastUpdate();
}