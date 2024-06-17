<?php

include "connection.php";
session_start();

$stock_Id = $_GET["s"];

if (isset($stock_Id)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id = `product`.id INNER JOIN `material` ON `material`.`material_id` = `product`.`material_id` INNER JOIN `category` ON `category`.`cat_id` = `product`.`cat_id`
    INNER JOIN `color` ON `color`.`color_id` = `product`.`color_id` INNER JOIN `size` ON `size`.`size_id` = `product`.`size_id` WHERE `stock`.`stock_id` = '" . $stock_Id . "' ";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Down South Furnitures</title>
        <link rel="icon" href="resources/icon/furniture.png">
    </head>

    <body class="singlebody">
        <!-- navbar -->
        <?php
        include "navbar.php";
        ?>
        <!-- navbar -->

        <div class="container sproduct mt-5">
            <div class="row justify-content-center shadow-lg p-5 bg-body-tertiary rounded-2">
                <div class="col-12 col-md-5 mb-4 mb-md-0">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-10">
                            <img src="<?php echo $d['path']; ?>" class="img-fluid rounded-3 shadow-lg" alt="Product Image">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p class="mt-3 h5">Description:</p>
                            <textarea class="form-control mt-2" rows="4" disabled><?php echo $d["description"]; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-auto">Product Name:</h4>
                            <input type="text" class="form-control" disabled value="<?php echo $d["name"]; ?>">
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <h5>Material:</h5>
                            <input type="text" class="form-control mt-2" disabled value="<?php echo $d["material_name"]; ?>">
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <h5>Category:</h5>
                            <input type="text" class="form-control mt-2" disabled value="<?php echo $d["cat_name"]; ?>">
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <h5>Colour:</h5>
                            <input type="text" class="form-control mt-2" disabled value="<?php echo $d["color_name"]; ?>">
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <h5>Size:</h5>
                            <input type="text" class="form-control mt-2" disabled value="<?php echo $d["size_name"]; ?>">
                        </div>
                        <div class="col-12 mt-3">
                            <h3 class="text-center">Price: <?php echo $d["price"]; ?></h3>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center">
                        <?php if (isset($_SESSION["u"])) { ?>
                            <div class="col-md-4 col-6 mb-2 mb-md-0">
                                <input type="text" placeholder="Enter Qty" class="form-control" id="qty">
                            </div>
                        <?php } ?>
                        <div class="col-md-6 col-12">
                            <h6 class="text-danger">Available Quantity: <?php echo $d["qty"]; ?></h6>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <?php if (isset($_SESSION["u"])) { ?>
                            <button class="btn btn-outline-light col-md-5 col-6 me-2" onclick="addToCart(<?php echo $d['stock_id']; ?>);">Add To Cart</button>
                            <button class="btn btn-outline-warning col-md-5 col-6 ms-2" onclick="buyNow(<?php echo $d['stock_id']; ?>);">Buy Now</button>
                        <?php } else { ?>
                            <p>Please Sign in to start Shopping</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>





        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>


<?php


} else {
    header("location:index.php");
}



?>