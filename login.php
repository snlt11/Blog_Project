<?php

//include_once ("sysgem/MySession.php");
include_once("Views/header.php");
include_once("Views/navbar.php");
include_once("Views/footer.php");
include_once("sysgem/membership.php");
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ret =  loginUser($email, $password);
    $message = "";
    switch ($ret) {
        case "Login successful":
            $message = "Login successful";
            if(getSession("email") == "administrator@gmail.com" && getSession("password") == "Administrator@123321"){
                header("Location: admin.php");
            }else{
                header("Location: index.php");
            }
            break;
        case "Login failed":
            $message = "Login failed";
            break;
        case "Authentication failed":
            $message = "Authentication failed";
            break;
        default:
            $message = "Something went wrong";
            break;
    }
    echo "<div class='alert alert-primary text-center' role='alert'><h3>".$message."</h3></div>";

}

?>
<div class="container col-md-4 my-4">

    <form action="login.php" class="form" method="post">
        <div class="text-center">
            <h1>Login Page</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="text-center">
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

</div>






