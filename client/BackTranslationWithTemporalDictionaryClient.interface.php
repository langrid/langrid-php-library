<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:41
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/Translation.php';


interface BackTranslationWithTemporalDictionaryClient {

    /*
     * @param sourceLang: 翻訳元の言語
     * @param intermediateLang: 中間言語
     * @param source: 翻訳する文字列
     * @param temporalDict: 一時辞書データ
     * @param dictTargetLang: 辞書の対象言語。見出しの言語はsourceLangが使われる
     * @return BackTranslationResult 翻訳結果
     */
    public function backTranslate(Language $sourceLang,
                                  Language $intermediateLang,
                                  $source,
                                  array/*<Translation>*/ $temporalDict,
                                  Language $dictTargetLang);
}

class BackTranslationResult
{
    // String 中間翻訳結果
    private $intermediate;
    // String 折り返し翻訳結果
    private $target;
}