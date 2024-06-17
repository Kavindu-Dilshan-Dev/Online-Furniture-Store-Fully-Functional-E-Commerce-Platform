<?php
include "connection.php";

$cat = $_POST["c"];

if (empty($cat)) {
    echo ("Enter Category");
}else if(strlen($cat) > 20 ) {
    echo("Characters Should Be Less Than 20");
} else {
    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $cat . "' ");
    $num = $rs->num_rows;

    if ($num == 0) {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $cat . "') ");
        echo ("Success");
    } else {
        echo ("Category Name Already Exists");
    }
}
