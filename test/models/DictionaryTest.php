<?php
/**
 * Author: Tetsuro Higuchi
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class DictionaryTest extends PHPUnit_Framework_TestCase
{
    private $dictionary;

    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testFind(){
        $dict = Dictionary::find(1);
        $this->assertEquals('test_dict', $dict->name);
    }

    public function testFind2(){
        $dict = Dictionary::find_by_name('test_dict');
        $this->assertEquals('test_dict', $dict->name);
    }

    public function testFind3(){
        $dict = Dictionary::first(array('conditions'=> "name like 'sample%'"));
        $this->assertEquals('sample_dict', $dict->name);
    }

    public function testFindWithDeleted() {
        $dict = Dictionary::last_with_deleted();
        $this->assertTrue($dict->delete_flag == 1);
    }

    public function testAll(){
        $dicts = Dictionary::all();
        $this->assertTrue(count($dicts) > 0);
    }

    public function testAllWithDeleted(){
        $dictsWithDeleted = Dictionary::all_with_deleted();
        $dicts = Dictionary::all();
        $this->assertTrue(count($dictsWithDeleted) > count($dicts));
    }

    public function testCreate(){
        $dict = Dictionary::create(array('name' => 'created by unittest', 'licenser' => 'created by unittest'));
        $readDict = Dictionary::find($dict->id);

        $this->assertEquals($dict->name, $readDict->name);
        $this->assertEquals($dict->licenser, $readDict->licenser);
    }

    public function testUpdate1(){
        $name = 'changed name1';
        $dict = Dictionary::create(array('name' => 'created by testUpdate', 'licenser' => 'created by testUpdate license'));
        $dict->update_attributes(array('name' => $name));
        $readDict = Dictionary::find($dict->id);
        $this->assertEquals($readDict->name, $name);
    }

    public function testUpdate2(){
        $name = 'changed name2';
        $dict = Dictionary::create(array('name' => 'created by testUpdate', 'licenser' => 'created by testUpdate license'));
        $dict->update_attribute('name', $name);
        $readDict = Dictionary::find($dict->id);
        $this->assertEquals($readDict->name, $name);
    }

    public function testUpdate3(){
        $name = 'changed name3';
        $dict = Dictionary::create(array('name' => 'created by testUpdate', 'licenser' => 'created by testUpdate license'));
        $dict->name = $name;
        $dict->save();
        $readDict = Dictionary::find($dict->id);
        $this->assertEquals($readDict->name, $name);
    }

    public function testFindInclude(){
        $dict = Dictionary::first(array(
            'include' => 'dictionary_records'
        ));
        $this->assertTrue(count($dict->dictionary_records) == 5);
    }

    public function testRemove() {
        $dict = Dictionary::find(3);
        $dict->remove();

        $dict = Dictionary::find(3);
        $this->assertTrue($dict->delete_flag == 1);
    }

    public function testAllWithoutDeleteFlagOn() {
        $beforeCount = Dictionary::count();
        $dict = Dictionary::find(3);
        $dict->remove();
        $afterCount = Dictionary::count();
        $this->assertTrue($beforeCount - 1 == $afterCount);
    }

    public function testRemoveForce() {
        $dict = Dictionary::find(3);
        $dict->remove(true);
        try {
            $dict = Dictionary::find(3);
            $this->assertTrue(false, 'didn\'t occuer Exception.');
        } catch(\ActiveRecord\ActiveRecordException $e) {
            $this->assertTrue(true);
        }
    }

    public function testRemoveForceCountAll() {
        $beforeCount = Dictionary::count();
        $dict = Dictionary::find(4);
        $dict->remove(true);
        $afterCount = Dictionary::count();
        $this->assertTrue($beforeCount - 1 == $afterCount);
    }

    public function testAddLanguage(){
        $dict = Dictionary::find(1);
        $dict->add_language(Language::get('zh'));

        $readDict = Dictionary::find(1);
        $this->assertTrue(count($readDict->get_languages()) == 3);
        $this->assertTrue(in_array('zh', $readDict->get_languages()));
    }

    public function testAddLanguageValidateUnique(){
        $dict = Dictionary::find(1);
        try {
            $dict->add_language(Language::get('en'));
            $this->assertTrue(false, 'failure validate unique');
        } catch(MLSException $e) {
            $this->assertTrue(true);
        }
    }

    public function testGetLanguages(){
        $dict = Dictionary::find(1);
        $this->assertTrue(count($dict->get_languages()) == 2);
        $this->assertTrue(in_array('ja', $dict->get_languages()));
        $this->assertTrue(in_array('en', $dict->get_languages()));
    }

    public function testRemoveLanguage() {
        $dict = Dictionary::find(5);
        $beforeCount = count($dict->get_languages(array('joins' => 'dictionary_records')));
        $beforeContentsCount = count(DictionaryContent::find_all_by_resource_id(5));

        $dict->remove_language(Language::get('ja'));
        $afterCount = count($dict->get_languages());
        $afterContentsCount = count(DictionaryContent::find_all_by_resource_id(5));

        $this->assertTrue($beforeCount - 1 == $afterCount);
        $this->assertTrue($beforeContentsCount == $afterContentsCount);
    }

    public function testUpdateLanguageValidateMinimum(){
        $dict = Dictionary::find(1);
        try{
            $dict->update_languages(array('ja'));
            $this->assertTrue(false, 'failure validate minimum');
        } catch(MLSException $mlse) {
            $this->assertTrue(true);
        }
    }

    public function testUpdateLanguage(){
        $dict = Dictionary::find(7);
        $beforeContentCount = count(DictionaryContent::find_all_by_resource_id(7));
        $dict->update_languages(array('ja', 'en', 'vi'));
        $langs = $dict->get_languages();
        $afterContentCount = count(DictionaryContent::find_all_by_resource_id(7));

        $this->assertTrue(count($langs) == 3);
        $this->assertTrue(in_array('ja', $langs));
        $this->assertTrue(in_array('en', $langs));
        $this->assertTrue(in_array('vi', $langs));
        $this->assertTrue($beforeContentCount == $afterContentCount);
    }

    public function testUpdateLanguageForce(){
        $dict = Dictionary::find(8);
    }

    public function testRemoveLanguageForce() {
        $dict = Dictionary::find(6);
        $beforeCount = count($dict->get_languages(array('joins' => 'dictionary_records')));
        $beforeContentsCount = count(DictionaryContent::find_all_by_resource_id(6));

        $dict->remove_language(Language::get('ja'), true);
        $afterCount = count($dict->get_languages());
        $afterContentsCount = count(DictionaryContent::find_all_by_resource_id(6));

        $this->assertTrue($beforeCount - 1 == $afterCount);
        $this->assertTrue($beforeContentsCount > $afterContentsCount);
    }

    public function testAddRecord() {
        $dict = Dictionary::find(1);
        $beforCount = $dict->records_count();
        $dict->add_record(array(
            'ja' => 'hoge',
            'en' => 'foo'
        ));
        $afterCount = $dict->records_count();
        $this->assertTrue($beforCount + 1 == $afterCount, 'could not create record');
    }

    public function testIsDeploy() {
        $dict = Dictionary::find(1);
        $this->assertTrue($dict->is_deploy());
    }

    public function testIsNotDeploy() {
        $dict = Dictionary::find(2);
        $this->assertFalse($dict->is_deploy());
    }

    public function testDeploy() {
        $dict = Dictionary::find(2);
        $dict->deploy();
        $dict = Dictionary::find(2);
        $this->assertTrue($dict->is_deploy());
    }

    public function testUndeploy() {
        $dict = Dictionary::find(1);
        $dict->undeploy();
        $this->assertFalse($dict->is_deploy());

    }

    public function testCountRecordsEachLanguage(){
        $dict = Dictionary::find(2);
        $result = $dict->count_records_each_language();
        $this->assertTrue($result['ja'] == 5);
        $this->assertTrue($result['en'] == 4);
        $this->assertTrue($result['ko'] == 3);
    }

    public function testCountRecordsByLanguage(){
        $dict = Dictionary::find(1);
        $this->assertTrue($dict->count_records_by_language(Language::get("en")) == 5);
    }

    public function testRecordsCount(){
        $dict = Dictionary::find(1);
        $this->assertTrue($dict->records_count() == 5);
    }

    public function testGetRecords() {
        $dict = $dict = Dictionary::find(2);
        $records = $dict->get_records(array('offset' => 2, 'limit' => 2, 'order' => 'id desc'));
        $this->assertTrue(count($records) == 2);
        $this->assertTrue($records[0]->id == '8');
        $this->assertTrue($records[1]->id == '7');
    }

    public function testCanViewAny () {
        $dict = $dict = Dictionary::find(1);
        $this->assertTrue($dict->can_view(1));
        $this->assertTrue($dict->can_view(2));
        $this->assertTrue($dict->can_view());
    }

    public function testCanViewOnlyUser () {
        $dict = $dict = Dictionary::find(2);
        $this->assertFalse($dict->can_view(1));
        $this->assertTrue($dict->can_view(2));
    }

    public function testCanEditAny () {
        $dict = $dict = Dictionary::find(1);
        $this->assertTrue($dict->can_edit(1));
        $this->assertTrue($dict->can_edit(2));
        $this->assertTrue($dict->can_edit());
    }

    public function testCanEditOnlyUser () {
        $dict = $dict = Dictionary::find(2);
        $this->assertFalse($dict->can_edit(1));
        $this->assertTrue($dict->can_edit(2));
    }

    public function testIsOwner () {
        $dict = $dict = Dictionary::find(1);
        $this->assertTrue($dict->is_owner(1));
        $this->assertFalse($dict->is_owner(2));
    }

    public function testCreateWithRecords(){
        $dict = Dictionary::create_with_records(array(
            'name' => 'TestDictionary',
            'licenser' => 'TestDictionaryLicenser',
            'languages' => array('ja', 'en', 'zh'),
            'records' => array(
                array('hoge-ja', 'hoge-en', 'hoge-zh'),
                array('foo-ja', 'foo-en', 'foo-zh'),
                array('bar-ja', null, 'bar-zh'),
                array('baz-ja', 'baz-en', null)
            )
        ));

        $this->assertTrue($dict instanceof Dictionary, 'could not create Dictionary');
        $this->assertTrue(count($dict->get_languages()) == 3, 'could not create languages');
        $this->assertTrue($dict->records_count() == 4, 'could not create records');
    }

    public function testTransationCreateWithRecordsLanguage() {
        $before_count = Dictionary::count();
        try {
            $dict = Dictionary::create_with_records(array(
                'name' => 'TestDictionary',
                'licenser' => 'TestDictionaryLicenser',
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
            $after_count = Dictionary::count();
            $this->assertTrue($before_count == $after_count, 'dictionary create transation error');
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected Exception occured');
        }
    }

    public function testTransationCreateWithRecordsUnidentifiedLanguage() {
        $before_count = Dictionary::count();
        try {
            $dict = Dictionary::create_with_records(array(
                'name' => 'TestDictionary',
                'licenser' => 'TestDictionaryLicenser',
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
            $after_count = Dictionary::count();
            $this->assertTrue($before_count == $after_count, 'dictionary create transation error');
        }
    }


    public function testTransationCreateWithRecordsCountRecord() {
        $before_count = Dictionary::count();
        try {
            $dict = Dictionary::create_with_records(array(
                'name' => 'TestDictionary',
                'licenser' => 'TestDictionaryLicenser',
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
            $after_count = Dictionary::count();
            $this->assertTrue($before_count == $after_count, 'dictionary create transation error');
        } catch(Exception $e) {
            $this->assertTrue(false, 'unexpected Exception occured: '.$e->getMessage());
        }
    }
}
