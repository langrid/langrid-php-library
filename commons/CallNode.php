<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 15:15
 * To change this template use File | Settings | File Templates.
 */
class CallNode
{
    // String
    private $invocationName;
    // String
    private $serviceId;
    // String
    private $serviceName;
    // String
    private $serviceCopyright;
    // String
    private $serviceLicense;
    // long
    private $responseTimeMillis;
    // String
    private $faultCode;
    // String
    private $faultString;
    // Array<CallNode>
    private $children = array();

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setFaultCode($faultCode)
    {
        $this->faultCode = $faultCode;
    }

    public function getFaultCode()
    {
        return $this->faultCode;
    }

    public function setFaultString($faultString)
    {
        $this->faultString = $faultString;
    }

    public function getFaultString()
    {
        return $this->faultString;
    }

    public function setInvocationName($invocationName)
    {
        $this->invocationName = $invocationName;
    }

    public function getInvocationName()
    {
        return $this->invocationName;
    }

    public function setResponseTimeMillis($responseTimeMillis)
    {
        $this->responseTimeMillis = $responseTimeMillis;
    }

    public function getResponseTimeMillis()
    {
        return $this->responseTimeMillis;
    }

    public function setServiceCopyright($serviceCopyright)
    {
        $this->serviceCopyright = $serviceCopyright;
    }

    public function getServiceCopyright()
    {
        return $this->serviceCopyright;
    }

    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function setServiceLicense($serviceLicense)
    {
        $this->serviceLicense = $serviceLicense;
    }

    public function getServiceLicense()
    {
        return $this->serviceLicense;
    }

    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function getServiceName()
    {
        return $this->serviceName;
    }
}
