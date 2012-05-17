<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/27
 * Time: 11:36
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class DictionaryDeploymentTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testValidatePresenseDictionaryId(){
        $deployment = DictionaryDeployment::create(array('created_by' => '00001'));
        $this->assertTrue($deployment->is_invalid(), 'failure ValidatePresenseDictionaryId');
    }

    public function testValidateUniqueDictionaryId(){

        DictionaryDeployment::create(array('dictionary_id' => 1, 'created_by' => '00001'));

        $deployment = DictionaryDeployment::create(array('dictionary_id' => 1, 'created_by' => '00001'));

        $this->assertTrue($deployment->is_invalid(), 'failure ValidateUniqueDictionaryId');
    }
}
