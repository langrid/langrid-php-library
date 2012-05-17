<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/07
 * Time: 15:53
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/AbstractService.php';

class BilingualDictionaryService
{
    private $client;

    function __construct()
    {
        $endPointUrl = ServiceUrlResolver::resolveDefaultByServiceType('BilingualDictionary');
        $this->client = ClientFactory::createBilingualDictionaryClient($endPointUrl);
    }

    function search($params = array()){
        return $this->client->search(
            Language::get(@$params['headLang']),
            Language::get(@$params['targetLang']),
            @$params['headWord'],
            MatchingMethod::valueOf('matchingMethod')
        );
    }

    public function getSupportedLanguagePairs()
    {
        return $this->client->getSupportedLanguagePairs();
    }

    public function getSupportedMatchingMethods()
    {
        return $this->client->getSupportedMatchingMethods();
    }

    public function getLastUpdate()
    {
        return $this->client->getLastUpdate();
    }

}
