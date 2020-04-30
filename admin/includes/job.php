<?php


class Job extends Db_object {

    protected static $db_table_fields = array('id_category','id_user','company','job_title','description','salery','location','contact_user','contact_email','created_at');
    protected static $db_table = "jobs";
    public $id;
    public $id_category;
    public $id_user;
    public $company;
    public $job_title;
    public $description;
    public $salery;
    public $location;
    public $contact_user;
    public $contact_email;
    public $created_at;

    public static function find_by_id_category($id_category){

        return static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id_category = {$id_category}");

    }

   
    public static function find_by_id_user($id_user){

        return static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id_user = {$id_user}");

    }


    public static function find_all_dates(){

        return static::find_by_query("SELECT * FROM ".static::$db_table."  ORDER BY $created_at DESC ");

    }

}// end of class