<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nkjm
 * Date: 12/04/02
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../commons/Document.php';

interface DocumentTranslation extends ServiceClient
{
    /*
     * @abstract
     * @param sourceLang: 翻訳元の言語
     * @param targetLang: 翻訳先の言語
     * @param source: 翻訳するWord
     * @return String 翻訳結果
     */
    public function start(Language $sourceLang,
                          Language $targetLang,
                          Document $source);


    /**
     * @abstract
     * @param $token
     * @return boolean: is finished or not.
     */
    public function isFinished( /* string*/
        $token);

    /**
     * @abstract
     * @param $token
     * @return double: progress of translation (0.0000 - 1.0000)
     */
    public function getProgress( /* string*/
        $token);

    /**
     *
     * @abstract
     * @param $token
     * @return Object: translated document object. The translated document represented by binary data is contained
     * in result object. The binary data is accessed by $result->data->data.
     */
    public function getResult( /* string*/
        $token);

    public function terminate( /* string*/
        $token);



}
