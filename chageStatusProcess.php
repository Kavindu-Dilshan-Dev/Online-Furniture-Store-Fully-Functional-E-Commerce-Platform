<?php

include "connection.php";

$uid = $_POST["u"];

if (empty($uid)) {
    echo ("Enter User ID");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $uid . "' ");
    $num = $rs->num_rows;

    if ($num == 1) {

        $d = $rs->fetch_assoc();
        if ($d["status"] == 0) {
            Database::iud(" UPDATE `user` SET `status` = '1' WHERE `id` = '" . $uid . "' ");
            echo ("activate");
        }

        if ($d["status"] == 1) {
            Database::iud("UPDATE `user` SET `status` = '0' WHERE `id` = '" . $uid . "'  ");
            echo ("deactivate");
        }
    } else {
        echo ("Invalid User Id");
    }
}
