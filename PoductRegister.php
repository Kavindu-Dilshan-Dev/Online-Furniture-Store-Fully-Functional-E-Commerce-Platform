<?php

include "connection.php";

$pname = $_POST["pname"];
$material = $_POST["mat"];
$category = $_POST["cat"];
$color = $_POST["co"];
$size = $_POST["size"];
$descript = $_POST["desc"];
// $file = $_POST["file"];

// echo($pname);
// echo($material);
// echo($category);
// echo($color);
// echo($size);
// echo($descript);

if (empty($pname)) {
    echo ("Please Enter Product Name");
} else if (strlen($pname) > 30) {
    echo ("Product Name Sholud Be less Than 30 Characters");
} else if ($material == 0) {
    echo ("Please Select A Material");
} else if ($category == 0) {
    echo ("Please Select A Category");
} else if ($color == 0) {
    echo ("Please Select A Colour");
} else if ($size == 0) {
    echo ("Please Select A Size");
} else if (empty($descript)) {
    echo ("Please Enter A Description");
} else if (strlen($descript) > 200) {
    echo ("Description Sholud Be less Than 100 Characters");
} else {
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $path = "resources/ProductImg/" . uniqid() . ".png";
        move_uploaded_file($image["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '".$pname."' ");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo("Product Has Been Already Registered");
        } else {
            Database::iud(" INSERT INTO `product` (`name`,`description`,`path`,`size_id`,`cat_id`,`color_id`,`material_id`)
             VALUES ('".$pname."','".$descript."','".$path."','".$size."','".$category."','".$color."','".$material."' ) ");
             echo("Success");
        }
        
    }else{
        echo("Please Select A Product Image");
    }
}
