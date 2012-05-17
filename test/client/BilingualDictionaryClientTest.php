<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 14:28
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class BilingualDictionaryClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createBilingualDictionaryClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:Lsd');
    }

    function testGetSupportedLanguagePairs()
    {
        try {
            $result = $this->client->getSupportedLanguagePairs();
            $this->assertTrue(count($result) == 2);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    function testGetSupportedMatchingMethods()
    {
        try {
            $result = $this->client->getSupportedMatchingMethods();
            $this->assertTrue(in_array('SUFFIX', $result), 'getSupportedMatchingMethods not return "SUFFIX" value');
            $this->assertTrue(in_array('PREFIX', $result), 'getSupportedMatchingMethods not return "PREFIX" value');
            $this->assertTrue(in_array('PARTIAL', $result), 'getSupportedMatchingMethods not return "PARTIAL" value');
            $this->assertTrue(in_array('COMPLETE', $result), 'getSupportedMatchingMethods not return "COMPLETE" value');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    function testGetLastUpdate()
    {
        try {
            $result = $this->client->getLastUpdate();
            $this->assertTrue(1==preg_match('/\d{2}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\..*/', $result), 'getLastUpdate returned unexpected format');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testSearch()
    {
        try {
            //$headLang, $targetLang, $headWord, $matchingMethod
            $result = $this->client->search(Language::get('ja'), Language::get('en'), '科学', MatchingMethod::COMPLETE);
            var_dump($result);
            $this->assertTrue(1 == count($result));
            $this->assertEquals('science', $result[0]->targetWords[0]);
            $this->assertEquals('sci', $result[0]->targetWords[1]);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
