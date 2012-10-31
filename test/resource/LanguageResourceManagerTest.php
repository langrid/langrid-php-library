<?php

require_once 'SOAP/Client.php';

class LanguageResourceManagerTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }
    
    /**
     * @dataProvider wsdlProvider
     * @Test
     */
    public function testAllLanguageResource($endpoint)
    {
        $client = ClientFactory::createBilingualDictionaryClient($endpoint);
        $result = $client->search(
            Language::get('en'), 
            Language::get('ja'), 
            'test', 
            MatchingMethod::COMPLETE  
        );
        
        var_dump($result);
        $this->assertTrue(is_array($result));
    }
    
    public function wsdlProvider()
    {
            $url = "http://langrid.ai.soc.i.kyoto-u.ac.jp/language_resource_manager/services/BilingualDictionaryManagement";
        
        $client = new SOAP_Client($url);
        $result = $client->call("listBilingualDictionary", array(
            "startIndex" => 0,
            "maxCount" => 100, 
        ));
        
        $baseUrl = "http://langrid.ai.soc.i.kyoto-u.ac.jp/language_resource_manager/services/";
        $endpoint = array();
        foreach ($result->entries as $dic) {
            $endpoint[$dic->bilingualDictionaryId] = array($baseUrl . $dic->bilingualDictionaryId . "?wsdl");
        }
        return $endpoint;
    }
}
