<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/02
 * Time: 15:05
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class ConceptDictionaryClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createConceptDictionaryClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:EDRConceptDictionary');
    }

    function testGetRelatedConcepts()
    {
        $conceptId = 'urn:langrid:edr:concept:noun.common:3ce65d';
        try {
            $result = $this->client->getRelatedConcepts(Language::get('en'), $conceptId, ConceptualRelation::HYPERNYMS);
            $this->assertTrue(1 == count($result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    function testSearchConcepts()
    {
        try {
            $result = $this->client->searchConcepts(Language::get('en'), 'test', MatchingMethod::COMPLETE);
            $this->assertTrue(1 <= count($result));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
