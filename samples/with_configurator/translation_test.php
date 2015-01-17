<?php

require_once dirname(__FILE__) . '/../../MultilingualStudio.php';

$setting = <<<json
{
  "connection":{
    "uri": "http://langrid.org/service_manager/wsdl/{service_id}",
    "userId": "pangaea",
    "passwd": "Ctq3wIkH"
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
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          },
          {
            "invocationName":"BackwardTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          }
        ]
      }
    ]
  }
}
json
    ;

$obj = new BackTranslationConfigurator(json_decode($setting));

$cli = $obj->createClient('ja', 'en');

//print_r($cli);

try {
    print_r($cli ->backTranslate(Language::get('ja'), Language::get('en'), '今日は良い天気です．', array(), Language::get('en')));
    print("EOF");
} catch (Exception $e) {
    print_r($e);
}
