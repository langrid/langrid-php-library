<?php

require_once dirname(__FILE__) . '/../../MultilingualStudio.php';

require_once dirname(__FILE__) . '/../../../../cred.php';

$setting = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "{$cred['user']}",
    "passwd": "{$cred['pass']}"
  },
  "serviceSetting": {
    "collection": [
      {
        "path":"ja=>en",
        "serviceId":"kyoto1.langrid:TranslationCombinedWithBilingualDictionary",
        "binding":
        [
          {
            "invocationName":"BilingualDictionaryPL",
            "serviceId":"kyoto1.langrid:Lsd"
          },
          {
            "invocationName":"MorphologicalAnalysisPL",
            "serviceId":"kyoto1.langrid:Mecab"
          },
          {
            "invocationName":"TranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          }
        ]
      },
      {
        "path":"en=>ja",
        "serviceId":"kyoto1.langrid:TranslationCombinedWithBilingualDictionaryWithLongestMatchSearch",
        "binding":
        [
          {
            "invocationName":"MorphologicalAnalysisPL",
            "serviceId":"kyoto1.langrid:Mecab"
          },
          {
            "invocationName":"TranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
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
        "path":"ja=>fr",
        "serviceId":"kyoto1.langrid:TaggedTranslationCombinedWithBilingualDictionaryWithLongestMatchSearch",
        "binding":
        [
          {
            "invocationName":"MorphologicalAnalysisPL",
            "serviceId":"kyoto1.langrid:Mecab"
          },
          {
            "invocationName":"TranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
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
      }
    ]
  }
}
json
    ;

$obj = new TranslationWithTemporalDictionaryConfigurator(json_decode($setting));

$cliA = $obj->createClient('ja', 'en');
$cliB = $obj->createClient('en', 'ja');
$cliC = $obj->createClient('ja', 'fr');

try {
    print_r($cliA->translate(Language::get('ja'), Language::get('en'), '今日は良い天気です．', array(), Language::get('en')));
    print("<br>");

    print_r($cliB->translate(Language::get('en'), Language::get('ja'), 'It is fine today.', array(), Language::get('ja')));
    print("<br>");

    print_r($cliC->translate(Language::get('ja'), Language::get('fr'), '今日は良い天気です．', array(), Language::get('fr')));
    print("<br>");

    print("EOF");
} catch (Exception $e) {
    print_r($e);
}
