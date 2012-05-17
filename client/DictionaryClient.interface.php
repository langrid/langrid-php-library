<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClient.interface.php';
require_once dirname(__FILE__).'/../commons/Language.php';
require_once dirname(__FILE__).'/../commons/PartOfSpeech.php';
require_once dirname(__FILE__).'/../commons/DictMatchingMethod.php';

interface DictionaryClient extends ServiceClient {

    /*
     * @param headLang: 見出し表記の言語
     * @param lemmaLang: 読みの言語
     * @param headword: 見出し・表記 (文字列)
     * @param reading: 見出し・よみ
     * @param partOfSpeech: 品詞
     * @param DictMatchingMethod: 検索の際に使う方法
     * @return Array<URI> 条件にマッチする概念ノード情報の配列
     */
    public function searchLemmaNodes(Language $headLang,
                                     Language $lemmaLang,
                                     String $headword,
                                     String $reading,
                                     PartOfSpeech $partOfSpeech,
                                     DictMatchingMethod $matchingMethod);


    /*
     * @param lemmaId: LemmaノードId
     * @return LemmaNode 条件にマッチするLemmaノード
     */
    public function getLemma(String $lemmaId);

    /*
     * @param conceptId: 概念ノードID
     * @return CenceptNode 条件にマッチする概念ノード
     */
    public function getConcept(String $conceptId);
}

class LemmaNode
{
    // String nodeID
    private $nodeId;
    // String 言語
    private $language;
    // String 見出し。表記
    private $headWord;
    // String 見出し。読み
    private $pronunciation;
    // String 品詞
    private $partOfSpeech;
    // String 分野名。国語辞書での[コンピュータ]等の分野指定に対応
    private $domain;
    // Array<String> 語義番号と概念ノードIDの配列((1 C1Je1))...
    private $conceptNodes;
    // Array<String> 関係名とノードID(lemma、concept)の配列((関係名 ノードID))...
    private $relations;
}
