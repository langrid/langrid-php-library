<?php
class ServiceList
{
    public static $service_list = array(
        'kyoto' => array(
            
		'ParallelText' => array(
                'kyoto1.langrid:KanagawaPrefectureSchoolEntranceParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KanagawaPrefectureSchoolEntranceParalleltext', 
                    'en', 
                    'ja', 
                    'Approximate school fees',
                    '参考',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/23 Nishimura Added
                'kyoto1.langrid:mie_schoolguidance_paralleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:mie_schoolguidance_paralleltext', 
                    'en', 
                    'ja', 
                    'A closing ceremony for Semester 3 and end of the school year.', 
                    '第３学期の終業式であるとともに、１年の締めくくりを行う行事です。',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:AtsugiKokokara' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:AtsugiKokokara', 
                    'en', 
                    'ja', 
                    'Notice of Long vacation', 
                    '長期休業のお知らせ',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:ChibaOtayori' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ChibaOtayori', 
                    'en', 
                    'ja', 
                    'School Entry Health Checkup', 
                    '就学時健康診断のお知らせ',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:GCNOsakaCampusDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:GCNOsakaCampusDictionary', 
                    'en', 
                    'ja', 
                    'A word to describe continous banter or chatter between friends', 
                    '友だち同士でだらだら話し続けることです。',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:HamamatsuGaikoku' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:HamamatsuGaikoku', 
                    'en', 
                    'ja', 
                    'In Japanese schools; the year is being divided in 3 terms', 
                    '日本の学校は、三つの学期に分かれています',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:KawasakiSocialStudiesHandbook' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KawasakiSocialStudiesHandbook', 
                    'ja', 
                    'zh-CN', 
                    'あなたの好きな朝ごはん？', 
                    '你喜欢的什么样的早餐？',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:KawasakiCommonHandbook' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KawasakiCommonHandbook', 
                    'ja', 
                    'zh-CN', 
                    'あなたの国の言葉で書きなさい。', 
                    '用你的语言写。',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:KawasakiParentLetterHandbook' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KawasakiParentLetterHandbook', 
                    'ja', 
                    'zh-CN', 
                    'お話したいことがありますので、家に行かせてもらいます。', 
                    '因有事要相告，将去您家里。',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:KomakiGaikoku' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KomakiGaikoku', 
                    'en', 
                    'ja', 
                    'Triangle ruler', 
                    'さんかくじょうぎ',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/01/25 Horita Added
                'kyoto1.langrid:KyotoRenraku' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoRenraku', 
                    'en', 
                    'ja', 
                    'in Human Research', 
                    '人間探求科',
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                'kyoto1.langrid:OsakaPrefectureEntranceExamNotificationParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureEntranceExamNotificationParalleltext', 
                    'en', 
                    'ja', 
                    'about the Entrance Ceremony', 
                    '入学式について',
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                'kyoto1.langrid:OsakaPrefectureSchoolFeeReductionGuidanceParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureSchoolFeeReductionGuidanceParalleltext', 
                    'zh', 
                    'es', 
                    '学费减免指南', 
                    'Guía de reducción o exención de tarifa de enseñanza',
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                'kyoto1.langrid:OsakaPrefectureSchoolLifeParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureSchoolLifeParalleltext', 
                    'ja', 
                    'en', 
                    '勤労感謝の日', 
                    'Labor Day',
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                'kyoto1.langrid:OsakaPrefectureSchoolNotificationParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureSchoolNotificationParalleltext', 
                    'ja', 
                    'en', 
                    'ＰＴＡ総会のお知らせ', 
                    'General Meeting of the PTA',
                    MatchingMethod::COMPLETE,
                ),
             // 2013/02/01 Kita Added
                'kyoto1.langrid:MedicalParallelText' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MedicalParallelText', 
                    'ja', 
                    'en', 
                    '本日の受診はどうしますか？', 
                    "Shall we go ahead and arrange for today's visit?",
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                'kyoto1.langrid:SiaSchoolParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:SiaSchoolParalleltext', 
                    'en', 
                    'ja', 
                    'Are you okay?', 
                    '大丈夫ですか？',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                'kyoto1.langrid:ShigaPrefectureCareerGuidanceParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ShigaPrefectureCareerGuidanceParalleltext', 
                    'en', 
                    'es', 
                    'graduation ceremony', 
                    'ceremonia de graduación',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                'kyoto1.langrid:TokyoMetropolitanSchoolLifeParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TokyoMetropolitanSchoolLifeParalleltext', 
                    'ja', 
                    'en', 
                    'がっこうのいきかえり', 
                    'Going to and from school',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                'kyoto1.langrid:ToyohashiStudy' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ToyohashiStudy', 
                    'ja', 
                    'en', 
                    '入学（転入）後の予定について', 
                    'How about the plan of length-of-stay in Japan',
                    MatchingMethod::COMPLETE,
                ),
            // 2013/02/01 Kita Added
                'kyoto1.langrid:YokkaichiCitySchoolGuidanceParalleltext' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:YokkaichiCitySchoolGuidanceParalleltext', 
                    'es', 
                    'ja', 
                    'En la escuela primaria', 
                    '小学校',
                    MatchingMethod::COMPLETE,
                ),
                
