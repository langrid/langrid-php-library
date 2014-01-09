<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 14:28
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class BilingualDictionaryServiceTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $url = 'http://www.langrid.org/widget/server/DictionaryServices/5.3/wsdl/bilingualdictionary_wsdl.php?serviceId=Yuu_Nakajima_Dic';
        //$url = 'http://langrid.org/tools/jen/modules/dictionary/services/wsdl/bilingualdictionary_wsdl.php?serviceId=JEN_Unified_Dictionary';
        $this->client = ClientFactory::createBilingualDictionaryClient($url);
    }


    public function testSearch()
    {
        try {
            //$headLang, $targetLang, $headWord, $matchingMethod
            $result = $this->client->search(Language::get('en'), Language::get('ja'), 'Nyan', MatchingMethod::COMPLETE);
            var_dump($result);
        } catch (Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: ' . $e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
