<?php

class Session {

    private $signed_in = false;
    public $user_id;
    public $username_ses;

    function __construct(){

        session_start();
        $this->check_login();
       
    }


    public function is_signed_in(){

        return $this->signed_in;

    }


    public function login($user){

        if($user){
            
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->username_ses = $_SESSION['username'] = $user->username;
            $this->signed_in = true;

        }

    }


    public function logout(){

        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;

    }


    public function check_login(){

        if(isset($_SESSION['user_id'])){

            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;

        }else{

            unset($this->user_id);
            $this->signed_in = false;

        }
    }


}// end of class

$session = new Session();