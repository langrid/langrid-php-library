<?php

interface TranslationConfigurator  {
    /**
     * Creates translation service client that matches specified language pairs.
     * @param $from source language of text
     * @param $to target language for translation
     * @return Service client. It would be Translation[...]Client
     * or BackTranslation[...]Client.
     */
    public function createClient($from, $to);
}