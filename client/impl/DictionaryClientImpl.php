<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../DictionaryClient.interface.php';

class DictionaryClientImpl extends ServiceClientImpl implements DictionaryClient
{
    public function searchLemmaNodes(Language $headLang,
                                     Language $lemmaLang,
                                     String $headword,
                                     String $reading,
                                     PartOfSpeech $partOfSpeech,
                                     DictMatchingMethod $matchingMethod)
    {
        return $this->invoke(__FUNCTION__, array(
            'headLang' => $headLang,
            'lemmaLang' => $lemmaLang,
            'headWord' => $headWord,
            'reading' => $reading,
            'partOfSpeech' => $partOfSpeech,
            'matchingMethod' => $matchingMethod
        ));
    }

    public function getLemma(String $lemmaId)
    {
        return $this->invoke(__FUNCTION__, array(
            'lemmaId' => $lemmaId
        ));
    }

    public function getConcept(String $conceptId)
    {
        return $this->invoke(__FUNCTION__, array(
            'conceptId' => $conceptId
        ));
    }
}
