<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:07
 * To change this template use File | Settings | File Templates.
 */
class Speech
{
    // String 音声の種類（"man", "woman", "adult", "child"等）
    private $voiceType;
    // String 音声データのファイル形式（"audio/mpeg", "audio/x-wav"等MIMEタイプで指定）
    private $audioType;
    // Binary 音声データ（バイナリデータ）
    private $audio;

    function __construct($voiceType, $audioType, $audio)
    {
        $this->setVoiceType($voiceType);
        $this->setAudio($audioType);
        $this->setAudio($audio);
    }

    public function setAudio($audio)
    {
        $this->audio = $audio;
    }

    public function getAudio()
    {
        return $this->audio;
    }

    public function setAudioType($audioType)
    {
        $this->audioType = $audioType;
    }

    public function getAudioType()
    {
        return $this->audioType;
    }

    public function setVoiceType($voiceType)
    {
        $this->voiceType = $voiceType;
    }

    public function getVoiceType()
    {
        return $this->voiceType;
    }

    public function getAudioWithBase64Encode()
    {
        return base64_encode($this->getAudio());
    }
    public function setAudioWithBase64Encode($encodedAudio)
    {
        $this->setAudio(base64_decode($encodedAudio));
    }
}
