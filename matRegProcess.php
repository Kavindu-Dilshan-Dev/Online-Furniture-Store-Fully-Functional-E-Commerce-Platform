<?php

include "connection.php";

$mat = $_POST["m"];

if (empty($mat)) {
    echo ("Please Enter Material");
}else if(strlen($mat) > 20 ) {
    echo("Characters Should Be Less Than 20");
} else {
    $rs = Database::search("SELECT * FROM `material` WHERE `material_name` = '" . $mat . "' ");
    $num = $rs->num_rows;
    if ($num == 0) {
        Database::iud("INSERT INTO `material` (`material_name`) VALUES ('" . $mat . "')  ");
        echo ("Success");
    } else {
        echo ("Material Already Exists");
    }
}
