<?php

class Session {

    private $user_id;
    public $username;
    private $last_login;
    public $status;

    public const MAX_LOGIN_AGE = 60*60*24; // 1 day

    public function __construct() {
        session_start();
        $this->check_stored_login();
    }

    public function login($user) {
        if($user) {
            // prevent session fixation attacks
            session_regenerate_id();
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->username = $_SESSION['username'] = $user->user_name;
            $this->status = $_SESSION['status'] = $user->status;
            $this->last_login = $_SESSION['last_login'] = time();
        }
        return true;
    }

    public function is_logged_in() {
        // return isset($this->user_id);
        return isset($this->user_id) && $this->last_login_is_recent();
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['last_login']);
        unset($_SESSION['status']);
        unset($this->user_id);
        unset($this->username);
        unset($this->last_login);
        unset($this->status);
        return true;
    }

    private function check_stored_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->username = $_SESSION['username'];
            $this->last_login = $_SESSION['last_login'];
            $this->status = $_SESSION['status'];
        }
    }

    private function last_login_is_recent() {
        if(!isset($this->last_login)) {
            return false;
        } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
            return false;
        } else {
            return true;
        }
    }

    public function get_logged_in_user(){
        if ($this->is_logged_in()){
            return User::find_by_id($this->user_id);
        }else{
            return false;
        }
    }


}