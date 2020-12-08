<?php include "inc/header.php" ?>
<link rel="stylesheet" href="assets/slider-nav/css/flexslider.css" />
<link rel="stylesheet" href="assets/slider-nav/css/demo.css" />
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "CPRI") echo $return_var;
?>
<?php
if (isset($_GET['id'])) {

  $pageDetail = $_GET['id'];

  $sqlq = "SELECT * FROM product where ProductId=" . $pageDetail . "";
  $result = mysqli_query($con, $sqlq) or die("query fail");

  $productrow = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 0) {
    echo '<script type="text/javascript">
    window.location = "' . $url . 'product-list.php"
    </script>';
    
  }
  

  // date_default_timezone_set("Asia/Karachi");
  // $productDate = date('Y-m-d h:ia');
  // echo $productDate;
}
?>
<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <div id="hero" class="col-md-6">
      <div class="flexslider">
        <ul class="slides">
          <?php
          $multi = "SELECT * FROM multiimages";
          $getMulti = mysqli_query($con, $multi) or die("Query fail");
          $getMultiRow = mysqli_fetch_array($getMulti);
          $j = 0;
          if (mysqli_num_rows($getMulti) > 0) {
            while ($fetch = mysqli_fetch_assoc($getMulti)) {
              if ($pageDetail == $fetch["parentId"]) {
                echo "<li><img src='assets/product-image/" . $fetch['file_name'] . "' alt=" . explode(".", $fetch['file_name'])[0] . " data-thumbnail='assets/product-image/" . $fetch['file_name'] . "'/></li>";
              }
            }
          }
          ?>
        </ul>
      </div>
    </div>


    <?php

if(isset($_POST["send"])){
  
  $sendbyuserid=$_SESSION["Id"];
  $productid=$pageDetail; 
  
  date_default_timezone_set("Asia/Karachi");
  $productDate = date('Y-m-d h:ia');
  

  $in_query= mysqli_query($con,"insert into sendfortest values(null,'$sendbyuserid','$productid','$productDate')");


  if($in_query){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Product Send For test Sussecfully</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  else{
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>there was some error.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  
  
}

?>

    <div class="col-xl-5 col-md-6">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-body">
          <h2 class="section-title">Product Details</h2>
          <form method="POST">
          <table class="table ms-profile-information">
            <tbody>

              <?php

              $productCategory = "SELECT * FROM producttype where ProductTypeId=" . $productrow['ProductIdType'] . "";
              $getProductCategory = mysqli_query($con, $productCategory);
              $getProductCategoryRow = mysqli_fetch_array($getProductCategory);
              ?>
              <tr>
                <th scope="row">Category Name:</th>
                <td><?php echo $getProductCategoryRow['ProductName'] ?></td>
              </tr>
              <tr>
                <?php
                $sql = "SELECT * FROM register where id=" . $getProductCategoryRow['ProductCateAddUser'] . "";
                $getRegister = mysqli_query($con, $sql);
                $getRegisterRow = mysqli_fetch_assoc($getRegister);
                ?>
                <th scope="row">Category Add by User:</th>
                <td><?php echo $getRegisterRow['name'] ?></td>
              </tr>
              <tr>
              <tr>
                <th scope="row">Category Description:</th>
                <td style="white-space: inherit;"><?php echo $getProductCategoryRow['ProductDescription'] ?></td>
              </tr>

              <tr>
                <th scope="row">Product Name:</th>
                <td><?php echo $productrow['ProductName'] ?></td>
              </tr>

              <?php
              $sq = "SELECT * FROM register where id=" . $productrow['ProductaddUserName'] . "";
              $getRegisters = mysqli_query($con, $sq);
              $getusernameRow = mysqli_fetch_assoc($getRegisters);
              ?>
              <tr>
                <th scope="row">Product Add by User:</th>
                <td><?php echo $getusernameRow['name'] ?></td>
              </tr>
              <tr>
                <th scope="row">Product Code:</th>
                <td><?php echo $productrow['ProductCode'] ?></td>
              </tr>
              <tr>
                <th scope="row">Product Date:</th>
                <td><?php echo $productrow['ProductDate'] ?></td>
              </tr>
              <tr>
                <th scope="row">Product Detail:</th>
                <td style="white-space: inherit;"><?php echo $productrow['ProductDetail'] ?></td>
              </tr>
              
              <tr>
                <td colspan='2'>
                  <?php
                  
                   $qurey_em=mysqli_query($con,"select * from sendfortest where productid='$pageDetail'");

                    if(mysqli_num_rows($qurey_em) >0){
                     echo '<button class="btn btn-primary  mt-4 d-block w-5 text-white" disabled >Send for Test</button>';

                    }
                    else{
                     echo '<button class="btn btn-primary  mt-4 d-block w-5 text-white" name="send" id="$pageDetail">Send for Test</button>';
                    }

                  ?>
                  
                
                </td>
              </tr>
            </tbody>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include "inc/footer.php" ?>
<script src="assets/slider-nav/js/jquery.js"></script>
<!-- <script type="text/javascript" src="http://www.queness.com/js/bsa2.js"></script> -->
<script src="assets/slider-nav/js/jquery.flexslider-min.js"></script>
<script src="assets/slider-nav/js/demo.js"></script>


