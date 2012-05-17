<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 16:12
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class TranslationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createTranslationClient(SERVICE_GRID_BASE_URL.'KyotoUCLWT');
//        $this->client = ClientFactory::createTranslationClient(SERVICE_GRID_BASE_URL.'KyotoUJServer');
//        $this->client = ClientFactory::createTranslationClient(SERVICE_GRID_BASE_URL.'GoogleTranslate');
    }

    function testTranslate()
    {
        try{
            $result = $this->client->translate(Language::get('en'), Language::get('ja'), 'hello');
            $this->assertEquals('こんにちは', $result);
        } catch(Exception $e) {
            $this->assertTrue(false, "unexpected exception occurred:".$e->getMessage());
        }
    }
}
