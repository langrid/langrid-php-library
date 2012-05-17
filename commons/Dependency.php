<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:33
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/DependencyLabel.php';

class Dependency
{
    // DependencyLabel 係りのラベル
    private $label;
    // String 係り先の文節ID
    private $headChunkId;

    function __construct($label = DependencyLabel::APPOSITION, $headChunkId = '')
    {
        $this->setLabel($label);
        $this->setHeadChunkId($headChunkId);
    }

    public function setHeadChunkId($headChunkId)
    {
        $this->headChunkId = $headChunkId;
    }

    public function getHeadChunkId()
    {
        return $this->headChunkId;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }


}
