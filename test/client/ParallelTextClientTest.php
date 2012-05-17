<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 0:09
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class ParallelTextClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createParallelTextClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:GCNOsakaCampusDictionary');
    }

    public function testSearch()
    {
        try {
            //$headLang, $targetLang, $headWord, $matchingMethod
            $result = $this->client->search(Language::get('en'), Language::get('ja'), 'examination', MatchingMethod::PARTIAL);
            $this->assertTrue(2 == count($result));
            $this->assertTrue(preg_match('/試験/', $result[0]->target) == 1);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

}
