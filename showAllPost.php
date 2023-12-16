<?php
include_once("Views/header.php");
include_once("Views/navbar.php");
include_once("Views/footer.php");
include_once("sysgem/postgenerator.php");

if (checkSession("username")) {
    if (getSession("username") != "administrator") {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>

<!--Content-->
<div class="container mt-4">
    <div class="row">
        <?php
        include_once("Views/adminSidebar.php");
        ?>
        <section class="col-md-9">
            <?php
            $result = getAllPost(2);
            foreach ($result as $post) {
                echo'
                     <div class="card mb-3">
                         <div class="card-body">
                             <div class="card-title mb-2 h6"><strong>'. $post["title"] .'</strong><span class="float-end">'.$post['created_at'].'</span></div>
                             <p class="card-text"> '. substr( $post["content"],0,200) .' </p>
                             <div class="card-subtitle mb-2">Written by: '. $post["writer"].' </div>
                             <a href="delete.php?id='.$post['id'].'" class="btn btn-danger float-end ms-1">Delete</a>
                             <a href="postedit.php?id='.$post['id'].'" class="btn btn-primary float-end">Edit</a>
                         </div>
                     </div>';
            }
            ?>
        </section>
    </div>
</div>
<!--End Content-->
