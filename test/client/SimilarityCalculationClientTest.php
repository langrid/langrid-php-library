<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 0:40
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class SimilarityCalculationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createSimilarityCalculationClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:BLEU');
    }

    public function testSearch()
    {
        try {
            $result = $this->client->calculate(Language::get('en'), 'hello', 'good night');
            $this->assertTrue($result == 0);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
