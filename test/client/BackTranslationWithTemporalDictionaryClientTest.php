<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/25
 * Time: 15:45
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class BackTranslationWithTemporalDictionaryClientTest  extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createBackTranslationWithTemporalDictionaryClient(SERVICE_GRID_BASE_URL.'nict.nlp:BackTranslationWithTemporalDictionary');
    }

    function testBackTranslate()
    {
        try{
            if(method_exists($this->client, 'backTranslate')) {
                $result = $this->client->backTranslate(Language::get('en'), Language::get('ja'), 'Hello everyone', array(), Language::get('en'));
            } else {
                $this->assertFalse(true, 'method not found: backTranslate');
            }
        } catch(Exception $e) {
            $this->assertTrue(false, "unexpected exception occurred:".$e->getMessage());
        }
    }

}
