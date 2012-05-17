<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:44
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface TranslationWithTemporalDictionaryClient extends ServiceClient {

    /*
     * @param sourceLang: 翻訳元の言語
     * @param targetLang: 翻訳先の言語
     * @param source: 翻訳する文字列
     * @param temporalDict: 一時辞書データ
     * @param dictTargetLang: 辞書の対象言語。見出しの言語はsourceLangが使われる
     * @return String 翻訳結果
     */
    public function translate(Language $sourceLang,
                              Language $targetLang,
                              /*String*/ $source,
                              array/*<Translation>*/ $temporalDict,
                              Language $dictTargetLang);
}