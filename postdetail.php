<?php
include_once("Views/header.php");
include_once("Views/navbar.php");
include_once("Views/footer.php");
include_once("sysgem/postgenerator.php");

if(isset($_GET['id'])){
    $pid = getSinglePost($_GET['id']);


}

?>


<!--Content-->
<div class="container my-3">
    <div class="card col-md-8 offset-md-2">
        <?php
            $result = getSinglePost($_GET['id']);
            foreach($result as $data){
                echo "<div class='card-header'><strong>".$data['title']."</strong><span class='float-end'>".$data['created_at']."</span></div>";
                echo "<div class='card-body'>".$data['content']."</div>";
                echo "<div class='card-footer'><strong>Written by : </strong>".$data['writer']."</div>";
            }


        ?>
    </div>
</div>
<!--End Content-->
