<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/27
 * Time: 11:29
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/MLSModel.php';

class DictionaryDeployment extends MLSModel
{
    static $validates_presence_of = array(
        array('dictionary_id')
    );

    static $validates_uniqueness_of = array(
        array('dictionary_id')
    );

    static $belongs_to = array(
        array('dictionary')
    );

}
