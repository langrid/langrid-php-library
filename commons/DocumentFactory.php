<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nkjm
 * Date: 12/04/02
 * Time: 16:56
 * To change this template use File | Settings | File Templates.
 */

class DocumentFactory
{

    /**
     * @static
     * @param $filePath: file path to a doc (or docx) binary file.
     * @param $mimeType
     * @return \Document
     */
    public static function createDocument($filePath, $fileName, $mimeType)
    {
        return new Document(file_get_contents($filePath), $fileName, $mimeType);
    }

    public static function detectMimeType($fileName)
    {
        $finfo = pathinfo($fileName);
        $ext = $finfo['extension'];
        if ($ext == "doc") {
            return "application/msword";
        } elseif ($ext == "docx") {
            return "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
        } else {
            // error
            error_log("this file is not a word file.");
            return null;
        }
    }

}