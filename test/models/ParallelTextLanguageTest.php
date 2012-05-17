<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 15:46
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class ParallelTextLanguageTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testValidatePresenseLanguage(){
        $language =  ParallelTextLanguage::create(array('parallel_text_id' => 2));
        $this->assertTrue($language->is_invalid(), 'failure ValidatePresenseLanguage');
    }

//    public function testValidateUniqueLanguage(){
//        $language = ParallelTextLanguage::find(1);
//        $newLanguage = ParallelTextLanguage::create(array(
//            'parallel_text_id' => $language->parallel_text_id,
//            'language' => $language->language
//        ));
//        $this->assertTrue($newLanguage->is_invalid(), 'failure ValidateUniqueLanguage');
//    }

}
