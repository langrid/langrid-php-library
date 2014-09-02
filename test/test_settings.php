<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/22
 * Time: 14:33
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../MultilingualStudio.php';

include("variables.php");


// Default UserId for using Service Grid
ClientFactory::setDefaultUserId($userid);

// Default Password for using Service Grid
ClientFactory::setDefaultPassword($passwd);

// Default proxy for access to the internet.
ClientFactory::setProxy($proxyServer,$proxyPort);


define('SERVICE_GRID_BASE_URL', 'http://langrid.org/service_manager/wsdl/');

error_reporting(E_ALL);


ActiveRecord\Config::initialize(function($cfg){
    $cfg->set_model_directory(dirname(__FILE__).'/../models');
    $cfg->set_connections(array(
            'development' => 'mysql://mlstudio:mlstudio@localhost/mlstudio')
    );
});
