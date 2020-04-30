<?php

require_once("new_config.php");

class Database {

    public $connection;


    function __construct(){

        $this->open_db_connection();

    }


    public function open_db_connection(){

        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if($this->connection->connect_errno){

            die("Problem") . $this->connection->connect_errno();

        }
    
    }


    public function query($sql){

        $result = $this->connection->query($sql);

        
        $this->confirm_query($result);

        return $result;
    }


    private function  confirm_query($result){

        if(!$result){
            
            die("Query error" . mysqli_error());

        }
    }


    public function espace_string($string){

        $escaped_string = $this->connection->escape_string($string);

        return $escaped_string;

    }


    public function last_inserted_id(){

        return mysqli_insert_id($this->connection);

    }

}// end of class

$database = new Database();