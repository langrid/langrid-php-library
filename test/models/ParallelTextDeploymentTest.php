<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:39
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/../test_settings.php';
require_once dirname(__FILE__).'/../DatabaseLoader.php';

class ParallelTextDeploymentTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){
        $this->conn = ActiveRecord\ConnectionManager::get_connection();

        $loader = new DatabaseLoader($this->conn);
        $loader->reset_table_data();
    }

    public function testValidatePresenseParallelTextId(){
        $deployment = ParallelTextDeployment::create(array('created_by' => '00001'));
        $this->assertTrue($deployment->is_invalid(), 'failure ValidatePresenseParallelTextId');
    }

    public function testValidateUniqueParallelTextId(){

        ParallelTextDeployment::create(array('parallel_text_id' => 1, 'created_by' => '00001'));

        $deployment = ParallelTextDeployment::create(array('parallel_text_id' => 1, 'created_by' => '00001'));

        $this->assertTrue($deployment->is_invalid(), 'failure ValidateUniqueParallelTextId');
    }
}
