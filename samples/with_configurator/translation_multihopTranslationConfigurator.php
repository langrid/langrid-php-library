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
        "serviceId":"kyoto1.langrid:TwoHopTranslation",
        "binding":
        [
          {
            "invocationName":"SecondTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"FirstTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          }
        ]
      },
      {
        "path":"en=>fr",
        "serviceId":"kyoto1.langrid:TwoHopTranslation",
        "binding":
        [
          {
            "invocationName":"SecondTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          },
          {
            "invocationName":"FirstTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          }
        ]
      },
      {
        "path":"ja=>fr",
        "serviceId":"kyoto1.langrid:ThreeHopTranslation",
        "binding":
        [
          {
            "invocationName":"SecondTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          },
          {
            "invocationName":"FirstTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          },
          {
            "invocationName":"ThirdTranslationPL",
            "serviceId":"kyoto1.langrid:GoogleTranslate"
          }
        ]
      }
    ]
  }
}
json
    ;

$obj = new MultihopTranslationConfigurator(json_decode($setting));

$cli2hopA = $obj->createClient('en', 'ko');
$cli2hopB = $obj->createClient('en', 'fr');
$cli3hop  = $obj->createClient('ja', 'fr');

try {
    print_r($cli2hopA->multihopTranslate(Language::get('en'), array(Language::get('ja')), Language::get('ko'), 'My name is Linda.'));
    print("<br>");
    print_r($cli2hopB->multihopTranslate(Language::get('en'), array(Language::get('ja')), Language::get('fr'), 'My name is Linda.'));
    print("<br>");

    print_r($cli3hop->multihopTranslate(Language::get('en'), array(Language::get('ja'), Language::get('ko')), Language::get('fr'), 'My name is Linda.'));
    print("<br>");
    print("EOF");
} catch (Exception $e) {
    print_r($e);
}
