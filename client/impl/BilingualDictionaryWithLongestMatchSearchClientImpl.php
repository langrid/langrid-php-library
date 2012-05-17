<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 16:14
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/BilingualDictionaryClientImpl.php';
require_once dirname(__FILE__).'/../BilingualDictionaryWithLongestMatchSearchClient.interface.php';

class BilingualDictionaryWithLongestMatchSearchClientImpl extends BilingualDictionaryClientImpl implements BilingualDictionaryWithLongestMatchSearchClient
{
    const MORPHEME_TYPENAME = 'Morpheme';
    const MORPHEME_NAMESPACE = 'http://langrid.nict.go.jp/ws_1_2/morpheme/';

    public function searchLongestMatchingTerms(Language $headLang,
                                               Language $targetLang,
                                               array /*<Morpheme>*/ $morphemes)
    {
        return $this->invoke(__FUNCTION__, array(
            'headLang' => $headLang,
            'targetLang' => $targetLang,
            'morphemes' => $this->convertToSoapVar($morphemes)
        ));
    }

    protected function convertToSoapVar($morphemes)
    {
        $result = array();
        foreach($morphemes as $morpheme) {
            $result[] = new SoapVar($morpheme, SOAP_ENC_OBJECT, self::MORPHEME_TYPENAME, self::MORPHEME_NAMESPACE);
        }
        return $result;
    }
}
