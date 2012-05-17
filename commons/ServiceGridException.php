<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 20:32
 * To change this template use File | Settings | File Templates.
 */
class ServiceGridException extends Exception
{
    private $serviceUrl;
    private $methodName;
    private $parameters;

    public function __construct($message, $code, $previous, $serviceUrl, $methodName = '', $parameters = array())
    {
        parent::__construct($message, $code, $previous);
        $this->serviceUrl = $serviceUrl;
        $this->methodName = $methodName;
        $this->paramters = $parameters;
    }

    public static function create($message, $serviceUrl, $methodName, $parameters = array(), $cause = null){
        return new ServiceGridException($message, 0, $cause, $serviceUrl, $methodName, $parameters);
    }
}
