<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 16:22
 * To change this template use File | Settings | File Templates.
 */

require_once dirname(__FILE__).'/MLSModel.php';
require_once dirname(__FILE__).'/MLSModel.php';

class Dictionary extends MLSModel
{

    static $has_many = array(
        array('dictionary_records'),
        array('dictionary_languages')
    );

    static $has_one = array(
        array('dictionary_deployment')
    );

    static $alias_attribute = array('languages' => 'dictionary_languages', 'deployment' => 'dictionary_deployment');

    static $after_destroy = array('delete_related_datas');

    static protected function get_resource_name(){
        return ActiveRecord\Inflector::instance()->uncamelize(get_called_class());
    }

    function delete_related_datas() {
        call_user_func( get_class($this).'Language::delete_all', array(
            'conditions' => array(self::get_resource_name().'_id' => $this->read_attribute('id'))
        ));
        call_user_func( get_class($this).'Deployment::delete_all', array(
            'conditions' => array(self::get_resource_name().'_id' => $this->read_attribute('id'))
        ));
        call_user_func( get_class($this).'Record::delete_all', array(
            'conditions' => array(self::get_resource_name().'_id' => $this->read_attribute('id'))
        ));
    }

    function remove($force = false) {
        if($force) {
            $this->delete();
        } else {
            $this->delete_flag = true;
            $this->save();
        }
    }

    function add_language(Language $language){
        $class_name = self::get_resource_name();
        $created_language = call_user_func(array($this, 'create_'.$class_name.'_languages'), array('language' => $language->getTag()));
        if($created_language->is_invalid()) MLSException::create($created_language->errors->on('language'));
        return $created_language;
    }

    function get_languages(){
        return array_map(function($lang){
            return $lang->language;
        }, $this->read_attribute('languages'));
    }

    function remove_language(Language $language, $force = false) {
        foreach($this->read_attribute('languages') as $exist_language) {
            if($exist_language->language == $language) {
                $exist_language->delete();
            }
        }

        if($force) {
            $contentClass = get_class($this).'Content';
            $contentClass::delete_all_by_resource_id_and_language($this->id, $language);
        }
        $this->reload();
        return true;
    }

    /*
     * $languages: (array<string>) [array of language code
     */
    function update_languages(array $languages = array(), $force_on_delete = false) {
        if(!$languages || count($languages) <= 1) {
            MLSException::create('languages need more than 2 language');
        }
        $creates = array_diff($languages, $this->get_languages());
        foreach($creates as $l) {
            $this->add_language(Language::get($l));
        }

        $deletes = array_diff($this->get_languages(), $languages);
        foreach($deletes as $l) {
            $this->remove_language(Language::get($l), $force_on_delete);
        }
        return true;
    }

    function is_deploy() {
        return $this->read_attribute('deployment') != null;
    }
    
    function deploy(){
        call_user_func(array($this, 'create_'.self::get_resource_name().'_deployment'));
    }

    function undeploy(){
        if($this->is_deploy()) {
            $this->read_attribute('deployment')->delete();
            $this->reload();
        }
    }

    /*
     * $params: (array<string, string>) {language => value}
     * $create_user: create user ID
     */
    function add_record($params = array(), $create_user = null) {
        $class_name = ActiveRecord\Inflector::instance()->uncamelize(get_class($this));
        $new_record = call_user_func(array($this, 'create_'.$class_name.'_records'), array());
        $new_record->update_contents($params, $create_user);
        return $new_record;
    }

    function records_count(){
        return call_user_func( get_class($this).'Record::count_by_'.self::get_resource_name().'_id', $this->id);
    }

    function get_records(/* ... */) {
        $options = static::extract_and_validate_options(func_get_args());
        if(!@$options['limit']) $options['limit'] = 10;
        if(!@$options['offset']) $options['offset'] = 0;
        return call_user_func_array( get_class($this).'Record::find_all_by_'.self::get_resource_name().'_id', array($this->id, $options));
    }

