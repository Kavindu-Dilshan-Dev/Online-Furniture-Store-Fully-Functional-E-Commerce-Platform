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

    <!-- fb box -->
    <div class="signIn_Box">

        <div>
            <h2 class="text-center">Forget Password</h2>

        </div>

        <div class="mt-4 mb-4">
            <label for="form-label">Email: </label>
            <input type="email" class="form-control" id="e" />
        </div>

        <div class=" d-none" id="msgDiv" onclick="loadsize()">
            <div class=" alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="forgetPassword();">Send Email</button>
        </div>




    </div>
    <!--fp box-->
    <script src="script.js"></script>
</body>

</html>