<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:03
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class ParallelTextContentTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testHoge(){
        $contents = ParallelTextContent::all();
        $this->assertTrue(true);
    }

    public function testValidatePresenseParallelTextRecordId(){
        $content = new ParallelTextContent(array('text' => 'testword', 'language' => 'ja'));
        $this->assertTrue($content->is_invalid(), 'failure ValidatePresenseLanguage: parallel_text_record_id');
    }

    public function testValidatePresenseLanguage(){
        $content = new ParallelTextContent(array('parallel_text_record_id' => 1, 'text' => 'testword'));
        $this->assertTrue($content->is_invalid(), 'failure ValidatePresenseLanguage: language');
    }

    public function testValidatePresenseText(){
        $content = new ParallelTextContent(array('parallel_text_record_id' => "", 'language' => 'ja'));
        $this->assertTrue($content->is_invalid(), 'failure ValidatePresenseLanguage: text');
    }

    public function testValidateUniqueLanguage(){
        $content = ParallelTextContent::find(1);
        $newContent = ParallelTextContent::create(array(
            'parallel_text_record_id' => $content->parallel_text_record_id,
            'language' => $content->language,
            'text' => 'test'
        ));
        $this->assertTrue($newContent->is_invalid(), 'failure ValidatePresenseLanguage');
    }

    public function testUpdateWithAttribute(){
        $content = ParallelTextContent::find(2);
        $content->update_attribute('text','updated');
        $readContent = ParallelTextContent::find(2);
        $this->assertEquals($readContent->text, 'updated');
    }

    public function testUpdateWithAttributes(){
        $content = ParallelTextContent::find(2);
        $content->update_attributes(array('text' =>'changed'));
        $readContent = ParallelTextContent::find(2);
        $this->assertEquals($readContent->text, 'changed');
    }

    public function testUpdateWithSave(){
        $content = ParallelTextContent::find(3);
        $content->text = 'modified';
        $content->save();
        $readContent = ParallelTextContent::find(3);
        $this->assertEquals($readContent->text, 'modified');
    }

    public function testFindAllByResourceId() {
        $contents = ParallelTextContent::find_all_by_resource_id(1);
        $this->assertTrue(count($contents) == 10);
    }

    public function testDeleteAllByResourceIdAndLanguage() {
        $beforeCount = count(ParallelTextContent::find_all_by_resource_id(5));
        ParallelTextContent::delete_all_by_resource_id_and_language(5, Language::get('ja'));
        $afterCount = count(ParallelTextContent::find_all_by_resource_id(5));
        $this->assertTrue($beforeCount > $afterCount);
        $this->assertTrue($afterCount == 4);
    }
}

