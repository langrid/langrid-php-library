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

interface NamedEntityTaggingClient extends ServiceClient {

    /*
     * @param lang: 対象言語
     * @param text: タグ付けを行う文字列
     * @return array タグ付け結果
     */
    public function tag(Language $language, /*String*/ $text);
    
    
     /*
     * @return Array<String> 対応言語
     */
    public function getSupportedLanguages();
}