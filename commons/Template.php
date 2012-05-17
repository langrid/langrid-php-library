<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/16
 * Time: 23:31
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ChoiceParameter.php';
require_once dirname(__FILE__).'/ValueParameter.php';
require_once dirname(__FILE__).'/Category.php';

class Template
{
    // String
    private $templateId;
    // String
    private $template;
    // Array<ChoiceParameter>
    private $choiceParameters;
    // Array<ValueParameter>
    private $valueParameters;
    // Array<Category>
    private $categories;

    function __construct($templateId, $template, $choiceParameters, $valueParameters, $categories)
    {
        $this->setTemplateId($templateId);
        $this->setTemplate($template);
        $this->setChoiceParameters($choiceParameters);
        $this->setValueParameters($valueParameters);
        $this->setCategories($categories);
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setChoiceParameters($choiceParameters)
    {
        $this->choiceParameters = $choiceParameters;
    }

    public function getChoiceParameters()
    {
        return $this->choiceParameters;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    public function getTemplateId()
    {
        return $this->templateId;
    }

    public function setValueParameters($valueParameters)
    {
        $this->valueParameters = $valueParameters;
    }

    public function getValueParameters()
    {
        return $this->valueParameters;
    }

}
