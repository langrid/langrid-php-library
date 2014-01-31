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
    //テストで結果をチェックするように 2013/01/23 西村
    public function testParallelTextResource($endpoint, $headLang, $targetLang, $text, $answer, $mat = MatchingMethod::PREFIX)
    {
        $client = ClientFactory::createParallelTextClient($endpoint);
        $result = $client->search(
            Language::get($headLang), 
            Language::get($targetLang),
            $text,
            $mat
        );
        $this->assertEquals($answer,$result[0]->target);//2013/01/12 Nishimura テスト内容の変更のため
    }
    
    /**
     * @dataProvider morphologicalAnalysisWsdlProvider
     */
    //テストで結果をチェックするように 2013/01/28 西村
    public function testMorphologicalAnalysisResource($endpoint, $lang, $text, $answer)
    {
        $client = ClientFactory::createMorphologicalAnalysisClient($endpoint);
        $result = $client->analyze(Language::get($lang), $text);
        $this->assertEquals($answer,$result[0]->word);
    }
    
    /**
     * @dataProvider conceptDictionaryWsdlProvider
     */
    //テストで結果をチェックするように 2013/01/28 西村
    public function testConceptDictionaryResource($endpoint, $lang, $text, $answer, $mat = MatchingMethod::COMPLETE)
    {
        $client = ClientFactory::createConceptDictionaryClient($endpoint);
        $result = $client->searchConcepts(Language::get($lang), $text, $mat);
        $this->assertEquals($answer,$result[0]->glosses[0]->glossText);
    }
    
    /**
     * @dataProvider bilingualDictionaryWsdlProvider
     */
    //テストで結果をチェックするように 2013/01/28 西村
    public function testBilingualDictionaryResource($endpoint, $headLang, $targetLang, $text, $answer ,$mat = MatchingMethod::COMPLETE)
    {
        $client = ClientFactory::createBilingualDictionaryClient($endpoint);
        $result = $client->search(
            Language::get($headLang), 
            Language::get($targetLang),
            $text, 
            $mat
        );
        $this->assertEquals($answer,$result[0]->targetWords[0]);
    }
    
    /**
     * @dataProvider compositeBilingualDictionaryWsdlProvider
     */
    //新規実装 2013/07/02 西村
    public function testCompositeBilingualDictionaryResource($endpoint, $bindingsArray,$headLang, $targetLang, $text, $answer ,$mat = MatchingMethod::COMPLETE)
    {
        $client = ClientFactory::createBilingualDictionaryClient($endpoint);
        foreach ($bindingsArray as $bindingPoint => $atomicService){
          $client->addBindings(new BindingNode($bindingPoint, $atomicService));
		}
        $result = $client->search(
            Language::get($headLang), 
            Language::get($targetLang),
            $text, 
            $mat
        );
        $this->assertEquals($answer,$result[0]->targetWords[0]);
    }
    
    /**
     * @dataProvider bilingualDictionaryWithLongestMatchSearchWsdlProvider
     */
    public function testBilingualDictionaryWithLongestMatchSearchResource($endpoint, $headLang, $targetLang, $morphemesArray, $answer)
    {
        $client = ClientFactory::createBilingualDictionaryWithLongestMatchSearchClient($endpoint);
        $morphemes = array(new Morpheme($morphemesArray[0], $morphemesArray[1], $morphemesArray[2]));
        $result = $client->searchLongestMatchingTerms(
            Language::get($headLang),
            Language::get($targetLang),
            $morphemes
        ); 
        $this->assertEquals($answer,$result[0]->translation->targetWords[0]);
    }
    
    /**
     * @dataProvider compositeBilingualDictionaryWithLongestMatchSearchWsdlProvider
     */
    public function testCompositeBilingualDictionaryWithLongestMatchSearchResource($endpoint, $bindingsArray, $headLang, $targetLang, $morphemesArray, $answer)
    {
        $client = ClientFactory::createBilingualDictionaryWithLongestMatchSearchClient($endpoint);
        foreach ($bindingsArray as $bindingPoint => $atomicService){
          $client->addBindings(new BindingNode($bindingPoint, $atomicService));
		}
        $morphemes = array(new Morpheme($morphemesArray[0], $morphemesArray[1], $morphemesArray[2]));
        $result = $client->searchLongestMatchingTerms(
            Language::get($headLang),
            Language::get($targetLang),
            $morphemes
        ); 
        $this->assertEquals($answer,$result[0]->translation->targetWords[0]);
    }
    
    /**
     * @dataProvider dependencyParserWsdlProvider
     */
    //テストで結果をチェックするように 2013/02/04 西村
    public function testDependencyParserResource($endpoint, $lang, $sentence,$answer)
    {
        $client = ClientFactory::createDependencyParserClient($endpoint);
        $result = $client->parseDependency(Language::get($lang), $sentence); 
        $this->assertEquals($answer,$result[0]->morphemes[0]->lemma);
    }
    
    /**
     * @dataProvider keyphraseExtractionWsdlProvider
     */
    public function testKeyphraseExtractionResource($endpoint, $lang, $text, $answer)
    {
        $client = ClientFactory::createKeyphraseExtractionClient($endpoint);
        $result = $client->extract(Language::get($lang), $text);
        $this->assertEquals($answer,$result[0]->phrase);
    }
    
         // 2013/06/05 Sasaki 
    /**
     * @dataProvider languageIdentificationWsdlProvider
     */
    public function testLanguageIdentificationResource($endpoint, $text, $encoding, $answer)
    {
        $client = ClientFactory::createLanguageIdentificationClient($endpoint);
        $result = $client->identify($text, $encoding);
        $this->assertEquals($answer,$result);
    }
    
    
    //テストで結果をチェックするように 2013/02/04 西村
    /**
     * @dataProvider similarityCalculationWsdlProvider
     */
    public function testSimilarityCalculationResource($endpoint, $lang, $text1, $text2, $answer)
    {
        $client = ClientFactory::createSimilarityCalculationClient($endpoint);
        $result = $client->calculate(Language::get($lang), $text1, $text2);
        $this->assertEquals($answer, $result);
    }
    
    /**
     * @dataProvider speechRecognitionWsdlProvider
     */
     //結果をチェックしていないが，音声ファイルを関数に渡す方法が分からなかったので
     //対応している言語の結果だけをチェックするように
     //2013/02/04西村
    public function testSpeechRecognitionResource($endpoint,$answer)
    {
        $client = ClientFactory::createSpeechRecognitionClient($endpoint);
        $result = $client->getSupportedLanguages();
        $this->assertEquals($answer,$result[0]);
    }
    
    /**
     * @dataProvider templateParallelTextWsdlProvider
     */
    public function testTemplateParallelTextResource($endpoint, $lang, $text, $answer,$categoryNo, $mat = MatchingMethod::PARTIAL)
    {
        $client = ClientFactory::createTemplateParallelTextClient($endpoint);
        $result = $client->searchTemplates(Language::get($lang),$text,$mat,array($categoryNo));
        $this->assertEquals($answer,$result[0]->template);
    }

    //Small adjustments 2013/06/05 Xun
    /**
     * @dataProvider textToSpeechWsdlProvider
     */
    public function testTextToSpeechResource($endpoint, $answer)
    {
        $client = ClientFactory::createTextToSpeechClient($endpoint);
        $result = $client->getSupportedVoiceTypes();
        $this->assertEquals($answer,$result[0]);
    }

    /**
     * @dataProvider translationWsdlProvider
     */
    public function testTranslationResource($endpoint, $sourceLang, $targetLang, $source, $answer)
    {
        $client = ClientFactory::createTranslationClient($endpoint);
        $result = $client->translate(Language::get($sourceLang), Language::get($targetLang), $source);
        $this->assertEquals($answer,$result);
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
    public function testTranslationWithInternalDictionaryResource($endpoint, $sourceLang, $targetLang, $source, $answer)
    {
        $client = ClientFactory::createTranslationWithInternalDictionaryClient($endpoint);
        $result = $client->translate(Language::get($sourceLang), Language::get($targetLang), $source);
        $this->assertEquals($answer,$result);
    }
    
    
    /**
     * @dataProvider pictogramDictionaryWsdlProvider
     */
	//2013/06/05 Xun added    
	public function testPictogramDictionaryResource($endpoint, $lang, $word, $answer, $matchingMethod = MatchingMethod::PREFIX)
    {
        $client = ClientFactory::createPictogramDictionaryClient($endpoint);
        $result = $client->search(
            Language::get($lang),
            $word, 
            $matchingMethod
        );
		$this->assertEquals($answer,$result[0]->imageType);

    }
    
     /**
     * @dataProvider namedEntityTaggingWsdlProvider
     */
	//2013/06/14 Nishimura added    
	public function testNamedEntityTaggingResource($endpoint, $lang, $text, $answer)
    {
        $client = ClientFactory::createNamedEntityTaggingClient($endpoint);
        $result = $client->tag(
            Language::get($lang),
            $text
        );
		$this->assertEquals($answer,$result[0]->entity);

    }
    
         /**
     * @dataProvider textSummarizaionWsdlProvider
     */
	//2013/06/15 Nishimura added    
	public function testTextSummarizationResource($endpoint, $lang, $text, $answer)
    {
        $client = ClientFactory::createTextSummarizationClient($endpoint);
        $result = $client->summarize(
            Language::get($lang),
            $text
        );
		$this->assertEquals($answer,$result);

    }
    
    
     /**
     * @dataProvider morphemesDependencyParserWsdlProvider
     */
    //テストで結果をチェックするように 2013/02/04 西村
    public function testMorphemesDependencyParserResource($endpoint, $lang, $morphemesArray,$answer)
    {
        $client = ClientFactory::createMorphemesDependencyParserClient($endpoint);
        $morphemes = array(new Morpheme($morphemesArray[0], $morphemesArray[1], $morphemesArray[2]));
        $result = $client->parseDependency(Language::get($lang), $morphemes); 
        $this->assertEquals($answer,$result[0]->morphemes[0]->lemma);
    }
    
    /**
     * @dataProvider compositeTranslationWsdlProvider
     */
    //複合サービスのTranslation用のテストコード 2013/06/17 西村
    public function testCompositeTranslationResource($endpoint, $bindingsArray,$sourceLang, $targetLang, $source, $answer)
    {
        $client = ClientFactory::createTranslationClient($endpoint);
        foreach ($bindingsArray as $bindingPoint => $atomicService){
          $client->addBindings(new BindingNode($bindingPoint, $atomicService));
		}
        $result = $client->translate(Language::get($sourceLang), Language::get($targetLang), $source);
        $this->assertEquals($answer,$result);
    }
	
	//2013/06/22 Xun Added
	/**
     * @dataProvider qualityEstimationWsdlProvider
     */
	public function testQualityEstimationResource($endpoint, $bindingsArray, $sourceLang, $targetLang, $source, $target , $answer)
    {
        $client = ClientFactory::createQualityEstimationClient($endpoint);
        foreach ($bindingsArray as $bindingPoint => $atomicService){
          $client->addBindings(new BindingNode($bindingPoint, $atomicService));
		}
        $result = $client->estimate(Language::get($sourceLang), Language::get($targetLang), $source, $target);
        $this->assertEquals($answer,$result);
    }
	
	//2013/06/24 Xun Added	 	
	/**
     * @dataProvider backTranslationWsdlProvider
     */
    public function testBackTranslationResource($endpoint, $source, $intermediate, $text)
    {
            $client = ClientFactory::createBackTranslationClient($endpoint);
            $client->addBindings(new BindingNode("BackwardTranslationPL","KyotoUJServer"));
            $client->addBindings(new BindingNode("ForwardTranslationPL","KyotoUJServer"));
            $result = $client->backTranslate(Language::get($source), Language::get($intermediate), $text);
            $this->assertEquals($text,$result->target);
    }
	
	//2013/06/24 Xun Added
	/**
     * @dataProvider translationSelectionWsdlProvider
     */
	public function testTranslationSelectionResource($endpoint, $bindingsArray, $sourceLang, $targetLang, $source, $answer)
    {
        $client = ClientFactory::createTranslationSelectionClient($endpoint);
        foreach ($bindingsArray as $bindingPoint => $atomicService){
          $client->addBindings(new BindingNode($bindingPoint, $atomicService));
		}
        $result = $client->select(Language::get($sourceLang), Language::get($targetLang), $source);
        $this->assertEquals($answer,$result);
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
    
    public function compositeTranslationWsdlProvider()
    {
        return $this->getEndpointUrl("CompositeTranslation");
    }
    
    
    public function morphemesDependencyParserWsdlProvider()
    {
        return $this->getEndpointUrl("MorphemesDependencyParser");
    }
    
        public function textSummarizaionWsdlProvider()
    {
        return $this->getEndpointUrl("TextSummarization");
    }
    
        public function namedEntityTaggingWsdlProvider()
    {
        return $this->getEndpointUrl("NamedEntityTagging");
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
    
    public function compositeBilingualDictionaryWsdlProvider()
    {
        return $this->getEndpointUrl("CompositeBilingualDictionary");
    }
    
    public function bilingualDictionaryWithLongestMatchSearchWsdlProvider()
    {
        return $this->getEndpointUrl("BilingualDictionaryWithLongestMatchSearch");
    }
    
    public function compositeBilingualDictionaryWithLongestMatchSearchWsdlProvider()
    {
        return $this->getEndpointUrl("CompositeBilingualDictionaryWithLongestMatchSearch");
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
    
    public function qualityEstimationWsdlProvider()
    {
        return $this->getEndpointUrl("QualityEstimation");
    }
	
	public function backTranslationWsdlProvider()
    {
        return $this->getEndpointUrl("BackTranslation");
    }
}
