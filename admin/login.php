<?php

SESSION_START();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] == 1) {
        header("location:home.php");
    }
}


include "lib/connection.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = ($_POST['password']);
    echo $email;
    echo $pass;

    $loginquery = "SELECT * FROM admin WHERE userid='$email' AND pass='$pass'";
    $loginres = $conn->query($loginquery);

    echo $loginres->num_rows;

    if ($loginres->num_rows > 0) {

        while ($result = $loginres->fetch_assoc()) {
            $username = $result['userid'];
        }

        $_SESSION['username'] = $username;
        $_SESSION['auth'] = 1;
        header("location:home.php");
    } else {
        echo "invalid";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
        .custom-card {
            max-width: 400px; /* Adjust the width as needed */
            margin: 0 auto;
        }
    </style>

</head>

<body>


    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card custom-card">
                <div class="card-header">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="input-group form-group">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="email">
                        </div>
                        <div class="input-group form-group">
                            <input type="password" class="form-control mt-3" id="password" placeholder="Password"
                                name="password">
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Login" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
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