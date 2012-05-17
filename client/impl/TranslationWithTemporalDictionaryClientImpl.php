<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:35
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../TranslationWithTemporalDictionaryClient.interface.php';

class TranslationWithTemporalDictionaryClientImpl extends ServiceClientImpl implements TranslationWithTemporalDictionaryClient
{
    const TEMPORAL_DICT_TYPENAME = 'Translation';
    const TEMPORAL_DICT_NAMESPACE = 'http://langrid.nict.go.jp/ws_1_2/bilingualdictionary/';

    public function translate(Language $sourceLang,
                              Language $targetLang,
                              /*String*/ $source,
                              array /*<Translation>*/ $temporalDict,
                              Language $dictTargetLang)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            'source' => $source,
            'temporalDict' => $this->convertToSoapVar($temporalDict),
            'dictTargetLang' => $dictTargetLang
        ));
    }

    protected function convertToSoapVar(array $translations)
    {
        $result = array();
        foreach($translations as $trans) {
            $result[] = new SoapVar($trans, SOAP_ENC_OBJECT, self::TEMPORAL_DICT_TYPENAME, self::TEMPORAL_DICT_NAMESPACE);
        }
        return $result;
    }
}
