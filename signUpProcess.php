<?php

include "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$username = $_POST["username"];
$password = $_POST["password"];

// echo($fname);
// echo($lname);
// echo($email);
// echo($mobile);
// echo($username);
// echo($password);

if (empty($fname)) {
    echo ("Enter Your First Name");
} elseif (strlen($fname) > 20) {
    echo ("Your First Name Should Be Less Than 20 Characters");
}elseif (empty($lname)) {
    echo ("Enter Your Last Name");
} elseif (strlen($lname) > 20) {
    echo ("Your Last Name Should Be Less Than 20 Characters");
} elseif (strlen($email) > 100) {
    echo ("Your Email Address Should Be Less Than 100 Characters");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address Is Invalid");
} elseif (empty($mobile)) {
    echo ("Please Enter Your Mobile Number");
} elseif (strlen($mobile) != 10) {
    echo ("Your Mobile Number Must Contain 10 Characters");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number Is Invalid");
} elseif (empty($username)) {
    echo ("Please Enter Your Username");
} elseif (strlen($username) > 20) {
    echo ("Your Username Should Be Less Than 20 Characters");
} elseif (empty($password)) {
    echo ("Please Enter Your Password");
} elseif (strlen($password) < 5 || strlen($password) > 45) {
    echo ("Your Password Must Contain 5 - 45 Characters");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' OR `username` = '" . $username . "' OR `mobile` = '" . $mobile . "' ");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Email OR Username OR Mobile Already Exists");
    } else {
        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`mobile`,`username`,`password`,`user_type_id`)
    VALUES ('" . $fname . "','" . $lname . "','" . $email . "','".$mobile."','" . $username . "','" . $password . "','2') ");
        echo ("Success");
    }
}
