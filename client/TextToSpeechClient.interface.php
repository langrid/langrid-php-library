<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:25
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';

interface TextToSpeechClient extends ServiceClient {

    /*
     * @param language: テキストの言語
     * @param text: 比較元テキスト
     * @param voiceType: 声のタイプ。"man"や"woman"等。省略時空文字列又は"*"
     * @param audioType: 出力データの形式(MIMEタイプ)。"audio/mpeg"、"audio/x-wav"等。省略時空文字列又は"audio/*"
     * @return Speech 合成結果
     */
    public function speak(Language $language, /*String*/ $text, /*String*/ $voiceType, /*String*/ $audioType);

    /*
     * @return Array<String> 言語一覧
     */
    public function getSupportedLanguages();

    /*
     * @return Array<String> タイプ一覧
     */
    public function getSupportedVoiceTypes();

    /*
     * @return Array<String> タイプ一覧
     */
    public function getSupportedAudioTypes();
}