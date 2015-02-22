<?php

require_once dirname(__FILE__) . '/../test_settings.php';

class BackTranslationWithTemporalDictionarySettingTest extends PHPUnit_Framework_TestCase
{
    private $json = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "langrid_user",
    "passwd": "password"
  },
  "serviceSetting": {
    "collection": [
      {
        "path":"ja=>en",
        "serviceId":"kyoto1.langrid:BackTranslationWithTemporalDictionary",
        "binding":
        [
          {
            "invocationName":"ForwardTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"BackwardTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"MorphologicalAnalysisPL",
            "serviceId":"kyoto1.langrid:Mecab"
          },
          {
            "invocationName":"BilingualDictionaryWithLongestMatchSearchPL",
            "serviceId":"kyoto1.langrid:BilingualDictionaryWithLongestMatchCrossSearch",
            "children":[
              {
                "invocationName":"BilingualDictionaryWithLongestMatchCrossSearchPL1",
                "serviceId":"kyoto1.langrid:PangaeaCommunityDictionary"
              },
              {
                "invocationName":"BilingualDictionaryWithLongestMatchCrossSearchPL2",
                "serviceId":""
              },
              {
                "invocationName":"BilingualDictionaryWithLongestMatchCrossSearchPL3",
                "serviceId":""
              },
              {
                "invocationName":"BilingualDictionaryWithLongestMatchCrossSearchPL4",
                "serviceId":""
              },
              {
                "invocationName":"BilingualDictionaryWithLongestMatchCrossSearchPL5",
                "serviceId":""
              }
            ]
          }
        ]
      },
      {
        "path":"en=>ja",
        "serviceId":"kyoto1.langrid:BackTranslationWithTemporalDictionary",
        "binding":
        [
          {
            "invocationName":"ForwardTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"BackwardTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"MorphologicalAnalysisPL",
            "serviceId":"kyoto1.langrid:TreeTagger"
          },
          {
            "invocationName":"BilingualDictionaryWithLongestMatchSearchPL",
            "serviceId":""
          }
        ]
      },
      {
        "path":"en<=>de",
        "serviceId":"kyoto1.langrid:BackTranslationWithTemporalDictionary",
        "binding":
        [
          {
            "invocationName":"ForwardTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          },
          {
            "invocationName":"BackwardTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          },
          {
            "invocationName":"MorphologicalAnalysisPL",
            "serviceId":"kyoto1.langrid:TreeTagger"
          },
          {
            "invocationName":"BilingualDictionaryWithLongestMatchSearchPL",
            "serviceId":""
          }
        ]
      }
    ]
  }
}
json
        ;

    function testGetServiceUri() {

        $this->setting = new BackTranslationWithTemporalDictionarySetting(json_decode($this->json));

        $this->assertEquals('http://langrid.org/service_manager/wsdl/kyoto1.langrid:BackTranslationWithTemporalDictionary', $this->setting->getServiceUri('ja', 'en'), 'test 1 failed');
        $this->assertEquals('http://langrid.org/service_manager/wsdl/kyoto1.langrid:BackTranslationWithTemporalDictionary', $this->setting->getServiceUri('en', 'ja'), 'test 2 failed');
        $this->assertEquals('http://langrid.org/service_manager/wsdl/kyoto1.langrid:BackTranslationWithTemporalDictionary', $this->setting->getServiceUri('de', 'en'), 'test 3 failed');
        $this->assertEquals('http://langrid.org/service_manager/wsdl/kyoto1.langrid:BackTranslationWithTemporalDictionary', $this->setting->getServiceUri('en', 'de'), 'test 4 failed');
        $this->assertTrue(
            $this->setting->getServiceUri('es', 'de') === FALSE, 'test 5 failed');
    }

    function testGetServiceBinding() {
        $this->setting = new BackTranslationWithTemporalDictionarySetting(json_decode($this->json));

        $ret = $this->setting->getServiceBinding('ja', 'en');
        $this->assertTrue(
            $ret[0]->serviceId ==='kyoto1.langrid:KyotoUJServer', print_r($ret, true));

        $ret = $this->setting->getServiceBinding('en', 'ja');
        $this->assertTrue(
            $ret[0]->serviceId ==='kyoto1.langrid:KyotoUJServer', print_r($ret, true));

        $ret = $this->setting->getServiceBinding('de', 'en');
        $this->assertTrue(
            $ret[0]->serviceId ==='kyoto1.langrid:GoogleTranslate', print_r($ret, true));

        $ret = $this->setting->getServiceBinding('en', 'de');
        $this->assertTrue(
            $ret[0]->serviceId ==='kyoto1.langrid:GoogleTranslate', print_r($ret, true));

        $this->assertTrue(
            $this->setting->getServiceBinding('es', 'de') === FALSE);
    }
}
