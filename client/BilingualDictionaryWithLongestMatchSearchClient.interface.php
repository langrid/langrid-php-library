<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:55
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/BilingualDictionaryClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface BilingualDictionaryWithLongestMatchSearchClient extends BilingualDictionaryClient {

    /*
     * @param headLang: 検索する見出し言語
     * @param targetLang: 対訳言語
     * @param morphemes: 形態素
     * @return Array<TranslationWithPosition> 結果の配列
     */
    public function searchLongestMatchingTerms(Language $headLang,
                                               Language $targetLang,
                                               array/*<Morpheme>*/ $morphemes);
}