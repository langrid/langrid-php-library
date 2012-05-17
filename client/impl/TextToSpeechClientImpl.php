<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:30
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../TextToSpeechClient.interface.php';

class TextToSpeechClientImpl extends ServiceClientImpl implements TextToSpeechClient
{
    public function speak(Language $language, /*String*/ $text, /*String*/ $voiceType, /*String*/ $audioType)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'text' => $text,
            'voiceType' => $voiceType,
            'audioType' => $audioType
        ));
    }

    public function getSupportedLanguages()
    {
        return $this->invoke(__FUNCTION__);
    }

    public function getSupportedVoiceTypes()
    {
        return $this->invoke(__FUNCTION__);
    }

    public function getSupportedAudioTypes()
    {
        return $this->invoke(__FUNCTION__);
    }
}
