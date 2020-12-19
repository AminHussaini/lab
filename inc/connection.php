<?php
// // // for website
// $con = mysqli_connect("sql310.epizy.com", "epiz_27415298", "y6SipnQ2p0w2QO", "epiz_27415298_labautomation");

// // for website
// $url = "http://lab-automation.epizy.com/";

// // for website
// $imagelocation="http://lab-automation.epizy.com/assets/";



$con = mysqli_connect("localhost", "root", "", "lab");
$url = "http://localhost/aptechProject/lab/";

// for pc
$imagelocation = "C:/xampp/htdocs/aptechProject/lab/assets/";

// //for Mac
//  $userimagelocation="lab/assets/user_image/";
//  $productimagelocation="Applications/XAMPP/xamppfiles/htdocs/aptechProject/lab/assets/product-image/";

date_default_timezone_set("Asia/Karachi");
$dateTime = date('d-m-Y h:ia');

if (!$con) {
  echo "connection fail";
}

//  //
// Logic
// Area
// //

// User Allow
if (isset($_POST["current_id"]) && isset($_POST["email"]) && isset($_POST["edited"])) {
  // echo '<script>alert('.$_POST["edited"].')</script>';
  $edit = $_POST["edited"];
  $status_text = $edit == "Pending" ? "block" : "allow";
  $sql = "UPDATE register SET status='$edit' WHERE Id=" . $_POST["current_id"] . "";

  if (mysqli_query($con, $sql)) {
    echo '
    <div class="alert alert-success alert-dismissible fade show " role="alert">
      <strong>' . $_POST["email"] . ' is ' . $status_text . '</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  } else {
    echo '
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
      <strong>Error updating record: ' . mysqli_error($con) . '</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
}


// User Allow
if (isset($_POST["user_role_id"]) && isset($_POST["user_role_value"]) ) {
  $role_value = $_POST["user_role_value"];
  $sql = "UPDATE register SET role='$role_value' WHERE Id=" . $_POST["user_role_id"] . "";

  if (mysqli_query($con, $sql)) {
    echo '
    <div class="alert alert-success alert-dismissible fade show " role="alert">
      <strong>User role change</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  } else {
    echo '
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
      <strong>Error updating record: ' . mysqli_error($con) . '</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
}

// Profile edit
if (isset($_FILES["file"]["type"]) && isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["email"])) {
  extract($_POST);
  session_start();
  $error = 0;
  $user_id = $_SESSION["Id"];
  $img_path = $_SESSION["Id"] . $_FILES["file"]["name"];
  $validextensions = array("jpeg", "jpg", "png");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);
  if (empty($_FILES["file"]["name"])) {
    $sql = "UPDATE register SET name='$name', email='$email', password='$pass' WHERE Id=" . $user_id . "";
    if (mysqli_query($con, $sql)) {

      $_SESSION["user_name"] = $name;
      echo '<script type="text/javascript">
      $("#preloader-wrap.loaded").css({ "visibility": "visible", "opacity": "1" });
      window.location = "' . $url . 'profile.php";
          $(".view-profile").show();
      $(".edit-profile").hide();
    </script>';
    }
  } else {
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 1000000)
    ) {
      if ($_FILES["file"]["error"] > 0) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" style="display:block !important" role="alert">
          <strong>Return Code: "' . $_FILES["file"]["error"] . '</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      } else {
        unlink($imagelocation . "user_image/" . $_SESSION["user_image"]);
        $sql = "UPDATE register SET name='$name', email='$email', password='$pass', image='$img_path' WHERE Id=" . $user_id . "";
        mysqli_query($con, $sql);
        // send image to folder
        $sourcePath = $_FILES['file']['tmp_name'];
        $targetPath = $imagelocation . "user_image/" . $img_path;
        move_uploaded_file($sourcePath, $targetPath);
        $_SESSION["user_name"] = $name;
        $_SESSION["user_image"] = $img_path;
        echo '<script type="text/javascript">
          window.location = "' . $url . 'profile.php";
          $(".view-profile").show();
      $(".edit-profile").hide();
    </script>';
      }
      echo '
        <div class="alert alert-success alert-dismissible fade show" style="display:block !important" role="alert">
          <strong>Profile is updated</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    } else {
      echo '
        <div class="alert alert-danger alert-dismissible fade show" style="display:block !important" role="alert">
          <strong>***Invalid file Size or Type***</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
  }
}

