<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/27
 * Time: 16:25
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/client/ClientFactory.php';
require_once dirname(__FILE__).'/commons/DocumentFactory.php';
require_once dirname(__FILE__).'/commons/Language.php';
require_once dirname(__FILE__).'/commons/Morpheme.php';
require_once dirname(__FILE__).'/commons/PartOfSpeech.php';
require_once dirname(__FILE__).'/commons/Speech.php';
require_once dirname(__FILE__).'/commons/BoundChoiceParameter.php';
require_once dirname(__FILE__).'/commons/BoundValueParameter.php';
require_once dirname(__FILE__).'/commons/BindingNode.php';
require_once dirname(__FILE__).'/commons/LangridException.php';
require_once dirname(__FILE__).'/commons/MLSException.php';
require_once dirname(__FILE__).'/service/ServiceFactory.php';
require_once dirname(__FILE__).'/lib/php-activerecord/ActiveRecord.php';

// config/service_settings.sample.php is a sample file of settings.
require_once dirname(__FILE__).'/config/service_settings.php';

?>
