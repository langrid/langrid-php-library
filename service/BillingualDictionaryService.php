<?php

require_once('SOAP/Type/dateTime.php');

require_once (dirname(__FILE__) . '/../MultiLanguageStudio.php');
require_once (dirname(__FILE__) . '/../commons/Translation.php');
require_once (dirname(__FILE__) . '/../commons/SOAP/TranslationWithPositionSOAP.php');
require_once (dirname(__FILE__) . '/../commons/SOAP/TranslationSOAP.php');

class BillingualDictionarySOAPServer
{
    private $server;

    public function __construct($dictionaryId)
    {

        require_once('SOAP/Server.php');
        header("Content-type: text/xml; charset=UTF-8");
        error_log("start soap server....");
        $this->server = new SOAP_Server();
        $this->server->addObjectMap(
            new BillingualDictionaryService($dictionaryId)
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


    public function search($headLang, $targetLang, $headWord, $matchingMethod)
    {

        error_log('search dic id=' . $this->dictionaryName);
        error_log('search lang=' . $headLang);
        error_log('search word=' . $headWord);

        $dictionary = Dictionary::find($this->dictionaryName);

        $translations = $dictionary->search($headLang, $targetLang, $headWord, $matchingMethod);

        $soap_translations = array();
        foreach ($translations as $translation) {
            array_push($soap_translations, new SOAP_Value('searchReturn', 'searchReturn', new TranslationSOAP($translation->getHeadWord(), $translation->getTargetWords())));
        }

        $result = new SOAP_Value('searchReturn', 'searchReturn', $soap_translations);

        return $result;
    }

    public function searchLongestMatchingTerms($headLang, $targetLang, $morphemes)
    {
        $matchingMethod = 'prefix';
        $positionArray = array();
        $dictionary = Dictionary::find($this->dictionaryName);

        $this->dump($morphemes);

        for ($i = 0; $i < count($morphemes); $i++) {
            $word = $morphemes[$i]->word;

            $translations = $dictionary->search($headLang, $targetLang, $word, $matchingMethod);
            if ($translations === null || !is_array($translations) || count($translations) == 0) {
                continue;
            }
            usort($translations, array('TranslationSortComparator', 'comparator_object'));


            for ($j = 0; $j < count($translations); $j++) {
                $translation = $translations[$j];

                if (strtolower($word) == strtolower($translation->getHeadWord())) {
                    $positionArray[] = $this->createTranslationWithPosition($translation->getHeadWord(), $translation->getTargetWords(), 1, $i);
                    break;
                }

                $sentence = $word;
                for ($k = $i + 1; $k < count($morphemes); $k++) {
                    $sentence = $sentence . $this->getWordSeparator($headLang) . $morphemes[$k]->word;
                    if (strtolower($sentence) == strtolower($translation->getHeadWord())) {
                        $positionArray[] = $this->createTranslationWithPosition($translation->getHeadWord(), $translation->getTargetWords(), $k - $i + 1, $i);
                        $i = $k;
                        break 2;
                    }
                }
            }
        }


        if (count($positionArray) == 0) {
            return new SOAP_Value('searchLongestMatchingTermsReturn', 'searchLongestMatchingTermsReturn', '');
        }

        $this->dump($positionArray);

        return new SOAP_Value('searchLongestMatchingTermsReturn', 'searchLongestMatchingTermsReturn', $positionArray);

    }

    private function dump($x)
    {
        ob_start();
        var_dump($x);
        $contents = ob_get_contents();
        ob_end_clean();
        error_log($contents);
    }

    private function getWordSeparator($lang)
    {
        $s = ' ';
        switch (strtolower($lang)) {
            case 'ja':
            case 'zh':
                $s = '';
                break;
            default:
                break;
        }
        return $s;
    }

    private function createTranslationWithPosition($headWord, $target, $numberOfMorphemes, $startIndex)
    {
        $translationWithPosition = new TranslationWithPositionSOAP(new TranslationSOAP($headWord, $target), $startIndex, $numberOfMorphemes);
        return new SOAP_Value('TranslationWithPosition', 'TranslationWithPosition', $translationWithPosition);

    }
}

class TranslationSortComparator
{

    function TranslationSortComparator()
    {
    }

    static function comparator_object($a, $b)
    {
        $len0 = strlen($a->headWord);
        $len1 = strlen($b->headWord);

        return $len1 - $len0;
    }
}

class LanguagePair
{
    public $first = '';
    public $second = '';

    public function __construct($firstLang, $secondLang)
    {
        $this->first = $firstLang;
        $this->second = $secondLang;
    }
}
