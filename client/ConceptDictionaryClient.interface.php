<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:07
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/MatchingMethod.php';
require_once dirname(__FILE__).'/../commons/ConceptualRelation.php';

interface ConceptDictionaryClient extends ServiceClient {

    /*
     * @param language: 概念を表す言語
     * @param conceptId: 概念のID
     * @param relation: 概念間の関係
     * @return Array<Concept> 概念IDと言語のペアで表された概念と特定の関係で関連付けられる概念の配列
     */
    public function getRelatedConcepts(Language $language,
                                       /*String*/ $conceptId,
                                       /*String<ConceptualRelation>*/ $relation);

    /*
     * @param language: 概念見出し語の言語
     * @param word: 概念見出し語
     * @param matchingMethod: 検索方法
     * @return Array<Concept> 概念見出し語で表される概念の配列
     */
    public function searchConcepts(Language $language,
                                   /*String*/ $word,
                                   /*String<MatchingMethod>*/ $matchingMethod);
}