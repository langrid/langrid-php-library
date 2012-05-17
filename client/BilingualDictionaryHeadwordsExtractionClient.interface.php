<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:53
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/BilingualDictionaryClient.interface.php';

interface BilingualDictionaryHeadwordsExtractionClient extends BilingualDictionaryClient {

    /*
     * @param headLang: 検索する見出し言語
     * @param targetLang: 対訳言語
     * @param text: 文字列
     * @return Array<String> 含まれる用語の配列
     */
    public function extract(String $headLang, String $targetLang, String $text);
}