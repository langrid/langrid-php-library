<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:29
 * To change this template use File | Settings | File Templates.
 */
class BoundValueParameter
{
    // String パラメーターID
    private $parameterId;
    // String パラメーターの値
    private $value;

    function __construct($parameterId, $value)
    {
        $this->setParameterId($parameterId);
        $this->setValue($value);
    }

    public function setParameterId($parameterId)
    {
        $this->parameterId = $parameterId;
    }

    public function getParameterId()
    {
        return $this->parameterId;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }


}
