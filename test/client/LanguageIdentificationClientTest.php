<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/02
 * Time: 15:43
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class LanguageIdentificationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createLanguageIdentificationClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:GoogleLanguageDetect');
    }

    function testIdentifyLanguageAndEncoding()
    {
        try {
            $result = $this->client->identifyLanguageAndEncoding('language');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    function testIdentify()
    {
        try {
            $result = $this->client->identify('こんにちは', 'UTF-8');
            $this->assertEquals('ja', $result);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    function testGetSupportedLanguages()
    {
        try {
            $result = $this->client->getSupportedLanguages();
            $this->assertTrue(2 <= count($result));
            $this->assertTrue(in_array('en', $result));
            $this->assertTrue(in_array('ja', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }

    }

    function testGetSupportedEncodings()
    {
        try {
            $result = $this->client->getSupportedEncodings();
            $this->assertTrue(1 <= count($result));
            $this->assertTrue(in_array('UTF-8', $result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }

    }

}
