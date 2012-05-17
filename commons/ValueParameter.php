<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:37
 * To change this template use File | Settings | File Templates.
 */
class ValueParameter
{
    // String
    private $parameterId;
    // String
    private $type;
    // String
    private $min;
    // String
    private $max;

    function __construct($parameterId, $type, $min, $max)
    {
        $this->setParameterId($parameterId);
        $this->setType($type);
        $this->setMin($min);
        $this->setMax($max);
    }

    public function setMax($max)
    {
        $this->max = $max;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMin($min)
    {
        $this->min = $min;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setParameterId($parameterId)
    {
        $this->parameterId = $parameterId;
    }

    public function getParameterId()
    {
        return $this->parameterId;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

}
