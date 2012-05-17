<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/16
 * Time: 16:32
 * To change this template use File | Settings | File Templates.
 */
class LangridException extends Exception
{
    private $serviceUrl;
    private $operationName;
    private $operationParameters;

    function __construct(/*string*/$message, /*string*/$serviceUrl, /*string*/$operationName, array/*<string>*/$operationParameters, $cause = null)
    {
        parent::__construct($message, $cause->code, $cause);
        $this->serviceUrl = $serviceUrl;
        $this->operationName = $operationName;
        $this->operationParameters = $operationParameters;
    }

    public function setOperationName($operationName)
    {
        $this->operationName = $operationName;
    }

    public function getOperationName()
    {
        return $this->operationName;
    }

    public function setOperationParameters($operationParameters)
    {
        $this->operationParameters = $operationParameters;
    }

    public function getOperationParameters()
    {
        return $this->operationParameters;
    }

    public function setServiceUrl($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    public function getServiceUrl()
    {
        return $this->serviceUrl;
    }


}
