<?php
require_once("dbConnect.php");
function insertPost($title,$writer,$type,$content){
    $created_at = addTime();
    $db = dbConnect();
    $qry = "INSERT INTO post(`title`,`type`,`writer`,`content`,`created_at`)VALUES('$title','$type','$writer','$content','$created_at')";
    $result = mysqli_query($db,$qry);

    return $result? "True" : "False";
}
function getAllPost($type){
    $db = dbConnect();
    $qry = "";
    if($type == 1){
        $qry = "SELECT * FROM post WHERE type=$type" ;
    }else{
        $qry = "SELECT * FROM post";
    }
    $result = mysqli_query($db,$qry);
    return $result;
}

