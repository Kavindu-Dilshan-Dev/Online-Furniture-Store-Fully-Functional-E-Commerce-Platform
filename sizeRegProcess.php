<?php
include "connection.php";

$size = $_POST["s"];

if (empty($size)) {
    echo("Enter Size");
}elseif(strlen($size) > 20 ){
    echo("Characters Should Be less Than 20");
}else{
    $rs = Database::search("SELECT * FROM `size` WHERE `size_name` = '".$size."' ");
    $num = $rs->num_rows;

    if ($num == 0) {
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('".$size."') ");
        echo("Success");
    } else {
        echo("Size Already Exists");
    }
    
}

?>