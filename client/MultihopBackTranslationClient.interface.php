<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:40
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface MultihopBackTranslationClient extends ServiceClient {

    /*
     * @param sourceLang: 翻訳元の言語
     * @param intermediateLangs: 中間言語
     * @param targetLang: 翻訳先の言語
     * @param source: 翻訳する文字列
     * @return MultihopTranslationResult 複数ホップ折り返し翻訳結果
     */
    public function multihopBackTranslate(Language $sourceLang,
                                          array/*<Language>*/ $intermediateLangs,
                                          Language $targetLang,
                                          /*String*/ $source);

}