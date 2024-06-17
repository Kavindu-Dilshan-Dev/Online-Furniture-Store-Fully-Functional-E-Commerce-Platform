<?php
session_start();

include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$rememberme = $_POST["r"];


if (empty($username)) {
    echo("Enter Your Username");
}elseif(empty($password)){
    echo("Enter Your Password");
}else{
   $rs =  Database::search("SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '".$password."'  ");
   $num = $rs->num_rows;
   $d = $rs->fetch_assoc();

   if ($num == 1) {
     if ($d["status"] = 1) {
            // active user

            echo("Success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {
                // set cookie

                setcookie("username",$username,time()+(60*60*24*365));
                setcookie("password",$password,time()+(60*60*24*365));

            } else {
                // Destroy cookie
                setcookie("username","",-1);
                setcookie("password","",-1);
            }
            

     } else {
        // inactive user
        echo("Inactive User");
     }
     
   } else {
    echo("Invalid Username OR Password");
   }
   
}



?>