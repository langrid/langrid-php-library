<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:34
 * To change this template use File | Settings | File Templates.
 */
class Choice
{
    // String
    private $choiceId;
    // String
    private $value;

    function __construct($choiceId, $value)
    {
        $this->setChoiceId($choiceId);
        $this->setValue($value);
    }

    public function setChoiceId($choiceId)
    {
        $this->choiceId = $choiceId;
    }

    public function getChoiceId()
    {
        return $this->choiceId;
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
