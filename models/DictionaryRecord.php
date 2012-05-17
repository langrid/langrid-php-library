<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:22
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/MLSModel.php';

class DictionaryRecord extends MLSModel
{
	static $belongs_to = array(
		array('dictionary')
	);

    static $has_many = array(
        array('dictionary_contents')
    );

    static $validates_presence_of = array(
        array('dictionary_id')
    );

    static $alias_attribute = array('contents' => 'dictionary_contents');

    static $after_destroy = array('delete_all_contents');

    static protected function get_resource_name(){
        $underscorecase = ActiveRecord\Inflector::instance()->uncamelize(get_called_class());
        return str_replace('_record', '', $underscorecase);
    }

    public function remove() {
        return $this->delete();
    }

    public function get_contents($withAllProperty = false) {
        $result = array();
        foreach($this->read_attribute('contents') as $content) {
            if($withAllProperty) {
                $result[$content->language] = array(
                    'text' => $content->text,
                    'created_at' => $content->created_at,
                    'updated_at' => $content->updated_at,
                    'created_by' => $content->created_by,
                    'updated_by' => $content->updated_by,
                );
            } else {
                $result[$content->language] = $content->text;
            }
        }
        return $result;
    }

    public function get_contents_as_ordered_array(array $languageOrder){
        $contents = $this->get_contents();

        return array_map(function($lang) use ($contents){
            return @$contents[$lang];
        }, $languageOrder);
    }

    /*
     * $params: {language => value}
     * [example] update_contents(array('ja' => '京都', 'en' => 'Kyoto'), '1');
     */
    public function update_contents(array $params = array(), $update_user = ''){
        $contents = $this->get_contents_as_hash();

        foreach($params as $language => $text) {
            $parameter = array('language' => $language, 'text' => $text);

            if(@$contents[$language]) {
                if($update_user) $parameter['updated_by'] = $update_user;
                $contents[$language]->update_attributes($parameter);
            } else {
                if($update_user) {
                    $parameter = array_merge($parameter, array(
                        'created_by' => $update_user, 'updated_by' => $update_user)
                    );
                }

                call_user_func(array($this, 'create_'.self::get_resource_name().'_contents'), $parameter);
            }
        }

        return $this;
    }

    private function get_contents_as_hash(){
        $result = array();
        foreach($this->read_attribute('contents') as $content) {
            $result[$content->language] = $content;
        }
        return $result;
    }

    public function delete_all_contents() {
        $className = str_replace('Record', '', get_called_class());
        call_user_func( $className.'Content::delete_all', array(
            'conditions' => array(self::get_resource_name().'_record_id' => $this->read_attribute('id'))
        ));
    }

    /*
     * $resource_id: target dictionary(parallel text) id
     */
    static function count_by_resource_id_and_language($resource_id, Language $languageCode){
        $counts = self::count_by_resource_id_each_languages($resource_id);
        return @$counts[$languageCode.''];
    }

    /*
     * $resource_id: target dictionary(parallel text) id
     */
    static function count_by_resource_id_each_languages($resource_id){
        $records = self::all(array(
            'select' => 'count(*) as count, language',
            'joins' => array(self::get_resource_name().'_contents'),
            'conditions' => array(self::get_resource_name().'_id' => $resource_id),
            'group' => 'language'
        ));

        $intermediate = array_map(function($record){ return $record->attributes(); }, $records);

        $result = array();
        foreach($intermediate as $e) {
            $result[$e['language']] = intval($e['count']);
        }
        return $result;
    }

    /*
     * $resource_id: target dictionary(parallel text) id
     * $params: {language => value}
     * $create_user: create user
     *
     * [example] create_record(1, array('ja' => '京都', 'en' => 'Kyoto'), '1');
     */
    static function create_record($resource_id, array $params = array(), $create_user = '') {
        $record = self::create(array(self::get_resource_name().'_id' => $resource_id));

        if($record->is_invalid()) MLSException::create('validate error');

        $record->update_contents($params, $create_user);

        return $record;
    }

//    protected static function add_args_dictionary_id($dictionary_id, $options) {
//        $conditions = @$options['conditions'];
//        if($conditions) {
//            if(is_string($conditions)) {
//                $conditions .= ' AND dictioanry_id = '.intval($dictionary_id);
//            } else if(is_array($conditions)) {
//                $conditions = array('dictioanry_id' => $dictionary_id);
//            }
//            $options['conditions'] = $conditions;
//
//        } else {
//            $options['conditions'] = array('dictioanry_id' => $dictionary_id);
//        }
//        return $options;
//    }
}
