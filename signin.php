<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Down South Furnitures</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/icon/furniture.png">
</head>

<body class="signin_body">


    <!--Signin box-->
    <div class="signIn_Box d-none" id="signin_box">

        <div>
            <h2 class="text-center fw-bold" >Sign In</h2>

            <?php
            
            $username = "";
            $password = "";

            if (isset($_COOKIE["username"])) {

                $username = $_COOKIE["username"];
            }

            if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
            }
            
            ?>

        </div>
        <div class="mt-">
            <label for="form-label">Username : </label>
            <input type="text" class="form-control" placeholder="Ex: Shan Dias" id="un" value="<?php echo $username?>" />
        </div>
        <div class="mt-2 mb-2">
            <label for="form-label">Password : </label>
            <input type="Password" class="form-control" placeholder="Ex: ******" id="pw"  value="<?php echo $password?>" />
        </div>
        <div class="mt-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="form-label">Remember me </label>

        </div>
        <div class="mt-2 d-none" id="msgDiv2" onclick=" signload();">
            <div class="alert alert-danger " id="msg2"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-light col-12" onclick="signin();">Sign In</button>
        </div>
        <div class="mt-2">
            <button class="btn btn-info col-12" onclick="changeView();">New to Store? Register</button>
        </div>

        <div class="mt-2">
        <a href="forgetPassword.php"> <button class="btn btn-outline-secondary col-12 text-black">Forget Password?</button></a>
        </div>

    </div>
    <!--Signin box-->

    <!--Signup box-->
    <div class="signUp_box " id="signup_Box">
        <h2 class="text-center fw-bold" style="color: white; ">Sign Up</h2>

        <div class="row">

            <div class="mt-3 col-6">
                <label for="form-label">First Name : </label>
                <input type="text" class="form-control" placeholder="Ex: Shan" id="fname">
            </div>

            <div class="mt-3 col-6">
                <label for="form-label">Last Name : </label>
                <input type="text" class="form-control" placeholder="Ex: Dias" id="lname">
            </div>
        </div>

        <div class="row">

            <div class="col-6 mt-3">

                <label for="form-label">Email : </label>
                <input type="email" class="form-control" placeholder="Ex: Shan@gmail.com " id="email">

            </div>

            <div class="col-6">
                <div class="mt-3">
                    <label for="form-label">Mobile : </label>
                    <input type="text" class="form-control" placeholder="Ex: +94704568352" id="mobile">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-6">
                <div class="mt-3">
                    <label for="form-label">Username : </label>
                    <input type="text" class="form-control" placeholder="Ex: Shan Dias" id="username">
                </div>



            </div>
            <div class="col-6">
                <div class="mt-3">
                    <label for="form-label">Password : </label>
                    <input type="password" class="form-control" placeholder="Ex: ********" id="password">
                </div>
            </div>
        </div>

        <div class=" d-none" id="msgDiv1" onclick=" signload();">
            <div class=" alert alert-danger " id="msg1"></div>
        </div>

        <div class="mt-3">
            <button class="btn btn-outline-light col-12" onclick="signup();">Sign Up</button>
        </div>

        <div class="mt-2">
            <button class="btn btn-info col-12" onclick="changeView();">Already Registered? Sign In</button>
        </div>
    </div>
    <!--Signup box-->


    <script src="script.js"></script>



</body>

</html>