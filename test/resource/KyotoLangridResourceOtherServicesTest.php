<?php

require_once 'SOAP/Client.php';
require_once dirname(__FILE__) . "/../test_settings.php";
require_once dirname(__FILE__) . "/./service_list.php";

class KyotoLangridResourceOtherServicesTest extends PHPUnit_Framework_TestCase
{
    
    protected static $gridName = "kyoto"; 
    
    protected function setUp()
    {
        parent::setUp();
    }
    
		private function getClient($wsdl)
		{
	include("variables.php");
			$option = array(
				'user' => $userid,
				'pass' => $passwd,
				'encoding' => "UTF-8",
				//学内ならプロキシを以下のように設定
				'proxyHost' => $proxyServer,
				'proxyPort' => $proxyPort,
				'timeout' => 15);

			$client = new SOAP_Client($wsdl, true, false, $option);
			return $client;
		}

		/*
		public function testConstructSourceAndMorphemesAndCodesResource()
		{
			$this->assertTrue(FALSE, " *** This test is not implemented. ***");
		}
		 */

		public function testDefaultMorphologicalAnalysisResource()
		{
			$wsdl = "http://langrid.org/service_manager/wsdl/kyoto1.langrid:DefaultMorphologicalAnalysis";
			$client = $this->getClient($wsdl);
			$params = array(
				'language' => 'ja',
				'text'   => '日本国民は、正当に選挙された国会における代表者を通じて行動し、われらとわれらの子孫のために、諸国民との協和による成果と、わが国全土にわたって自由のもたらす恵沢を確保し、政府の行為によって再び戦争の惨禍が起ることのないようにすることを決意し、ここに主権が国民に存することを宣言し、この憲法を確定する。そもそも国政は、国民の厳粛な信託によるものであって、その権威は国民に由来し、その権力は国民の代表者がこれを行使し、その福利は国民がこれを享受する。これは人類普遍の原理であり、この憲法は、かかる原理に基くものである。われらは、これに反する一切の憲法、法令および詔勅を排除する。日本国民は、恒久の平和を念願し、人間相互の関係を支配する崇高な理想を深く自覚するのであって、平和を愛する諸国民の公正と信義に信頼して、われらの安全と生存を保持しようと決意した。われらは、平和を維持し、専制と隷従、圧迫と偏狭を地上から永遠に除去しようと務めている国際社会において、名誉ある地位を占めたいと思う。われらは、全世界の国民が、ひとしく恐怖と欠乏から免れ、平和のうちに生存する権利を有することを確認する。われらは、いずれの国家も、自国のことのみに専念して他国を無視してはならないのであって、政治道徳の法則は、普遍的なものであり、この法則に従うことは、自国の主権を維持し、他国と対等関係に立とうとする各国の責務であると信ずる。日本国民は、国家の名誉にかけ、全力をあげてこの崇高な理想と目的を達成することを誓う。'
			);

			$result = @$client->call("analyze", $params);

			$this->assertEquals(88, count($result));
			$this->assertEquals('日本国民は', $result[0]->lemma);
			$this->assertEquals('unknown', $result[0]->partOfSpeech);
		}

		/*
		public function testGetLongestMatchingTermResource()
		{
			$this->assertTrue(FALSE, " *** This test is not implemented. ***");
		}
		 */

		public function testHtmlTextExtractorResource()
		{
			$wsdl = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:HtmlTextExtractor';
			$client = $this->getClient($wsdl);
			$params = array(
				'baseUrl' => '',
				'htmlDocument' => "&lt;html&gt;&lt;body&gt;&lt;h1&gt;Weather&lt;/h1&gt;&lt;div&gt;It's fine today&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;"
			);

			$result = @$client->call("separate", $params);

			$this->assertEquals("<html><body><h1>Weather</h1><div>It's fine today</div></body></html>",$result->codesAndTexts[0]->text);
			$this->assertEquals("$1\n",$result->skeletonHtml);
		}

		//エラーが長すぎて動作がおかしくなってしまうのでコメントアウトしている
//		public function testKyotoEbmtResource()
//		{
//			$wsdl = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoEBMT-nlparser_KNP_EDICT';
//			$client = $this->getClient($wsdl);
//			$params = array(
//				'sourceLang' => 'ja',
//				'targetLang' => 'en',
//				'source' => 'テスト'
//			);
//
//			$result = @$client->call("translate", $params);
//
//			#$this->assertNotEquals($result, instanceof SOAP_Fault);
//			$this->assertEquals('test', $result);
//		}

