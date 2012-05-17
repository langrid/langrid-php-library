<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:03
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Speech.php';

interface SpeechRecognitionClient extends ServiceClient {

    /*
     * @param language: 言語
     * @param speech: 音声データ
     * @return String 文字列
     */
    public function recognize(/*String*/ $language, Speech $speech);

    /*
     * @return Array<String> 対応言語
     */
    public function getSupportedLanguages();

    /*
     * @return Array<String> 対応している音声の種類
     */
    public function getSupportedVoiceTypes();

    /*
     * @return Array<String> 対応している音声データのファイル形式
     */
    public function getSupportedAudioTypes();
}