<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__) . '/../test_settings.php';

class TemplateParallelTextClientTest extends PHPUnit_Framework_TestCase
{
    private $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = ClientFactory::createTemplateParallelTextClient(SERVICE_GRID_BASE_URL.'kyotou.langrid:Kanagawa-PrefectureSchoolEntranceTemplateParallelText');
    }

    public function testListTemplateCategories()
    {
        try {
            $result = $this->client->listTemplateCategories(Language::get('ja'));
            $this->assertTrue(count($result) > 0);
            $this->assertTrue($result[0]->categoryId == 1);
            $this->assertEquals($result[0]->categoryName, 'default');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testGetCategoryNames()
    {
        try {
            $result = $this->client->getCategoryNames(1, array(Language::get('ja'), Language::get('en'), Language::get('ko')));
            $this->assertTrue(count($result) == 3);
            $this->assertTrue($result[0] == 'default');
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testSearchTemplates()
    {
        try {
            $result = $this->client->searchTemplates(Language::get('en'), 'test', MatchingMethod::PARTIAL, array(1));
            $this->assertTrue(count($result) > 0);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testGetTemplatesByTemplateId()
    {
        try {
            $ids = range(1,5);
            $result = $this->client->getTemplatesByTemplateId(Language::get('en'), $ids);
            $this->assertTrue($result > 0);
            $this->assertTrue(count($result[0]->categories) > 0);
            $this->assertTrue(in_array($result[0]->templateId, $ids));
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testGenerateSentence()
    {
        try {
            $result = $this->client->generateSentence(Language::get('en'), 1, array(), array());
            $this->assertTrue(strlen($result) > 0);
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }

    public function testHowToUse()
    {
        try {
            $ids = range(1,300);
            $templates = $this->client->getTemplatesByTemplateId(Language::get('ja'), $ids);
            foreach($templates as $template)
            {
                if(count($template->choiceParameters) > 0) {
                    $choiceParameter = array(
                        new BoundChoiceParameter($template->choiceParameters[0]->parameterId,
                                                 $template->choiceParameters[0]->choices[0]->choiceId)
                    );
                    $result = $this->client->generateSentence(Language::get('ja'),
                                                              $template->templateId,
                                                              array($choiceParameter),
                                                              array());
                    echo $result;
                }
                if(count($template->valueParameters) > 0) {
                    $valueParameter = array(
                        new BoundValueParameter($template->valueParameters[0]->parameterId, 'hogehoge')
                    );
                    $result = $this->client->generateSentence(Language::get('ja'), $template->templateId, array(), array($valueParameter));
                    echo $result;
                }
            }
        } catch(Exception $e) {
            $this->assertFalse(true, 'uncaught exception occurred: '.$e->getMessage());
            echo $e->getTraceAsString();
        }
    }
}
