<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class ParallelTextRecordTest extends PHPUnit_Framework_TestCase
{

    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testValidatePresenseParallelTextId(){
        $record = ParallelTextRecord::create(array());
        $this->assertTrue($record->is_invalid(), 'failure validate presense: parallel_text_id');
    }

    public function testGetContents(){
        $records = ParallelTextRecord::find(1);
        $contents = $records->get_contents();
        $this->assertEquals($contents['ja'], 'こんにちは');
        $this->assertEquals($contents['en'], 'hello');
    }

    public function testCountByParallelTextIdEachLanguages(){
        $result = ParallelTextRecord::count_by_resource_id_each_languages(2);
        $this->assertTrue($result['ja'] == 5);
        $this->assertTrue($result['en'] == 4);
        $this->assertTrue($result['ko'] == 3);
    }

    public function testGetContentsWithProperty(){
        $records = ParallelTextRecord::find(1);
        $contents = $records->get_contents(true);
        $this->assertEquals($contents['ja']['text'], 'こんにちは');
        $this->assertEquals($contents['en']['text'], 'hello');
    }

    public function testCountByParallelTextIdAndLanguage(){
        $count = ParallelTextRecord::count_by_resource_id_and_language(1, Language::get("en"));
        $this->assertTrue($count == 5);
    }

    public function testGetContentsAsOrderedArray1(){
        $record = ParallelTextRecord::find(1);
        $result = $record->get_contents_as_ordered_array(array('ja', 'en'));
        $this->assertEquals($result[0], 'こんにちは');
        $this->assertEquals($result[1], 'hello');
    }

    public function testGetContentsAsOrderedArray2(){
        $record = ParallelTextRecord::find(1);
        $result = $record->get_contents_as_ordered_array(array('en', 'ja', 'zh'));
        $this->assertEquals($result[0], 'hello');
        $this->assertEquals($result[1], 'こんにちは');
        $this->assertEquals($result[2], '');
    }

    public function testUpdateContentsBasic() {
        $record = ParallelTextRecord::find(2);
        $record->update_contents(array(
            'ja' => '午前'
        ));

        $readRecord = ParallelTextRecord::find(2);
        $contents = $readRecord->get_contents();
        $this->assertEquals('午前', $contents['ja']);
    }

    public function testUpdateContentsAppend() {
        $record = ParallelTextRecord::find(6);
        $record->update_contents(array(
            'ja' => 'foo',
            'ko' => 'bar'
        ));

        $readRecord = ParallelTextRecord::find(6);
        $contents = $readRecord->get_contents();
        $this->assertEquals('foo', $contents['ja']);
        $this->assertEquals('bar', $contents['ko']);
    }

    public function testUpdateContentsBasicWithUser() {
        $record = ParallelTextRecord::find(2);
        $userId = '000001';
        $record->update_contents(array(
            'ja' => '午前'
        ), $userId);

        $readRecord = ParallelTextRecord::find(2);
        $contents = $readRecord->get_contents(true);
        $this->assertEquals($userId, $contents['ja']['updated_by']);
    }

    public function testUpdateContentsAppendWithUser() {
        $record = ParallelTextRecord::find(6);
        $userId = '000002';
        $record->update_contents(array(
            'ko' => 'foobar'
        ), $userId);

        $readRecord = ParallelTextRecord::find(6);
        $contents = $readRecord->get_contents(true);
        $this->assertEquals($userId, $contents['ko']['created_by']);
        $this->assertEquals($userId, $contents['ko']['updated_by']);
    }

    public function testCreateError(){
        try {
            ParallelTextRecord::create_record(null, array());
            $this->assertTrue(false, 'validate exception did not occured');
        } catch(MLSException $mlse) {
            $this->assertTrue(true);
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected exception occured'.$e->getMessage());
        }
    }

    public function testCascadeDelete() {
        $beforeCount = ParallelTextContent::count();
        $record = ParallelTextRecord::find(19);
        $record->delete();
        $afterCount = ParallelTextContent::count();
        $this->assertTrue($beforeCount - 3 == $afterCount);
    }
}

