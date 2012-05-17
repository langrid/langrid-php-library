<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:21
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../SimilarityCalculationClient.interface.php';

class SimilarityCalculationClientImpl extends ServiceClientImpl implements SimilarityCalculationClient
{
    public function calculate(Language $language, /*String*/ $text1, /*String*/ $text2)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'language' => $language,
            'text1' => $text1,
            'text2' => $text2
        ));
    }
}
