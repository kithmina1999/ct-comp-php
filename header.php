<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fastbootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">


</head>

<body>
    <header>
        <div class="container-fluid shadow shadow-sm">
            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <!-- Left -->
                        <div class="col-6">
                            <div class="row">
                                <div class="d-flex gap-2 align-self-center p-2">
                                <div class="offset-1 "></div>
                                    <?php
                                    session_start();
                                    if (isset($_SESSION["u"])) {
                                        $session_data = $_SESSION["u"];
                                        ?>
                                        <div class="d-none d-lg-block">
                                            Welcome!
                                            <?php echo $session_data["fname"] ?> <span class="text-gray">|</span>
                                        </div>
                                        <div class="text-warning fw-semibold  border border-warning px-1 pb-1 rounded-2" role="button">
                                            Sign Out </div>
                                        <div class="d-none d-lg-block">| Help and Contact</div>
                                    <?php } else {
                                        ?>
                                        <div class="text-danger border border-danger px-1 pb-1 rounded-2" role="button">
                                            <a class="text-decoration-none text-danger" href="index.php">Log In or Sign
                                                Up</a>
                                        </div>
                                        <div class="d-none d-lg-block  fw-bold ">| Help and Contact</div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <!-- Right -->
                        <div class="col-6 ">
                            <div class="row">
                                <div class="d-flex justify-content-end  gap-8  align-items-center  ">
                                    <div class="gap-2">
                                    <i class="fa-solid fa-cart-shopping fs-5" role="button"></i>
                                    </div>
                                    <div class="dropdown mt-1">
                                        <button class="btn btn-secondary " type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="userProfile.php">My Profile</a></li>
                                            <li><a class="dropdown-item" href="addProduct.php">Add New Product</a></li>
                                            <li><a class="dropdown-item" href="#">My Sellings</a></li>
                                            <li><a class="dropdown-item" href="myProducts.php">My Products</a></li>
                                            <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                                            <li><a class="dropdown-item" href="#">Purchased History</a></li>
                                            <li><a class="dropdown-item" href="#">Messages</a></li>
                                            <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                                        </ul>
                                    </div>
                                    <?php 
                                    if (isset($_SESSION["u"])) {
                                    ?>
                                    <div>
                                        <img src="./resources/avatar.jpg" width="20px" class="avatar" />
                                    </div>
                                    <?php }else{
                                        ?><?php
                                    } ?>
                                    <div class="offset-1 "></div>

                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </header>




                                    
    <script src="script.js" async defer></script>
</body>

</html>