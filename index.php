<?php
include 'header.php';
include 'lib/connection.php';

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if (isset($_POST['add_to_cart'])) {

  if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] != 1) {
      header("location:login.php");
    }
  } else {
    header("location:login.php");
  }
  $user_id = $_POST['user_id'];
  ;
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_id = $_POST['product_id'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_id'  && userid='$user_id'");

  if (mysqli_num_rows($select_cart) > 0) {
    echo $message[] = 'product already added to cart';

  } else {
    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price) VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price')");
    echo $message[] = 'product added to cart succesfully';
    header('location:index.php');
  }

}

?>

<style>
  .product-card {
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
    height: 100%;
  }

  .product-img {
    max-width: 100%;
    height: auto;
    flex: 1;
  }
</style>

<!--banner start-->
<div class="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="banner-text">
          <p class="bt1">Discover The Latest</p>
          <p class="bt2"><span class="bt3">Fashion Trends</span></p>
          <p>Shop now for stylish clothing, accessories, and more!</p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="" class="img-fluid">
      </div>
    </div>
  </div>
</div>
<!--banner end-->
<!---top sell start---->
<section>

  <div class="container">
    <div class="topsell-head">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="img/mark.png">
          <h4>All Products</h4>
          <p>Welcome to our amazing collection of products that cater to your every need. From innovative gadgets to
            stylish accessories, we have it all!</p>
        </div>
      </div>
    </div>
  </div>



  <div class="container">
    <div class="row">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="col-md-3 col-sm-6 col-6">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="product-card">
              <img class="product-img" src="admin/product_img/<?php echo $row['imgname']; ?>" alt="Product Image">
              <h6>
                <?php echo $row["name"]; ?>
              </h6>
              <span>
                <?php echo $row["Price"]; ?>
              </span>
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>">
              <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['Price']; ?>">
              <input type="submit" class="btn btn-primary mt-2" value="Add to Cart" name="add_to_cart">
            </form>
          </div>
          <?php
        }
      } else {
        echo "0 results";
      }
      ?>
    </div>
  </div>













</section>



<?php
include 'footer.php';
?>