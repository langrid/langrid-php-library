<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:22
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/MLSModel.php';

class DictionaryContent extends MLSModel
{
    static $belongs_to = array(
        array('dictionary_record')
    );

    static $validates_presence_of = array(
        array('dictionary_record_id'), array('language'), array('text')
    );

    //  can't use uniquness. because validation error occured on update too. I except that it should check only on create.
//    static $validates_uniqueness_of = array(
//        array('dictionary_record_id', 'language')
//    );

    static protected function get_resource_name(){
        $underscorecase = ActiveRecord\Inflector::instance()->uncamelize(get_called_class());
        return str_replace('_content', '', $underscorecase);
    }

    public function validate() {

        $content = self::first(array(
            'conditions' => array(self::get_resource_name().'_record_id' => $this->read_attribute(self::get_resource_name().'_record_id'), 'language' => $this->language)
        ));

        if($this->is_new_record() && $content) {
            $this->errors->add('language', 'already exists "'.$this->language.'"');
        }
    }

    /*
     * $resource_id: target dictionary(parallel text) id
     */
    public static function find_all_by_resource_id($resource_id) {
        $resource_name = self::get_resource_name();
        return self::all(array(
            'joins' => "LEFT JOIN {$resource_name}_records r ON {$resource_name}_record_id = r.id",
            'conditions' => "r.{$resource_name}_id =".intval($resource_id)
        ));
    }

    /*
    * $resource_id: target dictionary(parallel text) id
    */
    public static function delete_all_by_resource_id_and_language($resource_id, Language $language) {
        $resource_name = self::get_resource_name();
        return self::delete_all(array(
            'conditions' => "{$resource_name}_contents.language = '".$language->getTag()."' AND EXISTS(SELECT * FROM {$resource_name}_records WHERE {$resource_name}_id = {$resource_id} AND id={$resource_name}_record_id)"
        ));
    }
}
