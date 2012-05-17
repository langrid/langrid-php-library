<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 0:02
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class MultihopBackTranslationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createMultihopBackTranslationClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:TwoHopTranslation');
    }

    function testAnalyze()
    {
        try {
            $result = $this->client->multihopBackTranslate(Language::get('ja'), array(Language::get('ko')), Language::get('en'),'いつもありがとうございます。');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

}
