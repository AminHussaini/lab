<?php include "inc/header.php" ?>
<link rel="styleSheet" href="assets/css/lightslider.css">
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "CPRI") echo $return_var;
?>
<?php
if (isset($_GET['id'])) {
  echo $_GET['id'];
  $pageDetail = $_GET['id'];
}
?>
<div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="#">Product</a></li>
          <li class="breadcrumb-item"><a href=<?php echo $url ?>product-list.php>Product List</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
        </ol>
      </nav>
    </div>
    <div class="col-md-12">
      <div class="demo">
        <ul id="lightSlider">
          <?php
          $multi = "SELECT * FROM multiimages";
          $getMulti = mysqli_query($con, $multi) or die("Query fail");
          $getMultiRow = mysqli_fetch_array($getMulti);
          $j = 0;
          if (mysqli_num_rows($getMulti) > 0) {
            while ($fetch = mysqli_fetch_assoc($getMulti)) {
              if ($pageDetail == $fetch["parentId"]) {

                echo " <li data-thumb='assets/product-image/" . $fetch['file_name'] . "'>
                <img src='assets/product-image/" . $fetch['file_name'] . "' />
              </li>";
              }
            }
          }

          ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include "inc/footer.php" ?>
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/lightslider.js"></script>
<script>
  $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9,
    slideMove: 1,
    speed: 1000,
    // auto: true,
    pause: 3000,
    loop: true,
    enableTouch: true,
    enableDrag: true,
    freeMove: false,
    swipeThreshold: 40,
  });
</script>