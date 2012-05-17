<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/03/01
 * Time: 16:35
 * To change this template use File | Settings | File Templates.
 */
foreach (glob(dirname(__FILE__).'/*Test.php') as $file)
{
    require_once $file;
}

class BridgeAllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit Bridge');

        foreach (glob(dirname(__FILE__).'/*Test.php') as $file)
        {
            $suite->addTestSuite(basename($file, '.php'));
        }

        return $suite;
    }

}
