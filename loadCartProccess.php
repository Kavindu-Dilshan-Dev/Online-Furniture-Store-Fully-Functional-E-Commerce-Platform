<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` WHERE `cart`.`user_id` = '" . $user["id"] . "' ");

$num = $rs->num_rows;

if ($num > 0) {
    # load cart

?>

    <div class="mb-4 mt-4 justify-content-center d-flex">
        <h3>Shopping Cart</h3>
    </div>


    <?php

    for ($i = 0; $i < $num; $i++) {

        $d = $rs->fetch_assoc();

        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;

    ?>

        <div class="col-md-8 col-lg-6 mx-auto mb-4">
            <div class="card border border-3 border-light rounded-5 p-3" >
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $d["path"] ?>" class="card-img-top rounded-4" alt="Product Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d["name"] ?></h5>
                            <p class="card-text mb-1"><small class="text-muted">Colour: <?php echo $d["color_name"] ?></small></p>
                            <p class="card-text mb-3"><small class="text-muted">Size: <?php echo $d["size_name"] ?></small></p>
                            <h6 class="card-text text-warning">Price: Rs <?php echo $d["price"] ?></h6>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-light btn-sm me-2" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');">-</button>
                                    <input type="number" id="qty<?php echo $d['cart_id'] ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" value="<?php echo $d["cart_qty"] ?>" disabled>
                                    <button class="btn btn-light btn-sm ms-2" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');">+</button>
                                </div>
                                <div class="d-flex align-items-center">
                                    
                                    <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>');">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }

    ?>




    <div class=" col-12 mt-4">
        <hr />
    </div>

    <!-- check out  -->
    <div class=" d-flex flex-column align-items-center justify-content-center mt-3">
        <h6>Number of Items: <span class="text-warning"><?php echo $num ?></span></h6>
        <h5>Delivery Fees: <span class="text-warning">Rs:500</span></h5>
        <h3>Net Total: <span class="text-warning ">Rs: <?php echo ($netTotal + 500) ?></span></h3>
        <button class=" btn btn-outline-warning col-3 mt-3 mb-4" onclick="checkout();">CHECKOUT</button>
    </div>
    <!-- check out  -->


<?php

} else {
?>

    <!-- emty cart  -->
    <div class="col-12 text-center mt-5">
        <h2 class="mt-5 mb-5">Your Cart is Empty!</h2>
        <a href="index.php"><button class="btn btn-outline-warning mt-2">Start Shopping</button></a>
    </div>
    <!-- emty cart  -->

<?php
}


?>