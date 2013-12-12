<?php
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
      //'development' => 'mysql://${username}:${passwd}@${hostname}/${db_name}'
      'development' => 'mysql://mlstudio:mlstudio@localhost/mlstudio')
   );
});
