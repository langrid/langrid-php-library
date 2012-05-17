<?php
/**
 * Author: Tetsuro Higuchi
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class DictionaryContentTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testHoge(){
        $contents = DictionaryContent::all();
        $this->assertTrue(true);
    }

    public function testValidatePresenseDictionaryRecordId(){
        $content = new DictionaryContent(array('text' => 'testword', 'language' => 'ja'));
        $this->assertTrue($content->is_invalid(), 'failure ValidatePresenseLanguage: dictionary_record_id');
    }

    public function testValidatePresenseLanguage(){
        $content = new DictionaryContent(array('dictionary_record_id' => 1, 'text' => 'testword'));
        $this->assertTrue($content->is_invalid(), 'failure ValidatePresenseLanguage: language');
    }

    public function testValidatePresenseText(){
        $content = new DictionaryContent(array('dictionary_record_id' => "", 'language' => 'ja'));
        $this->assertTrue($content->is_invalid(), 'failure ValidatePresenseLanguage: text');
    }

    public function testValidateUniqueLanguage(){
        $content = DictionaryContent::find(1);
        $newContent = DictionaryContent::create(array(
            'dictionary_record_id' => $content->dictionary_record_id,
            'language' => $content->language,
            'text' => 'test'
        ));
        $this->assertTrue($newContent->is_invalid(), 'failure ValidatePresenseLanguage');
    }

    public function testUpdateWithAttribute(){
        $content = DictionaryContent::find(2);
        $content->update_attribute('text','updated');
        $readContent = DictionaryContent::find(2);
        $this->assertEquals($readContent->text, 'updated');
    }

    public function testUpdateWithAttributes(){
        $content = DictionaryContent::find(2);
        $content->update_attributes(array('text' =>'changed'));
        $readContent = DictionaryContent::find(2);
        $this->assertEquals($readContent->text, 'changed');
    }

    public function testUpdateWithSave(){
        $content = DictionaryContent::find(3);
        $content->text = 'modified';
        $content->save();
        $readContent = DictionaryContent::find(3);
        $this->assertEquals($readContent->text, 'modified');
    }

    public function testFind_all_by_dictionary_id() {
        $contents = DictionaryContent::find_all_by_resource_id(1);
        $this->assertTrue(count($contents) == 10);
    }

    public function testDelete_all_by_resource_id_and_language() {
        $beforeCount = count(DictionaryContent::find_all_by_resource_id(5));
        DictionaryContent::delete_all_by_resource_id_and_language(5, Language::get('ja'));
        $afterCount = count(DictionaryContent::find_all_by_resource_id(5));
        $this->assertTrue($beforeCount > $afterCount);
        $this->assertTrue($afterCount == 4);
    }
}
