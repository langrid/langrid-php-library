<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 17:02
 * To change this template use File | Settings | File Templates.
 */
class BindingNode
{
    // String サービス呼び出しの名前
    public  $invocationName;

    // String  置き換えるサービスのグリッドID
    private $gridId;

    // String 置き換えるサービスID
    public $serviceId;

    // Array<BindingNode> 子要素の配列
    public $children;

    function __construct($invocationName, $serviceId, $gridId = null)
    {
        $this->setInvocationName($invocationName);
        $this->setServiceId($serviceId);
        $this->setGridId($gridId);
        $this->children = array();
    }

    public function setGridId($gridId)
    {
        $this->gridId = $gridId;
    }

    public function getGridId()
    {
        return $this->gridId;
    }

    public function setInvocationName($invocationName)
    {
        $this->invocationName = $invocationName;
    }

    public function getInvocationName()
    {
        return $this->invocationName;
    }

    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function addChild(BindingNode $child)
    {
        array_push($this->children, $child);
    }

    public function setChildren(/*Array<BindingNode>*/ $children)
    {
        $this->children = $children;
    }

    /*
     * @return Array<BindingNode> 子要素の配列
     */
    public function getChildren()
    {
        return $this->children;
    }
}
