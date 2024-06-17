<?php

include "connection.php";

$pnameId = $_POST["pname"];
$qty = $_POST["qty"];
$up = $_POST["up"];

if (empty($pnameId)) {
    echo("Please Select A Product");
} else if(empty($qty)){
    echo("Please Enter A Quantity");
}else if(strlen($qty) >10 ){
    echo("Quantity Sholud Be Less Than 10");
}elseif (!is_numeric($qty)) {
    echo("Please Enter A Number");
}elseif(empty($up)){
    echo("Please Enter Unit Price");
}elseif(strlen($up) > 10 ){
    echo("Unit Price Should Be Less Than 10 Characters");
}elseif(!is_numeric($up)){
    echo("Please Enter A Numbers");
}else{
   $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$pnameId."' AND `price` = '".$up."'  ");
   $num = $rs->num_rows;
   $d = $rs->fetch_assoc();

   if ($num == 1) {
    # update
    $newQty = $d["qty"] + $qty;
    Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id` =  '".$d["stock_id"]."'   ");
    echo("Stock Updated Successfull");
   } else {
    Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('".$up."' , '".$qty."' , '".$pnameId."' ) ");
    echo("New Stock Added Successfull  ");
   }
   
}


?>