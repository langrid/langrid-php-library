<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 16:27
 * To change this template use File | Settings | File Templates.
 */
class LanguagePair
{
    // String
    private $first;
    // String
    private $second;

    function __construct($first = '', $second = '') {
        $this->first = $first;
        $this->second = $second;
    }

    public function setFirst($first)
    {
        $this->first = $first;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function setSecond($second)
    {
        $this->second = $second;
    }

    public function getSecond()
    {
        return $this->second;
    }
}
