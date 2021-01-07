<?php $title="Product Test"; include "inc/header.php" ?>
<link rel="stylesheet" href="assets/slider-nav/css/flexslider.css" />
<link rel="stylesheet" href="assets/slider-nav/css/demo.css" />
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "SRS") echo $return_var;
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
} else {
  echo '<script type="text/javascript">
  window.location = "' . $url . 'product-list.php"
  </script>';
}
?>
<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <div id="hero" class="col-xl-6 col-md-12">
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
    <div class="col-xl-6 col-md-12">
      <div class="ms-panel ms-panel-fh testing-detail">
        <div class="ms-panel-header">
          <h6>Testing Detail</h6>
        </div>
        <div class="ms-panel-body">
          <form method="POST">
            <table class="table ms-testing-information">
              <tbody>
                <?php
                $productCategory = "SELECT * FROM producttype where ProductTypeId=" . $productrow['ProductIdType'] . "";
                $getProductCategory = mysqli_query($con, $productCategory);
                $getProductCategoryRow = mysqli_fetch_array($getProductCategory);

                ?>
                <tr>
                  <th style="border-top-width: 0;padding-top:0;" scope="row">Product Name:</th>
                  <td style="border-top-width: 0;padding-top:0;" style="text-transform: capitalize;"><?php echo $productrow['ProductName'] ?></td>
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
                  <th scope="row">Product Detail:</th>
                  <td style="white-space: inherit;"><?php echo $productrow['ProductDetail'] ?></td>
                </tr>
                <tr>
                  <th scope="row">Category Name:</th>
                  <td style="text-transform: capitalize;"><?php echo $getProductCategoryRow['ProductName'] ?></td>
                </tr>
                <?php
                  if ($productrow['ReBuild'] > 0) {
                    echo ' <tr>
                      <th scope="row">Product Repeat:</th>
                      <td style="white-space: inherit;">' . $productrow['ReBuild'] . '</td>
                    </tr>';
                  }
                ?>

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
                $testing = "SELECT * FROM testing where ProductId=" . $productrow['ProductId'] . "";
                $getTesting = mysqli_query($con, $testing);
                $getTestingList = mysqli_fetch_assoc($getTesting);

                $testUser = "SELECT * FROM register where id=" . $getTestingList['TestingUser'] . "";
                $getTestUser = mysqli_query($con, $testUser);
                $getTestUserRow = mysqli_fetch_assoc($getTestUser);
                ?>
                <tr>
                  <th scope="row">Testing Add by User:</th>
                  <td style="white-space: inherit;"><?php echo $getTestUserRow['name'] ?></td>
                </tr>
                <tr>
                  <th scope="row">Testing Code:</th>
                  <td style="white-space: inherit;"><?php echo $getTestingList['TestingCode'] ?></td>
                </tr>
                <tr>
                  <th scope="row">Testing Start Date:</th>
                  <td style='min-width: 170px;white-space: initial;'>
                    <b>Date: </b>
                    <?php echo explode(" ", $getTestingList['TestingDate'])[0] ?>
                    <br>
                    <b>Time: </b>
                    <?php echo explode(" ", $getTestingList['TestingDate'])[1] ?>
                  </td>
                </tr>
                <?php
                if (!empty($getTestingList['EndDate'])) {
                  echo '
                  <tr>
                    <th scope="row">Testing End Date:</th>
                    <td style="min-width: 170px;white-space: initial;">
                      <b>Date: </b>
                      ' . explode(" ", $getTestingList['EndDate'])[0] . '
                      <br>
                      <b>Time: </b>
                      ' . explode(" ", $getTestingList['EndDate'])[1] . '
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Result</th>
                    <td style="min-width: 170px;white-space: initial;">
                     ';
                        if ($productrow['Status'] == 0) echo "Pending";
                        if ($productrow['Status'] == 1) echo "Test Start";
                        else if ($productrow['Status'] == 2) echo "Approved";
                        else if ($productrow['Status'] == 3) echo "Rejected";
                        echo '
                          </td>
                        </tr>
                ';
                } else {
                ?>
                  <tr>
                    <th>
                      Remarks
                    </th>
                    <td>
                      <textarea class="form-control input-sm" rows="3" name="remark" placeholder="Enter your remarks" required></textarea>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2">
                      <button class="btn btn-primary mt-0 d-inline w-20" id="approved" name="approved" type="submit">Approved</button>
                      <button class="btn btn-danger mt-0 d-inline w-20" id="rejected" name="rejected" type="submit">Rejected</button>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <?php
    $multiremark = "SELECT * FROM testingremark Where RemarkParent=$pageDetail";
    $getmultiremark = mysqli_query($con, $multiremark) or die("Query fail");

    $startTesting = "SELECT * FROM sendfortest WHERE productid=" . $pageDetail . "";
    $startTestingResult = mysqli_query($con, $startTesting) or die("query fail");
    $rowSender = mysqli_fetch_assoc($startTestingResult);

    $sendername = "SELECT * FROM register where id=" . $rowSender["sendbyuser"] . "";
    $getsendername = mysqli_query($con, $sendername) or die("sender fail");
    $getsendernameDetail = mysqli_fetch_assoc($getsendername);

    $j = 0;
    if (mysqli_num_rows($getmultiremark) > 0) {
    ?>
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
              if ($fetch["Status"] == 0) {
                $status= "reject";

              }else {
                $status= "approved";
              }
              echo '
              <div class="ms-chat-bubble ms-chat-message ms-chat-outgoing media clearfix">
                  <div class="ms-chat-img">
                    <img src="assets/user_image/' . $getimageList["image"] . ' ?>" class="ms-img-round" alt="people">
                  </div>
                  <div class="media-body">
                    <div class="ms-chat-text">
                      <p class="'.$status.'">
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
    <?php } ?>
  </div>

</div>
<?php
if (isset($_POST['approved'])) {
  extract($_POST);
  if ($getusernameRow['Id'] == $_SESSION["Id"]) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Product sender and tester user are same</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  } else {
    $approvedQuery = "UPDATE product SET Status=2 WHERE ProductId =$pageDetail";
    $approvedQueryResult = mysqli_query($con, $approvedQuery) or die("query fail-1");
    if ($approvedQueryResult) {
      $remarkQuery = "insert into testingremark values(null, '".strtolower($remark)."',$pageDetail," . $_SESSION["Id"] . ",'$dateTime',1)";
      $remarkQueryResult = mysqli_query($con, $remarkQuery) or die("query fail-2");
      echo $dateTime;
      $testingQuery = "UPDATE testing SET EndDate='$dateTime' WHERE ProductId =$pageDetail";
      $testingQueryResult = mysqli_query($con, $testingQuery) or die("query fail-3");

      if ($remarkQuery && $testingQueryResult) {
        echo '
        <script type="text/javascript">
        window.location = "' . $url . 'testing-detail.php?id=' . $pageDetail . '"
        </script>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>This product is approved</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Something went wrong</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
    }
  }
}
if (isset($_POST['rejected'])) {
  extract($_POST);
  if ($getusernameRow['Id'] == $_SESSION["Id"]) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Product sender and tester user are same</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  } else {
    $approvedQuery = "UPDATE product SET Status=3 WHERE ProductId =$pageDetail";
    $approvedQueryResult = mysqli_query($con, $approvedQuery) or die("query fail-1");
    if ($approvedQueryResult) {
      $remarkQuery = "insert into testingremark values(null, '".strtolower($remark)."',$pageDetail," . $_SESSION["Id"] . ",'$dateTime',0)";
      $remarkQueryResult = mysqli_query($con, $remarkQuery) or die("query fail-2");
      $testingQuery = "UPDATE testing SET EndDate='$dateTime' WHERE ProductId =$pageDetail";
      $testingQueryResult = mysqli_query($con, $testingQuery) or die("query fail-3");

      if ($remarkQuery && $testingQueryResult) {
        echo '
      <script type="text/javascript">
      window.location = "' . $url . 'testing-detail.php?id=' . $pageDetail . '"
      </script>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>This product is approved</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something went wrong</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
  }
}



?>


<?php include "inc/footer.php" ?>
<script src="assets/slider-nav/js/jquery.js"></script>
<!-- <script type="text/javascript" src="http://www.queness.com/js/bsa2.js"></script> -->
<script src="assets/slider-nav/js/jquery.flexslider-min.js"></script>
<script src="assets/slider-nav/js/demo.js"></script>