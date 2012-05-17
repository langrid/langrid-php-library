<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:22
 * To change this template use File | Settings | File Templates.
 */
class ParallelTextRecord extends DictionaryRecord
{
//    static $belongs_to = array(
//        array('dictionary')
//    );

    static $has_many = array(
        array('parallel_text_contents')
    );

    static $validates_presence_of = array(
        array('parallel_text_id')
    );

    static $alias_attribute = array('contents' => 'parallel_text_contents');

}
