<?php
/**
 * Created by IntelliJ IDEA.
 * User: nkjm
 * Date: 12/05/22
 * Time: 12:41
 * To change this template use File | Settings | File Templates.
 */
class TranslationSOAP{
    public $headWord = '';
    public $targetWords = array();

    public function __construct($headWord = '', $targetWords = array()) {
        $this->headWord = $headWord;

        $tws = array();
        foreach ($targetWords as $targetWord) {
            $s = new SOAP_Value('targetWords', 'string', $targetWord);
            $tws[] = $s;
        }
        $this->targetWords = $tws;
    }
}
