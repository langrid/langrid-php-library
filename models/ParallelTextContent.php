<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:03
 * To change this template use File | Settings | File Templates.
 */
class ParallelTextContent extends DictionaryContent
{
    static $belongs_to = array(
        array('parallel_text_record')
    );

    static $validates_presence_of = array(
        array('parallel_text_record_id'), array('language'), array('text')
    );

}
