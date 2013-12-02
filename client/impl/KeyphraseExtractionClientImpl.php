<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/23
 * Time: 23:46
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__).'/ServiceClientImpl.php';
require_once dirname(__FILE__).'/../KeyphraseExtractionClient.interface.php';

class KeyphraseExtractionClientImpl extends ServiceClientImpl implements KeyphraseExtractionClient
{
    public function extract(Language $language, /*String*/ $text)
    {
        return $this->invoke(__FUNCTION__, array(
            'language' => $language,
            'text' => $text
        ));
    }

		public function getSupportedLanguages()
		{
			return $this->invoke(__FUNCTION__);
		}
}
