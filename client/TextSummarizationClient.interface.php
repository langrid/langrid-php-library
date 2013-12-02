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

interface TextSummarizationClient extends ServiceClient {

    /*
     * @param lang: ‘ÎÛŒ¾Œê
     * @param text: —v–ñ‚·‚é•¶
     * @return string —v–ñŒ‹‰Ê
     */
    public function summarize(Language $language, /*String*/ $text);
    
    
     /*
     * @return Array<String> ‘Î‰žŒ¾Œê
     */
    public function getSupportedLanguages();
}