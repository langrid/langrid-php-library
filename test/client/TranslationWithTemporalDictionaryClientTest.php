<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 17:58
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class TranslationWithTemporalDictionaryClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createTranslationWithTemporalDictionaryClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:TranslationCombinedWithBilingualDictionary');
    }

    function testTranslate()
    {
        try{
            $this->client->addBindings(new BindingNode("BilingualDictionaryPL", "KyotoTourismDictionaryDb"));
            $this->client->addBindings(new BindingNode("TranslationPL", "GoogleTranslate"));

            $result = $this->client->translate(
                Language::get('ja'),
                Language::get('en'),
                '京都の比叡山を含む東山は東山３６峰とも呼ばれています．',
                array(
                    new Translation('東山３６峰', array('HIGASHIYAMA36HOU'))
                ),
                Language::get('en'));
            $this->assertTrue(mb_strlen($result) > 0);
            var_dump($result);
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected exception occurere:'.$e->getMessage());
        }
    }


}
