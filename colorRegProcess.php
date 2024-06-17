<?php

include "connection.php";

$col = $_POST["c"];

if (empty($col)) {
    echo("Enter Colour");
}elseif (strlen($col) > 20) {
    echo("Characters Should Be Less than 20");
}else{
    $rs = Database::search("SELECT * FROM `color`WHERE `color_name` = '".$col."' ");
    $num = $rs->num_rows;

    if ($num == 0) {
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$col."')  ");
        echo("Success");
    } else {
        echo("Colour Already Exists");
    }
    
}


?>