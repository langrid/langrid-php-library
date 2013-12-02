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

interface KeyphraseExtractionClient extends ServiceClient {

    /*
     * @param language: 言語
     * @param text: 文章
     * @return Array<Keyphrase> 特徴語抽出の結果
     */
    public function extract(Language $language, /*String*/ $text);

		/*
		 * @param 無し
		 * @return Array<Language> 対応言語
		 */
		public function getSupportedLanguages();
}

