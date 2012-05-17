<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/07
 * Time: 17:06
 * To change this template use File | Settings | File Templates.
 */
class ResponseRenderer
{
    static function render($response){
        echo json_encode($response);
    }
}
