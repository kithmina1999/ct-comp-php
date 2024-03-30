<?php 
require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($mobile) || empty($gender) || empty($gender)){
    echo("Please fill the empty feilds");
}else if(strlen($fname) > 45) {
    echo("First Name must have less than 45 characters.");
}else if(strlen($lname) > 45) {
    echo("Last Name must have less than 45 characters.");
}else if(strlen($email) > 100) {
    echo("Email must have less than 100 characters.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email Address");
}else if(strlen($password)<5 || strlen($password)>20 || strlen($cpassword)<5 || strlen($cpassword)>20){
    echo ("Password length must be between 5 - 20 characters.");
}else if($password ===! $cpassword){
    echo ("password doesn't match");
}else if(strlen($mobile) != 10){
    echo ("Mobile number must contain 10 characters.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile Number.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."' ");
    $n = $rs->num_rows;

    if($n > 0){
        echo ("User with the same Mobile Number or Email already exists.");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO 
        `user`(`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`status`,`gender_id`) 
        VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$mobile."','".$date."','1','".$gender."')");

        echo("success");
    }

}

?>