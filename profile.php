<?php
include "connection.php";
session_start();

$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'  ");
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

    <body class="uprobody">

        <!-- navbar -->
        <?php
        include "navBar.php";
        ?>
        <!-- navbar -->

        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card border-3 border-light bg-body-secondary">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Profile Details</h2>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["fname"] ?>" id="fname">
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"] ?>" id="lname">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $d["email"] ?>" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $d["mobile"] ?>" id="mobile">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?php echo $d["username"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="pw" class="form-label">Password</label>
                        <input type="password" class="form-control" value="<?php echo $d["password"] ?>" id="pw">
                    </div>
                    <h5 class="mt-3">Shipping Address</h5>
                    <div class="mb-3">
                        <label for="no" class="form-label">No.</label>
                        <input type="text" class="form-control" value="<?php echo $d["no"] ?>" id="no">
                    </div>
                    <div class="mb-3">
                        <label for="line1" class="form-label">Line 1</label>
                        <input type="text" class="form-control" value="<?php echo $d["line_1"] ?>" id="line1">
                    </div>
                    <div class="mb-3">
                        <label for="line2" class="form-label">Line 2</label>
                        <input type="text" class="form-control" value="<?php echo $d["line_2"] ?>" id="line2">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-warning col-12" onclick="updateData();">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-3 border-light bg-body-secondary">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="<?php echo (!empty($d["img_path"]) ? $d["img_path"] : "resources/5856.png"); ?>" height="150px" id="i" class="mt-5">
                    </div>
                    <div class="text-center fw-bolder mt-4">
                        <label for="imgUploader">Profile Image</label>
                        <input type="file" class="form-control mt-2" id="imgUploader">
                    </div>
                    <div class="mb-3 mt-3">
                        <button class="btn btn-warning col-12" onclick="uploadImage();">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    </body>

    </html>


<?php

} else {

    header("location:signin.php");
}


?>