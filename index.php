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

</head>

<body>
    <div class="container-fluid  d-flex justify-content-center">
        <div class="row align-content-center">

            <?php require "connection.php"; ?>

            <!-- Header -->

            <div class="col-12 ">
                <div class="row">
                    <h2 class=" text-center mt-lg-5 mb-lg-5 mt-sm-5 ">Welcome to <span>CT-Computers</span></h2>
                </div>
            </div>


            <!-- Content -->
            <div class="col-12 ">
                <div class=" row  ">
                    <div class="col-lg-6 col-12 p-lg-5 p-2">
                        <div class="row d-none d-lg-block">
                            <img src="./resources/auth-bg-image.png" width="500px" class="mt-lg-5" />
                        </div>

                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-12 p-5">

                                <!-- Sign in FORM -->
                                <div class="row " id="sign-up">
                                    <div class="col-12">
                                        <p class="fw-bold fs-4 text-center p-1" style="color:darkred">Create account</p>
                                    </div>
                                    <div class="col-12 d-none" id="msgdiv">
                                        <div class="alert alert-danger" role="alert" id="msg">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="label-control" for="fname">First Name</label>
                                        <input class="form-control" type="text" placeholder="Your First name"
                                            id="fname" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="label-control" for="lname">Last Name</label>
                                        <input class="form-control" type="text" placeholder="Your Last name"
                                            id="lname" />
                                    </div>
                                    <div class="col-12">
                                        <label class="label-control" for="email">Email</label>
                                        <input class="form-control" type="email" placeholder="Your Email address"
                                            id="email" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="label-control" for="password">Password</label>
                                        <input class="form-control" type="password" placeholder="Your Password"
                                            id="password" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="label-control" for="cpassword">Confirm Password</label>
                                        <input class="form-control" type="password" placeholder="Confirm Your Password"
                                            id="cpassword" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="label-control" for="mobile">Mobile</label>
                                        <input class="form-control" type="text" placeholder="Your Mobile Number"
                                            id="mobile" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="label-control" for="gender">Gender</label>
                                        <select class="form-select" id="gender">
                                        <option selected value=''>Select Your gender</option>
                                        <?php 
                                        $rs = Database::search("SELECT * FROM `gender`");
                                        $n = $rs->num_rows;
                                        for( $i = 0; $i < $n; $i++ ){
                                            $d = $rs->fetch_assoc();
                                            ?>
                                            <option value="<?php echo $d["gender_id"]; ?>"><?php echo $d["gender_name"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                            
                                        </select>
                                    </div>

                                    <div class="d-grid gap-2 mt-4">
                                        <button class="btn btn-danger" type="button" onclick="signUp()">Sign up</button>
                                        <button class="btn btn-outline-danger" type="button"
                                            onclick="handleAuth()">Alreacy have an
                                            account?</button>
                                    </div>


                                </div>

                                <!-- Login form -->
                                <div class="row d-none" id="log-in">
                                    <div class="col-12">
                                        <p class="fw-bold fs-4 text-center p-1" style="color:darkred">Log In</p>
                                    </div>
                                    <div class="col-12 d-none" id="msgdiv2">
                                        <div class="alert alert-danger" role="alert" id="msg2">
                                        </div>
                                    </div>

                                    <?php

                                    $email = "";
                                    $password = "";

                                    if (isset($_COOKIE["email"])) {
                                        $email = $_COOKIE["email"];
                                    }

                                    if (isset($_COOKIE["password"])) {
                                        $password = $_COOKIE["password"];
                                    }
                                    ?>

                                    <div class="col-12">
                                        <label class="label-control" for="email2">Email</label>
                                        <input class="form-control" type="email" placeholder="Your Email address" value="<?php echo $email; ?>"
                                            id="email2" />
                                    </div>
                                    <div class="col-12">
                                        <label class="label-control" for="password2">Password</label>
                                        <input class="form-control" type="password" placeholder="Your Password" value="<?php echo $password; ?>"
                                            id="password2" />
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex justify-content-center gap-4 mt-4">
                                            <div>
                                                <a href="#" class="stretched-lin">Forgot password?</a>
                                            </div>
                                            <div class=" form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="rm">
                                                <label class="form-check-label" for="rm">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-4">
                                        <button class="btn btn-danger" type="button" onclick="logIn()">Log in</button>
                                        <button class="btn btn-outline-danger" type="button"
                                            onclick="handleAuth()">Don't have an
                                            account?</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js" async defer></script>
</body>

</html>