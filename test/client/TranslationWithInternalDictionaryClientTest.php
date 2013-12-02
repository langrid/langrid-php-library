<?php
/**
 * User: KITAGAWA Daisuke
 * Date: 13/06/07
 * Time: 13:16
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class TranslationWithInternalDictionaryClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createTranslationWithInternalDictionaryClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:TranslationCombinedWithBilingualDictionary');
    }

    function testTranslate()
    {
        try{
            #$this->client->addBindings(new BindingNode("BilingualDictionaryPL", "KyotoTourismDictionaryDb"));
            #$this->client->addBindings(new BindingNode("TranslationPL", "GoogleTranslate"));

            $result = $this->client->translate(
                Language::get('ja'),
                Language::get('en'),
                '京都の比叡山を含む東山は東山３６峰とも呼ばれています．');
            $this->assertTrue(mb_strlen($result) > 0);
            var_dump($result);
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected exception occurere:'.$e->getMessage());
        }
    }


}