//  Add Product Category
if (isset($_POST['productName']) && isset($_POST['productDescription'])) {
  session_start();
  $product_name = strtolower($_POST['productName']);
  $product_description = strtolower($_POST['productDescription']);
  $product_Category_user = $_SESSION['Id'];
  $exitQuery = "select * from producttype where ProductName='" . $product_name . "'";
  $result = mysqli_query($con, $exitQuery) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($product_name != $row['ProductName']) {
    $productQuery = "insert into producttype values(null,'$product_name','$product_description', '$product_Category_user', '$dateTime')";
    if (mysqli_query($con, $productQuery)) {
      echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Product category is added ' . $product_name . '</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         ';
    } else {
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something went wrong.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  } else {
    echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>This category is already is added.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}

// return table
if (isset($_POST["operation"])) {
  session_start();
  $sql = "SELECT * FROM producttype";
  $result = mysqli_query($con, $sql) or die("query fail");
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
      <div class="table-responsive">
        <table id="product-category-table" class="table w-100 thead-primary">
          <thead>
            <tr>
              <th>
                Id
              </th>
              <th>
                User Name
              </th>
              <th>
                Category Name
              </th>
              <th>
                Description
              </th>
              <th>
                Date
              </th>
              <th class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>

            <?php
            if ($result = mysqli_query($con, $sql)) {
              $i = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $i . "</td>
                        ";

                $sql = "SELECT * FROM register where id=" . $row['ProductCateAddUser'] . "";
                $getRegister = mysqli_query($con, $sql);
                $getRegisterRow = mysqli_fetch_assoc($getRegister);
                echo   "<td>" . $getRegisterRow['name'] . "</td>";
                echo "
                        <td style='text-transform:capitalize;'>" . $row['ProductName'] . "</td>
                        <td style='width: 280px;word-break: break-word;white-space: initial;'>" . $row['ProductDescription'] . "</td>
                        <td style='width: 140px;white-space: initial;'> <b>Date: </b>" . explode(" ", $row['ProductCateDate'])[0] . "<br> <b>Time: </b>" . explode(" ", $row['ProductCateDate'])[1] . "</td>
                        <td class='text-center'>
                  ";

                if ($_SESSION["Id"] == $row['ProductCateAddUser'] || $_SESSION["user_role"] == "Admin") {
                  echo "
                  <a id='edit-product-category' storeData=" . $row['ProductTypeId'] . " href='javascript:void(0);' style='margin-right:10px'><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                  <a id='delete-product-category' storeData=" . $row['ProductTypeId'] . " href='javascript:void(0);'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                } else {
                  echo "<span class='badge badge-outline-danger'>No permission</span>";
                }

                echo "
                      </td>
                      </tr>
                  ";
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    <?php
    }
  }
}

// delete category product
if (isset($_POST["currentId"])) {
  $currentId = $_POST["currentId"];

  $deleteQuery = mysqli_query($con, "select * from product where ProductIdType=$currentId") or die("query fail");
  if (mysqli_num_rows($deleteQuery) > 0) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>This category is using in product cannot delete.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  } else {
    $query = "DELETE FROM producttype WHERE ProductTypeId = $currentId";
    $result = mysqli_query($con, $query) or die("Query Failed");
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Category is delete.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
  }
}

