<?php

session_start();


if (isset($_SESSION["a"])) {

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

    <body class="adminBody">

        <?php 
            include "adminNavbar.php";
        ?>

    
<div class="container">
    <h1 class="text-center mb-4">Reports</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Stock Report</h5>
                    <p class="card-text text-center">View stock-related reports here.</p>
                    <a href="adminReportStock.php" class="btn btn-outline-warning d-block mx-auto">Go to Stock Report</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Product Report</h5>
                    <p class="card-text text-center">View product-related reports here.</p>
                    <a href="adminReportProduct.php" class="btn btn-outline-warning d-block mx-auto">Go to Product Report</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">User Report</h5>
                    <p class="card-text text-center">View user-related reports here.</p>
                    <a href="adminReportUser.php" class="btn btn-outline-warning d-block mx-auto">Go to User Report</a>
                </div>
            </div>
        </div>
    </div>
</div>





        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php
} else {
    echo ("You Are An Invalid Admin");
}


?>