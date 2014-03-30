<?php
/**
 * Created by Emacs24 on debian.
 * User: haruo31
 * Date: 14/3/30
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';
require_once dirname(__FILE__) . '/../../utils/BindingNodeUtil.php';

class BindingNodeUtilTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    function testDecodeBindingTree() {
        $expected = '[{"invocationName":"TranslationPL","serviceId":"NICTJServer","children":[]},{"invocationName":"MorphologicalAnalysisPL","serviceId":"Mecab","children":[]}]';
        $bindingTree = BindingNodeUtil::decodeBindingTree($expected);
        $this->assertEquals($expected, json_encode($bindingTree));
    }

    function testDecodeBindingTreeWithChildren() {
        $expected = '[{"invocationName":"TranslationPL","serviceId":"NICTJServer","children":[{"invocationName":"BilingualDictionaryWithLongestMatchSearchPL","serviceId":"KyotoTourismDictionaryDb","children":[]}]}]';

        $bindingTree = BindingNodeUtil::decodeBindingTree($expected);
        $this->assertEquals($expected, json_encode($bindingTree));
    }
}
