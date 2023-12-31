<?php
include_once("Views/header.php");
include_once("Views/navbar.php");
include_once("Views/footer.php");
include_once("sysgem/postgenerator.php");

if(checkSession("username")){
    if(getSession("username") != "administrator"){
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $posttitle = $_POST["posttitle"];
    $posttype = $_POST["posttype"];
    $postwriter = $_POST["postwriter"];
    $postcontent = $_POST["postcontent"];
    $subject = $_POST["subject"];
    if(empty($posttitle)){
        header("location:admin.php");
    }else{
        $bol = insertPost($posttitle,$postwriter,$posttype,$postcontent,$subject);
        header("Location: showAllPost.php");
    }

}

?>

<!--Content-->
<div class="container mt-4">
    <div class="row">
        <?php
            include_once("Views/adminSidebar.php");
        ?>
        <div class="col-md-9">
            <form method="post" action="admin.php" enctype="multipart/form-data" class="mb-5 p-4" >
                <h1 class="text-center">Post Form Insert</h1>
                <div class="form-group mb-3">
                    <label for="posttitle" class="form-label">Post Title</label>
                    <input type="text" name="posttitle" class="form-control" id="posttitle">
                </div>
                <div class="form-group mb-3">
                    <label for="posttype" class="form-label">Post Type</label>
                    <select class="form-select" id="posttype" name="posttype">
                        <option value="1">Free Post</option>
                        <option value="2">Paid Post</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="subject" class="form-label">Post Subject</label>
                    <select class="form-select" id="subject" name="subject">
                        <?php
                            $subjects = getAllSubject();
                            foreach($subjects as $subject){
                                echo "<option value='".$subject["id"]."'>".$subject["name"]."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="postwriter" class="form-label">Post Writer</label>
                    <input type="text" name="postwriter" class="form-control" id="postwriter">
                </div>
                <div class="form-group mb-3" >
                    <label for="postcontent" class="form-label">Content</label>
                    <textarea class="form-control" name="postcontent" id="PostContent" rows="3"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Post</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Content-->
