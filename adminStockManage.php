<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {



?>


    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Down South Furnitures - Admin Stock</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/icon/furniture.png">
    </head>

    <body class="adminBody">

        <?php
        include "adminNavBar.php";
        ?>

        <div class="container ">
            <div class="row">

                
                <!-- product register -->




               
                <div class="col-6 mt-5 stockbox2 ">
                    
                    <h2 class="text-center">Product Registeration</h2>

                    <div class="mb-3">
                        <label class="form-label ">Product Name : </label>
                        <input type="text" class="form-control" id="pn">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">Material : </label>
                            <select class="form-select" id="mat">
                                <option value="0">Select</option>
                                <?php
                                    $rs = Database::search("SELECT * FROM `material`");
                                    $num = $rs->num_rows;

                                    for ($i=0; $i < $num ; $i++) { 
                                        $d = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($d["material_id"]) ?>"><?php echo $d["material_name"]?></option>
                                        <?php
                                    }

                                    
                                
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Category : </label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php
                                
                                   $rs =  Database::search("SELECT * FROM `category` ");
                                   $num = $rs->num_rows;

                                   for ($i=0; $i < $num ; $i++) { 
                                    $d = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo($d["cat_id"]) ?>"> <?php echo $d["cat_name"] ?> </option>
                                    <?php

                                   }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">Colour : </label>
                            <select class="form-select" id="co">
                                <option value="0">Select</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `color` ");
                                    $num = $rs->num_rows;

                                    for ($i=0; $i < $num; $i++) { 
                                        $d = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($d["color_id"]) ?>"> <?php echo $d["color_name"] ?> </option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">size : </label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php
                                    $rs = Database::search("SELECT * FROM `size` ");
                                    $num = $rs->num_rows;
                                    for ($i=0; $i < $num; $i++) { 
                                        $d = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($d["size_id"]) ?>"><?php echo $d["size_name"] ?></option>
                                        <?php
                                    }
                                ?>
                               
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">Description :</label>
                            <textarea class="form-control" rows="1" id="desc"></textarea>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Product Image :</label>
                            <input type="file" class="form-control" id="file">
                        </div>
                    </div>

                    
                    <div class="d-grid mt-3">
                        <button class="btn btn-outline-warning" onclick="regProduct();">Register Product</button>
                    </div>
                </div>

                <!-- product register -->

                <!-- stock update -->

                <div class="col-4 stockbox2  mt-5 ">
                    <h2 class="text-center">Stock Update</h2>
                    <div class="mb-3">
                        <label class="form-label mt-4">Product Name : </label>
                        <select class="form-select" id="pname">
                            <option value="0">Select</option>
                            <?php
                                $rs = Database::search("SELECT * FROM `product` ");
                                $num = $rs->num_rows;

                                for ($i=0; $i < $num; $i++) { 
                                    $d = $rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo($d["id"])?>"><?php echo $d["name"]?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-4">
                        <label class="form-label">Qty :</label>
                        <input type="text" class="form-control" id="qty">
                    </div>
                    <div class="mb-3  mt-4 ">
                        <label class="form-label">Unit Price :</label>
                        <input type="text" class="form-control" id="up">
                    </div>
                    <div class="d-grid  mt-5 ">
                        <button class="btn btn-outline-warning" onclick="updateStock();">Update Stock</button>
                    </div>
                </div>

                <!-- stock update -->
               

             
                
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
    echo ("You Are Note An Admin");
}


?>