                // 2013/06/12 Sasaki Added
                'kyoto1.langrid:MICA_Symptom' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MICA_Symptom',
                        'en',
                        'ja',
                        'constipation',
                        '便秘',
                        MatchingMethod::PARTIAL,
                ),
                // 2013/06/12 Sasaki Added
                'kyoto1.langrid:MICA_Medicine_Bag' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MICA_Medicine_Bag',
                        'en',
                        'ja',
                        'dosage',
                        '＿時間以上間隔をあけて服用して下さい',
                        MatchingMethod::PARTIAL,
                 ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:MICA_Interview_Sheet' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MICA_Interview_Sheet',
                        'en',
                        'ja',
                        'heart',
                        '心臓病',
                        MatchingMethod::PARTIAL,
                 ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:Mitsubishi_Tanabe_Pharma_Foreign_Conversation_at_Hospital' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Mitsubishi_Tanabe_Pharma_Foreign_Conversation_at_Hospital',
                        'en',
                        'ja',
                        'Psychiatry',
                        '精神科',
                        MatchingMethod::PARTIAL,
                 ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:Mitsubishi_Tanabe_Pharma_Foreign_Conversation_at_Pharmacy' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Mitsubishi_Tanabe_Pharma_Foreign_Conversation_at_Pharmacy',
                        'en',
                        'ja',
                        'Headache',
                        '頭痛',
                        MatchingMethod::PARTIAL,
                 ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:OsakaPrefectureCareerGuidanceParalleltext' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OsakaPrefectureCareerGuidanceParalleltext',
                        'ja',
                        'zh',
                        '入学試験',
                        '入学考试',
                        MatchingMethod::PARTIAL,
                 ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:SaitamaPrefectureJapaneseStudyParalleltext' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:SaitamaPrefectureJapaneseStudyParalleltext',
                        'ja',
                        'zh',
                        '入学式',
                        '入学典礼',
                        MatchingMethod::PARTIAL,
                 ),

            ),
                
			// $endpoint, $lang, $text, $answer
            //answerには形態素分析の結果，最初に出てくる単語を指定する
            'MorphologicalAnalysis' => array(
            //2013/01/28 Nishimura Add
                'kyoto1.langrid:ChasenService' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ChasenService',
                    'ja',
                    'テストです。',
                    'テスト',
                ),
            //2013/01/28 Nishimura Add
                'kyoto1.langrid:Mecab' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Mecab',
                    'ja',
                    'テストです。', 
                    'テスト',
                ),
            //2013/01/28 Nishimura Add
                'kyoto1.langrid:ZPosTagger' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ZPosTagger',
                    'en', 
                    'this is test.', 
                    'this',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:BahasaIndonesiaMorphologicalAnalysisService' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BahasaIndonesiaMorphologicalAnalysisService',
                    'id', 
                    'Ini adalah ujian.', 
                    'ini',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:Frog' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Frog',
                    'nl', 
                    'Dies ist ein Test.', 
                    'Dies',
                ),
            //2013/03/08 Horita Add
                'kyoto1.langrid:HunPos' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:HunPos',
                    'en', 
                    'This is a Test.', 
                    'This',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:ICTCLAS' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ICTCLAS',
                    'zh-CN', 
                    '这是一个考验。', 
                    '这',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:Illinoispostagger' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Illinoispostagger',
                    'en', 
                    'This is a test.', 
                    'This',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:Juman_service' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Juman_service',
                    'ja', 
                    'これはテストです．', 
                    'これはテストです',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:Klt' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Klt',
                    'ko', 
                    '이 시험입니다.', 
                    '이',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:KyTea' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyTea',
                    'ja', 
                    'これはテストです．', 
                    'これ',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:TreeTagger' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TreeTagger',
                    'en', 
                    'This is a test.', 
                    'This',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:Yahoomorph' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Yahoomorph',
                    'ja', 
                    'これはテストです．', 
                    'これ',
                ),
            //2014/05/08 Otani Add
                'kyoto1.langrid:VLSPPOSTaggerService' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:VLSPPOSTaggerService',
                    'vi',
                    'Đây là một thử nghiệm',
                    'Đây',
                ),

            ),
            
            // $endpoint, $lang, $text, $answer, $mat(デフォルト MatchingMethod::COMPLETE)
            // answerには最初の概念の最初のglossesの最初のglossTextを入力する．
            'ConceptDictionary' => array(
            //2013/01/28 Nishimura Add
                 'kyoto1.langrid:WordNet_service' => array(
                     'http://langrid.org/service_manager/wsdl/kyoto1.langrid:WordNet_service',
                     'en', 
                     'en',
                     'a commissioned officer in the Army or Air Force or Marines ranking above a 2nd lieutenant and below a captain',
                     MatchingMethod::PARTIAL,
                 ),
            //2013/02/07 Xun Added
            //2013/02/14 Horita Revised
                 'kyoto1.langrid:IndonesianConceptualDictionary' => array(
                     'http://langrid.org/service_manager/wsdl/kyoto1.langrid:IndonesianConceptualDictionary',
                     'id', 
                     'en',
                     'dia mempunyai pengetahuan dl bidang teknik',
                     MatchingMethod::PARTIAL,
                 ),
            //2013/02/07 Xun Added
            //2013/02/14 Horita Revised
                 'kyoto1.langrid:WordNetJa' => array(
                     'http://langrid.org/service_manager/wsdl/kyoto1.langrid:WordNetJa',
                     'en', 
                     'test',
                     'a hard outer covering as of some amoebas and sea urchins',
                     MatchingMethod::COMPLETE,
                 ),
            //2014/04/10 Otani Added
                 'kyoto1.langrid:EDRConceptDictionary' => array(
                     'http://langrid.org/service_manager/wsdl/kyoto1.langrid:EDRConceptDictionary',
                     'en', 
                     'I',
                     'the 9th letter of the English alphabet',
                     MatchingMethod::COMPLETE,
                 ),
            ),
            
            // $endpoint, $headLang, $targetLang, $text, $answer ,$mat(デフォルト MatchingMethod::COMPLETE)
            // answerには見出し語に対応している単語を入力する．
            'BilingualDictionary' => array(
            //2013/01/28 Nishimura Add
                'kyoto1.langrid:Lsd' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Lsd', 
                    'en',
                    'ja',
                    'adjusted life year',
                    '調整生存年'
                ),
            //2013/02/19 Xun Add
                'kyoto1.langrid:EnglishIndonesianBilingualDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:EnglishIndonesianBilingualDictionary', 
                    'en',
                    'id',
                    'monday',
                    'senin'
                ),
            //2013/02/19 Xun Add
                'kyoto1.langrid:gcn_schoolwordbook_dictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:gcn_schoolwordbook_dictionary', 
                    'en',
                    'ja',
                    'test',
                    'テスト'
                ),
            //2013/02/19 Xun Add
                'kyoto1.langrid:NaturalDisasters' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:NaturalDisasters', 
                    'en',
                    'ja',
                    'test',
                    '試験'
                ),
            //2013/02/19 Xun Add
                'kyoto1.langrid:KyotoTourismDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoTourismDictionary', 
                    'en',
                    'ja',
                    'Kyoto',
                    '都'
                ),
            //2013/06/12 Sasaki Add
                'kyoto1.langrid:lexitron-dict-public' => array(
                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:lexitron-dict-public',
                        'en',
                        'th',
                        'snow',
                        '(หิมะ) ตก'
                        ),
                //2013/06/12 Sasaki Add
