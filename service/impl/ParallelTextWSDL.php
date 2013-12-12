<?php

class ParallelTextWSDL
{

    private $endpointUrl;
    private $targetNamespace;
    private $dictionaryName;

    public function __construct($endpointURL, $dictionaryName, $targetNamespace)
    {

        $this->endpointUrl = $endpointURL;
        $this->targetNamespace = $targetNamespace;
        $this->serviceId = $dictionaryName;

    }

    public function getWSDL()
    {
        error_log("DEBUG: " . $this->endpointUrl);
        try {
            $templatePath = dirname(__FILE__) . '/templates/ParallelText.xml.template';
            if (!file_exists($templatePath)) {
                throw new Exception('process failed..');
            }
            $template = file_get_contents($templatePath);
            $targetNamespace = $this->targetNamespace . urlencode($this->serviceId);
            $endpointUrl = $this->endpointUrl . '?serviceId='
                . urlencode($this->serviceId);
            $temp = $template;
            $temp = preg_replace('/\$\{targetNamespace\}/', $targetNamespace, $temp);
            $temp = preg_replace('/\$\{serviceName\}/', urlencode($this->serviceId), $temp);
            $wsdl = preg_replace('/\$\{endpointUrl\}/', $endpointUrl, $temp);
            header("Content-Type: text/xml; charset=UTF-8");
            header('Content-Disposition: inline; filename="' . $this->serviceId . '"');
            echo $wsdl;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}