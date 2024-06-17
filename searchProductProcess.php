<?php

include "connection.php";
session_start();

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];

// echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN  `product` ON `stock`.product_id = `product`.`id` 
WHERE `product`.`name` LIKE '%$product%' ";

$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 4;
$number_of_pages = ceil($num / $results_per_page);

// echo($number_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results   ";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

if ($num2 == 0) {
    // display no results
?>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center mt-5">
                <h3 class="mt-5 mb-5">No Items Matching.....</h3>
            </div>
        </div>
    </div>

    <?php
} else {
    // load produts
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>


        <!-- card -->
        <div class=" mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px">
                <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"> <img src="<?php echo $d["path"] ?>" class="card-img-top"> </a>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $d["name"] ?></h5>

                    <p class="card-text text-center ">Rs: <?php echo $d["price"] ?></p>
                    <div class="d-flex justify-content-center">
                       
                    <input type="text" value="1" id="qty" class="d-none">
                        <?php 
                            if (isset($_SESSION["u"])) {
                               ?>
                               
                               <button class="btn btn-outline-light col-6" onclick="addToCart(<?php echo $d['stock_id']?>);">Add To Cart</button>
                                <button class="btn btn-outline-warning col-6 ms-2" onclick="buyNow(<?php echo $d['stock_id']?>);">Buy Now</button>
                               <?php
                            }
                            ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- card -->





    <?php
    }

    ?>

    <div class="container">
        <div class="row ">
            <div class="col-12">
                <!-- pagination -->
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link text-warning" <?php
                                                                                    if ($pageno <= 1) {
                                                                                        echo ("#");
                                                                                    } else {
                                                                                    ?> onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                            } ?>>Previous</a></li>
                            <?php
                            for ($a = 1; $a < $number_of_pages; $a++) {
                                if ($a == $pageno) {
                            ?>

                                    <li class="page-item ">
                                        <a class="page-link text-warning" onclick="loadProduct(<?php echo $a ?>);"><?php echo $a ?></a>
                                    </li>


                                <?php
                                } else {

                                ?>

                                    <li class="page-item">
                                        <a class="page-link text-warning" onclick="loadProduct(<?php echo $a ?>);"><?php echo $a ?></a>
                                    </li>

                            <?php
                                }
                            }
                            ?>

                            <li class="page-item"><a class="page-link text-warning" <?php
                                                                                    if ($pageno >= $number_of_pages) {
                                                                                        echo ("#");
                                                                                    } else {
                                                                                    ?> onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                            } ?>>Next</a></li>





                        </ul>
                    </nav>
                </div>
                <!-- pagination -->

            </div>
        </div>

    </div>
<?php

}


?>