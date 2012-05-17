<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/23
 * Time: 23:46
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../MorphologicalAnalysisClient.interface.php';

class MorphologicalAnalysisClientImpl extends ServiceClientImpl implements MorphologicalAnalysisClient
{
    public function analyze(Language $language, /*String*/ $text)
    {
        return $this->invoke(__FUNCTION__, array(
            'language' => $language,
            'text' => $text
        ));
    }
}
