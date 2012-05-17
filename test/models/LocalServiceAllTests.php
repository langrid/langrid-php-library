<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/26
 * Time: 14:11
 * To change this template use File | Settings | File Templates.
 */
foreach (glob(dirname(__FILE__).'/*Test.php') as $file)
{
    require_once $file;
}

class LocalServiceAllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit LocalService');

        foreach (glob(dirname(__FILE__).'/*Test.php') as $file)
        {
            $suite->addTestSuite(basename($file, '.php'));
        }

        return $suite;
    }
}