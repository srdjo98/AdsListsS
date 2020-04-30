<?php


class Category extends Db_object {

    protected static $db_table_fields = array('id','name');
    protected static $db_table = "category";
    public $id;
    public $name;


    public static function verify_category($name){

        global $database;

       
        $name = $database->espace_string($name);
        
        $result_array = self::find_by_query("SELECT * FROM ".self::$db_table." WHERE name = '{$name}' LIMIT 1");

        return !empty($result_array) ? true : false;
    
    }



}// end of class