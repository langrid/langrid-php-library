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
                    "Approximate school fees",
                    "参考",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/23 Nishimura Added
                "kyoto1.langrid:mie_schoolguidance_paralleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:mie_schoolguidance_paralleltext", 
                    "en", 
                    "ja", 
                    "A closing ceremony for Semester 3 and end of the school year.", 
                    "第３学期の終業式であるとともに、１年の締めくくりを行う行事です。",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:AtsugiKokokara" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:AtsugiKokokara", 
                    "en", 
                    "ja", 
                    "Notice of Long vacation", 
                    "長期休業のお知らせ",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:ChibaOtayori" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ChibaOtayori", 
                    "en", 
                    "ja", 
                    "School Entry Health Checkup", 
                    "就学時健康診断のお知らせ",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:GCNOsakaCampusDictionary" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:GCNOsakaCampusDictionary", 
                    "en", 
                    "ja", 
                    "A word to describe continous banter or chatter between friends", 
                    "友だち同士でだらだら話し続けることです。",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:HamamatsuGaikoku" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:HamamatsuGaikoku", 
                    "en", 
                    "ja", 
                    "In Japanese schools; the year is being divided in 3 terms", 
                    "日本の学校は、三つの学期に分かれています",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:KawasakiSocialStudiesHandbook" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KawasakiSocialStudiesHandbook", 
                    "ja", 
                    "zh-CN", 
                    "あなたの好きな朝ごはん？", 
                    "你喜欢的什么样的早餐？",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:KawasakiCommonHandbook" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KawasakiCommonHandbook", 
                    "ja", 
                    "zh-CN", 
                    "あなたの国の言葉で書きなさい。", 
                    "用你的语言写。",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:KawasakiParentLetterHandbook" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KawasakiParentLetterHandbook", 
                    "ja", 
                    "zh-CN", 
                    "お話したいことがありますので、家に行かせてもらいます。", 
                    "因有事要相告，将去您家里。",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:KomakiGaikoku" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KomakiGaikoku", 
                    "en", 
                    "ja", 
                    "Triangle ruler", 
                    "さんかくじょうぎ",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                "kyoto1.langrid:KyotoRenraku" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoRenraku", 
                    "en", 
                    "ja", 
                    "in Human Research", 
                    "人間探求科",
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                "kyoto1.langrid:OsakaPrefectureEntranceExamNotificationParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureEntranceExamNotificationParalleltext", 
                    "en", 
                    "ja", 
                    "about the Entrance Ceremony", 
                    "入学式について",
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                "kyoto1.langrid:OsakaPrefectureSchoolFeeReductionGuidanceParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureSchoolFeeReductionGuidanceParalleltext", 
                    "zh", 
                    "es", 
                    "学费减免指南", 
                    "Guía de reducción o exención de tarifa de enseñanza",
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                "kyoto1.langrid:OsakaPrefectureSchoolLifeParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureSchoolLifeParalleltext", 
                    "ja", 
                    "en", 
                    "勤労感謝の日", 
                    "Labor Day",
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                "kyoto1.langrid:OsakaPrefectureSchoolNotificationParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureSchoolNotificationParalleltext", 
                    "ja", 
                    "en", 
                    "ＰＴＡ総会のお知らせ", 
                    "General Meeting of the PTA",
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                "kyoto1.langrid:MedicalParallelText" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:MedicalParallelText", 
                    "ja", 
                    "en", 
                    "本日の受診はどうしますか？", 
                    "Shall we go ahead and arrange for today's visit?",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                "kyoto1.langrid:SiaSchoolParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:SiaSchoolParalleltext", 
                    "en", 
                    "ja", 
                    "Are you okay?", 
                    "大丈夫ですか？",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                "kyoto1.langrid:ShigaPrefectureCareerGuidanceParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ShigaPrefectureCareerGuidanceParalleltext", 
                    "en", 
                    "es", 
                    "graduation ceremony", 
                    "ceremonia de graduación",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                "kyoto1.langrid:TokyoMetropolitanSchoolLifeParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:TokyoMetropolitanSchoolLifeParalleltext", 
                    "ja", 
                    "en", 
                    "がっこうのいきかえり", 
                    "Going to and from school",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                "kyoto1.langrid:ToyohashiStudy" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ToyohashiStudy", 
                    "ja", 
                    "en", 
                    "入学（転入）後の予定について", 
                    "How about the plan of length-of-stay in Japan",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                "kyoto1.langrid:YokkaichiCitySchoolGuidanceParalleltext" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:YokkaichiCitySchoolGuidanceParalleltext", 
                    "es", 
                    "ja", 
                    "En la escuela primaria", 
                    "小学校",
                    MatchingMethod::COMPLETE,
                ),
            ),
            
            // $endpoint, $lang, $text, $answer
            //answerには形態素分析の結果，最初に出てくる単語を指定する
            'MorphologicalAnalysis' => array(
            //2013/01/28 Nishimura Add
                "kyoto1.langrid:ChasenService" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ChasenService",
                    "ja",
                    "テストです。",
                    "テスト",
                ),
            //2013/01/28 Nishimura Add
                "kyoto1.langrid:Mecab" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Mecab",
                    "ja",
                    "テストです。", 
                    "テスト",
                ),
            //2013/01/28 Nishimura Add
                "kyoto1.langrid:ZPosTagger" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ZPosTagger",
                    "en", 
                    "this is test.", 
                    "this",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:BahasaIndonesiaMorphologicalAnalysisService" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:BahasaIndonesiaMorphologicalAnalysisService",
                    "id", 
                    "Ini adalah ujian.", 
                    "ini",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:Frog" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Frog",
                    "nl", 
                    "Dies ist ein Test.", 
                    "Dies",
                ),
            //2013/03/08 Horita Add
                "kyoto1.langrid:HunPos" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:HunPos",
                    "en", 
                    "This is a Test.", 
                    "This",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:ICTCLAS" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ICTCLAS",
                    "zh-CN", 
                    "这是一个考验。", 
                    "这",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:Illinoispostagger" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Illinoispostagger",
                    "en", 
                    "This is a test.", 
                    "This",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:Juman_service" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Juman_service",
                    "ja", 
                    "これはテストです．", 
                    "これはテストです",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:Klt" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Klt",
                    "ko", 
                    "이 시험입니다.", 
                    "이",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:KyTea" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyTea",
                    "ja", 
                    "これはテストです．", 
                    "これ",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:TreeTagger" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:TreeTagger",
                    "en", 
                    "This is a test.", 
                    "This",
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:Yahoomorph" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Yahoomorph",
                    "ja", 
                    "これはテストです．", 
                    "これ",
                ),
            ),
            
            // $endpoint, $lang, $text, $answer, $mat(デフォルト MatchingMethod::COMPLETE)
            // answerには最初の概念の最初のglossesの最初のglossTextを入力する．
            'ConceptDictionary' => array(
            //2013/01/28 Nishimura Add
                 "kyoto1.langrid:WordNet_service" => array(
                     "http://langrid.org/service_manager/wsdl/kyoto1.langrid:WordNet_service",
                     "en", 
                     "en",
                     "a commissioned officer in the Army or Air Force or Marines ranking above a 2nd lieutenant and below a captain",
                     MatchingMethod::PARTIAL,
                 ),
            //2013/02/07 Xun Added
            //2013/02/14 Horita Revised
                 "kyoto1.langrid:IndonesianConceptualDictionary" => array(
                     "http://langrid.org/service_manager/wsdl/kyoto1.langrid:IndonesianConceptualDictionary",
                     "id", 
                     "en",
                     "dia mempunyai pengetahuan dl bidang teknik",
                     MatchingMethod::PARTIAL,
                 ),
            //2013/02/07 Xun Added
            //2013/02/14 Horita Revised
                 "kyoto1.langrid:WordNetJa" => array(
                     "http://langrid.org/service_manager/wsdl/kyoto1.langrid:WordNetJa",
                     "en", 
                     "test",
                     "a hard outer covering as of some amoebas and sea urchins",
                     MatchingMethod::COMPLETE,
                 ),
            ),
            
            // $endpoint, $headLang, $targetLang, $text, $answer ,$mat(デフォルト MatchingMethod::COMPLETE)
            // answerには見出し語に対応している単語を入力する．
            'BilingualDictionary' => array(
            //2013/01/28 Nishimura Add
                "kyoto1.langrid:Lsd" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Lsd", 
                    "en",
                    "ja",
                    "adjusted life year",
                    "調整生存年"
                ),
            //2013/02/19 Xun Add
                "kyoto1.langrid:EnglishIndonesianBilingualDictionary" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:EnglishIndonesianBilingualDictionary", 
                    "en",
                    "id",
                    "monday",
                    "senin"
                ),
            //2013/02/19 Xun Add
                "kyoto1.langrid:gcn_schoolwordbook_dictionary" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:gcn_schoolwordbook_dictionary", 
                    "en",
                    "ja",
                    "test",
                    "テスト"
                ),
            //2013/02/19 Xun Add
                "kyoto1.langrid:NaturalDisasters" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:NaturalDisasters", 
                    "en",
                    "ja",
                    "test",
                    "試験"
                ),
            //2013/02/19 Xun Add
                "kyoto1.langrid:KyotoTourismDictionary" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoTourismDictionary", 
                    "en",
                    "ja",
                    "Kyoto",
                    "都"
                ),
            ),
            
            "BilingualDictionaryWithLongestMatchSearch" => array(
                "kyoto1.langrid:LsdDb" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:LsdDb", 
                    "en", 
                    "ja",
		    Array('snow','snow','noun'),
		    "雪" 
                )
            ),
            
            //$endpoint, $lang, $sentence, $answer
            //answerには最初の単語を入力する．
            'DependencyParser' => array(
            //2013/02/04 Nishimura Add
                "kyoto1.langrid:CabochaService" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:CabochaService", 
                    "ja", 
                    "これはテストです．",
                    "これ"
                ), 
            //2013/02/14 Horita Add
                "kyoto1.langrid:knp_service" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:knp_service", 
                    "ja", 
                    "これはテストです．",
                    "これ"
                ), 
            //2013/02/14 Horita Add
                "kyoto1.langrid:YahooDepend" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:YahooDepend", 
                    "ja", 
                    "これはテストです．",
                    "これ"
                ), 
            //2013/02/19 Xun Add
                "kyoto1.langrid:ZParser" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ZParser", 
                    "zh", 
                    "一个测试．",
                    "一"
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
            
            //$endpoint, $lang, $text1, $text2, $answer
            //answerには結果の値を入力する．
            'SimilarityCalculation' => array(
            //2013/02/04 Nishimura Add
                "kyoto1.langrid:BLEU" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:BLEU", 
                    'ja', 
                    'これは最初のテストになります．', 
                    'これは二番目のテストになります．', 
                    0.67390470625647
                )
            ), 
            
            //$endpoint,$answer
            //answerには対応言語の一つ目を入力する．
            'SpeechRecognition' => array(
            //2013/02/04 Nishimura Add            
                "kyoto1.langrid:Julius" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Julius",
                    "ja"
                )
            ),
            
            //$endpoint,$lang,$query,$answer
            //answerには検索結果を
			'TemplateParallelText' => array(
                'kyoto1.langrid:Kanagawa-PrefectureSchoolEntranceTemplateParallelText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Kanagawa-PrefectureSchoolEntranceTemplateParallelText", 
                    "ja", 
                    "私",
                    "{私立高校:しりつこうこう}",
                    1
                )
            ), 
            
            'TextToSpeech' => array(
                'kyoto1.langrid:VoiceText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:VoiceText", 
                    
                )
            ),
            
            // $endpoint, $headLang, $targetLang, $text, $answer
            // answerには翻訳結果を入力する
            'Translation' => array(
            //2013/02/14 Nishimura Add
                "kyoto1.langrid:KyotoUCLWT" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUCLWT", 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:GoogleTranslate" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:GoogleTranslate", 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:KyotoUJServer" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUJServer", 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            //2013/03/08 Horita Add
                "kyoto1.langrid:Template-EngFilTran" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Template-EngFilTran", 
                    'en', 
                    'tl', 
                    'This is a test.', 
                    'Ito isang pagsusuri.',
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:ToshibaMT" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:ToshibaMT", 
                    'en', 
                    'zh-CN', 
                    'test', 
                    '试验',
                ),
            //2013/02/14 Horita Add
                "kyoto1.langrid:YakushiteNet" => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:YakushiteNet", 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
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
