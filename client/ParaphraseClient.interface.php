<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 18:08
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface ParaphraseClient extends ServiceClient {

    /*
     * @param language: テキストの言語
     * @param text: テキスト
     */
    public function paraphrase(Language $language, /*String*/ $text);

}