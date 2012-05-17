<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../ServiceClient.interface.php';
require_once dirname(__FILE__) . '/../../commons/ServiceGridException.php';


abstract class ServiceClientImpl implements ServiceClient
{
    private $url;
    // String
    private $userId;
    // String
    private $password;
    // Array<BindingNode>
    private $treeBindings = array();
    // Array<String, String>
    private $httpHeaders = array();
    // String
    private $lastName;
    // String
    private $lastCopyright;
    // String
    private $lastLicense;
    // Array<CallNode>
    private $lastCallTree = array();

    private $proxyHost;
    private $proxyPort;

    function __construct($url)
    {
        $this->url = $url;
    }


    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getTreeBindings()
    {
        return $this->treeBindings;
    }

    public function getHttpHeaders()
    {
        return $this->httpHeaders;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getLastCopyrightInfo()
    {
        return $this->lastCopyright;
    }

    public function getLastLicenseInfo()
    {
        return $this->lastLicense;
    }

    public function getLastCallTree()
    {
        return $this->lastCallTree;
    }

    public function addBindings(BindingNode $node)
    {
        array_push($this->treeBindings, $node);
    }


    /*
     * @param method: 呼び出すメソッドの名前
     * @param arguments: パラメーター
     * @return Object 実行結果
     */
    protected function invoke($methodName, $arguments = array())
    {
        $stab = $this->createStab($this->url);
        if (!$stab) {
            throw ServiceGridException::create(
                'can not create stab :' . get_class($this),
                $this->url, $methodName, $arguments
            );
        }
        $this->_setUpSoapHeader($stab);
        $result = call_user_func_array(array($stab, $methodName), $arguments);
        $headers = $stab->getResponseHeadersAsArray();
        $this->lastName = @$headers[self::HTTPHEADER_SERVICE_NAME];
        $this->lastCopyright = @$headers[self::HTTPHEADER_SERVICE_COPYRIGHT];
        $this->lastLicense = @$headers[self::HTTPHEADER_SERVICE_LICENSE];

        if ($result instanceof SoapFault) {
            throw new LangridException($result->getMessage(), $this->url, $methodName, $arguments, $result);
        }

        return $result;
    }

    protected function  createStab($url)
    {
        $options = array(
            'login' => $this->userId,
            'password' => $this->password,
            'exceptions' => false,
            'trace' => true,
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
            'proxy_host' => $this->proxyHost,
            'proxy_port' => $this->proxyPort,
        );
        if (ClientFactory::getDefaultSoapOptions()) {
            $options = array_merge(ClientFactory::getDefaultSoapOptions(), $options);
        }

        return new Stab($url, $options);
    }

    protected function _setUpSoapHeader($stab)
    {
        $tvalue = json_encode($this->treeBindings);
        if (mb_strlen($tvalue) > 0) {
            $header = new SoapHeader('http://langrid.nict.go.jp/process/binding/tree', 'binding', $tvalue);
            $stab->__setSoapHeaders($header);
        }
    }

    // nkjm
    public function setProxy($proxyHost, $proxyPort)
    {
        $this->proxyHost = $proxyHost;
        $this->proxyPort = $proxyPort;
    }
}

class Stab extends SoapClient
{

    private $headerCache;

    function __construct($wsdl, $options = array())
    {
        parent::SoapClient($wsdl, $options);
    }

    public function getResponseHeadersAsArray()
    {
        if (!$this->headerCache) {
            $this->headerCache = array();
            foreach (explode(PHP_EOL, $this->__getLastResponseHeaders()) as $line) {
                $header = explode(':', $line);
                if (count($header) == 2) {
                    $this->headerCache[$header[0]] = $header[1];
                }
            }
        }
        return $this->headerCache;
    }

    public function getCallTree()
    {
        $soap = $this->__getLastResponse();
        $soap = str_replace(':', '_', $soap);

        $dom = new DOMDocument;
        $dom->loadXml($soap);
        $s = simplexml_import_dom($dom);

        $callTree = (string)$s->soapenv_Header->ns1_calltree;
        $callTree = json_decode(str_replace('_', ':', $callTree), false);
        return $callTree;
    }


}
