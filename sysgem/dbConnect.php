<?php
//DBhacker = dbConnect
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "simple_blog");

function dbConnect()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (mysqli_connect_errno()) {
        echo "Database connection failed";
    } else {
        return $db;
    }
}

function addTime(){
    return date("Y-m-d H:i:s");
}

function insertUser($name,$email,$password ){
    $date = addtime();
    $db = dbConnect();
    $qry = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($db,$qry);
    if(mysqli_num_rows($result)>0){
        return "Email already exists";
    }else{
        $qry = "INSERT INTO member(`name`,`email`,`password`,`created_at`,`updated_at`)VALUES('$name','$email','$password','$date','$date')";
        $result = mysqli_query($db,$qry);
        if($result == 1){
            return "Registered successfully";
        }else{
            return "Registration failed";
        }
    }

}

function userLogin($email,$password){
    $date = addtime();
    $db = dbConnect();
    $qry = "SELECT name FROM member WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db,$qry);
    if($result){
        $username = "";
        foreach($result as $str){
            $username = $str['name'];
        }
        setSession('username', $username);
        setSession('email', $email);
        return "Login successful";
    }else{
        return "Login failed";
    }
}









