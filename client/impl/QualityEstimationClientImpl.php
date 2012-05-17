<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/24
 * Time: 0:19
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../QualityEstimationClient.interface.php';

class QualityEstimationClientImpl extends ServiceClientImpl implements QualityEstimationClient
{
    public function estimate(Language $sourceLang,
                             Language $targetLang,
                             /*String*/ $source,
                             /*String*/ $target)
    {
        return $this->invoke(__FUNCTION__ ,array(
            'sourceLang' => $sourceLang,
            'targetLang' => $targetLang,
            'source' => $source,
            'target' => $target
        ));
    }
}
