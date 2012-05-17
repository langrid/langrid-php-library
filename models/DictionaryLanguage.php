<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/26
 * Time: 10:24
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/MLSModel.php';

class DictionaryLanguage extends MLSModel
{
    static $belongs_to = array(
        array('dictionary')
    );

    static $validates_presence_of = array(
        array('language')
    );

    static protected function get_resource_name(){
        $underscorecase = ActiveRecord\Inflector::instance()->uncamelize(get_called_class());
        return str_replace('_language', '', $underscorecase);
    }

    public function validate() {
        $language = self::first(array(
            'conditions' => array(self::get_resource_name().'_id' => $this->read_attribute(self::get_resource_name().'_id'), 'language' => $this->language)
        ));
        if($this->is_new_record() && $language) {
            $this->errors->add('language', 'already exists "'.$this->language.'"');
        }
    }

    public function __toString() {
        return $this->language;
    }
}
