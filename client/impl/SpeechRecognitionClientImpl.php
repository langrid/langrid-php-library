<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:22
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../SpeechRecognitionClient.interface.php';

class SpeechRecognitionClientImpl extends ServiceClientImpl implements SpeechRecognitionClient
{
    public function recognize(/*String*/ $language, Speech $speech)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'speech' => $speech
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
