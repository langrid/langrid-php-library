<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/08
 * Time: 17:00
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class BindingNodeTest extends PHPUnit_Framework_TestCase
{
    private $bindingNode;

    protected function setUp()
    {
        parent::setUp();
    }

    function testJsonEncode()
    {
        $bindingTree = array();

        array_push($bindingTree, new BindingNode('TranslationPL', 'NICTJServer'));
        array_push($bindingTree, new BindingNode('MorphologicalAnalysisPL', 'Mecab'));
        $result = json_encode($bindingTree);

        $this->assertEquals('[{"invocationName":"TranslationPL","serviceId":"NICTJServer","children":[]},{"invocationName":"MorphologicalAnalysisPL","serviceId":"Mecab","children":[]}]', $result);
    }

    function testJsonEncodeWithChildren()
    {
        $bindingTree = array();

        $bind = new BindingNode('TranslationPL', 'NICTJServer');
        $bind->addChild(new BindingNode('BilingualDictionaryWithLongestMatchSearchPL', 'KyotoTourismDictionaryDb'));
        array_push($bindingTree, $bind);
        $result = json_encode($bindingTree);
        $this->assertEquals('[{"invocationName":"TranslationPL","serviceId":"NICTJServer","children":[{"invocationName":"BilingualDictionaryWithLongestMatchSearchPL","serviceId":"KyotoTourismDictionaryDb","children":[]}]}]', $result);
    }
}
