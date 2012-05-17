<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/02
 * Time: 15:44
 * To change this template use File | Settings | File Templates.
 */
class ParallelTextLanguage extends DictionaryLanguage
{
//    static $belongs_to = array(
//        array('parallel_text')
//    );

    static $validates_presence_of = array(
        array('language')
    );
}
