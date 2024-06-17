<?php
session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

// echo($username);
// echo($password);

if (empty($username)) {
    echo("Enter Your Admin Username");
}elseif (empty($password)) {
    echo("Enter Your Admin Password");
}else {
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '".$password."'  ");
    $num = $rs->num_rows;
    

    if ($num ==1 ) {
        $d = $rs->fetch_assoc();
            if ($d["user_type_id"] == 1) {
                echo("Success");

                $_SESSION["a"] = $d;
            } else {
                echo("You Don't Have An Admin Account");
            }
            
        
    } else {
        echo("Invalid Username OR Password");
    }
    
}



?>