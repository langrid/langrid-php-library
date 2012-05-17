<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:42
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class ParallelTextTest extends PHPUnit_Framework_TestCase
{

    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testFind(){
        $dict = ParallelText::find(1);
        $this->assertEquals('test_dict', $dict->name);
    }

    public function testFind2(){
        $dict = ParallelText::find_by_name('test_dict');
        $this->assertEquals('test_dict', $dict->name);
    }

    public function testFind3(){
        $dict = ParallelText::first(array('conditions'=> "name like 'sample%'"));
        $this->assertEquals('sample_dict', $dict->name);
    }

    public function testFindWithDeleted() {
        $dict = ParallelText::last_with_deleted();
        $this->assertTrue($dict->delete_flag == 1);
    }

    public function testAll(){
        $dicts = ParallelText::all();
        $this->assertTrue(count($dicts) > 0);
    }

    public function testAllWithDeleted(){
        $dictsWithDeleted = ParallelText::all_with_deleted();
        $dicts = ParallelText::all();
        $this->assertTrue(count($dictsWithDeleted) > count($dicts));
    }

    public function testCreate(){
        $dict = ParallelText::create(array('name' => 'created by unittest', 'licenser' => 'created by unittest'));
        $readDict = ParallelText::find($dict->id);

        $this->assertEquals($dict->name, $readDict->name);
        $this->assertEquals($dict->licenser, $readDict->licenser);
    }

    public function testUpdate1(){
        $name = 'changed name1';
        $dict = ParallelText::create(array('name' => 'created by testUpdate', 'licenser' => 'created by testUpdate license'));
        $dict->update_attributes(array('name' => $name));
        $readDict = ParallelText::find($dict->id);
        $this->assertEquals($readDict->name, $name);
    }

    public function testUpdate2(){
        $name = 'changed name2';
        $dict = ParallelText::create(array('name' => 'created by testUpdate', 'licenser' => 'created by testUpdate license'));
        $dict->update_attribute('name', $name);
        $readDict = ParallelText::find($dict->id);
        $this->assertEquals($readDict->name, $name);
    }

    public function testUpdate3(){
        $name = 'changed name3';
        $dict = ParallelText::create(array('name' => 'created by testUpdate', 'licenser' => 'created by testUpdate license'));
        $dict->name = $name;
        $dict->save();
        $readDict = ParallelText::find($dict->id);
        $this->assertEquals($readDict->name, $name);
    }

    public function testFindInclude(){
        $dict = ParallelText::first(array(
            'include' => 'parallel_text_records'
        ));
        $this->assertTrue(count($dict->parallel_text_records) == 5);
    }

    public function testRemove() {
        $dict = ParallelText::find(3);
        $dict->remove();

        $dict = ParallelText::find(3);
        $this->assertTrue($dict->delete_flag == 1);
    }

    public function testAll_without_delete_flag_on() {
        $beforeCount = ParallelText::count();
        $dict = ParallelText::find(3);
        $dict->remove();
        $afterCount = ParallelText::count();
        $this->assertTrue($beforeCount - 1 == $afterCount);
    }

    public function testRemoveForce() {
        $dict = ParallelText::find(3);
        $dict->remove(true);
        try {
            $dict = ParallelText::find(3);
            $this->assertTrue(false, 'didn\'t occuer Exception.');
        } catch(\ActiveRecord\ActiveRecordException $e) {
            $this->assertTrue(true);
        }
    }

    public function testRemoveForceCountAll() {
        $beforeCount = ParallelText::count();
        $dict = ParallelText::find(4);
        $dict->remove(true);
        $afterCount = ParallelText::count();
        $this->assertTrue($beforeCount - 1 == $afterCount);
    }

    public function testAdd_language(){
        $dict = ParallelText::find(1);
        $dict->add_language(Language::get('zh'));

        $readDict = ParallelText::find(1);
        $this->assertTrue(count($readDict->get_languages()) == 3);
        $this->assertTrue(in_array('zh', $readDict->get_languages()));
    }

    public function testAdd_language_validate_unique(){
        $dict = ParallelText::find(1);
        try {
            $dict->add_language(Language::get('en'));
            $this->assertTrue(false, 'failure validate unique');
        } catch(MLSException $e) {
            $this->assertTrue(true);
        }
    }

    public function testGet_languages(){
        $dict = ParallelText::find(1);
        $this->assertTrue(count($dict->get_languages()) == 2);
        $this->assertTrue(in_array('ja', $dict->get_languages()));
        $this->assertTrue(in_array('en', $dict->get_languages()));
    }

    public function testRmove_language() {
        $dict = ParallelText::find(5);
        $beforeCount = count($dict->get_languages(array('joins' => 'parallel_text_records')));
        $beforeContentsCount = count(ParallelTextContent::find_all_by_resource_id(5));

        $dict->remove_language(Language::get('ja'));
        $afterCount = count($dict->get_languages());
        $afterContentsCount = count(ParallelTextContent::find_all_by_resource_id(5));

        $this->assertTrue($beforeCount - 1 == $afterCount);
        $this->assertTrue($beforeContentsCount == $afterContentsCount);
    }

    public function testUpdate_language_validate_minimum(){
        $dict = ParallelText::find(1);
        try{
            $dict->update_languages(array('ja'));
            $this->assertTrue(false, 'failure validate minimum');
        } catch(MLSException $mlse) {
            $this->assertTrue(true);
        }
    }

    public function testUpdate_language(){
        $dict = ParallelText::find(7);
        $beforeContentCount = count(ParallelTextContent::find_all_by_resource_id(7));
        $dict->update_languages(array('ja', 'en', 'vi'));
        $langs = $dict->get_languages();
        $afterContentCount = count(ParallelTextContent::find_all_by_resource_id(7));

        $this->assertTrue(count($langs) == 3);
        $this->assertTrue(in_array('ja', $langs));
        $this->assertTrue(in_array('en', $langs));
        $this->assertTrue(in_array('vi', $langs));
        $this->assertTrue($beforeContentCount == $afterContentCount);
    }

    public function testUpdate_language_force(){
        $dict = ParallelText::find(8);
    }

    public function testRemove_language_force() {
        $dict = ParallelText::find(6);
        $beforeCount = count($dict->get_languages(array('joins' => 'parallel_text_records')));
        $beforeContentsCount = count(ParallelTextContent::find_all_by_resource_id(6));

        $dict->remove_language(Language::get('ja'), true);
        $afterCount = count($dict->get_languages());
        $afterContentsCount = count(ParallelTextContent::find_all_by_resource_id(6));

        $this->assertTrue($beforeCount - 1 == $afterCount);
        $this->assertTrue($beforeContentsCount > $afterContentsCount);
    }

    public function testAdd_record() {
        $dict = ParallelText::find(1);
        $beforCount = $dict->records_count();
        $dict->add_record(array(
            'ja' => 'hoge',
            'en' => 'foo'
        ));
        $afterCount = $dict->records_count();
        $this->assertTrue($beforCount + 1 == $afterCount, 'could not create record');
    }

    public function testIs_deploy() {
        $dict = ParallelText::find(1);
        $this->assertTrue($dict->is_deploy());
    }

    public function testIs_not_deploy() {
        $dict = ParallelText::find(2);
        $this->assertFalse($dict->is_deploy());
    }

    public function testDeploy() {
        $dict = ParallelText::find(2);
        $dict->deploy();
        $dict = ParallelText::find(2);
        $this->assertTrue($dict->is_deploy());
    }

    public function testUndeploy() {
        $dict = ParallelText::find(1);
        $dict->undeploy();
        $this->assertFalse($dict->is_deploy());

    }

    public function testCount_records_each_language(){
        $dict = ParallelText::find(2);
        $result = $dict->count_records_each_language();
        $this->assertTrue($result['ja'] == 5);
        $this->assertTrue($result['en'] == 4);
        $this->assertTrue($result['ko'] == 3);
    }

    public function testCount_records_by_language(){
        $dict = ParallelText::find(1);
        $this->assertTrue($dict->count_records_by_language(Language::get("en")) == 5);
    }

    public function testRecords_count(){
        $dict = ParallelText::find(1);
        $this->assertTrue($dict->records_count() == 5);
    }

    public function testGet_records() {
        $dict = $dict = ParallelText::find(2);
        $records = $dict->get_records(array('offset' => 2, 'limit' => 2, 'order' => 'id desc'));
        $this->assertTrue(count($records) == 2);
        $this->assertTrue($records[0]->id == '8');
        $this->assertTrue($records[1]->id == '7');
    }

    public function testCan_view_any () {
        $dict = $dict = ParallelText::find(1);
        $this->assertTrue($dict->can_view(1));
        $this->assertTrue($dict->can_view(2));
        $this->assertTrue($dict->can_view());
    }

    public function testCan_view_only_user () {
        $dict = $dict = ParallelText::find(2);
        $this->assertFalse($dict->can_view(1));
        $this->assertTrue($dict->can_view(2));
    }

    public function testCan_edit_any () {
        $dict = $dict = ParallelText::find(1);
        $this->assertTrue($dict->can_edit(1));
        $this->assertTrue($dict->can_edit(2));
        $this->assertTrue($dict->can_edit());
    }

    public function testCan_edit_only_user () {
        $dict = $dict = ParallelText::find(2);
        $this->assertFalse($dict->can_edit(1));
        $this->assertTrue($dict->can_edit(2));
    }

    public function testIs_owner () {
        $dict = $dict = ParallelText::find(1);
        $this->assertTrue($dict->is_owner(1));
        $this->assertFalse($dict->is_owner(2));
    }

    public function testCreate_with_records(){
        $dict = ParallelText::create_with_records(array(
            'name' => 'TestParallelText',
            'licenser' => 'TestParallelTextLicenser',
            'languages' => array('ja', 'en', 'zh'),
            'records' => array(
                array('hoge-ja', 'hoge-en', 'hoge-zh'),
                array('foo-ja', 'foo-en', 'foo-zh'),
                array('bar-ja', null, 'bar-zh'),
                array('baz-ja', 'baz-en', null)
            )
        ));

        $this->assertTrue($dict instanceof ParallelText, 'could not create ParallelText');
        $this->assertTrue(count($dict->get_languages()) == 3, 'could not create languages');
        $this->assertTrue($dict->records_count() == 4, 'could not create records');
    }

    public function testTransation_create_with_records_language() {
        $before_count = ParallelText::count();
        try {
            $dict = ParallelText::create_with_records(array(
                'name' => 'TestParallelText',
                'licenser' => 'TestParallelTextLicenser',
                'languages' => array('ja'),
                'records' => array(
                    array('hoge-ja', 'hoge-en', 'hoge-zh'),
                    array('foo-ja', 'foo-en', 'foo-zh'),
                    array('bar-ja', null, 'bar-zh'),
                    array('baz-ja', 'baz-en', null)
                )
            ));

            $this->assertTrue(false, 'failure transaction');
        } catch(MLSException $mlse) {
            $after_count = ParallelText::count();
            $this->assertTrue($before_count == $after_count, 'parallel_text create transation error');
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected Exception occured');
        }
    }

    public function testTransation_create_with_records_unidentified_language() {
        $before_count = ParallelText::count();
        try {
            $dict = ParallelText::create_with_records(array(
                'name' => 'TestParallelText',
                'licenser' => 'TestParallelTextLicenser',
                'languages' => array('ja', 'hoge'),
                'records' => array(
                    array('hoge-ja', 'hoge-en', 'hoge-zh'),
                    array('foo-ja', 'foo-en', 'foo-zh'),
                    array('bar-ja', null, 'bar-zh'),
                    array('baz-ja', 'baz-en', null)
                )
            ));

            $this->assertTrue(false, 'failure transaction');
        } catch(Exception $e) {
            $after_count = ParallelText::count();
            $this->assertTrue($before_count == $after_count, 'parallel_text create transation error');
        }
    }


    public function testTransation_create_with_records_count_record() {
        $before_count = ParallelText::count();
        try {
            $dict = ParallelText::create_with_records(array(
                'name' => 'TestParallelText',
                'licenser' => 'TestParallelTextLicenser',
                'languages' => array('ja', 'en'),
                'records' => array(
                    array('hoge-ja', 'hoge-en', 'hoge-zh'),
                    array('foo-ja', 'foo-en', 'foo-zh'),
                    array('bar-ja', null),
                    array('baz-ja', 'baz-en', null)
                )
            ));

            $this->assertTrue(false, 'failure transaction');
        } catch(MLSException $mlse) {
            $after_count = ParallelText::count();
            $this->assertTrue($before_count == $after_count, 'parallel_text create transation error');
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected Exception occured: '.$e->getMessage());
        }
    }
}
