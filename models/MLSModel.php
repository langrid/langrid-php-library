<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/25
 * Time: 13:34
 * To change this template use File | Settings | File Templates.
 */
class MLSModel extends ActiveRecord\Model
{
    static function truncate()
    {
        foreach(self::all() as $record){
            $record->delete();
        }
    }
}
