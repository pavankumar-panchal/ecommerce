<!DOCTYPE html>
<html>

<head>
  <title>Fashion</title>
  <meta charset="UTF-8">
  <meta name="description" content="test">
  <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
  <meta name="author" content="Anik">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
  <link rel="favicon" type="text/css" href="#favicon">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">

  <!-- Added styles for header and navigation -->
  <style>
    header {
      background-color: #fff;
      padding: 15px 0;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar {
      background-color: #fff;
      border-bottom: 1px solid #e5e5e5;
      padding: 0;
    }

    .navbar-nav .nav-link {
      color: #333;
      font-weight: bold;
      transition: color 0.2s;
    }

    .navbar-nav .nav-link:hover {
      color: blue;
    }

    .navbar-toggler-icon {
      background-color: #333;
    }

    .navbar-dark .navbar-toggler-icon {
      background-color: #fff;
    }

    .search-form {
      margin-left: 7px;
      margin-right: 7px;
    }

    .user-links a {
      color: #333;
      margin-left: 10px;
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header>
    <div class="container" style="height:100px;">
      <div class="header-top">
        <div class="row">
          <div class="col-md-12 text-center">
            <a href=""><img src="img/logo.png"></a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php
  SESSION_START();
  include "lib/connection.php";
  $id = $_SESSION['userid'];
  $sql = "SELECT * FROM cart where userid='$id'";
  $result = $conn->query($sql);
  ?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Clothing.php"> Clothing</a>
          </li>

        </ul>
        <form class="form-inline search-form" action="search(1).php" method="post">
          <input class="form-control mx-3" type="search" placeholder="Search" aria-label="Search" name="name">
          <button class="btn btn-outline-dark mx-3" type="submit">
            <img src="img/search.png" alt="Search">
          </button>
        </form>
        <?php
        $total = 0;
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            $total++;
          }
        }
        ?>
        <a href="cart(1).php" class="mx-3"><img src="img/cart.png">
          <?php echo $total ?>
        </a>
        <?php

        if (isset($_SESSION['auth'])) {
          if ($_SESSION['auth'] == 1) {
            echo $_SESSION['username']; ?>
            <a href="profile.php" class="mx-3">(My Orders)</a>
            <a href="logout.php" class="mx-3">(logout)</a>
            <?php
          }
        } else {
          ?>
          <a href="login.php " class="mx-3">Login</a>
          <a href="register.php" class="mx-3">Signup</a>
          <a href="./admin/login.php" class="mx-3"> Admin login</a>

          <?php
        }
        ?>
      </div>
    </div>
  </nav>

  <!-- Content of your page goes here -->

  <!-- Link Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>