<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:36
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface MorphemesDependencyParserClient extends ServiceClient {

    /*
     * @param language: テキストの言語
     * @param text: テキスト
     * @return Array<Morpheme> 形態素解析の結果
     */
    public function parseDependency(Language $language, array/*<Morpheme>*/ $morphemes);
}