// Edit click category product
if (isset($_POST["currentIdEdit"])) {
  session_start();
  extract($_POST);
  $query = "Select * from producttype where ProductTypeId=$currentIdEdit";
  $result = mysqli_query($con, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
  }
  $categoryName = strtolower($row["ProductName"]);
  $categoryDescription = strtolower($row["ProductDescription"]);
  echo   $currentIdEdit . "(array)" . $categoryName . "(array)" . $categoryDescription;
}
// edit values
if (isset($_POST["updateProductId"]) && isset($_POST["updateProductDescription"])) {
  session_start();
  $updateProductId = $_POST['updateProductId'];
  $updateProduct_name = strtolower($_POST['updateProductName']);
  $updateProduct_description = strtolower($_POST['updateProductDescription']);
  $updateProduct_Category_user = $_SESSION['Id'];

  $exitQuery = "select * from producttype where ProductName='" . $updateProduct_name . "'";
  $result = mysqli_query($con, $exitQuery) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($updateProduct_name != $row['ProductName']) {
    $productQuery = "UPDATE producttype SET ProductName = '" . $updateProduct_name . "', ProductDescription = '" . $updateProduct_description . "', ProductCateDate = '" . $dateTime . "', ProductCateAddUser = " . $updateProduct_Category_user . "  WHERE ProductTypeId = $updateProductId";
    $result = mysqli_query($con, $productQuery) or die("Query Failed");
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Category Update.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Some went wrong</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
  } else {
    echo '    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>This category is already exit.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}

//  Add testing product
if (isset($_POST["addProductName"])) {
  session_start();
  $addTestProduct_Category_user = $_SESSION['Id'];
  $addProductName = strtolower($_POST['addProductName']);
  $productCode = strtolower($_POST['productCode']);
  $addTestProductCategory = $_POST["addTestProductCategory"];
  $addTestProductDescription = strtolower($_POST["addTestProductDescription"]);

  if(strlen($_POST['productCode']) != 10)
  {
    echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Filled max 10 value.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
  }
  else
  {
  $target_dir = $imagelocation . "product-image/";
  $target_file = $target_dir . json_encode($_FILES["addProductImage"]["name"]);
  $uploadOk = 1;
  $imageUpload = 0;

  $query_1 = "select * From product where ProductCode='" . $productCode . "'";
  $result = mysqli_query($con, $query_1) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($productCode != $row["ProductCode"]) {
    $addProduct = mysqli_query($con, "insert into product values(null,'$addProductName','$productCode','$addTestProduct_Category_user','$addTestProductDescription','$addTestProductCategory','$dateTime', 0, 0)");
    if ($addProduct) {
      $addProductId = $con->insert_id;

      for ($i = 0; $i < count($_FILES["addProductImage"]["name"]); $i++) {
        if (($_FILES["addProductImage"]["size"])[$i] > 1000000) {
          // echo json_encode($_FILES["addProductImage"]["type"]);
          echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sorry, your file is too large.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
          $uploadOk = 0;
        }
        if ((($_FILES["addProductImage"]["type"][$i] == "image/png") || ($_FILES["addProductImage"]["type"][$i] == "image/jpg") || ($_FILES["addProductImage"]["type"][$i] == "image/jpeg"))) {
          if ($uploadOk != 0) {
            $path = $imagelocation . "product-image/";
            $sourcePath = $_FILES['addProductImage']['tmp_name'][$i]; // Storing source path of the file in a variable
            $targetPath = $path . $_FILES['addProductImage']['name'][$i]; // Target path where file is to be stored
            // echo explode("," , json_encode($_FILES['addProductImage']['name']));
            if (move_uploaded_file($sourcePath, $targetPath)) {
              // echo '
              //   <div class="alert alert-success alert-dismissible fade show" role="alert">
              //     <strong>Account has been created</strong>
              //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              //       <span aria-hidden="true">&times;</span>
              //     </button>
              //   </div>';
              $imageName = $_FILES['addProductImage']['name'][$i];
              if (mysqli_query($con, "insert into multiimages values(null,'" . $imageName . "'," . $addProductId . ")")) {
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Product has been created</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
              } else {
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Something went wrong..</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
              }
            } else {
              echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Sorry, there was an error uploading your file.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
          }
        } else {
          echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          $table2 = "DELETE FROM multiimages WHERE parentId = $addProductId";
          $result_2 = mysqli_query($con, $table2) or die("Query Failed");
          if ($result_2) {
            $table1 = "DELETE FROM product WHERE ProductId = $addProductId";
            $result_1 = mysqli_query($con, $table1) or die("Query Failed");
          }
          $uploadOk = 0;
        };
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>data not add.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>This code is already exit.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}
}

// return table
if (isset($_POST["addTestingProductTable"])) {
  session_start();
  $sql = "SELECT * FROM product";
  $result = mysqli_query($con, $sql) or die("query fail");
  if (mysqli_num_rows($result)) {
    echo "
    <script>$('.ms-panel.w-100').show();</script>
    ";
    ?>
    <div class="table-responsive">
      <table id="add-testing-product" class="table w-100 thead-primary">
        <thead>
          <tr>
            <th>
              Id
            </th>
            <th>
              User Name
            </th>
            <th>
              Product Image
            </th>
            <th>
              Product Name
            </th>
            <th>
              Product Code
            </th>
            <th>
              Product Category
            </th>
            <th>
              Description
            </th>
            <th>
              Date
            </th>
            <th class="text-center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>

          <?php
          if ($result = mysqli_query($con, $sql)) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                        <td>" . $i . "</td>
                        ";

              $sql = "SELECT * FROM register where id=" . $row['ProductaddUserName'] . "";
              $getRegister = mysqli_query($con, $sql);
              $getRegisterRow = mysqli_fetch_assoc($getRegister);

              echo   "<td>" . $getRegisterRow['name'] . "</td><td><div class='image-box'>";
              $productID =  $row['ProductId'];

              $multi = "SELECT * FROM multiimages";
              $getMulti = mysqli_query($con, $multi) or die("Query fail");
              $getMultiRow = mysqli_fetch_array($getMulti);
              $j = 0;
              if (mysqli_num_rows($getMulti) > 0) {
                // show the limit image uncommit code
                // $imageLength = 3;
                while ($fetch = mysqli_fetch_assoc($getMulti)) {
                  // if ($productID == $fetch["parentId"] && $j < $imageLength ) { REVIEW remove the 463 line
                  if ($productID == $fetch["parentId"]) {
                    echo "<div class='img-session'><img src='assets/product-image/" . $fetch['file_name'] . "' data-toggle='modal' data-target='#modal-13'/></div>";
                    // $j++;
                  }
                  // if($j == $imageLength){
                  //   $j=$imageLength+1;
                  // }
                }
              }
              $productCategory = "SELECT * FROM producttype where ProductTypeId=" . $row['ProductIdType'] . "";
              $getProductCategory = mysqli_query($con, $productCategory);
              $getProductCategoryRow = mysqli_fetch_assoc($getProductCategory);

              echo "</div></td>
                        <td style='text-transform:capitalize;'>" . $row['ProductName'] . "</td>
                        <td>" . $row['ProductCode'] . "</td>
                        <td>" . $getProductCategoryRow['ProductName'] . "</td>
                        <td style='min-width: 200px;max-width: 280px;word-break: break-word;white-space: initial;'>" . $row['ProductDetail'] . "</td>
                        <td style='min-width: 120px;white-space: initial;'> <b>Date: </b>" . explode(" ", $row['ProductDate'])[0] . "<br> <b>Time: </b>" . explode(" ", $row['ProductDate'])[1] . "</td>
                        <td class='text-center'>
                  ";

              if ($_SESSION["Id"] == $row['ProductaddUserName'] || $_SESSION["user_role"] == "Admin") {
                echo "
                  <a id='edit-product' storeData=" . $row['ProductId'] . " href='javascript:void(0);' style='margin-right:10px'><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                  <a id='delete-product' storeData=" . $row['ProductId'] . " href='javascript:void(0);'><i class='far fa-trash-alt ms-text-danger'></i></a>";
              } else {
                echo "<span class='badge badge-outline-danger'>No permission</span>";
              }

              echo "
                      </td>
                      </tr>
                  ";
              $i++;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
    <?php
  } else {
    echo "
    <script>$('.ms-panel.w-100').hide();</script>
    ";
  }
}
// delete product
if (isset($_POST["productCurrentId"])) {
  $productCurrentId = $_POST["productCurrentId"];

  $deleteQuery = mysqli_query($con, "select * from sendfortest where productid=$productCurrentId") or die("query fail");
  if (mysqli_num_rows($deleteQuery) > 0) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Product cannot delete because product is send for testing.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  } else {
    $table2 = "DELETE FROM multiimages WHERE parentId = $productCurrentId";
    $result_2 = mysqli_query($con, $table2) or die("Query Failed");
    if ($result_2) {
      $table1 = "DELETE FROM product WHERE ProductId = $productCurrentId";
      $result_1 = mysqli_query($con, $table1) or die("Query Failed");
      if ($result_1) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Product is delete.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Something wrong.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
  }
}
// Edit click product
if (isset($_POST["productCurrentIdEdit"])) {
  session_start();
  extract($_POST);
  $query = "Select * from product where ProductId=$productCurrentIdEdit";
  $result = mysqli_query($con, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
  }
  $productName = strtolower($row["ProductName"]);
  $productDescription = strtolower($row["ProductDetail"]);
  $productIdType = strtolower($row["ProductIdType"]);

  echo   $productCurrentIdEdit . "(array)" . $productName . "(array)" . $productDescription . "(array)" . $productIdType;
}
// edit values
if (isset($_POST["updateTestProductId"]) && isset($_POST["updateTestProductName"]) && isset($_POST["updateTestProductCategory"]) && isset($_POST["updateTestProductDescription"])) {
  session_start();
  $updateTestProductId = $_POST['updateTestProductId'];
  $updateTestProductName = strtolower($_POST['updateTestProductName']);
  $updateTestProductCategory = strtolower($_POST['updateTestProductCategory']);
  $updateTestProductDescription = strtolower($_POST['updateTestProductDescription']);
  $updateProduct_Category_user = $_SESSION['Id'];

  $productQuery = "UPDATE product SET ProductName = '" . $updateTestProductName . "', ProductIdType = '" . $updateTestProductCategory . "', ProductDetail = '" . $updateTestProductDescription . "', ProductDate = '" . $dateTime . "', ProductaddUserName = " . $updateProduct_Category_user . "  WHERE ProductId= $updateTestProductId";
  $result = mysqli_query($con, $productQuery) or die("Query Failed");
  if ($result) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Product Update.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Some went wrong</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  }
}

//  Add testing Category
if (isset($_POST['testingCategoryName']) && isset($_POST['testingCategoryDescription'])) {
  session_start();
  $testingCategoryName = strtolower($_POST['testingCategoryName']);
  $testingCategoryDescription = strtolower($_POST['testingCategoryDescription']);
  $testing_Category_user = $_SESSION['Id'];
  $exitQuery = "select * from testingtypes where TestingTypeName='" . $testingCategoryName . "'";
  $result = mysqli_query($con, $exitQuery) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($testingCategoryName != $row['TestingTypeName']) {
    $testingQuery = "insert into testingtypes values(null,'$testingCategoryName','$testingCategoryDescription', '$testing_Category_user', '$dateTime')";
    if (mysqli_query($con, $testingQuery)) {
      echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Test category is added</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         ';
    } else {
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something went wrong.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  } else {
    echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>This category is already is added.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}

// return table testing
if (isset($_POST["testingTable"])) {
  session_start();
  $sql = "SELECT * FROM testingtypes";
  $result = mysqli_query($con, $sql) or die("query fail");
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="table-responsive">
        <table id="testing-category-table" class="table w-100 thead-primary">
          <thead>
            <tr>
              <th>
                Id
              </th>
              <th>
                User Name
              </th>
              <th>
                Category Name
              </th>
              <th>
                Description
              </th>
              <th>
                Date
              </th>
              <th class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>

            <?php
            if ($result = mysqli_query($con, $sql)) {
              $i = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $i . "</td>
                        ";

                $sql = "SELECT * FROM register where id=" . $row['TestingCateAddUser'] . "";
                $getRegister = mysqli_query($con, $sql);
                $getRegisterRow = mysqli_fetch_assoc($getRegister);
                echo   "<td>" . $getRegisterRow['name'] . "</td>";
                echo "
                        <td style='text-transform:capitalize;'>" . $row['TestingTypeName'] . "</td>
                        <td style='width: 280px;word-break: break-word;white-space: initial;'>" . $row['TestingTypeDescription'] . "</td>
                        <td style='width: 140px;white-space: initial;'> <b>Date: </b>" . explode(" ", $row['TestingCateDate'])[0] . "<br> <b>Time: </b>" . explode(" ", $row['TestingCateDate'])[1] . "</td>
                        <td class='text-center'>
                  ";

                if ($_SESSION["Id"] == $row['TestingCateAddUser'] || $_SESSION["user_role"] == "Admin") {
                  echo "
                  <a id='edit-testing-category' storeData=" . $row['TestingTypeID'] . " href='javascript:void(0);' style='margin-right:10px'><i class='fas fa-pencil-alt ms-text-primary'></i></a>
                  <a id='delete-testing-category' storeData=" . $row['TestingTypeID'] . " href='javascript:void(0);'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                } else {
                  echo "<span class='badge badge-outline-danger'>No permission</span>";
                }
                echo "
                      </td>
                      </tr>
                  ";
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
<?php
    }
  }
}

// delete category Testing
if (isset($_POST["deleteTestingCategory"])) {
  $deleteTestingCategory = $_POST["deleteTestingCategory"];
  // echo $_POST["currentId"];

  $deleteQuery = mysqli_query($con, "select * from testing where TestingType=$deleteTestingCategory") or die("query fail");
  if (mysqli_num_rows($deleteQuery) > 0) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Cannot delete its using in test list.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
  } else {
    $query = "DELETE FROM testingtypes WHERE TestingTypeID = $deleteTestingCategory";
    $result = mysqli_query($con, $query) or die("Query Failed");
    if ($result) {
      echo '    <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Category is delete.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Something wrong.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
  }
}

// Edit click category testing
if (isset($_POST["editTestingCategory"])) {
  session_start();
  extract($_POST);
  $query = "Select * from testingtypes where TestingTypeID =$editTestingCategory";
  $result = mysqli_query($con, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
  }
  $categoryName = strtolower($row["TestingTypeName"]);
  $categoryDescription = strtolower($row["TestingTypeDescription"]);
  echo   $editTestingCategory . "(array)" . $categoryName . "(array)" . $categoryDescription;
}
// edit values
if (isset($_POST["updateTestingId"]) && isset($_POST["updateTestingName"]) && isset($_POST["updateTestingDescription"])) {
  session_start();
  date_default_timezone_set("Asia/Karachi");
  $updateTestingId = $_POST['updateTestingId'];
  $updateTestingName = strtolower($_POST['updateTestingName']);
  $updateTestingDescription = strtolower($_POST['updateTestingDescription']);
  $updateTesting_Category_user = $_SESSION['Id'];
  $updateProductDate = date('Y-m-d h:ia');

  $exitQuery = "select * from testingtypes where TestingTypeName='" . $updateTestingName . "'";
  $result = mysqli_query($con, $exitQuery) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($updateTestingName != $row['TestingTypeName']) {
    $productQuery = "UPDATE testingtypes SET 	TestingTypeName = '" . $updateTestingName . "', TestingTypeDescription = '" . $updateTestingDescription . "', TestingCateDate = '" . $updateProductDate . "', TestingCateAddUser = " . $updateTesting_Category_user . "  WHERE TestingTypeID = $updateTestingId";
    $result = mysqli_query($con, $productQuery) or die("Query Failed");
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Category Update.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Some went wrong</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
  } else {
    echo '    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>This category is already exit.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}

//
// Starting testing
if (isset($_POST['product_id']) && isset($_POST['testing_id']) && isset($_POST['user_id'])) {
  extract($_POST);
  session_start();
  $testing_user = $_SESSION['Id'];
  $productCreator = mysqli_query($con, 'SELECT * FROM product WHERE ProductId=' . $product_id . '');
  $productCreatorRow = mysqli_fetch_assoc($productCreator);
  if ($user_id != $testing_user && $testing_user  != $productCreatorRow['ProductaddUserName']) {
    $testingListCheck = mysqli_query($con, 'SELECT * FROM testing WHERE ProductId=' . $product_id . '');

    $query_2 = mysqli_query($con, "UPDATE product Set Status=1  WHERE ProductId=$product_id") or die("query fail product");
    if (mysqli_num_rows($testingListCheck) > 0) {
      $query_1 = mysqli_query($con, "UPDATE testing Set TestingUser=$testing_user, TestingDate='$dateTime',EndDate=null,TestingType=$testing_id  WHERE ProductId=$product_id") or die("query fail testing");
      if ($query_1 && $query_2) {
        echo '<script type="text/javascript">
      window.location = "' . $url . 'testing-detail.php?id=' . $product_id . '"
      </script>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Something wrong in start testing</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      }
    } else {
      $length = 10;
      $min = pow(10, $length - 1);
      $max = pow(10, $length) - 1;
      $testing_code = mt_rand($min, $max);
      $query = mysqli_query($con, "INSERT into testing values(null,$testing_id,$product_id,'$testing_code', $testing_user,'$dateTime',null)") or die("query fail1");
      if ($query && $query_2) {
        echo '<script type="text/javascript">
        window.location = "' . $url . 'testing-detail.php?id=' . $product_id . '"
        </script>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something wrong in start testing</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Product sender and testing user are same</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
}


?>