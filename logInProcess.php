<?php 
session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if(empty($email) || empty($password)){
    echo("Please fill the empty feilds");
}else if(strlen($email) > 100){
    echo ("Incorrect Email Address.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Not a valid Email Address.");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Incorrect password.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'
    AND `password` = '".$password."' ");

    $n = $rs->num_rows;
    if($n == 1){
        echo ("success");
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if($rememberme == 'true'){
            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));
        }else{
            setcookie("email",'',-1);
            setcookie('password','',-1);
        }
    }else{
        echo ('Invalid Email address or Password');
    }

}

?>