<!DOCTYPE html>
<?php include "connection.php"; ?>
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
    <!-- fastbootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

</head>

<body>
    <div>
        <?php include "header.php" ?>
    </div>
    <hr />

    <div class="col-12 justify-content-center">
        <div class="row mb-3">

            <div class="offset-4 offset-lg-1 col-4 col-lg-1 logo" style="height: 60px;"></div>

            <div class="col-12 col-lg-6">

                <div class="input-group mb-3 mt-3">
                    <input type="text" id="kw" class="form-control" aria-label="Text input with dropdown button" />

                    <select class="form-select" style="max-width: 250px;" id="c">
                        <option value="0">All Categories</option>

                        <?php

                        $category_rs = Database::search("SELECT * FROM `category`");
                        $category_num = $category_rs->num_rows;

                        for ($x = 0; $x < $category_num; $x++) {

                            $category_data = $category_rs->fetch_assoc();

                            ?>

                            <option value="<?php echo $category_data["cat_id"]; ?>">
                                <?php echo $category_data["cat_name"]; ?>
                            </option>

                            <?php

                        }

                        ?>

                    </select>

                </div>

            </div>

            <div class="col-12 col-lg-2 d-grid">
                <button class="btn btn-danger mt-3 mb-3" onclick="basicSearch(0);">Search</button>
            </div>

            <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                <a href="advancedSearch.php" class="text-decoration-none link-secondary fw-bold">Advanced</a>
            </div>

        </div>
    </div>

    <hr />
    <div class="col-12">
        <!-- Carousel -->
        <div class="row">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 " src="./resources/carousel-1.jpg" alt="carousel-1.jpeg" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tokyo (Japan)</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 " src="./resources/carousel-2.jpg" alt="carousel-2.jpeg" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tokyo (Japan)</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./resources/carousel-3.jpg" alt="carousel-3.jpeg" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tokyo (Japan)</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    $rs = Database::search("SELECT * FROM `category` ");
    $cn = $rs->num_rows;

    for ($x = 0; $x < $cn; $x++) {
        $cd = $rs->fetch_assoc();
        ?>
        <div class="col-12 ">
            <!-- Category -->
            <div class="row mb-3">
                <div class="d-flex justify-content-start p-2 gap-4 align-items-center ms-5">
                    <a href="#" class="text-dark fs-5 fw-bold text-decoration-none">
                        <?php echo $cd["cat_name"]; ?>
                    </a>
                    <a href="#" class="text-danger fw-bold text-decoration-none">See all</a>
                </div>
            </div>
            <!-- Products -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="row border border-dark m-1">
                        <div class="col-12 p-1">
                            <div class="row justify-content-center gap-4">
                                <!-- Product Card -->
                                <?php
                                $pr = Database::search("SELECT * FROM `product` WHERE `category_cat_id`='" . $cd["cat_id"] . "' AND
                            `status_status_id`='1' ORDER BY  `datatime_added` DESC LIMIT 4 OFFSET 0");
                                $pn = $pr->num_rows;

                                for ($x = 0; $x < $pn; $x++) {
                                    $product_data = $pr->fetch_assoc();
                                    ?>

                                    <div class="card col-12 col-lg-2 col-md-4">
                                        <?php
                                        $ir=Database::search("SELECT * FROM `product_img` WHERE `product_id`='".$product_data["id"]."'");
                                        $image_data=$ir->fetch_assoc();
                                        ?>
                                        
                                        <img src="<?php echo $image_data["img_path"] ?>" class="<?php echo $product_data["title"] ?>"
                                            alt="green iguana" />
                                        <div class="card-body">
                                            <h4 class="text-center fw-bold ">
                                                <?php echo $product_data["title"] ?>
                                            </h4>
                                            <div class="d-flex flex-column  justify-content-center">
                                                <p class=""><span class="fw-bold">Items Available: </span>
                                                    <?php echo $product_data["qty"] ?>
                                                </p>
                                                <p class=""><span class="fw-bold">LKR: </span>
                                                    <?php echo $product_data["price"] ?>
                                                </p>
                                            </div>

                                            <div>
                                                <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>"
                                                    class="col-12 btn btn-success">Buy Now</a>
                                                <button class="col-12 btn btn-dark mt-2"
                                                    onclick="addToCart(<?php echo $product_data['id']; ?>);">
                                                    <i class="fa-solid fa-cart-shopping text-white fs-5"></i>
                                                </button>
                                                <button onclick="addToWatchlist(<?php echo $product_data['id']; ?>);"
                                                    class="col-12 btn btn-outline-light mt-2 border border-primary">
                                                    <i class="fa-solid fa-heart text-dark fs-5"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }

                                ?>


                                <!-- Product Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js" async defer></script>
</body>

</html>