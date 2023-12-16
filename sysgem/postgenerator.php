<?php
require_once("dbConnect.php");
function insertPost($title,$writer,$type,$content,$subject){
    $created_at = addTime();
    $db = dbConnect();
    $qry = "INSERT INTO post(`title`,`type`,`subject`,`writer`,`content`,`created_at`)VALUES('$title','$type','$subject','$writer','$content','$created_at')";
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

function getFilterPost($subjectid,$type) {
    $db = dbConnect();
    $qry = "SELECT * FROM post WHERE subject='$subjectid' AND type='$type'";
    $result = mysqli_query($db,$qry);
    return $result;

}

function updatePost($title,$writer,$type,$content,$id,$subject){
    $db = dbConnect();
    $qry = "UPDATE `post` SET `title`='$title',`writer`='$writer',`subject`='$subject',`type`='$type',`content`='$content' WHERE id='$id'";
    $result = mysqli_query($db,$qry);
    if($result){
        header("Location:showAllPost.php");
    }else{
        echo "<script>alert('Update Failed')</script>";
    }
}
function getAllSubject() {
    $db = dbConnect();
    $qry = "SELECT * FROM `subject`";
    $result = mysqli_query($db,$qry);
    return $result;
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