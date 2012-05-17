<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/26
 * Time: 14:05
 * To change this template use File | Settings | File Templates.
 */
require_once 'models/LocalServiceAllTests.php';
require_once 'bridge/BridgeAllTests.php';

class AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit');

        $suite->addTest(LocalServiceAllTests::suite());
        $suite->addTest(BridgeAllTests::suite());

        return $suite;
    }
}