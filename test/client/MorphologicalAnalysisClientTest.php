<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/04
 * Time: 18:03
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class MorphologicalAnalysisClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createMorphologicalAnalysisClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:Juman_service');
    }

    function testAnalyze()
    {
        try {
            $result = $this->client->analyze(Language::get('ja'), '立春から春分の間に、その年に初めて吹く南寄りの強い風を春一番と呼ぶ。');
            $this->assertTrue(23 == count($result));
            $this->assertEquals('立春', $result[0]->lemma);
            $this->assertEquals(PartOfSpeech::noun_common, $result[0]->partOfSpeech);
            $this->assertEquals('立春', $result[0]->word);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

}
