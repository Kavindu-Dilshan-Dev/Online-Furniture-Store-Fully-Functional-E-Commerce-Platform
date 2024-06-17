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

        <title>Down South Furnitures - Admin Product Management</title>
        <link rel="icon" href="resources/icon/furniture.png">
    </head>

    <body class="adminBody ">

        <!-- navbar -->
        <?php
        include "adminNavbar.php";
        ?>
        <!-- navbar -->
        <div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold tcolor">Product Management</h2>
    
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-3 rounded-3 bg-body-secondary p-4">
                <h3 class="text-center mb-3">Material Register</h3>
                <div class="mb-3">
                    <label for="mat" class="form-label fw-bold">Material Name:</label>
                    <input type="text" class="form-control" id="mat">
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-warning col-6 mb-3" onclick="matreg();">Register Material</button>
                </div>
                <div class="d-none mt-3 " id="msgDive1" onclick="matregload();">
                    <div class="alert alert-danger" id="msg1"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card border-3 rounded-3 bg-body-secondary p-4">
                <h3 class="text-center mb-3">Category Register</h3>
                <div class="mb-3">
                    <label for="category" class="form-label fw-bold">Category Name:</label>
                    <input type="text" class="form-control" id="category">
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-warning col-6 mb-3" onclick="catreg();">Register Category</button>
                </div>
                <div class="d-none mt-3" id="msgDiv2" onclick="catload();">
                    <div class="alert alert-danger" id="msg2"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-3 rounded-3 bg-body-secondary p-4">
                <h3 class="text-center mb-3">Colour Register</h3>
                <div class="mb-3">
                    <label for="color" class="form-label fw-bold">Colour Name:</label>
                    <input type="text" class="form-control" id="color">
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-warning col-6 mb-3 " onclick="colorReg();">Register Colour</button>
                </div>
                <div class="d-none mt-3" id="msgDiv3" onclick="loadReg();">
                    <div class="alert alert-danger" id="msg3"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card border-3 rounded-3 bg-body-secondary p-4">
                <h3 class="text-center mb-3">Size Register</h3>
                <div class="mb-3">
                    <label for="size" class="form-label fw-bold">Size Name:</label>
                    <input type="text" class="form-control" id="size">
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-warning col-6 mb-3 " onclick="sizeReg();">Register Size</button>
                </div>
                <div class="d-none mt-3" id="msgDiv4" onclick="loadsize();">
                    <div class="alert alert-danger" id="msg4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

     


        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 Down South Furnitures || All Right Reserved</p>
        </div>
        <!-- footer -->

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php

} else {
    echo ("You Are Not A Valid User");
}


?>