<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:24
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../TemplateParallelTextClient.interface.php';

class TemplateParallelTextClientImpl extends ServiceClientImpl implements TemplateParallelTextClient
{
    public function listTemplateCategories(Language $language)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language
        ));
    }

    public function getCategoryNames(/*String*/ $categoryId, array /*<Language>*/ $languages)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'categoryId' => $categoryId,
            'languages' => $languages
        ));
    }

    public function searchTemplates(Language $language,
                                    /*String*/ $text,
                                    /*MatchingMethod*/ $matchingMethod,
                                    array /*<String>*/ $categoryIds)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'text' => $text,
            'matchingMethod' => $matchingMethod,
            'categoryIds' => $categoryIds
        ));
    }

    public function getTemplatesByTemplateId(Language $language,
                                             array /*<String>*/ $templateIds)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'templateIds' => $templateIds
        ));
    }

    public function generateSentence(Language $language,
                                     /*String*/ $templateId,
                                     array /*<BoundChoiceParameter>*/ $boundChoiceParameters,
                                     array /*<BoundValueParameter>*/ $boundValueParameters)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'templateId' => $templateId,
            'boundChoiceParameters' => $boundChoiceParameters,
            'boundValueParameters' => $boundValueParameters
        ));
    }
}
