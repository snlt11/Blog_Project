<?php
include_once("Views/header.php");
include_once("Views/navbar.php");
include_once("Views/footer.php");
include_once("sysgem/postgenerator.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo "<h1>$id</h1>";
}



?>


<!--Content-->
<div class="container mt-4">
    <div class="row">


    </div>
</div>
<!--End Content-->
