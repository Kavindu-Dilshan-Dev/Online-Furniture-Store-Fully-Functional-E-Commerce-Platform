<!DOCTYPE html>
<html lang="en"  data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Down South Furnitures</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/icon/furniture.png">
</head>
<body class="signin_body">

    <!-- signin box -->
    <div class="signIn_Box" id="signin_Box">

        <div>
            <h2 class="text-center">Reset Password</h2>

        </div>

        <div class=" d-none">
            <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"])?>"/>
        </div>

        <div class="mt-4 mb-4">
            <label for="form-label">Password: </label>
            <input type="password" class="form-control" id="np"/>
        </div>

        <div class="mt-4 mb-4">
            <label for="form-label">Re-enter Password : </label>
            <input type="password" class="form-control" id="np2"/>
        </div>

        <div class=" d-none" id="msgDiv2" onclick="loadsize()">
            <div class=" alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="resetPassword();">Update</button>
        </div>

     


    </div>
    <!--Signin box-->
    <script src="script.js"></script>
</body>
</html>