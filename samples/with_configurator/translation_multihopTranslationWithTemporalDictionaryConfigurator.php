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
        "path":"en=>ko",
        "serviceId":"kyoto1.langrid:TwoHopTranslationCombinedWithBilingualDictionaryWithLongestMatchSearch",
        "binding":
        [
          {
            "invocationName":"SecondTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"FirstTranslationPL",
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
      }
    ]
  }
}
json
    ;

$obj = new MultihopTranslationWithTemporalDictionaryConfigurator(json_decode($setting));

$cli = $obj->createClient('en', 'ko');

try {
    print_r($cli->multihopTranslate(Language::get('en'), array(Language::get('ja')), Language::get('ko'), 'My name is Linda.', array(), Language::get('ko')));
    print("<br>");
    print("EOF");
} catch (Exception $e) {
    print_r($e);
}
