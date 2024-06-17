<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    $rs =  Database::search("SELECT * FROM `product` INNER JOIN `material` ON `product`.material_id = `material`.material_id INNER JOIN `color` 
    ON `product`.color_id = `color`.color_id INNER JOIN `category` ON `product`.`cat_id` = `category`.cat_id
    INNER JOIN `size` ON `product`.size_id = `size`.size_id ORDER BY `product`.id ASC");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>Product Report</title>
        <link rel="icon" href="resources/icon/furniture.png">

    </head>

    <body>

        <div class="container mt-5" id="immmg">
            <a href="adminReport.php"> <img src="resources/images/chevron_10812252.png" alt="back" height="35px"></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">Product Report</h2>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Material Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>size</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>

                        <tr>
                            <td class="col-1"><?php echo $d["id"] ?></td>
                            <td><?php echo $d["name"] ?></td>
                            <td><?php echo $d["material_name"] ?></td>
                            <td><?php echo $d["cat_name"] ?></td>
                            <td><?php echo $d["color_name"] ?></td>
                            <td><?php echo $d["size_name"] ?></td>
                            <td class="col-6"><?php echo $d["description"] ?></td>
                            <td><img src="<?php echo $d["path"] ?>" height="100"></td>
                        </tr>

                    <?php
                    }


                    ?>



                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5 mb-5">
            <button class="btn btn-outline-dark col-2" onclick="printDiv();">Print</button>
        </div>





        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php
} else {
    echo ("Your Are Not a Valid Admin");
}

?>