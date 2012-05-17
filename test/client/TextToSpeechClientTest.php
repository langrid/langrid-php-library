<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 17:35
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class TextToSpeechClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createTextToSpeechClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:VoiceText');
    }

    public function testGetSupportedLanguages()
    {
        try {
            $result = $this->client->getSupportedLanguages();
            $this->assertTrue(count($result) > 0);
            $this->assertTrue(in_array('ja', $result));
            $this->assertTrue(in_array('en', $result));
            $this->assertTrue(in_array('zh', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testGetSupportedVoiceTypes()
    {
        try {
            $result = $this->client->getSupportedVoiceTypes();
            $this->assertTrue(count($result) > 0);
            $this->assertTrue(in_array('man', $result));
            $this->assertTrue(in_array('woman', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testGetSupportedAudioTypes()
    {
        try {
            $result = $this->client->getSupportedAudioTypes();
            $this->assertTrue(count($result) > 0);
            $this->assertTrue(in_array('audio/x-wav', $result));
            $this->assertTrue(in_array('audio/ogg', $result));
            $this->assertTrue(in_array('video/x-ms-asf', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testSpeak()
    {
        try {
            $result = $this->client->speak(Language::get('ja'), 'こんにちは', 'man', 'audio/x-wav');
            $fp = fopen("textToSpeechTest.wav", "w");
            fwrite($fp, $result->audio);
            fclose($fp);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
