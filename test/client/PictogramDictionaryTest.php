<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 0:29
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class PictogramDictionaryTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createPictogramDictionaryClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:PangaeaPictogram');
    }

    public function testSearch()
    {
        try {
            $result = $this->client->search(Language::get('en'), 'toma', MatchingMethod::PARTIAL);
            $this->assertTrue(count($result) == 1);
            $this->assertEquals('tomato', $result[0]->word);
            $this->assertEquals('SWF', $result[0]->imageType);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

}
