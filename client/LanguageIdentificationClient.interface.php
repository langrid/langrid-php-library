<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:23
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';

interface LanguageIdentificationClient extends ServiceClient {

    /*
     * @param textBytes: 識別する文字列
     * @return LanguageAndEncoding 識別結果
     */
    public function identifyLanguageAndEncoding(/*String*/ $textBytes);

    /*
     * @param text: 識別する文字列
     * @param originalEncoding: 文字列のエンコーディング
     * @return String 識別結果
     */
    public function identify(/*String*/ $text, /*String*/ $originalEncoding);

    /*
     * @return String[] 言語の配列
     */
    public function getSupportedLanguages();

    /*
     * @return String[] エンコーディングの配列
     */
    public function getSupportedEncodings();
}

class LanguageAndEncoding
{
    // String 言語
    private $language;
    // String エンコーディング
    private $encoding;
}