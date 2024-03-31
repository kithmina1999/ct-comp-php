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
    <script src="script.js" async defer></script>

</head>

<body>
    <div>
        <?php include "header.php" ?>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <?php

            if (isset($_SESSION["u"])) {
                $email = $_SESSION["u"]["email"];

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN 
                                                `city` ON user_has_address.city_city_id=city.city_id INNER JOIN 
                                                `district` ON city.district_district_id=district.district_id INNER JOIN 
                                                `province` ON district.province_province_id=province.province_id WHERE `user_email` = '" . $email . "'");
                $address_data = $address_rs->fetch_assoc();


                $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON user.gender_id = gender.gender_id
                 WHERE `email`='" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");

                $image_data = $image_rs->fetch_assoc();
                $user_data = $user_rs->fetch_assoc();
                ?>
                <div class="col-12">
                    <div class="row">
                        <!-- Left side -->

                        <div class="col-lg-8 col-12  d-none mx-auto">
                            <div class="row p-2">
                                <div class="card-header ">
                                    <p class="fs-4 text-center fw-bold">My Profile</p>
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <span class="avatar text-bg-primary avatar-lg fs-5">R</span>
                                        <div class="ms-3">
                                            <h6 class="mb-0 fs-sm">Shrimp and Chorizo Paella</h6>
                                            <span class="text-muted fs-sm">September 14, 2022</span>
                                        </div>
                                        <div class="dropstart ms-auto">
                                            <button class="btn text-muted" type="btn" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <img src="/images/cards/2.jpg" class="card-img-top" alt="green iguana" />
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-6">
                                                    <label class="form-label ">First Name</label>
                                                    <input class="form-control " />
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label ">Last Name</label>
                                                    <input class="form-control " />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label ">Email</label>
                                                    <input class="form-control " />
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label ">Last Name</label>
                                                    <input class="form-control " />
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label ">Last Name</label>
                                                    <input class="form-control " />
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label ">Last Name</label>
                                                    <input class="form-control " />
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Right Side -->
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="row mt-4 border border-dark p-1 me-1">
                                <div class="col-12 mb-5">
                                    <p class="text-danger text-center fw-bold fs-4">Update Profile</p>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="fname2" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname2"
                                                value="<?php echo $user_data["fname"] ?>" />
                                        </div>
                                        <div class="col-6">
                                            <label for="lname2" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname2"
                                                value="<?php echo $user_data["lname"] ?>" />
                                        </div>
                                        <div class="col-12">
                                            <label for="email2" class="form-label"> Email Address</label>
                                            <input type="email" class="form-control" id="email2"
                                                value="<?php echo $user_data["email"] ?>" />
                                        </div>
                                        <div class="col-12">
                                            <label for="password3" class="form-label"> Password</label>
                                            <div class="input-group ">
                                                <input type="password" class="form-control" id="password3"
                                                    value="<?php echo $user_data["password"] ?>" aria-describedby="pwb" />
                                                <button id="pwb" class="input-group-text" onclick="showPassword();"><i
                                                        class="fa-solid fa-eye"></i></button>
                                            </div>

                                        </div>

                                        <div class="col-md-3 col-12">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-3">

                                                <?php


                                                if (empty($image_data["path"])) {
                                                    ?>
                                                    <img src="./resources/avatar.jpg"
                                                        class="rounded-full mt-5 avatar avatar-xxl" />
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="<?php echo $image_data["path"]; ?>"
                                                        class="rounded-full mt-5 avatar avatar-xxl" />
                                                    <?php
                                                }

                                                ?>

                                                <br />

                                                <input type="file" class="d-none" id="profileImage" />
                                                <label for="profileImage" class="btn btn-primary mt-5">Update Profile
                                                    Image</label>

                                            </div>
                                        </div>
                                        <div class="col-md-9 col-12">
                                            <div class="row ">
                                                <div class="col-md-6 col-12 mt-3">
                                                    <label for="mobile2" class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile2"
                                                        value="<?php echo $user_data["mobile"] ?>" />
                                                </div>
                                                <div class="col-md-6 col-12 mt-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <input type="text" class="form-control" id="gender" readonly
                                                        value="<?php echo $user_data["gender_name"] ?>" />
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <label for="jd" class="form-label">Joined Date</label>
                                                    <input type="text" class="form-control" id="jd" readonly
                                                        value="<?php echo $user_data["joined_date"] ?>" />
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <label for="jd" class="form-label">Joined Date</label>
                                                    <input type="text" class="form-control" id="jd" readonly
                                                        value="<?php echo $user_data["joined_date"] ?>" />
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <label for="jd" class="form-label">Joined Date</label>
                                                    <input type="text" class="form-control" id="jd" readonly
                                                        value="<?php echo $user_data["joined_date"] ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p>Address</p>
                                            <?php
                                            if (empty($address_data["line1"])) {
                                                ?>
                                                <label for="address1" class="form-label">Line 1</label>
                                                <input type="text" class="form-control" id="address1" value="" />
                                                <?php
                                            } else {
                                                ?>
                                                <label for="address1" class="form-label">Line 1</label>
                                                <input type="text" class="form-control" id="address1"
                                                    value="<?php echo $address_data["line1"] ?>" />
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-12">
                                            <?php
                                            if (empty($address_data["line2"])) {
                                                ?>
                                                <label for="address2" class="form-label">Line 2</label>
                                                <input type="text" class="form-control" id="address2" value="" />
                                                <?php
                                            } else {
                                                ?>
                                                <label for="address2" class="form-label">Line 2</label>
                                                <input type="text" class="form-control" id="address2"
                                                    value="<?php echo $address_data["line2"] ?>" />
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        $city_rs = Database::search("SELECT * FROM `city`");
                                        $district_rs = Database::search("SELECT * FROM `district`");
                                        $province_rs = Database::search("SELECT * FROM `province`");

                                        $city_data = $city_rs->fetch_assoc();

                                        ?>
                                        <div class="col-6">

                                            <label for="province" class="form-label">Province</label>
                                            <select class="form-select" id="province">
                                                <?php
                                                $pn = $province_rs->num_rows; 
                                                for( $i = 0; $i < $pn; $i++ ) {
                                                    $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $province_data["province_id"] ?>"
                                                    <?php 
                                                    if(!empty($address_data["province_id"])){
                                                        if($address_data["province_id"]==$province_data["province_id"]){
                                                            ?>selected<?php
                                                        }
                                                    }
                                                    ?>
                                                    > <?php echo $province_data["province_name"] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6">

                                            <label for="district" class="form-label">District</label>
                                            <select class="form-select" id="district">
                                                <?php
                                                $dn = $district_rs->num_rows; 

                                                for( $i = 0; $i < $dn; $i++ ) {
                                                    $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $district_data["district_id"]; ?>"
                                                    <?php if(!empty($address_data["district_id"])){
                                                        if($address_data["district_id"]==$district_data["district_id"]){
                                                            ?>selected<?php
                                                        }
                                                    } ?>
                                                    > <?php echo $district_data["district_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6">

                                            <label for="city" class="form-label">City</label>
                                            <select class="form-select" id="city">
                                                <?php
                                                $cn = $city_rs->num_rows; 

                                                for( $i = 0; $i < $dn; $i++ ) {
                                                    $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo $city_data["city_id"]; ?>"
                                                    <?php if(!empty($address_data["city_id"])){
                                                        if($address_data["city_id"]==$city_data["city_id"]){
                                                            ?>selected<?php
                                                        }
                                                    } ?>
                                                    > <?php echo $city_data["city_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6">

                                            <label for="postalcode" class="form-label">Postal Code</label>
                                            <?php 
                                            if(!empty($address_data["postal_code"])){
                                                ?>
                                                    <input id="postalcode" class="form-control " value="<?php echo $address_data["postal_code"] ?>"/>
                                                <?php
                                            }else{
                                                ?>
                                                    <input id="postalcode" class="form-control " value=""/>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <script>window.location = "index.php";</script>
                <?php
            }

            ?>


        </div>
    </div>




    <script src="script.js" async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>