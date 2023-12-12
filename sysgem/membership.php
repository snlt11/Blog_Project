<?php
require_once('dbConnect.php');
function registerUser($username,$email,$password){
    if(usernameCheck($username) && emailCheck($email) && passwordCheck($password)){
        return insertUser($username,$email,$password);}
//    }else{
//        echo "false";
//    }

}

function loginUser($email,$password){
    if(emailCheck($email) && passwordCheck($password)){
        return userLogin($email,$password);
    }else{
        return "Authentication failed";
    }
}


function usernameCheck($username){
    if(strlen($username) >=6){
        $bol = preg_match('/^[\w]+$/',$username);
        return $bol;
    }else{
        return false;
    }
}

function emailCheck($email){
    if(strlen($email) >= 10){
        $bol = preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email);
        return $bol;
    }else{
        return false;
    }
}

function passwordCheck($password){
    if(strlen($password) >= 10){
        $bol = preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password);
        return $bol;
    }else{
        return false;
    }
}


//at least one lowercase char
//at least one uppercase char
//at least one digit
//at least one special sign of @#-_$%^&+=§!?





