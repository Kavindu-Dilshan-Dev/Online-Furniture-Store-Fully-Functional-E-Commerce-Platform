<?php
include "connection.php";
session_start();

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["co"];
$mat = $_POST["mat"];
$cat = $_POST["cat"];
$size = $_POST["s"];
$minPrice  = $_POST["min"];
$maxPrice = $_POST["max"];

// echo($size);

$status = 0; // no condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id` 
INNER JOIN `material` ON `product`.`material_id` = `material`.material_id INNER JOIN `category` ON `product`.`cat_id` = `category`.`cat_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`";

// search by color

if ($status == 0 && $color != 0) {
    // first search by color (where)
    $q .= " WHERE `color`.`color_id` = '" . $color . "' ";
    $status = 1;
} else if ($status != 0 && $color != 0) {
    // second search by color (AND)
    $q .= " AND `color`.`color_id` = '" . $color . "'  ";
}

// search by category

if ($status == 0 && $cat != 0) {
    $q .= " WHERE `category`.`cat_id` = '" . $cat . "'  ";
    $status = 1;
} else if ($status != 0 && $cat != 0) {
    $q .= " AND `category`.`cat_id` = '" . $cat . "' ";
}

//  search by material

if ($status == 0 && $mat != 0) {
    $q .= " WHERE `material`.`material_id` = '" . $mat . "'  ";
    $status = 1;
} else if ($status != 0 && $mat != 0) {
    $q .= " AND `material`.`material_id` = '" . $mat . "'  ";
}

// serach by size

if ($status == 0 && $size != 0) {
    $q .= " WHERE `size`.`size_id` = '" . $size . "' ";
    $status = 1;
} else if ($status != 0 && $size != 0) {
    $q .= " AND `size`.`size_id` = '" . $size . "' ";
}

// search by min price

if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC   ";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}


// search by max price 

if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}


// search by price range

if (!empty($minPrice && !empty($maxPrice))) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC  ";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 4;
$number_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
?>

    <div class="d-flex flex-column justify-content-center offset-4 mt-5">
        <h5 class="text-center">Search No Result</h5>
        <p class="text-center">We're Sorry, We Cannot Find Any Matches For Your Search Term...</p>
    </div>

    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();


    ?>

        <!-- card -->
        <div class=" mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px">
                <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"> <img src="<?php echo $d["path"] ?>" class="card-img-top"> </a>
                <div class="card-body">
                    <h5 class="card-title  text-center "><?php echo $d["name"] ?></h5>

                    <p class="card-text  text-center ">Rs: <?php echo $d["price"] ?></p>
                    <div class="d-flex justify-content-center">
                      

                        <?php 
                            if (isset($_SESSION["u"])) {
                               ?>
                                 <input type="text" value="1" id="qty" class="d-none">
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
            <div class="row">
                <div class="col-12">
                    <!-- pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link text-warning" <?php
                                                                                        if ($pageno <= 1) {
                                                                                            echo ("#");
                                                                                        } else {
                                                                                        ?> onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                    } ?>>Previous</a></li>
                                <?php
                                for ($a = 1; $a < $number_of_pages; $a++) {
                                    if ($a == $pageno) {
                                ?>

                                        <li class="page-item ">
                                            <a class="page-link text-warning" onclick="advSearchProduct(<?php echo $a ?>);"><?php echo $a ?></a>
                                        </li>


                                    <?php
                                    } else {

                                    ?>

                                        <li class="page-item">
                                            <a class="page-link text-warning" onclick="advSearchProduct(<?php echo $a ?>);"><?php echo $a ?></a>
                                        </li>

                                <?php
                                    }
                                }
                                ?>

                                <li class="page-item"><a class="page-link text-warning" <?php
                                                                                        if ($pageno >= $number_of_pages) {
                                                                                            echo ("#");
                                                                                        } else {
                                                                                        ?> onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php
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