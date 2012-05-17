<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 18:28
 * To change this template use File | Settings | File Templates.
 */
class Category
{
    // String カテゴリID
    private $categoryId;
    // String カテゴリ名
    private $categoryName;

    function __construct($categoryId = '', $categoryName = '')
    {
        $this->setCategoryId($categoryId);
        $this->setCategoryName($categoryName);
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    public function getCategoryName()
    {
        return $this->categoryName;
    }

}
