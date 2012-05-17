<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/26
 * Time: 10:53
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class DictionaryLanguageTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testValidatePresenseLanguage(){
        $language = DictionaryLanguage::create(array('dictionary_id' => 2));
        $this->assertTrue($language->is_invalid(), 'failure ValidatePresenseLanguage');
    }

    public function testValidateUniqueLanguage(){
        $language = DictionaryLanguage::find(1);
        $newLanguage = DictionaryLanguage::create(array(
            'dictionary_id' => $language->dictionary_id,
            'language' => $language->language
        ));
        $this->assertTrue($newLanguage->is_invalid(), 'failure ValidateUniqueLanguage');
    }
}
