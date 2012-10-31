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
require_once 'resource/LanguageResourceManagerTest.php';;
require_once 'resource/KyotoLangridResourceTest.php';

class AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit');

        $suite->addTest(LocalServiceAllTests::suite());
        $suite->addTest(BridgeAllTests::suite());
        $suite->addTestSuite("KyotoLangridResourceTest");
        
        return $suite;
    }
}