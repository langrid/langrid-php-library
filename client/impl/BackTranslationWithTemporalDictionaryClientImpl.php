<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 15:40
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../BackTranslationWithTemporalDictionaryClient.interface.php';

class BackTranslationWithTemporalDictionaryClientImpl extends ServiceClientImpl implements BackTranslationWithTemporalDictionaryClient
{
    const TEMPORAL_DICT_TYPENAME = 'Translation';
    const TEMPORAL_DICT_NAMESPACE = 'http://langrid.nict.go.jp/ws_1_2/bilingualdictionary/';

    public function backTranslate(Language $sourceLang,
                                  Language $intermediateLang,
                                  $source,
                                  array /*<Translation>*/ $temporalDict,
                                  Language $dictTargetLang)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'intermediateLang' => $intermediateLang,
            'source' => $source,
            'temporalDict' => $this->convertToSoapVar($temporalDict),
            'dictTargetLang' => $dictTargetLang
        ));
    }

    protected function convertToSoapVar($temporalDict)
    {
        $result = array();
        foreach($temporalDict as $translation) {
            $result[] = new SoapVar($translation, SOAP_ENC_OBJECT, self::TEMPORAL_DICT_TYPENAME, self::TEMPORAL_DICT_NAMESPACE);
        }
        return $result;
    }
}
