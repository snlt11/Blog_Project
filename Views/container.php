    <!--Content-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a class="text-decoration-none" href="#">add Link</a></li>
                    <li class="list-group-item"><a class="text-decoration-none" href="#">add Link</a></li>
                    <li class="list-group-item"><a class="text-decoration-none" href="#">add Link</a></li>
                    <li class="list-group-item"><a class="text-decoration-none" href="#">add Link</a></li>
                    <li class="list-group-item"><a class="text-decoration-none" href="#">add Link</a></li>
                </ul>
            </div>
            <div class="col-md-9">

                <div class="row">
                    <?php
                        $result = "";
                        if(checkSession("username")){
                            $result = getAllPost(2);
                        }else{
                            $result = getAllPost(1);
                        }
                        print_r($result);

                    ?>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem sed corrupti incidunt maxime blanditiis. Rem, nihil recusandae tempore nam facere tempora impedit quasi autem magnam corporis quia blanditiis doloremque odit.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--End Content-->