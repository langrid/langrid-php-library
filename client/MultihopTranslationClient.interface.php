<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:44
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface MultihopTranslationClient extends ServiceClient {

    /*
     * @param sourceLang: 翻訳元の言語
     * @param intermediateLangs: 中間言語
     * @param targetLang: 翻訳する文字列
     * @param source: 翻訳先の言語
     * @return MultihopTranslationResult 複数ホップ翻訳結果
     */
    public function multihopTranslate(Language $sourceLang,
                                      array/*<Language>*/ $intermediateLangs,
                                      Language $targetLang,
                                      /*String*/ $source);
}

class MultihopTranslationResult
{
    // Language 翻訳元の言語
    private $sourceLang;
    // Array<Language> 中間言語
    private $intermediateLangs;
    // Language 翻訳先の言語
    private $targetLang;
    // String 翻訳する文字列
    private $source;
}
