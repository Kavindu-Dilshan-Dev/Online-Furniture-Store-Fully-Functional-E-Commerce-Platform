<?php

include "connection.php";
session_start();

$pageno = 0;
$page = $_POST["p"];

// echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC ";

$rs = Database::search($q);
$num = $rs->num_rows;

// echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);

// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;
// echo($page_results);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results ";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

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
                    <h5 class="card-title text-center"><?php echo $d["name"] ?></h5>

                    <p class="card-text text-center ">Rs: <?php echo $d["price"] ?></p>
                    <div class="d-flex justify-content-center">


                        <?php
                        if (isset($_SESSION["u"])) {
                        ?>
                            <input type="text" value="1" id="qty" class="d-none" />
                            <button class="btn btn-outline-light col-6" onclick="addToCart(<?php echo $d['stock_id'] ?>);">Add To Cart</button>
                            <button class="btn btn-outline-warning col-6 ms-2" onclick="buyNow(<?php echo $d['stock_id'] ?>);">Buy Now</button>
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

    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                                <ul class="pagination">
                                         <li class="page-item <?php echo ($pageno <= 1) ? 'disabled' : ''; ?>">
                                        <a class="page-link text-warning" href="#" <?php echo ($pageno <= 1) ? 'onclick="event.preventDefault();"' : 'onclick="loadProduct(' . ($pageno - 1) . ')";'; ?>>Previous</a>
                                    </li>
                                    <?php for ($a = 1; $a <= $num_of_pages; $a++) : ?>
                                <li class="page-item <?php echo ($a == $pageno) ? 'active' : ''; ?>">
                                    <a class="page-link text-warning" href="#" onclick="loadProduct(<?php echo $a; ?>);"><?php echo $a; ?></a>
                                </li>
                                        <?php endfor; ?>
                            <li class="page-item <?php echo ($pageno >= $num_of_pages) ? 'disabled' : ''; ?>">
                                <a class="page-link text-warning" href="#" <?php echo ($pageno >= $num_of_pages) ? 'onclick="event.preventDefault();"' : 'onclick="loadProduct(' . ($pageno + 1) . ')";'; ?>>Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


<?php
}


?>