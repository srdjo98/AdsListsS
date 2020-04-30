<?php


class User extends Db_object {

    protected static $db_table_fields = array('id','username','lastname','password','company','admin','pib','ind_number','postal_code','country','city','address','contact_phone','contact_email');
    protected static $db_table = "user";
    public $id;
    public $username;
    public $lastname;
    public $password;
    public $company;
    public $admin;
    public $pib;
    public $ind_number;
    public $postal_code;
    public $country;
    public $city;
    public $address;
    public $contact_phone;
    public $contact_email;
    

    public static function verify_user($username,$password){

        global $database;

        

        $username = $database->espace_string($username);
        $password = $database->espace_string($password);

        
        $passwordmd = md5($password);
  
           

        $result_array = self::find_by_query("SELECT * FROM ".self::$db_table." WHERE username = '{$username}' AND password = '{$passwordmd}' AND admin = '0'  LIMIT 1");

        return !empty($result_array) ? array_shift($result_array) : false;
 
       
    }


    public static function check_admin($username,$password){

        global $database;

        

        $username = $database->espace_string($username);
        $password = $database->espace_string($password);

        
        $passwordmd = md5($password);
  
           

        $result_array = self::find_by_query("SELECT * FROM ".self::$db_table." WHERE username = '{$username}' AND password = '{$passwordmd}' AND admin = '1' LIMIT 1");

        return !empty($result_array) ? array_shift($result_array) : false;
 
       
    }


 
    


}