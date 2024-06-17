<?php

include "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Down South Furnitures</title>
    <link rel="icon" href="resources/icon/furniture.png">
</head>

<body onload="loadProduct(0);" class="sbody container">
    <!-- navBar -->
    <?php
    include "navbar.php";
    ?>
    <!-- navbar -->


   <!-- basic search -->
   <div class="container mt-5">
        <div class="row g-3 justify-content-end">
            <div class="col-12 col-sm-6 col-lg-3">
                <input type="text" class="form-control" placeholder="Enter Product Name" id="product" onkeyup="searchProduct(0);">
            </div>
            <div class="col-12 col-sm-3 col-lg-2 d-grid">
                <button class="btn btn-dark" onclick="adfilter();">Filters</button>
            </div>
        </div>
    </div>
    <!-- basic search -->

       <!-- advanced search -->
       <div class="container d-none" id="advsch">
        <div class="border border-dark border-3 mt-3 p-4 rounded-5">
            <!-- row1 -->
            <div class="row g-3">
                <!-- material -->
                <div class="col-12 col-md-6">
                    <label class="form-label">Material:</label>
                    <select class="form-select" id="mat" onchange="advSearchProduct(0);">
                        <option value="0">Select Material</option>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `material` ");
                        $num2 = $rs2->num_rows;
                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <option value="<?php echo ($d2["material_id"]) ?>"><?php echo $d2["material_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- material -->

                <!-- color -->
                <div class="col-12 col-md-6">
                    <label class="form-label">Colour:</label>
                    <select class="form-select" id="color" onchange="advSearchProduct(0);">
                        <option value="0">Select Colour</option>
                        <?php
                        $rs1 = Database::search("SELECT * FROM `color`");
                        $num1 = $rs1->num_rows;
                        for ($i = 0; $i < $num1; $i++) {
                            $d1 = $rs1->fetch_assoc();
                        ?>
                            <option value="<?php echo ($d1["color_id"]) ?>"><?php echo $d1["color_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- color -->
            </div>
            <!-- row1 -->

            <!-- row2 -->
            <div class="row g-3 mt-2">
                <!-- Category -->
                <div class="col-12 col-md-6">
                    <label class="form-label">Category:</label>
                    <select class="form-select" id="cat" onchange="advSearchProduct(0);">
                        <option value="0">Select Category</option>
                        <?php
                        $rs3 = Database::search("SELECT * FROM `category`");
                        $num3 = $rs3->num_rows;
                        for ($i = 0; $i < $num3; $i++) {
                            $d3 = $rs3->fetch_assoc();
                        ?>
                            <option value="<?php echo ($d3["cat_id"]) ?>"><?php echo $d3["cat_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- Category -->

                <!-- Size -->
                <div class="col-12 col-md-6">
                    <label class="form-label">Size:</label>
                    <select class="form-select" id="size" onchange="advSearchProduct(0);">
                        <option value="0">Select Size</option>
                        <?php
                        $rs4 = Database::search("SELECT * FROM `size` ");
                        $num4 = $rs4->num_rows;
                        for ($i = 0; $i < $num4; $i++) {
                            $d4 = $rs4->fetch_assoc();
                        ?>
                            <option value="<?php echo ($d4["size_id"]) ?>"><?php echo $d4["size_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- Size -->
            </div>
            <!-- row2 -->

            <!-- row3 -->
            <div class="row g-3 mt-4 d-flex justify-content-center">
                <!-- min price -->
                <div class="col-12 col-sm-6 col-md-3">
                    <input type="text" class="form-control" placeholder="Min Price" id="min" />
                </div>
                <!-- min price -->

                <!-- max price -->
                <div class="col-12 col-sm-6 col-md-3">
                    <input type="text" class="form-control" placeholder="Max Price" id="max" />
                </div>
                <!-- max price -->
            </div>
            <!-- row3 -->

            <!-- row4 -->
            <div class="row d-flex justify-content-center">
                <!-- adv search button -->
                <button class="btn btn-dark col-12 col-md-4 mt-4" onclick="advSearchProduct(0);">Search</button>
                <!-- adv search button -->
            </div>
            <!-- row4 -->
        </div>
    </div>
    <!-- advanced search -->

    <!-- hide div  -->
    <div class=" d-none" id="hdiv">

    </div>
    <!-- hide div  -->

    <!-- load products -->
    <div class="row row-cols-lg-4 mt-3" id="pid">



    </div>
    <!-- load products -->


    <!-- footer -->
    <div class=" col-12 ">
        <p class="text-center">&copy; 2024 Down South Furnitures || All Right Reserved</p>
    </div>
    <!-- footer -->






    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>