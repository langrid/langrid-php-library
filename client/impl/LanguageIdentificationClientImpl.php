<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 18:00
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../LanguageIdentificationClient.interface.php';

class LanguageIdentificationClientImpl extends ServiceClientImpl implements LanguageIdentificationClient
{
    const BYTE_TYPENAME = 'byte';
    const BYTE_NAMESPACE = 'http://langrid.nict.go.jp/ws_1_2/byte/';

    public function identifyLanguageAndEncoding(/*String*/ $textBytes)
    {
        return $this->invoke(__FUNCTION__, array(
            'textBytes' => base64_encode($textBytes)
        ));
    }

    public function identify(/*String*/ $text, /*String*/ $originalEncoding)
    {
        return $this->invoke(__FUNCTION__, array(
            'text' => $text,
            'originalEncoding' => $originalEncoding
        ));
    }

    public function getSupportedLanguages()
    {
        return $this->invoke(__FUNCTION__);
    }

    public function getSupportedEncodings()
    {
        return $this->invoke(__FUNCTION__);
    }

    protected function convertToSoapVar($string)
    {
        $result = array();
        for($i = 0; $i < mb_strlen($string); $i++) {
            $result[] = new SoapVar($string[$i], SOAP_ENC_OBJECT, self::BYTE_TYPENAME, self::BYTE_NAMESPACE);
        }
        return $result;
    }
}
