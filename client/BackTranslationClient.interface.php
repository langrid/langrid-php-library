<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:35
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface BackTranslationClient extends ServiceClient {
    /*
     * @param srouceLang: 翻訳元の言語
     * @param intermediateLang: 中間言語
     * @param source: 翻訳する文字列
     * @return BackTranslationResult 折り返し翻訳結果
     */
    public function backTranslate(Language $sourceLang,
                                  Language $intermediateLang,
                                  $source);

}