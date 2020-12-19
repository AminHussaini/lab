<?php $title="Product Detail"; include "inc/header.php" ?>
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

  $startTesting = "SELECT * FROM sendfortest WHERE productid=" . $pageDetail . "";
  $startTestingResult = mysqli_query($con, $startTesting) or die("query fail");

  if (mysqli_num_rows($result) == 0) {
    echo '<script type="text/javascript">
    window.location = "' . $url . 'product-list.php"
    </script>';
  }
} else {
  echo '<script type="text/javascript">
  window.location = "' . $url . 'product-list.php"
  </script>';
}

?>
<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row clearfix">
    <div class="col-lg-6 col-md-12">
      <div id="hero">
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
    </div>
    <?php
    if (isset($_POST["send"])) {
      $sendbyuserid = $_SESSION["Id"];
      date_default_timezone_set("Asia/Karachi");
      $productDate = date('Y-m-d h:ia');

      if (mysqli_num_rows($startTestingResult) > 0) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Product is already send for testing</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      } else {
        $in_query = mysqli_query($con, "insert into sendfortest values(null,'$sendbyuserid','$pageDetail','$productDate')");
        if ($in_query) {
          echo '
          <script type="text/javascript">
            window.location = "' . $url . 'product-detail.php?id=' . $pageDetail . '"
          </script>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Product Send For test Successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        } else {
          echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>there was some error.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
      }
    }
    $productCategory = "SELECT * FROM producttype where ProductTypeId=" . $productrow['ProductIdType'] . "";
    $getProductCategory = mysqli_query($con, $productCategory);
    $getProductCategoryRow = mysqli_fetch_array($getProductCategory);
    ?>
    <div class="col-lg-6 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Product Detail</h6>
        </div>
        <div class="ms-panel-body">
          <form method="POST">
            <table class="table ms-profile-information">
              <tbody>
                <tr>
                  <th style="border-top-width: 0;padding-top:0;" scope="row">Product Name:</th>
                  <td style="border-top-width: 0;padding-top:0;"><?php echo $productrow['ProductName'] ?></td>
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
                <?php
                if ($productrow['ReBuild'] > 0) {
                  echo ' <tr>
                    <th scope="row">Product Repeat:</th>
                    <td style="white-space: inherit;">' . $productrow['ReBuild'] . '</td>
                  </tr>';
                }
                if ($productrow['Status'] > 0) {

                  $testing = "SELECT * FROM testing where ProductId=" . $productrow['ProductId'] . "";
                  $getTesting = mysqli_query($con, $testing);
                  $getTestingList = mysqli_fetch_assoc($getTesting);

                  $testingType = "SELECT * FROM testingtypes where TestingTypeID=" . $getTestingList['TestingType'] . "";
                  $getTestingType = mysqli_query($con, $testingType);
                  $getTestingTypeList = mysqli_fetch_assoc($getTestingType);

                  $testingUser = "SELECT * FROM register where id=" . $getTestingList['TestingUser'] . "";
                  $getTestingUser = mysqli_query($con, $testingUser);
                  $getTestingUserList = mysqli_fetch_assoc($getTestingUser);
                  echo '
                    <tr>
                      <th scope="row">Tester Name:</th>
                      <td style="white-space: inherit;">' .$getTestingUserList['name']  . '</td>
                    </tr>
                    <tr>
                      <th scope="row">Tester Category:</th>
                      <td style="white-space: inherit;">' . $getTestingTypeList['TestingTypeName'] . '</td>
                    </tr>
                    ';
                }
                ?>

                <tr>
                  <th scope="row">Product Status:</th>
                  <td style="white-space: inherit;">
                    <?php
                    if (mysqli_num_rows($startTestingResult) > 0) {
                      if ($productrow['Status'] == 1) echo "Testing start";
                      else if ($productrow['Status'] == 2) echo "Approved";
                      else if ($productrow['Status'] == 3) echo "Rejected";
                      else echo "Pending";
                    } else {
                      echo "Ready";
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td colspan='2'>
                    <?php
                    if (!mysqli_num_rows($startTestingResult) > 0) {
                      echo '<button class="btn btn-primary mt-4 d-block w-5 text-white" name="send">Send for Test</button>';
                    }
                    if (mysqli_num_rows($startTestingResult) > 0 && $productrow['Status'] == 3) {
                      echo '<button class="btn btn-primary mt-4 d-block w-5 text-white" name="resend">Resend</button>';
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
  <?php
  $multiremark = "SELECT * FROM testingremark Where RemarkParent=$pageDetail";
  $getmultiremark = mysqli_query($con, $multiremark) or die("Query fail");

  $j = 0;
  if (mysqli_num_rows($getmultiremark) > 0) {
    $startTesting = "SELECT * FROM sendfortest WHERE productid=" . $pageDetail . "";
    $startTestingResult = mysqli_query($con, $startTesting) or die("query fail");
    $rowSender = mysqli_fetch_assoc($startTestingResult);

    $sendername = "SELECT * FROM register where id=" . $rowSender["sendbyuser"] . "";
    $getsendername = mysqli_query($con, $sendername) or die("sender fail");
    $getsendernameDetail = mysqli_fetch_assoc($getsendername);
  ?>
    <div class="row clearfix" style='margin-top:30px'>
      <div class="col-md-12">
        <div class="ms-panel ms-panel-fh ms-widget ms-chat-conversations">
          <div class="ms-panel-header">
            <div class="ms-chat-header justify-content-between">
              <div class="ms-chat-user-container media clearfix">
                <div class="ms-chat-img mr-3 align-self-center">
                  <img style="height:40px;width: 40px;" src="assets/user_image/<?php echo $getsendernameDetail['image'] ?>" class="ms-img-round" alt="people">
                </div>
                <div class="media-body ms-chat-user-info mt-1">
                  <h6><?php echo $getsendernameDetail['name'] ?></h6>
                  <span class="text-disabled fs-12"><?php echo $getsendernameDetail['role'] ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="ms-panel-body ms-scrollable ps">
            <?php
            while ($fetch = mysqli_fetch_assoc($getmultiremark)) {
              $image = "SELECT * FROM register Where Id=" . $fetch["RemarkUser"] . "";
              $getimage = mysqli_query($con, $image) or die("Query fail");
              $getimageList = mysqli_fetch_assoc($getimage);

              $testing = "SELECT * FROM testing where ProductId=" . $productrow['ProductId'] . "";
              $getTesting = mysqli_query($con, $testing);
              $getTestingList = mysqli_fetch_assoc($getTesting);
              echo '
                  <div class="ms-chat-bubble ms-chat-message ms-chat-incoming media clearfix">
                    <div class="ms-chat-img">
                      <img style="height:40px;width: 40px;" src="assets/user_image/' . $getimageList["image"] . ' ?>" class="ms-img-round" alt="people">
                    </div>
                    <div class="media-body">
                      <div class="ms-chat-text">
                        <p style="text-transform: capitalize;">
                        ' . $fetch["Remark"] . '
                        </p>
                      </div>
                      <p class="ms-chat-time">' . $fetch['RemarkDate'] . '</p>
                    </div>
                  </div>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>


<?php include "inc/footer.php" ?>
<script src="assets/slider-nav/js/jquery.js"></script>
<!-- <script type="text/javascript" src="http://www.queness.com/js/bsa2.js"></script> -->
<script src="assets/slider-nav/js/jquery.flexslider-min.js"></script>
<script src="assets/slider-nav/js/demo.js"></script>
<?php
if (isset($_POST["resend"]) && $productrow['Status'] == 3) {
  $sendbyuserid = $_SESSION["Id"];

  if (mysqli_num_rows($startTestingResult) > 0) {
    $reBuildQuery = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from product WHERE ProductId=$pageDetail"));
    $totalReBuild = $reBuildQuery['ReBuild'] + 1;
    $resend = "UPDATE product set Status=0 ,ReBuild=$totalReBuild WHERE ProductId=$pageDetail";

    $resendfortest = "UPDATE sendfortest set sendbyuser=$sendbyuserid, Datetime='$dateTime' WHERE productid=$pageDetail";
    if (mysqli_query($con, $resend) && mysqli_query($con, $resendfortest)) {

      echo '
      <script type="text/javascript">
        window.location = "' . $url . 'product-detail.php?id=' . $pageDetail . '"
      </script>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Product Resend For test Successfully</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Fail</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  }
}


?>