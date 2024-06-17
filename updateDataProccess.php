<?php

include "connection.php";

session_start();

$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$password = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

if (empty($fname)) {
    echo ("Enter Your First Name");
} elseif (strlen($fname) > 20) {
    echo ("Your First Name should be less than 20 Characters");
} elseif (empty($lname)) {
    echo ("Enter Your Last Name");
} elseif (strlen($lname) > 20) {
    echo ("Your Last Name should be less than 20 Characters");
} elseif (strlen($email) > 100) {
    echo ("Your Email Address should be less than 100 Characters");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invalid");
} elseif (empty($mobile)) {
    echo ("Enter Your Mobile Number");
} elseif (strlen($mobile) != 10) {
    echo ("Your Mobile Number Must Contain 10 Characters");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8,]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number is Invalid");
}elseif(empty($password)){
    echo("Please Enter Your Password");
}elseif(strlen($password) < 5 || strlen($password) > 45 ){
    echo("Your Pasword Must Contain 5 - 45 Characters");
}else if(empty($no)){
    echo("Enter Your Address Number");
}else if(strlen($no) > 10){
    echo("Your Address Number Should Be Less Than 10 Characters");
}else if(empty($line1)){
    echo("Enter Your Address Line 1");
}else if(strlen($line1) > 50){
    echo("Your Address Line 1 Should Be Less Than 50 Characters");
}else if(empty($line2)){
    echo("Enter Your Address Line 2");
}else if(strlen($line2) > 50){
    echo("Your Address Line 2 Should Be Less Than 50 Characters");
}else{
    // update query

    Database::iud("UPDATE `user` SET `fname` = '".$fname."' , `lname` = '".$lname."' , `email` = '".$email."' , `mobile` = '".$mobile."' ,
     `password` = '".$password."' , `no` = '".$no."'  , `line_1` = '".$line1."', `line_2` = '".$line2."'  WHERE `id` = '".$user["id"]."'  ");

     $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'  ");
     $d = $rs->fetch_assoc();
     $_SESSION["u"] = $d;

     echo("Update Successfully Completed");
}