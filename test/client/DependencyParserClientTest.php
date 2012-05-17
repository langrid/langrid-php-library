<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/02
 * Time: 15:29
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class DependencyParserClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createDependencyParserClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:CabochaService');
    }

    function testParseDependency()
    {
        try {
            $result = $this->client->parseDependency(Language::get('ja'), '主に薬味として多くの料理で使われている“ねぎ”');
            $this->assertTrue(6 == count($result));
            $this->assertEquals('主', $result[0]->morphemes[0]->lemma);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
