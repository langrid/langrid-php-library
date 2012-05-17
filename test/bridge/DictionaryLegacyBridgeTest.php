<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/01
 * Time: 16:32
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';
require_once dirname(__FILE__).'/../../bridge/DictionaryLegacyBridge.php';

class DictionaryLegacyBridgeTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testGetPermission(){
        $permission = DictionaryLegacyBridge::getPermission(2);
        $this->assertEquals($permission['dictionary']['view'], 'user');
        $this->assertEquals($permission['dictionary']['edit'], 'user');
    }

    public function testGetPermission2(){
        $permission = DictionaryLegacyBridge::getPermission(3);
        $this->assertEquals($permission['dictionary']['view'], 'all');
        $this->assertEquals($permission['dictionary']['edit'], 'user');
    }

    public function testGetPermission3(){
        $permission = DictionaryLegacyBridge::getPermission(4);
        $this->assertEquals($permission['dictionary']['view'], 'user');
        $this->assertEquals($permission['dictionary']['edit'], 'all');
    }

    public function testDoCreate(){
        $result = DictionaryLegacyBridge::doCreate(array(
            'dictionaryName' => 'legacyDictName',
            'supportedLanguages' => array('ja', 'en', 'ko'),
            'records' => array(
                array('hoge', 'hoge', 'hoge'),
                array('foo', 'foo', 'foo')
            ),
            'dictionaryTypeId' => 0
        ), 5);

        $dict = Dictionary::find($result['dictionaryId']);
        $this->assertEquals($dict->name, 'legacyDictName');
        $this->assertTrue(count($dict->get_languages()) == 3);

    }

    public function testDoDownload() {
        $result = DictionaryLegacyBridge::doDownload(1);
    }

    public function  testGetAllDictionariesByTypeId() {
        $dicts = DictionaryLegacyBridge::getAllDictionariesByTypeId(0);
        $this->assertTrue(array_key_exists('id', $dicts[0]));
        $this->assertTrue(array_key_exists('name', $dicts[0]));
        $this->assertTrue(array_key_exists('count', $dicts[0]));
        $this->assertTrue(array_key_exists('supportedLanguages', $dicts[0]));
        $this->assertTrue(array_key_exists('languages', $dicts[0]));
        $this->assertTrue(array_key_exists('createDateFormat', $dicts[0]));
        $this->assertTrue(array_key_exists('updateDateFormat', $dicts[0]));
        $this->assertTrue(array_key_exists('view', $dicts[0]));
        $this->assertTrue(array_key_exists('edit', $dicts[0]));
        $this->assertTrue(array_key_exists('deployFlag', $dicts[0]));
        $this->assertTrue(array_key_exists('deploy_flag', $dicts[0]));
        $this->assertTrue(array_key_exists('delete', $dicts[0]));
    }

    public function testGetAllDictionariesByTypeIdWithOffsetLimit() {
        $dicts = DictionaryLegacyBridge::getAllDictionariesByTypeId(0, 2, 1);
        $this->assertTrue(count($dicts) == 2);
        $this->assertTrue($dicts[0]['id'] == 2);
    }

    public function testCountAllDictionaryContentsByDictionaryId(){
        $count = DictionaryLegacyBridge::countAllDictionaryContentsByDictionaryId(2);
        $this->assertTrue($count == 5);
    }

    public function testCountAllDictionaryContentsByDictionaryId2(){
        $count = DictionaryLegacyBridge::countAllDictionaryContentsByDictionaryId(5);
        $this->assertTrue($count == 2);
    }

    public function testGetAllDictionaryContentsByDictionaryId(){
        $records = DictionaryLegacyBridge::getAllDictionaryContentsByDictionaryId(1);
        $this->assertTrue(count($records) == 5 + 1);
    }

    public function testGetAllDictionaryContentsByDictionaryIdOffsetLimit(){
        $records = DictionaryLegacyBridge::getAllDictionaryContentsByDictionaryId(1, 2, 2);
        $this->assertTrue(count($records) == 2 + 1);
        $this->assertTrue($records[1]['row'] == 3);
    }

    public function testCanDelete() {
        $result = DictionaryLegacyBridge::canDelete(2, 2);
        $this->assertTrue($result);
    }

    public function testRemoveDictionary() {
        $beforeCount = Dictionary::count();
        DictionaryLegacyBridge::removeDictionary(3);
        $afterCount = Dictionary::count();
        $this->assertTrue($beforeCount - 1 == $afterCount);
    }

    public function testDoUpdate(){
        $dict = Dictionary::find(5);
        $records = $dict->get_records();
        $beforeCount = count($records);
        $posts = array(
            'dictionaryId' => 5,
            'valueToSave' => array(
                0 => array('ja', 'en', 'zh'),
                $records[0]->id => $records[0]->get_contents(),
                $records[1]->id => $records[1]->get_contents()
            )
        );
        $posts['valueToSave'][$records[1]->id]['ja'] = 'testUpdate';
        DictionaryLegacyBridge::doUpdate($posts);


        $dict = Dictionary::find(5);
        $records = $dict->get_records();
        $afterCount = count($records);
        $updatedContents = $records[1]->get_contents();

        $this->assertTrue($beforeCount == $afterCount);
        $this->assertEquals($updatedContents['ja'], $posts['valueToSave'][$records[1]->id]['ja']);
        $this->assertEquals($updatedContents['en'], $posts['valueToSave'][$records[1]->id]['en']);
        $this->assertEquals($updatedContents['zh'], $posts['valueToSave'][$records[1]->id]['zh']);
    }
}
