<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'  ");
$num = $rs->num_rows;

if ($num > 0) {

    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Down South Furnitures - Invoice</title>
        <link rel="icon" href="resources/icon/furniture.png">
    </head>

    <body>


        <div class="container text-end mt-2">
            <a href="index.php"><button class="btn btn btn-outline-dark btn-sm">Home</button></a>
        </div>

        <div class="container mt-2 mb-4">
            <div class="border border-3 border-black p-5 rounded-3" id="printinvoice">
                <div class="row">
                    <div class="col-6">
                        <h3>Order Id #<?php echo $d["order_id"] ?></h3>
                        <h5><?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="container mt-5">
                        <div class="row invoice-header align-items-center p-4">
                            <div class="col-md-6">
                                <h1 class="invoice-title text-start">I N V O I C E</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="company-info text-end">
                                    <h4>Down South Furnitures</h4>
                                    <h5>No.13, Madapatha</h5>
                                    <h5>Piliyandala</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="user-info">
                    <h1 class="user-name"><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h1>
                    <div class="user-details">
                        <h4>Mobile: <?php echo $user["mobile"] ?></h4>
                        <h5>Address:</h5>
                        <h5><?php echo $user["no"] ?>, <?php echo $user["line_1"] ?></h5>
                        <h5><?php echo $user["line_2"] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


                <div class="ps-5 pe-5 mt-5">

                    <div class="container mt-5">
                        <div class="table-responsive">
                            <table class="table table-hover border border-black">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Material Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id`
                                                            INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
                                                            INNER JOIN `material` ON `product`.`material_id` = `material`.`material_id` 
                                                            INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
                                                            INNER JOIN `category` ON `product`.`cat_id` = `category`.`cat_id` 
                                                            INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` WHERE `order_item`.`order_history_ohid` = '" . $orderHistoryId . "' ");

                                    $num2 = $rs2->num_rows;

                                    for ($i = 0; $i < $num2; $i++) {
                                        $d2 = $rs2->fetch_assoc();
                                    ?>
                                        <tr class="table-row">
    <td><?php echo $d2["name"] ?></td>
    <td><?php echo $d2["material_name"] ?></td>
    <td><?php echo $d2["cat_name"] ?></td>
    <td><?php echo $d2["color_name"] ?></td>
    <td><?php echo $d2["size_name"] ?></td>
    <td><?php echo $d2["oi_qty"] ?></td>
    <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]) ?></td>
</tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-end mt-5 pe-4">
                        <h6>Number of Items : <span class="text-muted"><?php echo $num2 ?></span></h6>
                        <h5>Delivery Fee: <span class="text-muted">500</span></h5>
                        <h3>Net Total : <span class="text-muted"><?php echo $d["amount"] ?></span></h3>

                    </div>

                </div>


            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-outline-dark col-2" onclick="printinvc();">Print</button>
                </div>
            </div>
        </div>




        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php


} else {
    header("location: index.php");
}


?>