<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nkjm
 * Date: 12/04/02
 * Time: 18:20
 * To change this template use File | Settings | File Templates.
 */

class Document
{

    private $data;
    private $mimeType;
    private $fileName;

    function __construct( /* a doc(docx) binary file rpresented as string*/
        $data, /*string*/
        $fileName,
        $mimeType/*file name*/)
    {
        $this->data = $data;
        $this->fileName = $fileName;
        $this->mimeType = $mimeType;
    }


    public function getData()
    {
        return $this->data;
    }


    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function getDirName()
    {
        $fileInfo = pathinfo($this->fileName);
        return $fileInfo['dirname'];
    }

    public function getBaseName()
    {
        $fileInfo = pathinfo($this->fileName);
        return $fileInfo['basename'];
    }

    public function getExtension()
    {
        $fileInfo = pathinfo($this->fileName);
        return $fileInfo['extension'];
    }

}
