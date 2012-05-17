<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 0:48
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';
require_once dirname(__FILE__).'/../../utils/FileUtil.php';


class SpeechRecognitionClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createSpeechRecognitionClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:Julius');
    }

    public function testGetSupportedLanguages()
    {
        try {
            $result = $this->client->getSupportedLanguages();
            $this->assertTrue(count($result) > 0);
            $this->assertTrue(in_array('ja', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testGetSupportedVoiceTypes()
    {
        try {
            $result = $this->client->getSupportedVoiceTypes();
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
            $this->assertTrue(in_array('audio/x-mp3', $result));
            $this->assertTrue(in_array('audio/wav', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testRecognize()
    {
        try {
            $result = $this->client->recognize(Language::get('ja'), new Speech('standard','audio/x-wav', FileUtil::readBase64EncodedData('test/SpeechRecognitionTest.wav')));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

}
