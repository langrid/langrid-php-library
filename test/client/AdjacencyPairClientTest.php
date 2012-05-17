<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/25
 * Time: 15:37
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class AdjacencyPairClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createAdjacencyPairClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:MedicalDialogCorpus');
    }

    function testSearch()
    {
        try{
            $keyword = 'test';
            if(method_exists($this->client, 'search')) {
                $result = $this->client->search('', Language::get("en"), $keyword);
                if( count($result) > 0) {
                    $this->assertTrue( stristr($result[0]->firstTurn, 'test') != false );
                } else {
                    $this->assertFalse(true, 'result not found');
                }
            } else {
                $this->assertFalse(true, 'method not found: AdjacencyPairClient#search');
            }
        } catch(Exception $e) {
            var_dump($e->getMessage());
        }
    }

}
