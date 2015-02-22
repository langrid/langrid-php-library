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
        "serviceId":"kyoto1.langrid:BackTranslationCombinedWithBilingualDictionaryWithLongestMatchSearch",
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
        "serviceId":"kyoto1.langrid:BackTranslationCombinedWithBilingualDictionaryWithLongestMatchSearch",
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
      }
    ]
  }
}
json
    ;

$obj = new BackTranslationWithTemporalDictionaryConfigurator(json_decode($setting));

$cli = $obj->createClient('ja', 'en');

print_r($cli);

try {
    print_r($cli ->backTranslate(Language::get('ja'), Language::get('en'), '今日は良い天気です．', array(), Language::get('en')));
    print("EOF");
} catch (Exception $e) {
    print_r($e);
}
