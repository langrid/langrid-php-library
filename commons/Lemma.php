<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/Language.php';

class Lemma
{
    // String 概念見出し語
    private $lemmaForm;
    // Language 概念見出し語の言語
    private $language;

    function __construct($lemmaForm = '', $language = null)
    {
        $this->setLemmaForm($lemmaForm);
        $this->setLanguage($language);
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLemmaForm($lemmaForm)
    {
        $this->lemmaForm = $lemmaForm;
    }

    public function getLemmaForm()
    {
        return $this->lemmaForm;
    }
}
