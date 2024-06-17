<?php
include "connection.php";
session_start();
if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT `order_id`, `order_date`, `amount` FROM `order_history`");
    $num = $rs->num_rows;

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Down South Furnitures - Admin Dashboard</title>
    <link rel="icon" href="resources/icon/furniture.png">
</head>

<body class="adminBody3" onload="loadchart(); loadsales()">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid ms-5">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mt-2 ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item me-2 mt-2 ms-5">
                   
                    <a class="navbar-brand h1  mb-0 mt-3 " href="adminDashboard.php">Down South Furnitures - Admin Dashboard</a>
                </li>

                

                <li class="nav-item ms-3">
                    <a class="nav-link active" aria-current="page" href="adminUser.php">User Management</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="nav-link active" aria-current="page" href="adminProductManage.php">Product Management</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="nav-link active" aria-current="page" href="adminStockManage.php">Stock Management</a>
                </li>


                <li class="nav-item ms-3 ">
                    <a class="nav-link active " aria-current="page" href="adminReport.php"> &nbsp;&nbsp;Reports&nbsp;&nbsp; </a>
                </li>
                
                <li class="nav-item ms-5 ">
                    <a class="nav-link active " aria-current="page" onclick="signOutadmin();"> &nbsp;&nbsp;Sign Out&nbsp;&nbsp; </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
    <!-- Navbar -->

    <!-- Chart -->
    <div class="container mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <h2 class="text-center mb-4 mt-4">Most Sold Product</h2>
                <canvas id="myChart" class="text-dark" ></canvas>
            </div>
        </div>
    </div>
    <!-- Chart -->

    <!-- sales  -->
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Number Of Orders</h5>
                        <h6 class="card-subtitle mb-2 text-muted mt-4"><?php echo $num ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sales</h5>
                        <h6 class="card-subtitle mb-2 text-muted mt-4">
                            <?php
                            $rs2 = Database::search("SELECT SUM(`amount`) AS total_amount FROM `order_history`");
                            if ($rs2) {
                                $row = $rs2->fetch_assoc();
                                $total_amount = $row['total_amount'];
                                echo "Total Amount: Rs. " . $total_amount;
                            } else {
                                echo "No results found.";
                            }
                            ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $rs->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
     <!-- sales  -->


    <!-- Footer -->
    <footer class=" bg-dark text-white text-center py-3 d-flex justify-content-center">
        &copy; 2024 Down South Furnitures || All Right Reserved
    </footer>
    <!-- Footer -->

    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php
} else {
    echo "You Are Not a Valid Admin";
}
?>
