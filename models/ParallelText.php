<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:30
 * To change this template use File | Settings | File Templates.
 */
class ParallelText extends Dictionary
{
    static $has_many = array(
        array('parallel_text_records'),
        array('parallel_text_languages')
    );

    static $has_one = array(
        array('parallel_text_deployment')
    );

    static $alias_attribute = array('languages' => 'parallel_text_languages', 'deployment' => 'parallel_text_deployment');
}
