<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:33
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/Choice.php';

class ChoiceParameter
{
    // String
    private $parameterId;
    // Array<Choice>
    private $choices;

    function __construct($parameterId, $choices)
    {
        $this->setParameterId($parameterId);
        $this->setChoices($choices);
    }

    public function setChoices($choices)
    {
        $this->choices = $choices;
    }

    public function getChoices()
    {
        return $this->choices;
    }

    public function setParameterId($parameterId)
    {
        $this->parameterId = $parameterId;
    }

    public function getParameterId()
    {
        return $this->parameterId;
    }
}
