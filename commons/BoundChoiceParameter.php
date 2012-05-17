<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:26
 * To change this template use File | Settings | File Templates.
 */
class BoundChoiceParameter
{
    // String
    private $parameterId;
    // String
    private $choiceId;

    function __construct($parameterId, $choidId)
    {
        $this->setParameterId($parameterId);
        $this->setChoiceId($choidId);
    }

    public function setChoiceId($choiceId)
    {
        $this->choiceId = $choiceId;
    }

    public function getChoiceId()
    {
        return $this->choiceId;
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
