<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/21
 * Time: 16:19
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../DependencyParserClient.interface.php';

class DependencyParserClientImpl extends ServiceClientImpl implements DependencyParserClient
{
    public function parseDependency(Language $language, /*String*/ $sentence)
    {
        return $this->invoke(__FUNCTION__, array(
            'language' => $language,
            'sentence' => $sentence
        ));
    }
}