		private function functionForAsyncTranslation($wsdl, $bindings, $params){
			$client = $this->getClient($wsdl);
			$header = new SOAP_Header(
				'{http://langrid.nict.go.jp/process/binding/tree:binding}binding',
				null,
				$bindings);
			$client->addHeader($header);

			$result = @$client->call("startTranslation", $params);
			$token = $result;
			/*
			echo "**** result **********\n";
			echo $result;
			echo "\n**************\n";
			 */
			/*
			echo "\n";
			echo '**************';
			echo $result;
			echo '**************';
			 */
			#$this->assertRegExp('/^[a-zA-Z0-9]+$/', $result);

			sleep(1);

			$params = array(
				'token' => $token
			);

			$result = @$client->call("getCurrentResult", $params);
			/*
			echo '**************';
			echo print_r($result);
			#echo print_r(get_class("".$result->finished));
			echo '**************';
			echo "\n";
			 */
			$this->assertRegExp('/[0-9]+/', "".$result->finished);
			$this->assertNotEquals(0, count($result->results), "No result has returned.");
		}

		public function testAsyncTranslationResource()
		{
			$wsdl = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:AsyncTranslation';
			$binding = '[{
				            "children":[]
						                ,"invocationName":"TranslationPL"
								            ,"serviceId":"KyotoUJserver"
									              }
		        ]';
			$params = array(
				'sourceLang' => 'ja',
				'targetLang' => 'en',
				'sources' => array('テスト')
			);
			$this->functionForAsyncTranslation($wsdl, $binding, $params);
		}

		public function testAsyncTranslationCombinedWithTemporalDictionaryResource()
		{
			$wsdl = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:AsyncTranslationCombinedWithTemporalDictionary';
			$binding = '[{
				            "children":[]
						                ,"invocationName":"TranslationWithTemporalDictionaryPL"
								            ,"serviceId":"BestTranslationSelectionWithTemporalDictionary"
									              }
		        ]';
			$params = array(
				'sourceLang' => 'ja',
				'targetLang' => 'en',
				'sources' => array('テスト'),
				'temporalDict' => array(array('headWord'=>'テスト','targetWords'=>array('testDic'))),
				'dictTargetLang' => 'en'
			);
			$this->functionForAsyncTranslation($wsdl, $binding, $params);
		}

		private function functionForWordTranslation($wsdl, $params){
			$client = $this->getClient($wsdl);
			$result = @$client->call("start", $params);
			$token = $result;

			/*
			echo "******* client *******\n";
			echo print_r($client);
			#echo print_r(get_class("".$result->finished));
			echo "\n";
			echo "**************\n";
*/
			sleep(1);

			$params_token = array(
				'token' => $token
			);

			/*
			echo "*******result*******\n";
			echo print_r($result);
			#echo print_r(get_class("".$result->finished));
			echo "\n";
			echo "**************\n";
			echo "*******token*******\n";
			echo $token;
			#echo print_r(get_class("".$result->finished));
			echo "\n";
			echo "**************\n";
			 */

			$result = @$client->call("getResult", $params_token);
			/*
			echo "******* result *******\n";
			echo print_r($result);
			#echo print_r(get_class("".$result->finished));
			echo "\n";
			echo "**************\n";
			 */
			$this->assertRegExp('/[0-9]+/', "".$result->finished);
			$this->assertNotEquals("", "".$result->data, "No result has returned.");
		}

		public function testWordTranslationResource()
		{
			$wsdl = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:WordTranslation';
			$wordFileName = dirname(__FILE__).'/word_test_file.doc';
			$fp = fopen($wordFileName, "r");
			$wordFile = base64_encode(fread($fp, filesize($wordFileName)));
			fclose($fp);
			$wordValue = new SOAP_Value('data', 'base64Binary', $wordFile);
			$params = array(
				'sourceLang' => 'ja',
				'targetLang' => 'en',
				'source' => array($wordValue, 'mimeType' => 'application/msword'),
			);
			$this->functionForWordTranslation($wsdl, $params);
		}

		public function testWordTranslationResourceWithTemporalDictionary()
		{
			$wsdl = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:WordTranslationWithTemporalDictionary';
			$wordFileName = dirname(__FILE__).'/word_test_file.doc';
			$fp = fopen($wordFileName, "r");
			$wordFile = base64_encode(fread($fp, filesize($wordFileName)));
			fclose($fp);
			$wordValue = new SOAP_Value('data', 'base64Binary', $wordFile);
			$params = array(
				'sourceLang' => 'ja',
				'targetLang' => 'en',
				'source' => array($wordValue, 'mimeType' => 'application/msword'),
				'temporalDict' => array(array('headWord'=>'テスト','targetWords'=>array('testDic'))),
				'dictTargetLang' => 'en'
			);
			$this->functionForWordTranslation($wsdl, $params);
		}
}
