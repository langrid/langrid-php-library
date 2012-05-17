<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nkjm
 * Date: 12/04/02
 * Time: 16:56
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__) . '/../test_settings.php';
require_once dirname(__FILE__) . '/../../commons/Document.php';
require_once dirname(__FILE__) . '/../../commons/DocumentFactory.php';

class DocumentTranslationTest extends PHPUnit_Framework_TestCase
{
    private $client;
    private $doc;

    protected function setUp()
    {
        parent::setUp();
        $this->doc = DocumentFactory::createDocument(dirname(__FILE__) . '/../test.doc', 'test.doc', DocumentFactory::detectMimeType('test.doc'));
        $this->client = ClientFactory::createDocumentTranslationClient(SERVICE_GRID_BASE_URL .
            'WordTranslationWithTemporalDictionary');
        $this->setUpBindings();
    }

    function testStartAndGetResult()
    {
        try {
            $sourceLang = Language::get('en');
            $targetLang = Language::get('ja');

            $token = $this->client->start($sourceLang, $targetLang, $this->doc);
            $this->assertEquals(40, strlen($token));


            while (!$this->client->isFinished($token)) {
                printf("Current Progress = %f \n", $this->client->getProgress($token));
            }
            $result = $this->client->getResult($token);
            $this->writeResult($result, $sourceLang, $targetLang, $this->doc->getDirName());


        } catch (Exception $e) {
            $this->assertTrue(false, "unexpected exception occurred:" . $e->getMessage());
        }

    }

    private function writeResult($result, $sourceLang, $targetLang, $outDir)
    {
        $outFile = $outDir . '/' . date('Ymd-his', time()) . '_' .
            $sourceLang . '2' . $targetLang . '.' . $this->doc->getExtension();
        error_log("outfile="+$outFile);
        print("outfile="+$outFile);
        echo($outFile);
        var_dump($result);

        if ($result->finished) {
            $fp = fopen($outFile, 'w');
            fwrite($fp, $result->data->data);
            fclose($fp);
        }
    }


    // AsyncTranslationWithTemporalDictionary
    //     TranslationWithTemporalDictionary
    //          TranslationPL
    //          MorphologicalAnalysis
    //          BilingualDictionary
    //                 BilingualDictionaryPL1
    //                 BilingualDictionaryPL2
    //          (TemporalDictionary)

    private function setUpBindings()
    {
        $BilingualDict = new BindingNode("BilingualDictionaryPL",
            "BilingualDictionaryWithLongestMatchCrossSearch");
        $BilingualDict->addChild(new BindingNode("BilingualDictionaryPL1", "NaturalDisasterDb"));
        $BilingualDict->addChild(new BindingNode("BilingualDictionaryPL2", "KyotoTourismDictionaryDb"));

        $TranslationComb = new BindingNode("TranslationWithTemporalDictionaryPL",
            "TranslationCombinedWithBilingualDictionaryWithLongestMatchSearch");

        $TranslationComb->addChild(new BindingNode("TranslationPL", "GoogleTranslate"));
        $TranslationComb->addChild(new BindingNode("MorphologicalAnalysisPL", "TreeTagger"));
        $TranslationComb->addChild($BilingualDict);

        $AsyncTrans = new BindingNode("AsyncTranslationWithTemporalDictionaryPL", "AsyncTranslationCombinedWithTemporalDictionary");
        $AsyncTrans->addChild($TranslationComb);
        $this->client->addBindings($AsyncTrans);
    }


}
