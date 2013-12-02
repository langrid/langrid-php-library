<?php
/**
 * CreatedUser: kitagawa
 * Date: 13/06/05
 * Time: 12:03
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface TranslationWithInternalDictionaryClient extends ServiceClient {
    /*
     * @param sourceLang: 翻訳元の言語
     * @param targetLang: 翻訳先の言語
     * @param source: 翻訳する文字列
     * @return String 翻訳結果
     */
    public function translate(Language $sourceLang,
                              Language $targetLang,
                              /*String*/ $source);

		public function getSupportedInternalDictionaryIds(Language $sourceLang,
                                                      Language $targetLang);
}
