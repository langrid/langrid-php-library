<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 16:38
 * To change this template use File | Settings | File Templates.
 */
class ParallelTextDeployment extends DictionaryDeployment
{
    static $validates_presence_of = array(
        array('parallel_text_id')
    );

    static $validates_uniqueness_of = array(
        array('parallel_text_id')
    );

    static $belongs_to = array(
        array('parallel_text')
    );
}
