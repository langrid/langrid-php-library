<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 16:16
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../ConceptDictionaryClient.interface.php';

class ConceptDictionaryClientImpl extends ServiceClientImpl implements ConceptDictionaryClient
{
    public function getRelatedConcepts(Language $language,
                                       /*String*/ $conceptId,
                                       /*String<ConceptualRelation>*/ $relation)
    {
        return $this->invoke(__FUNCTION__, array(
            'language' => $language,
            'conceptId' => $conceptId,
            'relation' => $relation
        ));
    }

    public function searchConcepts(Language $language,
                                   /*String*/ $word,
                                   /*String<MatchingMethod>*/ $matchingMethod)
    {
        return $this->invoke(__FUNCTION__, array(
            'language' => $language,
            'word' => $word,
            'matchingMethod' => $matchingMethod
        ));
    }
}
