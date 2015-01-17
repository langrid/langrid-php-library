<?php

require_once dirname(__FILE__).'/../MultilingualStudio.php';
require_once dirname(__FILE__).'/ServiceConfigurator.php';
require_once dirname(__FILE__).'/TranslationConfigurator.php';
require_once dirname(__FILE__).'/../utils/BindingNodeUtil.php';

class MultihopBackTranslationConfigurator
extends ServiceConfigurator implements TranslationConfigurator {
    public function createClient($from, $to) {
        $cli = ClientFactory::createMultihopBackTranslationClient(
            $this->getServiceUri($from, $to));

        $nodes = BindingNodeUtil::createBindingNode($this->getServiceBinding($from, $to));
        foreach ($nodes as $n) {
            $cli->addBindings($n);
        }

        return $this->setupClient($cli);
    }
}