// Because Nii service is suspended, this testing is temporary commented
// Proper handling of such case is to check the status of the service before it is tested
//                'kyoto1.langrid:Nii' => array(
//                        'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Nii',
//                        'en',
//                        'ja',
//                        'snow',
//                        '雪',
//                        MatchingMethod::COMPLETE
//                ),  
            ),
            
            'CompositeBilingualDictionary' => array(
            //2013/07/02 Nishimura Add
                'kyoto1.langrid:BilingualDictionaryCrossSearch' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BilingualDictionaryCrossSearch', 
                    array(
            "BilingualDictionaryPL1" => "Lsd", 
            "BilingualDictionaryPL2" => "gcn_schoolwordbook_dictionary", 
            "BilingualDictionaryPL3" => "NaturalDisasters", 
            "BilingualDictionaryPL4" => "KyotoTourismDictionary", 
            "BilingualDictionaryPL5" => "lexitron-dict-public"),
                    'en',
                    'ja',
                    'test',
                    'テスト'
                ),
            ),
            
            'BilingualDictionaryWithLongestMatchSearch' => array(
                'kyoto1.langrid:LsdDb' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:LsdDb', 
                    'en',
                    'ja',
                    Array('snow','snow','noun'),
                    '雪'
                ),
                'kyoto1.langrid:SiaSchoolDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:SiaSchoolDictionary', 
                    'en',
                    'ja',
                    Array('child', 'child', 'noun'),
                    '児童'
                ),
                'kyoto1.langrid:EDRDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:EDRDictionary', 
                    'en',
                    'ja',
                    Array('hello', 'hello', 'noun'),
                    'こんにちは'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:JapanAgricultureDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:JapanAgricultureDictionary',
                    'en',
                    'ja',
                    Array('rice','rice','noun'),
                    '米'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:YMCRiceDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:YMCRiceDictionary',
                    'en',
                    'ja',
                    Array('rice','rice','noun'),
                    '米'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:WikipediaDictionary_NationalParkUS_en' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:WikipediaDictionary_NationalParkUS_en',
                    'en',
                    'ja',
                    Array('Ohio','Ohio','noun'),
                    'オハイオ州'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:WikipediaDictionary_Katakana_ja' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:WikipediaDictionary_Katakana_ja',
                    'ja',
                    'zh-CN',
                    Array('ソフトウェア','ソフトウェア','noun'),
                    '计算机软件'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:TGEver1' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TGEver1',
                    'en',
                    'ja',
                    Array('Science','Science','noun'),
                    '理科'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:RentalHousingDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:RentalHousingDictionary',
                    'en',
                    'ja',
                    Array('home','home','noun'),
                    'お住まい'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:NaturalDisasterDb' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:NaturalDisasterDb',
                    'en',
                    'ja',
                    Array('earthquake','earthquake','noun'),
                    '地震'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:MinamiAlpsNihongoDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MinamiAlpsNihongoDictionary',
                    'en',
                    'ja',
                    Array('mountain','mountain','noun'),
                    'やま'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:KyotoTourismDictionaryDb' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoTourismDictionaryDb',
                    'en',
                    'ja',
                    Array('Kamogawa','Kamogawa','noun'),
                    'かも川'
                ),
                // 2013/06/23 Sasaki Added
                'kyoto1.langrid:KyotoSpecialtyDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoSpecialtyDictionary',
                    'en',
                    'ja',
                    Array('food','food','noun'),
                    '食材'
                ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:mief_miekonihongo_dictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:mief_miekonihongo_dictionary',
                    'ja',
                    'es',
                    Array('うみ','うみ','noun'),
                    'mar'
                ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:NiiLocal' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:NiiLocal',
                    'en',
                    'ja',
                    Array('sea','sea','noun'),
                    '一般海域'
                ),
                // 2014/04/10 Otani Added
                'kyoto1.langrid:RitsumeikanDictionary' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:RitsumeikanDictionary',
                    'en',
                    'ja',
                    Array('academics','academics','noun'),
                    '学修'
                ),
            ),
            
            'CompositeBilingualDictionaryWithLongestMatchSearch' => array(
                'kyoto1.langrid:LsdDb' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BilingualDictionaryWithLongestMatchCrossSearch', 
                    array(
            "BilingualDictionaryWithLongestMatchCrossSearchPL1" => "LsdDb", 
            "BilingualDictionaryWithLongestMatchCrossSearchPL2" => "LsdDb", 
            "BilingualDictionaryWithLongestMatchCrossSearchPL3" => "LsdDb", 
            "BilingualDictionaryWithLongestMatchCrossSearchPL4" => "LsdDb", 
            "BilingualDictionaryWithLongestMatchCrossSearchPL5" => "LsdDb"),
                    'en',
                    'ja',
                    Array('snow','snow','noun'),
                    '雪'
                ),
            ),
            
            //$endpoint, $lang, $sentence, $answer
            //answerには最初の単語を入力する．
            'DependencyParser' => array(
            //2013/02/04 Nishimura Add
                'kyoto1.langrid:CabochaService' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:CabochaService', 
                    'ja', 
                    'これはテストです．',
                    'これ'
                ), 
            //2013/02/14 Horita Add
                'kyoto1.langrid:knp_service' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:knp_service', 
                    'ja', 
                    'これはテストです．',
                    'これ'
                ), 
            //2013/02/14 Horita Add
                'kyoto1.langrid:YahooDepend' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:YahooDepend', 
                    'ja', 
                    'これはテストです．',
                    'これ'
                ), 
            //2013/02/19 Xun Add
                'kyoto1.langrid:ZParser' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ZParser', 
                    'zh', 
                    '一个测试．',
                    '一'
                ), 
            ), 
           
            //$endpoint, $lang, $text, $answer
            //answerには特徴語抽出の結果最もスコアが高くなる語を入れる
            'KeyphraseExtraction' => array(
							//2013/06/07 Kitagawa Add
                'kyoto1.langrid:GensenJa' => array(
									"http://langrid.org/service_manager/wsdl/kyoto1.langrid:GensenJa",
									"ja",
									"日本国民は、正当に選挙された国会における代表者を通じて行動し、われらとわれらの子孫のために、諸国民との協和による成果と、わが国全土にわたって自由のもたらす恵沢を確保し、政府の行為によって再び戦争の惨禍が起ることのないようにすることを決意し、ここに主権が国民に存することを宣言し、この憲法を確定する。そもそも国政は、国民の厳粛な信託によるものであって、その権威は国民に由来し、その権力は国民の代表者がこれを行使し、その福利は国民がこれを享受する。これは人類普遍の原理であり、この憲法は、かかる原理に基くものである。われらは、これに反する一切の憲法、法令および詔勅を排除する。日本国民は、恒久の平和を念願し、人間相互の関係を支配する崇高な理想を深く自覚するのであって、平和を愛する諸国民の公正と信義に信頼して、われらの安全と生存を保持しようと決意した。われらは、平和を維持し、専制と隷従、圧迫と偏狭を地上から永遠に除去しようと務めている国際社会において、名誉ある地位を占めたいと思う。われらは、全世界の国民が、ひとしく恐怖と欠乏から免れ、平和のうちに生存する権利を有することを確認する。われらは、いずれの国家も、自国のことのみに専念して他国を無視してはならないのであって、政治道徳の法則は、普遍的なものであり、この法則に従うことは、自国の主権を維持し、他国と対等関係に立とうとする各国の責務であると信ずる。日本国民は、国家の名誉にかけ、全力をあげてこの崇高な理想と目的を達成することを誓う。",
									"国民"
								),
								
								
								//2013/06/07 Kitagawa Add
								'kyoto1.langrid:GensenEuro' => array(
									"http://langrid.org/service_manager/wsdl/kyoto1.langrid:GensenEuro",
									"en",
									'Four score and seven years ago our fathers brought forth, upon this continent, a new nation, conceived in liberty, and dedicated to the proposition that all men are created equal

Now we are engaged in a great civil war, testing whether that nation, or any nation so conceived, and so dedicated, can long endure. We are met on a great battle field of that war. We have come to dedicate a portion of it, as a final resting place for those who died here, that the nation might live. This we may, in all propriety do. But, in a larger sense, we can not dedicate — we can not consecrate — we can not hallow, this ground– The brave men, living and dead, who struggled here, have hallowed it, far above our poor power to add or detract. The world will little note, nor long remember what we say here; while it can never forget what they did here.

It is rather for us, the living, to stand here, we here be dedicated to the great task remaining before us — that, from these honored dead we take increased devotion to that cause for which they here, gave the last full measure of devotion — that we here highly resolve these dead shall not have died in vain; that the nation, shall have a new birth of freedom, and that government of the people by the people for the people, shall not perish from the earth.',
								"war"
								),
								
								
								//2013/06/07 Kitagawa Add
								'kyoto1.langrid:Yahoophrase' => array(
									"http://langrid.org/service_manager/wsdl/kyoto1.langrid:Yahoophrase",
									"ja",
									"日本国民は、正当に選挙された国会における代表者を通じて行動し、われらとわれらの子孫のために、諸国民との協和による成果と、わが国全土にわたって自由のもたらす恵沢を確保し、政府の行為によって再び戦争の惨禍が起ることのないようにすることを決意し、ここに主権が国民に存することを宣言し、この憲法を確定する。そもそも国政は、国民の厳粛な信託によるものであって、その権威は国民に由来し、その権力は国民の代表者がこれを行使し、その福利は国民がこれを享受する。これは人類普遍の原理であり、この憲法は、かかる原理に基くものである。われらは、これに反する一切の憲法、法令および詔勅を排除する。日本国民は、恒久の平和を念願し、人間相互の関係を支配する崇高な理想を深く自覚するのであって、平和を愛する諸国民の公正と信義に信頼して、われらの安全と生存を保持しようと決意した。われらは、平和を維持し、専制と隷従、圧迫と偏狭を地上から永遠に除去しようと務めている国際社会において、名誉ある地位を占めたいと思う。われらは、全世界の国民が、ひとしく恐怖と欠乏から免れ、平和のうちに生存する権利を有することを確認する。われらは、いずれの国家も、自国のことのみに専念して他国を無視してはならないのであって、政治道徳の法則は、普遍的なものであり、この法則に従うことは、自国の主権を維持し、他国と対等関係に立とうとする各国の責務であると信ずる。日本国民は、国家の名誉にかけ、全力をあげてこの崇高な理想と目的を達成することを誓う。",
									"われら"
								),
								
								//2013/06/07 Kitagawa Add
								'kyoto1.langrid:GensenZh' => array(
									"http://langrid.org/service_manager/wsdl/kyoto1.langrid:GensenZh",
									"zh",
									"中国是世界上历史最悠久的国家之一。中国各族人民共同创造了光辉灿烂的文化，具有光荣的革命传统。

　　一八四０年以后，封建的中国逐渐变成半殖民地、半封建的国家。中国人民为国家独立、民族解放和民主自由进行了前仆后继的英勇奋斗。

　　二十世纪，中国发生了翻天覆地的伟大历史变革。

　　一九一一年孙中山先生领导的辛亥革命，废除了封建帝制，创立了中华民国。但是，中国人民反对帝国主义和封建主义的历史任务还没有完成。

　　一九四九年，以毛泽东主席为领袖的中国共产党领导中国各族人民，在经历了长期的艰难曲折的武装斗争和其他形式的斗争以后，终于推翻了帝国主义、封建主义和官僚资本主义的统治，取得了新民主主义革命的伟大胜利，建立了中华人民共和国。从此，中国人民掌握了国家的权力，成为国家的主人。

　　中华人民共和国成立以后，我国社会逐步实现了由新民主主义到社会主义的过渡。生产资料私有制的社会主义改造已经完成，人剥削人的制度已经消灭，社会主义制度已经确立。工人阶级领导的、以工农联盟为基础的人民民主专政，实质上即无产阶级专政，得到巩固和发展。中国人民和中国人民解放军战胜了帝国主义、霸权主义的侵略、破坏和武装挑衅，维护了国家的独立和安全，增强了国防。经济建设取得了重大的成就，独立的、比较完整的社会主义工业体系已经基本形成，农业生产显著提高。教育、科学、文化等事业有了很大的发展，社会主义思想教育取得了明显的成效。广大人民的生活有了较大的改善。

　　中国新民主主义革命的胜利和社会主义事业的成就，是中国共产党领导中国各族人民，在马克思列宁主义、毛泽东思想的指引下，坚持真理，修正错误，战胜许多艰难险阻而取得的。我国将长期处于社会主义初级阶段。国家的根本任务是，沿着中国特色社会主义道路，集中力量进行社会主义现代化建设。中国各族人民将继续在中国共产党领导下，在马克思列宁主义、毛泽东思想、邓小平理论和“三个代表”重要思想指引下，坚持人民民主专政，坚持社会主义道路，坚持改革开放，不断完善社会主义的各项制度，发展社会主义市场经济，发展社会主义民主，健全社会主义法制，自力更生，艰苦奋斗，逐步实现工业、农业、国防和科学技术的现代化，推动物质文明、政治文明和精神文明协调发展，把我国建设成为富强、民主、文明的社会主义国家。

　　在我国，剥削阶级作为阶级已经消灭，但是阶级斗争还将在一定范围内长期存在。中国人民对敌视和破坏我国社会主义制度的国内外的敌对势力和敌对分子，必须进行斗争。

　　台湾是中华人民共和国的神圣领土的一部分。完成统一祖国的大业是包括台湾同胞在内的全中国人民的神圣职责。

　　社会主义的建设事业必须依靠工人、农民和知识分子，团结一切可以团结的力量。在长期的革命和建设过程中，已经结成由中国共产党领导的，有各民主党派和各人民团体参加的，包括全体社会主义劳动者、社会主义事业的建设者、拥护社会主义的爱国者和拥护祖国统一的爱国者的广泛的爱国统一战线，这个统一战线将继续巩固和发展。中国人民政治协商会议是有广泛代表性的统一战线组织，过去发挥了重要的历史作用，今后在国家政治生活、社会生活和对外友好活动中，在进行社会主义现代化建设、维护国家的统一和团结的斗争中，将进一步发挥它的重要作用。中国共产党领导的多党合作和政治协商制度将长期存在和发展。

　　中华人民共和国是全国各族人民共同缔造的统一的多民族国家。平等、团结、互助的社会主义民族关系已经确立，并将继续加强。在维护民族团结的斗争中，要反对大民族主义，主要是大汉族主义，也要反对地方民族主义。国家尽一切努力，促进全国各民族的共同繁荣。

　　中国革命和建设的成就是同世界人民的支持分不开的。中国的前途是同世界的前途紧密地联系在一起的。中国坚持独立自主的对外政策，坚持互相尊重主权和领土完整、互不侵犯、互不干涉内政、平等互利、和平共处的五项原则，发展同各国的外交关系和经济、文化的交流；坚持反对帝国主义、霸权主义、殖民主义，加强同世界各国人民的团结，支持被压迫民族和发展中国家争取和维护民族独立、发展民族经济的正义斗争，为维护世界和平和促进人类进步事业而努力。

　　本宪法以法律的形式确认了中国各族人民奋斗的成果，规定了国家的根本制度和根本任务，是国家的根本法，具有最高的法律效力。全国各族人民、一切国家机关和武装力量、各政党和各社会团体、各企业事业组织，都必须以宪法为根本的活动准则，并且负有维护宪法尊严、保证宪法实施的职责。",
									"主义"
								),

            ), 
            
            //$endpoint, $text, $encoding, $answer
            //2013/06/05 Sasaki Add
           'LanguageIdentification' => array(
                'kyoto1.langrid:GoogleLanguageDetect' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:GoogleLanguageDetect', 
                    'This is test.', 
                    'UTF-8',
                    'en'
                )
            ), 
            
            
            //$endpoint, $lang, $text1, $text2, $answer
            //answerには結果の値を入力する．
            'SimilarityCalculation' => array(
            //2013/02/04 Nishimura Add
                'kyoto1.langrid:BLEU' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BLEU', 
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
                'kyoto1.langrid:Julius' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Julius',
                    'ja'
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
                ),
				//2013/06/07 Xun Added	  				
               'kyoto1.langrid:Osaka-PrefectureEntranceExamNotificationTemplateParallelText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Osaka-PrefectureEntranceExamNotificationTemplateParallelText", 
                    "en", 
                    "test",
                    "about the Achievement Test",
                    1
                ),
				//2013/06/07 Xun Added	 
               'kyoto1.langrid:Osaka-PrefectureSchoolNotificationTemplateParallelText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Osaka-PrefectureSchoolNotificationTemplateParallelText", 
                    "en", 
                    "test",
                    "Test items",
                    1
                ),
				//2013/06/07 Xun Added	 
               'kyoto1.langrid:Saitama-PrefectureJapaneseStudyTemplateParallelText' => array(
                    "http://langrid.org/service_manager/wsdl/kyoto1.langrid:Saitama-PrefectureJapaneseStudyTemplateParallelText", 
                    "en", 
                    "test",
                    "Mini Test",
                    1
                ),
             //2013/06/07 Xun Added	 
                'kyoto1.langrid:YMCExpertAnswerParallelText' => array(
                     "http://langrid.org/service_manager/wsdl/kyoto1.langrid:YMCExpertAnswerParallelText", 
                     "en", 
                     "Japanese paddy",
                     "In a Japanese paddy, there used to be insects such as a giant water bug, a mayfly, a larva of dragonfly, a firefly, a diving beetle, a water strider, a larva of a mosquito and a caddis-fly. The number of the insects decreases nowadays.",
                     1
                )
            ), 
            
            //2013/06/05 Xun Added
            'TextToSpeech' => array(
                'kyoto1.langrid:VoiceText' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:VoiceText',
                    'woman'
                ),
                
            //2013/06/05 Xun Added
                'kyoto1.langrid:OpenJTalk' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OpenJTalk',
                    'man'
                ),
            ),
            
            // $endpoint, $headLang, $targetLang, $text, $answer
            // answerには翻訳結果を入力する
            'Translation' => array(
            //2013/02/14 Nishimura Add
                'kyoto1.langrid:KyotoUCLWT' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUCLWT', 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:GoogleTranslate' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:GoogleTranslate', 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:KyotoUJServer' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUJServer', 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            //2013/03/08 Horita Add
                'kyoto1.langrid:Template-EngFilTran' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:Template-EngFilTran', 
                    'en', 
                    'tl', 
                    'This is a test.', 
                    'Ito isang pagsusuri.',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:ToshibaMT' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ToshibaMT', 
                    'en', 
                    'zh-CN', 
                    'test', 
                    '试验',
                ),
            //2013/02/14 Horita Add
                'kyoto1.langrid:YakushiteNet' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:YakushiteNet', 
                    'en', 
                    'ja', 
                    'test', 
                    'テスト',
                ),
            ), 
            
             // $endpoint, $bindingsArray,$sourceLang, $targetLang, $source, $answer
             // bindingsArrayには，Array形式でBindings先とサービスIDを指定する．
             // answerには翻訳結果を入力する
            'CompositeTranslation' => array(
            //2013/06/18 Nishimura Add
                'kyoto1.langrid:TranslationWithBackup' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TranslationWithBackup', 
                    array("TranslationPL"  => "GoogleTranslate","BackupTranslationPL" => "GoogleTranslate"),
                    'ko', 
                    'zh', 
                    '안녕하세요', 
                    '你好',
                ),
             //2013/06/18 Nishimura Add
                'kyoto1.langrid:ThreeHopTranslationEnJa' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ThreeHopTranslationEnJa', 
                    array("SecondTranslationPL"  => "GoogleTranslate","ThirdTranslationPL" => "GoogleTranslate","FirstTranslationPL" => "GoogleTranslate"),
                    'ko', 
                    'zh', 
                    '안녕하세요', 
                    '你好',
                ),
             //2013/06/18 Nishimura Add
                'kyoto1.langrid:ThreeHopTranslationJaEn' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:ThreeHopTranslationJaEn', 
                    array("SecondTranslationPL"  => "GoogleTranslate","ThirdTranslationPL" => "GoogleTranslate","FirstTranslationPL" => "GoogleTranslate"),
                    'ko', 
                    'zh', 
                    '안녕하세요', 
                    '你好',
                ),
             //2013/06/18 Nishimura Add
                'kyoto1.langrid:TranslationWithParallelText' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TranslationWithParallelText', 
                    array("TranslationPL"  => "GoogleTranslate","ParallelTextPL" => "ToyohashiStudy"),
                    'ko', 
                    'zh', 
                    '안녕하세요', 
                    '你好',
                ),
             //2013/06/18 Nishimura Add
                'kyoto1.langrid:TwoHopTranslationEn' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TwoHopTranslationEn', 
                    array("SecondTranslationPL"  => "GoogleTranslate","FirstTranslationPL" => "GoogleTranslate"),
                    'ko', 
                    'zh', 
                    '안녕하세요', 
                    '你好',
                ),
             //2013/06/18 Nishimura Add
                'kyoto1.langrid:TwoHopTranslationJa' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:TwoHopTranslationJa', 
                    array("SecondTranslationPL"  => "GoogleTranslate","FirstTranslationPL" => "GoogleTranslate"),
                    'ko', 
                    'zh', 
                    '안녕하세요', 
                    '你好',
                ),
            ),
           
            // $endpoint, $headLang, $targetLang, $text, $answer
            // answerには翻訳結果を入力する
			// endpointに関して，このサービスタイプはGETパラメータとしてdicIdに内部辞書のIDを付加すると，
			// それを利用して翻訳を行う．
			'TranslationWithInternalDictionary' => array(
			  //2013/02/14 Kitagawa Add
			  //TODO: 指定した辞書特有の語を含むテスト文の作成
			  "kyoto1.langrid:KyotoUCLWTDict" => array(
				"http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUCLWTDict?dicId=AGRI", 
				'en', 
				'ja', 
				'test', 
				'テスト',
			  ),
			),
            
            //$endpoint, $category, $lang, $text
            'AdjacencyPair' => array(
                //2013/06/12 Sasaki Added
                'kyoto1.langrid:MedicalDialogCorpus' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MedicalDialogCorpus', 
                    'Payment', 
                    'ja', 
                    'テスト',
                    MatchingMethod::PARTIAL,
                ),
            ),
            
            //$endpoint, $source, $intermediate, $text
            //2013/06/12 Sasaki Added
            'BackTranslation' => array(
                    'kyoto1.langrid:BackTranslation' => array(
                            'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BackTranslation',
                            'ja',
                            'en',
                            'こんにちは',
                            ),
            ),
            
            //2013/06/05 Xun Added	            
            'PictogramDictionary' => array(
                'kyoto1.langrid:PangaeaPictogram' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:PangaeaPictogram', 
                    'en', 
                    'tomato', 
                    'SWF', 
                    MatchingMethod::PREFIX,
                )
            ),
            
            //2013/06/15 Nishimura Added	            
            'NamedEntityTagging' => array(
                'kyoto1.langrid:NExT' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:NExT', 
                    'ja', 
                    '私の名前は西村です．', 
                    '西村'
                )
            ),
            
            //2013/06/15 Nishimura Added	            
            'TextSummarization' => array(
                'kyoto1.langrid:JapaneseSummarizer' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:JapaneseSummarizer', 
                    'ja', 
                    '京都オペレーションセンター（京都大学社会情報学専攻）が運営している言語グリッドは，非営利利用および研究利用に利用できます．利用にあたっては，利用組織とオペレーションセンターとの間で覚書の締結が必要となります．
言語グリッドへの参加申し込みに必要な条件は以下の通りです．

代表者が言語グリッド利用状況をすべて把握できる規模の組織であること．
言語グリッドのユーザID とパスワードを限られた管理者のみで把握し，漏洩しないよう管理できること．
利用組織のWebサイトに組織名，代表者名，住所が記載されていること．
また、下記の範囲の組織を対象とします．（原則として個人参加はできません．）
公的機関あるいは非営利団体の本来業務のために言語グリッドを利用する組織
社会貢献活動（CSR:corporate social responsibility）活動に言語グリッドを利用する企業・団体
※「社会貢献活動に言語グリッドを利用する/している」ことをホームページ上に記載すること
営利的収益に直接寄与しない研究に言語グリッドを利用する組織', 
                    '京都オペレーションセンター（京都大学社会情報学専攻）が運営している言語グリッドは，非営利利用および研究利用に利用できます．利用にあたっては，利用組織とオペレーションセンターとの間で覚書の締結が必要となります．
公的機関あるいは非営利団体の本来業務のために言語グリッドを利用する組織
社会貢献活動（CSR:corporate social responsibility）活動に言語グリッドを利用する企業・団体
※「社会貢献活動に言語グリッドを利用する/している」ことをホームページ上に記載すること
営利的収益に直
'
                ),
            'kyoto1.langrid:OpenTS' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:OpenTS', 
                    'en', 
                    "Atlantis: The Lost Empire is a 2001 American animated film created by Walt Disney Feature Animation—the first science fiction film in Disney's animated features canon and the 41st overall. Written by Tab Murphy, directed by Gary Trousdale and Kirk Wise, and produced by Don Hahn, the film features an ensemble cast with the voices of Michael J. Fox, Cree Summer, James Garner, Leonard Nimoy, Don Novello, and Jim Varney in his final role before his death. Set in 1914, the film tells the story of a young man who gains possession of a sacred book, which he believes will guide him and a crew of adventurers to the lost city of Atlantis.
