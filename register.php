<?php
include_once("Views/header.php");
include_once("Views/navbar.php");
include_once("Views/footer.php");

require_once("sysgem/membership.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ret = registerUser($username,$email,$password);
    $message = "";
    switch ($ret) {
        case "Registered successfully":
            $message = "Registered successfully";
            setSession("username", $username);
            setSession("email", $email);
            if($username == "administrator" && $password == "Administrator@123321"){
                header("Location: admin.php");
            }else{
                header("Location: index.php");
            }
            break;
        case "Email already exists":
            $message = "Email already exists";
            break;
        case "Registration failed":
            $message = "Registration failed";
            break;
            case "Fail":
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

    <form action="register.php" class="form" method="post">
        <div class="text-center">
            <h1>Register Here</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
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
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>






