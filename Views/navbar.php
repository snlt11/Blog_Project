<?php

?>
<!--Navbar Start-->
<div class="container-fluid bg-primary">
    <nav class="container navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filterpost.php?id=1">Politic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filterpost.php?id=2">It news</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filterpost.php?id=3">Wars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filterpost.php?id=4">Health</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            if(checkSession("username")){
                                echo getSession("username");
                            }else{
                                echo "Member";
                            }
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                            if(checkSession("username")){
                                echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                            }else{
                                echo '<li><a class="dropdown-item" href="login.php">Login</a></li>';
                                echo '<li><a class="dropdown-item" href="register.php">Register</a></li>';
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--Navbar End-->