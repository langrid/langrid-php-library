<?php
class ServiceList
{
    public static $service_list = array(
        'kyoto' => array(
            
            // $endpoint, $headLang, $targetLang, $text, $mat(デフォルト MatchingMethod::COMPLETE)
            'ParallelText' => array(
                "kyoto1.langrid:KanagawaPrefectureSchoolEntranceParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KanagawaPrefectureSchoolEntranceParalleltext", 
                    "en", 
                    "ja", 
                    "te", 
                    MatchingMethod::COMPLETE,
                ),
            ), 
                
            'MorphologicalAnalysis' => array(
                "kyoto1.langrid:ChasenService" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ChasenService",
                    "ja",
                    "テストです。",
                ),
                "kyoto1.langrid:Mecab" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Mecab",
                    "ja",
                    "テストです。", 
                ),
                "kyoto1.langrid:ZPosTagger" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ZPosTagger",
                    "en", 
                    "this is test.", 
                ),
            ),
                
            'ConceptDictionary' => array(
//                 "nectec.langrid:asian-wordnet-ja" => array(
//                     "http://alangrid.org/service_manager/wsdl/nectec.langrid:asian-wordnet-ja",
//                     "ja", 
//                     "テスト",
//                 ),
            ),
            
            // $endpoint, $headLang, $targetLang, $text, $mat(デフォルト MatchingMethod::COMPLETE)
            'BilingualDictionary' => array(
                "kyoto1.langrid:gcn_schoolwordbook_dictionary" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:gcn_schoolwordbook_dictionary", 
                    "en", 
                    "ja",
                    "test",
                ),
            ),
                
            "BilingualDictionaryWithLongestMatchSearch" => array(
                "kyoto1.langrid:mief_miekonihongo_dictionary" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:mief_miekonihongo_dictionary", 
                    "ja", 
                    "th", 
                )
            ),
                
            'DependencyParser' => array(
                "kyoto1.langrid:MaltParser" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:MaltParser", 
                    "en", 
                    "this is test."
                ), 
            ), 
            
            'KeyphraseExtraction' => array(
                'kyoto1.langrid:GensenJa' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:GensenJa"
                )
            ), 
            
            'LanguageIdentification' => array(
                "kyoto1.langrid:GoogleLanguageDetect" => array(
                    "http://aalangrid.org/service_manager/wsdl/kyoto1.langrid:GoogleLanguageDetect", 
                    "This is test.", 
                    "UTF-8", 
                )
            ), 
            
            'SimilarityCalculation' => array(
                "kyoto1.langrid:BLEU" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:BLEU", 
                    'ja', 
                    'テスト１', 
                    'テスト２', 
                )
            ), 
            
            'SpeechRecognition' => array(
                "kyoto1.langrid:Julius" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Julius"
                )
            ),
                
            'TemplateParallelText' => array(
                'kyoto1.langrid:Kanagawa-PrefectureSchoolEntranceTemplateParallelText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Kanagawa-PrefectureSchoolEntranceTemplateParallelText", 
                    "ja", 
                )
            ), 
            
            'TextToSpeech' => array(
                'kyoto1.langrid:VoiceText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:VoiceText", 
                    
                )
            ),
            
            'Translation' => array(
                "kyoto1.langrid:KyotoUCLWT" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUCLWT", 
                    'en', 
                    'ja', 
                    'test', 
                )
            ), 
            
            'TranslationSelection' => array(
                "" => array(
                    ''
                )
            ), 
            
            'AdjacencyPair' => array(
                'kyoto1.langrid:MedicalDialogCorpus' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MedicalDialogCorpus', 
                    '', 
                    'ja', 
                    'テスト',
                )
            ), 
            'PictogramDictionary' => array(
                'kyoto1.langrid:PangaeaPictogram' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:PangaeaPictogram', 
                    'en', 
                    'test', 
                    MatchingMethod::PREFIX,
                )
            )
        ),
            
        'bangkok' => array(
            
        ),
    );
}