    function count_records_each_language(){
        return call_user_func( get_class($this).'Record::count_by_resource_id_each_languages', $this->id);
    }

    function count_records_by_language(Language $language){
        return call_user_func_array( get_class($this).'Record::count_by_resource_id_and_language', array($this->id, $language));
    }

    function can_view($user_id = null) {
        return $this->any_read == 1 || ($this->is_owner($user_id) && $this->user_read);
    }

    function can_edit($user_id = null) {
        return $this->any_write == 1 || ($this->is_owner($user_id) && $this->user_write);
    }

    function is_owner($user_id = null) {
        return $user_id && $this->created_by == $user_id;
    }

    function to_json(array $options=array()){
        $options = array_merge($options, array('except' => array('delete_flag','user_read','user_write','any_read','any_write')));
        return parent::to_json($options);
    }

    function to_xml(array $options=array()){
        $options = array_merge($options, array('except' => array('delete_flag','user_read','user_write','any_read','any_write')));
        return parent::to_xml($options);
    }

    // -- static -----------------------------------
    /*
     * $params: {name => (string) name value,
     *           licenser => (string) <optional> licenser value,
     *           languages => (array<string>) languages codes,
     *           records => (array<array>) }
     * return: instance of Dictionary
     *
     * [example]
     * $dict = Dictionary::create_with_records(
     *      'name' => 'Dictionary Name'
     *      'licenser' => '',
     *      'languages' => array('ja', 'en'),
     *      'records' => array(
     *          array('こんにちは', 'hello'),
     *          array('今日', 'today'),
     *          array('京都', 'Kyoto'),
     *      )
     * );
     */
    static function create_with_records($params, $create_user = null){
        $dict = null;

        $className = get_called_class();

        self::transaction(function() use ($params, $create_user, $className, &$dict){
            $dict = $className::create(array(
                'name' => $params['name'],
                'licenser' => @$params['licenser'],
                'created_by' => $create_user,
                'updated_by' => $create_user
            ));

            $dict->update_languages($params['languages']);

            foreach($params['records'] as $record) {
                if(count($record) > count($params['languages'])) {
                    MLSException::create('record count is many than language count. do rollback.');
                }
                $i = 0;
                $hash = array();
                foreach($record as $word) {
                    $language = $params['languages'][$i++];
                    if($word) {
                        $hash[$language] = $word;
                    }
                }

                if(count($hash)) {
                    $dict->add_record($hash, $create_user);
                }
            }
        });
        return $dict;
    }

    public static function first() {
        $options = self::add_args_delete_flag_off(func_get_args());
        return call_user_func_array('parent::'.__FUNCTION__, array($options));
    }

    public static function last() {
        $options = self::add_args_delete_flag_off(func_get_args());
        return call_user_func_array('parent::'.__FUNCTION__, array($options));
    }

    public static function all(/* ... */) {
        $options = self::add_args_delete_flag_off(func_get_args());
        return call_user_func_array('parent::'.__FUNCTION__, array($options));
    }

    public static function count(/* ... */) {
        $options = self::add_args_delete_flag_off(func_get_args());
        return call_user_func_array('parent::'.__FUNCTION__, array($options));
    }

    public static function first_with_deleted() {
        return call_user_func_array('parent::first', func_get_args());
    }

    public static function last_with_deleted() {
        return call_user_func_array('parent::last', func_get_args());
    }

    public static function all_with_deleted(/* ... */) {
        return call_user_func_array('parent::all', func_get_args());
    }

    public static function count_with_deleted(/* ... */) {
        return call_user_func_array('parent::count', func_get_args());
    }

    protected static function add_args_delete_flag_off($options) {
        $options = static::extract_and_validate_options($options);
        $conditions = @$options['conditions'];
        if($conditions) {
            if(is_string($conditions)) {
                $conditions .= ' AND delete_flag = 0';
            } else if(is_array($conditions)) {
                $conditions['delete_flag'] = 0;

            }
            $options['conditions'] = $conditions;

        } else {
            $options['conditions'] = array('delete_flag' => 0);
        }
        return $options;
    }
}
