<?php
session_start();

function is_user_logged_in(){
    // return true if user is already logged in
    // otherwise return false
    if(isset($_SESSION['user'])and $_SESSION['user'])
    {
        return true;
    }
    else{
        return false;
    }

}

function make_user_session($userdata){
    session_start();
    // set user details in session
            $_SESSION['user']=$userdata;
}

function destroy_user_session(){
    // destroy session and redirect to login page
   session_destroy();
   header('location:index.php');
   
}

?>