<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/05
 * Time: 1:00
 * To change this template use File | Settings | File Templates.
 */
class FileUtil
{

    static function readBase64EncodedData($filePath)
    {
        $handle = fopen($filePath, "rb");
        $contents = fread($handle, filesize($filePath));
        fclose($handle);
        return base64_encode($contents);
    }
}
