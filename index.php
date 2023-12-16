 <?php
 include_once("Views/header.php");
 include_once("Views/navbar.php");
 include_once("Views/footer.php");
 include_once("sysgem/postgenerator.php");
?>


 <!--Content-->
 <div class="container mt-4">
     <div class="row">
         <?php
            include_once ("Views/sidebar.php");
         ?>
         <div class="col-md-9">

             <div class="row">
                 <?php
                 $result = "";
                 if(checkSession("username")){
                     $result = getAllPost(2);
                 }else{
                     $result = getAllPost(1);
                 }
                 foreach ($result as $post) {
                 echo'<div class="col-md-6 mb-3">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">'. $post["title"] .'</h5>
                             <p class="card-text"> '. substr( $post["content"],0,200) .' </p>
                             <a href="postdetail.php?id='.$post['id'].'" class="btn btn-primary">Detail</a>
                         </div>
                     </div>
                 </div>';
                 }

                 ?>
             </div>

         </div>
     </div>
 </div>
 <!--End Content-->
