


<nav class="navbar navbar-expand-lg navbar-dark d-flex justify-content-center ">
    <div class="container-fliud d-flex justify-content-center">
        <a class="navbar-brand h2  mb-0 mt-3 " href="#"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5  offset-1 ">
                <?php
                 if (isset($_SESSION["u"])) {
                    $user = $_SESSION["u"];
                    ?>
                    
                    <li class="nav-item me-5">
                        <a class="nav-link active  " aria-current="page" href="home.php">Welcome : <?php echo $user["fname"]."  ".$user["lname"]?></a>
                    </li>
                    
                    <?php
                 }
                
                ?>
                   

                    <li class="nav-item me-5">
                        <a class="nav-link active  " aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link active  " aria-current="page" href="index.php">Store</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link active  " aria-current="page" href="cart.php">Cart</a>
                    </li>

                    <li class="nav-item me-5">
                        <a class="nav-link active " aria-current="page" href="orderHistory.php">Purchase History</a>
                    </li>

                    <li class="nav-item me-5">
                        <a class="nav-link active " aria-current="page" href="profile.php">User Profile</a>
                    </li>

                    <?php

                    if (isset($_SESSION["u"])) {
                    ?>

                        <li class="nav-item">
                            <a class="nav-link active  " aria-current="page" href="#" onclick="signOut();"> Sign Out </a>
                        </li>

                    <?php
                    } else {
                        ?>
                          <li class="nav-item me-5">
                        <a class="nav-link active " aria-current="page" href="signin.php">Sign In</a>
                    </li>
                        <?php
                    }


                    ?>
                  







                </ul>

            </div>
        </div>
    </div>
</nav>