<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:19
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/Language.php';

class Gloss
{
    // String 概念の説明
    private $glossText;
    // Language glossTextの言語
    private $language;

    function __construct(/*String*/ $glossText, /*Language*/ $language)
    {
        $this->setGlossText($glossText);
        $this->setLanguage($language);
    }

    public function setGlossText($glossText)
    {
        $this->glossText = $glossText;
    }

    public function getGlossText()
    {
        return $this->glossText;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
