<?php

require_once 'SOAP/Client.php';
require_once dirname(__FILE__) . "/../test_settings.php";
require_once dirname(__FILE__) . "/./service_list.php";

class KyotoLangridResourceTest extends PHPUnit_Framework_TestCase
{
    
    protected static $gridName = "kyoto"; 
    
    protected function setUp()
    {
        parent::setUp();
    }
    
    /**
     * @dataProvider parallelTextWsdlProvider
     */
    public function testParallelTextResource($endpoint, $headLang, $targetLang, $text, $mat = MatchingMethod::PREFIX)
    {
        $client = ClientFactory::createParallelTextClient($endpoint);
        $result = $client->search(
            Language::get($headLang), 
            Language::get($targetLang),
            $text, 
            $mat
        );
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider morphologicalAnalysisWsdlProvider
     */
    public function testMorphologicalAnalysisResource($endpoint, $lang, $text)
    {
        $client = ClientFactory::createMorphologicalAnalysisClient($endpoint);
        $result = $client->analyze(Language::get($lang), $text);
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider conceptDictionaryWsdlProvider
     */
    public function testConceptDictionaryResource($endpoint, $lang, $text, $mat = MatchingMethod::COMPLETE)
    {
        $client = ClientFactory::createConceptDictionaryClient($endpoint);
        $result = $client->searchConcepts(Language::get($lang), $text, $mat);
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider bilingualDictionaryWsdlProvider
     */
    public function testBilingualDictionaryResource($endpoint, $headLang, $targetLang, $text, $mat = MatchingMethod::PREFIX)
    {
        $client = ClientFactory::createBilingualDictionaryClient($endpoint);
        $result = $client->search(
            Language::get($headLang), 
            Language::get($targetLang),
            $text, 
            $mat
        );
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider bilingualDictionaryWithLongestMatchSearchWsdlProvider
     */
    public function testBilingualDictionaryWithLongestMatchSearchResource($endpoint, $headLang, $targetLang, $morphems = array())
    {
        $client = ClientFactory::createBilingualDictionaryWithLongestMatchSearchClient($endpoint);
        $result = $client->searchLongestMatchingTerms(
            Language::get($headLang),
            Language::get($targetLang),
            $morphems
        ); 
    }
    
    /**
     * @dataProvider dependencyParserWsdlProvider
     */
    public function testDependencyParserResource($endpoint, $lang, $sentence)
    {
        $client = ClientFactory::createDependencyParserClient($endpoint);
        $client->parseDependency(Language::get($lang), $sentence); // TODO よくわからないけどエラー
    }
    
    /**
     * @dataProvider keyphraseExtractionWsdlProvider
     */
    public function testKeyphraseExtractionResource($endpoint)
    {
        $this->markTestIncomplete("未実装");
    }
    
    /**
     * @dataProvider languageIdentificationWsdlProvider
     */
    public function testLanguageIdentificationResource($endpoint, $text, $originalEncoding)
    {
        $client = ClientFactory::createLanguageIdentificationClient($endpoint);
//         $client->identify($text, $originalEncoding);
        $this->markTestIncomplete("未実装");
    }
    
    /**
     * @dataProvider similarityCalculationWsdlProvider
     */
    public function testSimilarityCalculationResource($endpoint, $lang, $text1, $text2)
    {
        $client = ClientFactory::createSimilarityCalculationClient($endpoint);
        $result = $client->calculate(Language::get($lang), $text1, $text2);
        $this->assertEquals(0, $result);
    }
    
    /**
     * @dataProvider speechRecognitionWsdlProvider
     */
    public function testSpeechRecognitionResource($endpoint)
    {
        $client = ClientFactory::createSpeechRecognitionClient($endpoint);
        $result = $client->getSupportedLanguages();
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider templateParallelTextWsdlProvider
     */
    public function testTemplateParallelTextResource($endpoint, $lang)
    {
        $client = ClientFactory::createTemplateParallelTextClient($endpoint);
        $result = $client->listTemplateCategories(Language::get($lang));
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider textToSpeechWsdlProvider
     * TODO speakを使いたい
     */
    public function testTextToSpeechResource($endpoint)
    {
        $client = ClientFactory::createTextToSpeechClient($endpoint);
        $result = $client->getSupportedVoiceTypes();
        $this->assertTrue(is_array($result));
    }

    /**
     * @dataProvider translationWsdlProvider
     */
    public function testTranslationResource($endpoint, $sourceLang, $targetLang, $source)
    {
        $client = ClientFactory::createTranslationClient($endpoint);
        $result = $client->translate(Language::get($sourceLang), Language::get($targetLang), $source);
        $this->assertTrue(is_string($result));
    }
    
    /**
     * @dataProvider adjacencyPairWsdlProvider
     */
    public function testAdjacencyPairResource($endpoint, $category, $lang, $text)
    {
        $client = ClientFactory::createAdjacencyPairClient($endpoint);
        $result = $client->search($category, Language::get($lang), $text);
        $this->assertTrue(is_array($result));
    }
    
    /**
     * @dataProvider translationWithInternalDictionaryWsdlProvider
     */
    public function testTranslationWithInternalDictionaryResource()
    {
        $this->markTestIncomplete("未実装");
        $client = ClientFactory::createTranslationWithTemporalDictionaryClient($endpoint);
    }
    
    /**
     * @dataProvider translationSelectionWsdlProvider
     */
    public function testTranslationSelectionResource()
    {
        $this->markTestIncomplete("未実装: composite service なので後回し");
        $client = ClientFactory::createTranslationSelectionClient($endpoint);
        $result = $client->translate($sourceLang, $targetLang, $source);
    }
    
    /**
     * @dataProvider dictionaryWsdlProvider
     */
    public function testDictionaryResource()
    {
        $client = ClientFactory::createDictionaryClient($endpoint);
        $this->markTestIncomplete("未実装: createDictionaryClientが未実装？");
    }
    
    /**
     * @dataProvider pictogramDictionaryWsdlProvider
     */
    public function testPictogramDictionaryResource($endpoint, $lang, $word, $matchingMethod = MatchingMethod::PREFIX)
    {
        $client = ClientFactory::createPictogramDictionaryClient($endpoint);
        $result = $client->search(
            Language::get($lang),
            $word, 
            $matchingMethod
        );
        $this->assertTrue(is_array($result));
    }
    
    // 
    // DataProvider
    // 
    protected function getEndpointUrl($type)
    {
        if (isset(ServiceList::$service_list[self::$gridName][$type])) {
            return ServiceList::$service_list[self::$gridName][$type];
        } else {
            throw new Exception("undefined index when service resource test");
        }
    }
    
    public function parallelTextWsdlProvider()
    {
        return $this->getEndpointUrl("ParallelText");
    }
    
    public function morphologicalAnalysisWsdlProvider()
    {
        return $this->getEndpointUrl("MorphologicalAnalysis");
    }
    
    public function conceptDictionaryWsdlProvider()
    {
        return $this->getEndpointUrl("ConceptDictionary");
    }
    
    public function bilingualDictionaryWsdlProvider()
    {
        return $this->getEndpointUrl("BilingualDictionary");
    }
    
    public function bilingualDictionaryWithLongestMatchSearchWsdlProvider()
    {
        return $this->getEndpointUrl("BilingualDictionaryWithLongestMatchSearch");
    }
    
    public function dependencyParserWsdlProvider()
    {
        return $this->getEndpointUrl("DependencyParser");
    }
    
    public function keyphraseExtractionWsdlProvider()
    {
        return $this->getEndpointUrl("KeyphraseExtraction");
    }
    
    public function languageIdentificationWsdlProvider()
    {
        return $this->getEndpointUrl("LanguageIdentification");
    }
    
    public function similarityCalculationWsdlProvider()
    {
        return $this->getEndpointUrl("SimilarityCalculation");
    }
    
    public function speechRecognitionWsdlProvider()
    {
        return $this->getEndpointUrl("SpeechRecognition");
    }
    
    public function templateParallelTextWsdlProvider()
    {
        return $this->getEndpointUrl("TemplateParallelText");
    }
    
    public function textToSpeechWsdlProvider()
    {
        return $this->getEndpointUrl("TextToSpeech");
    }
    
    public function translationWsdlProvider()
    {
        return $this->getEndpointUrl("Translation");
    }
    
    public function translationWithInternalDictionaryWsdlProvider() // TODO
    {
        return $this->getEndpointUrl("TranslationWithInternalDictionary");
    }
    
    public function translationSelectionWsdlProvider() // TODO
    {
        return $this->getEndpointUrl("TranslationSelection");
    }
    
    public function adjacencyPairWsdlProvider()
    {
        return $this->getEndpointUrl("AdjacencyPair");
    }
    
    public function dictionaryWsdlProvider()
    {
        return $this->getEndpointUrl("Dictionary");
    }
    
    public function pictogramDictionaryWsdlProvider()
    {
        return $this->getEndpointUrl("PictogramDictionary");
    }
    
}