Development of the film began after production had finished on The Hunchback of Notre Dame (1996). Instead of another musical, the production team decided to do an action-adventure film inspired by the works of Jules Verne. Atlantis was notable for adopting the distinctive visual style of comic book creator Mike Mignola. At the time of its release, the film had made greater use of computer-generated imagery (CGI) than any of Disney's previous animated features; it remains one of the few to have been shot in anamorphic format. Linguist Marc Okrand created a language specifically for use in Atlantis, while James Newton Howard provided the score. The film was released at a time when audience interest in animated films was shifting away from hand-drawn animation toward films with full CGI.
Atlantis: The Lost Empire premiered at the El Capitan Theatre in Hollywood, California on June 3, 2001, and went into general release on June 15. Released by Walt Disney Pictures, Atlantis performed modestly at the box office. Budgeted at $100 million, the film grossed over $186 million worldwide, $84 million of which was earned in North America. Due to the film's poorer-than-expected box-office performance, Disney quietly canceled both a spin-off television series and an underwater attraction at its Disneyland theme park. Some critics praised it as a unique departure from typical Disney animated features, while others disliked it due to the unclear target audience and absence of songs. Atlantis was nominated for a number of awards, including seven Annie Awards, and won Best Sound Editing at the 2002 Golden Reel Awards. The film was released on VHS and DVD on January 29, 2002; the Blu-ray released on June 11, 2013. Atlantis is considered to be a cult favorite, due in part to Mignola's unique artistic influence. A direct-to-video sequel, Atlantis: Milo's Return, was released in 2003.
", 
                    "Atlantis: The Lost Empire is a 2001 American animated film created by Walt Disney Feature Animation—the first science fiction film in Disney's animated features canon and the 41st overall. At the time of its release, the film had made greater use of computer-generated imagery (CGI) than any of Disney's previous animated features; The film was released at a time when audience interest in animated films was shifting away from hand-drawn animation toward films with full CGI. Due to the film's poorer-than-expected box-office performance, Disney quietly canceled both a spin-off television series and an underwater attraction at its Disneyland theme park.
