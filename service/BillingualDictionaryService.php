<?php

require_once('SOAP/Type/dateTime.php');

require_once (dirname(__FILE__) . '/../MultiLanguageStudio.php');
require_once (dirname(__FILE__) . '/../commons/LanguagePair.php');
require_once (dirname(__FILE__) . '/../commons/Translation.php');

class BillingualDictionarySOAPServer
{
    private $server;

    public function __construct($serviceId)
    {

        require_once('SOAP/Server.php');
        header("Content-type: text/xml; charset=UTF-8");
        error_log("start soap server....");
        $this->server = new SOAP_Server();
        $this->server->addObjectMap(
            new BillingualDictionaryService($serviceId)
            , 'http://bilingualdictionary.ws_1_2.wrapper.langrid.nict.go.jp'
        );
        error_log("started");
        error_log(file_get_contents("php://input"));
    }

    public function  service($request)
    {
        return $this->server->service($request);
    }

}

class BillingualDictionaryService
{
    private $dictionaryName;

    public function __construct($dictionaryName)
    {

        $this->dictionaryName = $dictionaryName;


        $this->__dispatch_map = array();
        // search
        $this->__dispatch_map['search'] = array(
            'in' => array(
                'headLang' => 'string'
            , 'targetLang' => 'string'
            , 'headWord' => 'string'
            , 'matchingMethod' => 'string'
            )
        , 'out' => array(
                'searchReturn' => '{urn:BilingualDictionaryService}translationArray')
        );
        $this->__typedef['stringArray'] = array(
            array('item' => 'string')
        );
        $this->__typedef['Translation'] = array(
            'headWord' => 'string'
        , 'targetWords' => '{urn:BilingualDictionaryService}stringArray'
        );
        $this->__typedef['translationArray'] = array(
            array('item' => '{urn:BilingualDictionaryService}Translation')
        );
        // getSupportedMatchingMethod
        $this->__dispatch_map['getSupportedMatchingMethods'] = array(
            'in' => array()
        , 'out' => array(
                'getSupportedMatchingMethodsReturn' => '{urn:BilingualDictionaryService}stringArray')
        );
        // getSupportedLanguagePairs
        $this->__dispatch_map['getSupportedLanguagePairs'] = array(
            'in' => array()
        , 'out' => array(
                'getSupportedLanguagePairsReturn' => '{urn:BilingualDictionaryService}languagePairArray')
        );
        $this->__typedef['LanguagePair'] = array(
            'first' => 'string'
        , 'second' => 'string'
        );
        $this->__typedef['languagePairArray'] = array(
            array('item' => '{urn:BilingualDictionaryService}LanguagePair')
        );
        // getLastUpdate
        $this->__dispatch_map['getLastUpdate'] = array(
            'in' => array()
        , 'out' => array(
                'getLastUpdateReturn' => 'dateTime')
        );
        // searchLongestMatchingTerms
        $this->__dispatch_map['searchLongestMatchingTerms'] = array(
            'in' => array(
                'headLang' => 'string'
            , 'targetLang' => 'string'
            , 'morphemes' => '{urn:BilingualDictionaryService}ArrayOfMorphem'
            )
        , 'out' => array(
                'searchLongestMatchingTermsReturn' => '{urn:BilingualDictionaryService}ArrayOfTranslationWithPosition')
        );
        $this->__typedef['Morphem'] = array(
            'lemma' => 'string'
        , 'partOfSpeech' => 'string'
        , 'word' => 'string'
        );
        $this->__typedef['ArrayOfMorphem'] = array(
            array('item' => '{urn:BilingualDictionaryService}Morphem')
        );
        $this->__typedef['TranslationWithPosition'] = array(
            'numberOfMorphemes' => 'int'
        , 'startIndex' => 'int'
        , 'translation' => '{urn:BilingualDictionaryService}Translation'
        );
        $this->__typedef['ArrayOfTranslationWithPosition'] = array(
            array('item' => '{urn:BilingualDictionaryService}TranslationWithPosition')
        );

    }

    public function getSupportedLanguagePairs()
    {
        error_log("getSupportedLanguagePairs");
        $dictionary = Dictionary::find($this->dictionaryName);
        $languages = $dictionary->get_languages();

        $pairs = array();
        for ($i = 0; $i < count($languages) - 1; $i++) {
            for ($j = $i + 1; $j < count($languages); $j++) {
                $pairs[] = new LanguagePair($languages[$i], $languages[$j]);
            }
        }
        return $pairs;
    }

    public function getSupportedMatchingMethods()
    {
        return Dictionary::getSupportedMatchingMethods();


    }

    public function getLastUpdate()
    {
        error_log("getLastUpdate");
        $date = new SOAP_Type_dateTime(0);
        return $date->toSoap();
    }

    public function searchLongestMatchingTerms($headLang, $targetLang, $morphemes) {
        $dictionary = Dictionary::find($this->dictionaryName);

        // 2012-05-22
        $translations = $dictionary->searchLongestMatchingTerms($headLang, $targetLang, $morphemes);

        $soap_translations = array();
        foreach($translations as $translation){
            array_push($soap_translations, new SOAP_Value('searchReturn', 'searchReturn', $translation));
        }

        $result = new SOAP_Value('searchReturn', 'searchReturn', $soap_translations);

        return $result;
    }

    public function search($headLang, $targetLang, $headWord, $matchingMethod)
    {

        error_log('search dic id=' . $this->dictionaryName);
        error_log('search lang=' . $headLang);
        error_log('search word=' . $headWord);

        $dictionary = Dictionary::find($this->dictionaryName);

        $translations = $dictionary->search($headLang, $targetLang, $headWord, $matchingMethod);

        $soap_translations = array();
        foreach($translations as $translation){
            array_push($soap_translations, new SOAP_Value('searchReturn', 'searchReturn', $translation));
        }

        $result = new SOAP_Value('searchReturn', 'searchReturn', $soap_translations);

        return $result;
    }
    

}

?>
