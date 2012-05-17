<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 0:36
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class QualityEstimationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createQualityEstimationClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:PangaeaPictogram');
    }

    public function testSearch()
    {
        try {
            $result = $this->client->estimate(Language::get('en'), Language::get('ja'), 'hello', 'こんにちは');
            $this->assertTrue(count($result) == 1.0);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
