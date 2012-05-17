<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:06
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';

interface TemplateParallelTextClient extends ServiceClient {

    /*
     * @param language 取得する言語
     * @return Array<Category> カテゴリ一覧
     */
    public function listTemplateCategories(Language $language);

    /*
     * @param categoryId: カテゴリID
     * @param language: 取得する言語
     * @return Array<String> カテゴリ名
     */
    public function getCategoryNames(/*String*/ $categoryId, array/*<Language>*/ $languages);

    /*
     * @param language
     * @param text
     * @param matchingMethod
     * @param categoryId
     * @return Array<Template> テンプレート
     */
    public function searchTemplates(Language $language,
                                    /*String*/ $text,
                                    /*MatchingMethod*/ $matchingMethod,
                                    array/*<String>*/ $categoryIds);

    /*
     * @param language: 言語
     * @param templateIds: 取得するテンプレートのID
     * @return Array<Template> テンプレートの配列
     */
    public function getTemplatesByTemplateId(Language $language,
                                             array/*<String>*/ $templateIds);

    /*
     * @param language: 言語
     * @param templateId: テンプレートID
     * @param boundChoiceParameters: 選択パラメータ指定
     * @param boundValueParameters: 値パラメータ指定
     * @return String 文章
     */
    public function generateSentence(Language $language,
                                     /*String*/ $templateId,
                                     array/*<BoundChoiceParameter>*/ $boundChoiceParameters,
                                     array/*<BoundValueParameter>*/ $boundValueParameters);
}