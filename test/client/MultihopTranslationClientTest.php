<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/04
 * Time: 23:41
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class MultihopTranslationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createMultihopTranslationClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:TwoHopTranslation');
    }

    function testMultihopBackTranslate()
    {
        try {
            $this->client->addBindings(new BindingNode("FirstTranslationPL", "GoogleTranslate"));
            $this->client->addBindings(new BindingNode("SecondTranslationPL", "GoogleTranslate"));
            $result = $this->client->multihopTranslate(Language::get('en'), array(Language::get('ja')), Language::get('ko'), 'hello');
            $this->assertEquals($result->intermediates[0], 'こんにちは');
            $this->assertEquals($result->target, '안녕하세요');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

}
