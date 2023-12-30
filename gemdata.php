<?php
require_once("sysgem/postgenerator.php");
$data = file_get_contents("assets/gemdata.json");
$posts = json_decode($data, true);
$types = [1,2];
$i = 0;
$writers = ["Olivia Smith","Benjamin Jones","Isabella White","Liam Johnson"];
$subjects = [1,2,3,4];

foreach ($posts as $post){
    $i++;
    $title = $post["title"];
    $writer = $writers[$i%4];
    $type = $types[$i%2];
    $content = $post["content"];
    $subject = $subjects[$i%4];
//    $subject = $subjects[$i%3];

    insertPost($title,$writer,$type,$content,$subject);


}
