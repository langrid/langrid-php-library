<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:13
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface DependencyParserClient extends ServiceClient {

    /*
     * @param language: 入力文の言語
     * @param sentence: 入力文
     * @return Array<Chunk> 係り受け解析結果
     */
    public function parseDependency(Language $language, /*String*/ $sentence);
}