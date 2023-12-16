<?php
require_once("dbConnect.php");
function insertPost($title,$writer,$type,$content){
    $created_at = addTime();
    $db = dbConnect();
    $qry = "INSERT INTO post(`title`,`type`,`writer`,`content`,`created_at`)VALUES('$title','$type','$writer','$content','$created_at')";
    $result = mysqli_query($db,$qry);

    return $result? "True" : "False";
}
function deletePost($id) {
    $db = dbConnect();
    $qry = "DELETE FROM post WHERE `id` = $id";
    $result = mysqli_query($db,$qry);
    if($result) {
        header("Location:showAllPost.php");
    }else{
        echo "<script>alert('Failed to Delete post')</script>";
    }

}

function updatePost($title,$type,$writer,$content,$id){
    $db = dbConnect();
    $qry = "UPDATE `post` SET `title`='$title',`type`='$type',`writer`='$writer',`content`='$content' WHERE id='$id'";
    $result = mysqli_query($db,$qry);
    if($result){
        header("Location:showAllPost.php");
    }else{
        echo "<script>alert('Update Failed')</script>";
    }
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

function getSinglePost($id){
    $db = dbConnect();
    $qry = "SELECT * FROM post WHERE id=$id";
    $result = mysqli_query($db,$qry);
    return $result;
}