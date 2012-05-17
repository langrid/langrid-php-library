<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 15:58
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class BackTranslationClientTest extends PHPUnit_Framework_TestCase
{
    private $client;
    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createBackTranslationClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:BackTranslation');
    }

    function testBackTranslate()
    {
        try{
            $this->client->addBindings(new BindingNode("ForwardTranslationPL", "GoogleTranslate"));
            $this->client->addBindings(new BindingNode("BackwardTranslationPL", "GoogleTranslate"));
            $result = $this->client->backTranslate(Language::get('ja'), Language::get('en'), '古く京都は、しばしば中国王朝の都となった洛陽に因み、京洛、洛中、洛陽などといわれた。');
            $this->assertEquals($result->target, "洛陽に京都、因Miは中国王朝の首都となり、多くの場合、首都、洛陽、そのような長い時間の中で、京楽を言われました。");
        } catch(Exception $e) {
            $this->assertTrue(false, "unexpected exception occurred:".$e->getMessage());
        }
    }
}
