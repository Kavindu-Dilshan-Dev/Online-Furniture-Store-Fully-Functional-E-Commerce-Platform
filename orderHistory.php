<?php

session_start();
$user = $_SESSION["u"];
include "connection.php";

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

    <body class="orderBody">
        <!-- navbar -->
        <?php
        include "navBar.php";
        ?>
        <!-- navbar -->

    
        <div class="container mt-5">

<!-- Order History -->
<div class="row mt-5" id="ordhid">

    <?php
    $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo '<div class="col-12 mt-4 mb-3"><h3>Order History</h3></div>';

        while ($d = $rs->fetch_assoc()) {
    ?>

<div class="col-12 mb-4">
    <div class="card border-3 rounded-3 bg-body-secondary">
        <div class="card-header">
            <h5 class="card-title mb-0">Order ID <span class="text-danger">#<?php echo $d["order_id"] ?></span></h5>
            <p class="card-text mb-0">Order Date & Time: <?php echo $d["order_date"] ?></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON 
                                                `order_item`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN
                                                `product` ON `stock`.`product_id` = `product`.`id` WHERE
                                                `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");
                        while ($d2 = $rs2->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $d2["name"] ?></td>
                                <td><?php echo $d2["oi_qty"] ?></td>
                                <td>Rs:<?php echo ($d2["price"]) * ($d2["oi_qty"]) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div>
                    <h6>Delivery Fee: <span class="text-warning">500</span></h6>
                    <h4>Net Total: <span class="text-warning"><?php echo $d["amount"] ?></span></h4>
                </div>
                
            </div>
        </div>
    </div>
</div>

          
           
    <?php
        }
    } else {
    ?>
        
        <div class="col-12 text-center mt-5">
            <h2>You have not ordered anything yet!</h2>
            <a href="index.php" class="btn btn-primary">Start Shopping</a>
        </div>
       
    <?php
    }
    ?>
</div>



<div class="row mt-3 justify-content-end">
    <div class="col-auto">
        <button class="btn btn-outline-light" onclick="printpurchhis();">Get A Print</button>
    </div>
</div>

</div>









        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php

} else {
    header("location:signin.php");
}



?>