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

<body class="adminSignIn_Body ">

    <div class="adminSigninBox">

        <h2 class="text-center  tcolorb">Admin Login</h2>

        <div class="mt-3">
            <label for="form-label" class="tcolorb fw-bold">Username : </label>
            <input type="text" class="form-control border-black bg-dark" placeholder="Ex: Khan" id="un">
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label" class="tcolorb fw-bold">Password : </label>
            <input type="password" class="form-control border-black bg-dark" placeholder="Ex: *******" id="pw">
        </div>

        <div class="d-none" id="msgDiv" onclick="adminsign();">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class=" btn btn-secondary col-12" onclick="adminSignIn();">Sign In</button>
        </div>
        <div class="mt-3">
            <a href="adminforgetPassoword.php"> <button class=" btn btn-outline-danger col-12" >Forget Password?</button></a> 
        </div>

    </div>


    <script src="script.js"></script>
</body>

</html>