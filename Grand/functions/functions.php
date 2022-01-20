<?php

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function require_login(){
    global $session;
    if (!$session->is_logged_in()){
        redirect_to('login.php');
    }
}

function redirect_by_role($user){
    switch ($user->user_type){
        case USER::USER_TYPES[0]:
            redirect_to('index.php');
            break;
        case USER::USER_TYPES[1]:
            redirect_to('_customer.php');
            break;
        case USER::USER_TYPES[2]:
            redirect_to('_mod.php');
            break;
    }
}