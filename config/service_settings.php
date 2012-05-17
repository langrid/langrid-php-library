<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/07
 * Time: 16:38
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/../MultiLanguageStudio.php';
//require_once dirname(__FILE__).'/../lib/php-activerecord/ActiveRecord.php';

// Error Level
error_reporting(E_ALL);

// Default UserId for using Service Grid
ClientFactory::setDefaultUserId('');

// Default Password for using Service Grid
ClientFactory::setDefaultPassword('');


// Default proxy for access to the internet.
ClientFactory::setProxy('','');

// Settings for LocalServices
ActiveRecord\Config::initialize(function($cfg){

   $cfg->set_model_directory(dirname(__FILE__).'/../models');
   $cfg->set_connections(array(
           'development' => 'mysql://mlstudio:mlstudio@localhost/mlstudio')
   );

});
