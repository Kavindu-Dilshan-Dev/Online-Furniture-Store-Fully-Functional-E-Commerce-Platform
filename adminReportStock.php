<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    $rs = Database::search("SELECT *  FROM `stock` INNER JOIN `product` ON  `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASc  ;");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Down South Furnitures</title>
        <link rel="icon" href="resources/icon/furniture.png">
    </head>

    <body>

    <div class="container mt-5" id="immmg">
            <a href="adminReport.php"> <img src="resources/images/chevron_10812252.png" alt="back" height="35px"></a>
        </div>

        <div class="container" id="printArea">
            <h2 class="text-center">Stock Report</h2>

            <table class="table table-hover mt-5">
                <thead>
                    <th>Stock Id</th>
                    <th>Product Name</th>
                    <th>Stock Qty</th>
                    <th>Unit Price</th>

                </thead>
                <tbody>

                    <?php

                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>

                        <tr>
                            <td><?php echo $d["id"] ?></td>
                            <td><?php echo $d["name"] ?></td>
                            <td><?php echo $d["qty"] ?></td>
                            <td><?php echo $d["price"] ?></td>

                        </tr>


                    <?php
                    }

                    ?>

                    

                </tbody>

            </table>
            </button>
        </div>

        <div class="d-flex justify-content-end container mt-5 mb-5">
            <button class="btn btn-outline-dark col-2" onclick="printDiv();">Print</button>
        </div>






        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
}

?>