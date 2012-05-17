<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:40
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface TranslationClient extends ServiceClient {

    /*
     * @param sourceLang: 翻訳元の言語
     * @param targetLang: 翻訳先の言語
     * @param source: 翻訳する文字列
     * @return String 翻訳結果
     */
    public function translate(Language $sourceLang, Language $targetLang, /*String*/ $source);
}