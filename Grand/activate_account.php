<?php
    require_once "initialize.php";
    if (isset($_GET['i'])){
        //get the validation code from the email
        $verification_code = $_GET['i'];
//        verify the user
        $user =  $authController->verify_email($verification_code);
        //if a user is returned/ verified
        if ($user !== false){
            //perform patch update => set email_verification_code '' and status to active
            $result = $user->patch_update([
                "email_verification_code" => "",
                "status" => "active"
            ]);
            if ($result === true){
                // account is activated and updated
                redirect_to('login.php');
            }else{
                //account is activated but failed to be saved to the database;
                //repeat action
                redirect_to('login.php');
            }

        }else{

            //validate_user() didn't return a user that has the validation code
            redirect_to('register.php');
        }
    }else{
        redirect_to('login.php');
    }