<?php
include "connection.php";

$email = $_POST["email"];

$rs = Database::search("SELECT * FROM `user` WHERE `email` =  '".$email."' AND `user_type_id` = '1'  ");
$num = $rs->num_rows;

if ($num == 1) {
    echo("Success");
} else {
    echo("Invalid Admin Mail");
}


?>