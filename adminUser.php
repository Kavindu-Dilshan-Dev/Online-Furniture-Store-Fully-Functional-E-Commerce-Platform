<?php

session_start();
if (isset($_SESSION["a"])) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Down South Furnitures - Admin Dashboard</title>
        <link rel="icon" href="resources/icon/furniture.png">
    </head>

    <body class="adminBody" onload="loadUser();">
        <!-- narbar -->
        <?php
        include "adminNavbar.php";
        ?>
        <!-- narbar -->

        <div class="col-10">
    <h1 class="text-center fw-bold" style="color: white;">User Management</h1>

    <div class="row d-flex justify-content-end mt-4">
        <div class="d-none" id="msgDiv"  onclick ="loadstatus();" >
            <div class="alert alert-danger" id="msg"></div>
        </div>
        <div class="col-md-4 col-lg-2 mb-3">
            <input type="text" class="form-control" placeholder="User Id" id="userid">
        </div>
        <div class="col-md-4 col-lg-2">
            <button class="btn btn-outline-warning w-100" onclick="changeStatus();">Change Status</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody id="tb">
                
            </tbody>
        </table>
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

    </body>

    </html>





<?php

} else {
    echo ("You Are Not a Valid Admin");
}

?>