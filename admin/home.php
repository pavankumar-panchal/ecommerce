<?php
include 'header.php';
SESSION_START();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] != 1) {
        header("location:login.php");
    }
} else {
    header("location:login.php");
}
include 'lib/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background: hsla(30, 100%, 100%, 1);

            background: radial-gradient(circle, hsla(30, 100%, 100%, 1) 50%, hsla(13, 40%, 89%, 1) 100%, hsla(22, 42%, 90%, 1) 100%);

            background: -moz-radial-gradient(circle, hsla(30, 100%, 100%, 1) 50%, hsla(13, 40%, 89%, 1) 100%, hsla(22, 42%, 90%, 1) 100%);

            background: -webkit-radial-gradient(circle, hsla(30, 100%, 100%, 1) 50%, hsla(13, 40%, 89%, 1) 100%, hsla(22, 42%, 90%, 1) 100%);

            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#FFFEFD", endColorstr="#EEDCD7", GradientType=1);
        }

        .img-waterdrop {
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .admin-title {
            font-weight: bold;
            font-size: 36px;
            margin-top: 100px;
        }

        .admin-text {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container homebody">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="admin-title"> <span style="color:#002955;"> Welcome To The Admin Panel </span> </h1>
                <p class="admin-text" style="color:#37475f; font-weight:900; font-size:18px;">Manage your products,
                    orders, users, and settings efficiently.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
</body>

</html>