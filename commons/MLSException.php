<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/26
 * Time: 17:26
 * To change this template use File | Settings | File Templates.
 */
class MLSException extends Exception
{
    static function create($message, $cause = null, $options = array()) {
        throw new MLSException($message, 0, $cause);
    }
}
