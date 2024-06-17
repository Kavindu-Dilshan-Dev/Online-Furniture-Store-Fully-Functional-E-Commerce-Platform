<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {
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

    <body onload="loadCart();"  class="cartbody">

        <!-- navbar -->
        <?php
        include "navBar.php";
        ?>
        <!-- navbar -->


        <div class="container mt-5">

            <div class="row" id="cartBody">
                <!-- cart load here -->

              

              

            </div>
            <div class="container">
                <div class="row ">
                    <div class="d-flex justify-content-center mb-2 mt-2">
                        <button class="btn btn-outline-light" onclick="printqoute();">Get A Printed Quote</button>
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
    header("location:signin.php");
}
