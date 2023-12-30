 <?php
 include_once("Views/header.php");
 include_once("Views/navbar.php");
 include_once("Views/footer.php");
 include_once("sysgem/postgenerator.php");

 $start = 0;
 if(isset($_GET["start"])){
     $start = $_GET["start"];
 }
$rows = getPostCount();
?>


 <!--Content-->
 <div class="container mt-4">
     <div class="row">

         <div class="col-md-12">

             <div class="row">
                 <?php
                 $result = "";
                 if(checkSession("username")){
                     $result = getAllPostPagination(2,$start);
                 }else{
                     $result = getAllPostPagination(1,$start);
                 }
                 foreach ($result as $post) {
                 echo'<div class="col-md-4 mb-3">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">'. substr($post["title"] ,0,15).'</h5>
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
<!-- Start Pagination-->
 <div class="container">
     <div class="col-md-4 offset-md-4">
         <nav aria-label="...">
             <ul class="pagination pagination-lg">
                 <?php
                    $t = 0;
                    for($i = 0; $i < $rows; $i += 20){
                        $t++;
                        echo '<li class="page-item"><a class="page-link" href="index.php?start='.$i.'">'. $t .'</a></li>';
                    }

                 ?>
             </ul>
         </nav>
     </div>
 </div>

<!-- End Pagination-->



