"
                )
            ),
            
            'MorphemesDependencyParser' => array(
                'kyoto1.langrid:MaltParser' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:MaltParser', 
                    'en',
                    Array('hello','hello','noun'),
                    'hello'
                )
            ),
            

            //2013/06/22 Xun Added	            
            'QualityEstimation' => array(
                'kyoto1.langrid:QualityEstimationBasedOnBackTranslation' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:QualityEstimationBasedOnBackTranslation', 
                    array("TranslationPL"  => "Translation","SimilarityCalculationPL" => "SimilarityCalculation"),
                    'ja',
                    'en',
                    'ありがとう',
                    'Thank you',
                    '1.0',
                ),
            ),
            //2013/06/22 Xun Added	            
            'BackTranslation' => array(
                'kyoto1.langrid:BackTranslation' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BackTranslation', 
                    'en', 
                    'ja', 
                    'Thank you',
                ),
            ),
            
            //2013/06/22 Xun Added	            
            'TranslationSelection' => array(
                'kyoto1.langrid:BestTranslationSelectionUsingQualityEstimationWithAllResults' => array(
                    'http://langrid.org/service_manager/wsdl/kyoto1.langrid:BestTranslationSelectionUsingQualityEstimationWithAllResults', 
                    array("QualityEstimationPL"  => "TranslationPL3","TranslationPL4" => "TranslationPL5", "TranslationPL2" => "TranslationPL1"),
                    'ja', 
                    'en', 
                    '今日はいい天気ですね', 
                    'It is fine today',
                ),
            ),
        ),
        
        'bangkok' => array(
            
        ),
     
    );
}
