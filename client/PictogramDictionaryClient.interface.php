<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 18:10
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface PictogramDictionaryClient extends ServiceClient {

    /*
     * @param language: wordの言語
     * @param word:  絵文字を検索する単語
     * @param matchingMethod: マッチング方法
     * @return Array<Pictogram>
     */
    public function search(Language $language, /*String*/ $word, /*MatchingMethod*/ $matchingMethod);

}

class Pictogram
{
    // String 絵文字に関連付けられている単語
    private $word;
    // String 絵文字の画像のファイルタイプ
    private $imageType;
    // 絵文字の画像データ
    private $image;
}
