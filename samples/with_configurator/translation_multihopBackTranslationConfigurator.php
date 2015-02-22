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
            "serviceId":"kyoto1.langrid:KyotoUJServer"
          },
          {
            "invocationName":"FirstTranslationPL",
            "serviceId":"kyoto1.langrid:KyotoUJServer"
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

$obj = new MultihopBackTranslationConfigurator(json_decode($setting));

try {
    $cli2hopA = $obj->createClient('en', 'ko');
    print_r($cli2hopA->multihopBackTranslate(Language::get('en'), array(Language::get('ja')), Language::get('ko'), 'My name is Linda.'));
    print("<br>");

//    $cli2hopB = $obj->createClient('en', 'fr');
//    print_r($cli2hopB->multihopBackTranslate(Language::get('en'), array(Language::get('ja')), Language::get('fr'), 'My name is Linda.'));
//    print("<br>");

//    $cli3hop  = $obj->createClient('ja', 'fr');
//    print_r($cli3hop->multihopBackTranslate(Language::get('en'), array(Language::get('ja'), Language::get('ko')), Language::get('fr'), 'My name is Linda.'));
//    print("<br>");

    print("EOF");
} catch (Exception $e) {
    print_r($e);
}
