<?php

$con = mysqli_connect("localhost", "root", "", "lab");


$url = "http://localhost/aptechProject/lab/";

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

// Profile Code
if (isset($_FILES["file"]["type"]) && isset($_POST["name"]) && isset($_POST["user_id"]) && isset($_POST["pass"]) && isset($_POST["email"])) {
  extract($_POST);
  $error = 0;
  $img_path = $_FILES["file"]["name"];
  $validextensions = array("jpeg", "jpg", "png");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);
  if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000) //Approx. 100kb files can be uploaded.
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
      unlink("C:/xampp/htdocs/aptechProject/lab/assets/user_image/" . $_SESSION["user_image"]);
      $sql = "UPDATE register SET name='$name', email='$email', password='$pass', image='$img_path' WHERE Id=" . $user_id . "";
      mysqli_query($con, $sql);
      // send image to folder
      $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
      $targetPath = "C:/xampp/htdocs/aptechProject/lab/assets/user_image/" . $_FILES['file']['name']; // Target path where file is to be stored
      move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
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

//  Add Product Category

if (isset($_POST['productName']) && isset($_POST['productDescription'])) {
  session_start();
  date_default_timezone_set("Asia/Karachi");
  $product_name = $_POST['productName'];
  $product_description = $_POST['productDescription'];
  $product_Category_user = $_SESSION['Id'];
  $productDate = date('Y-m-d h:ia');
  $exitQuery = "select * from producttype where ProductName='" . $product_name . "'";
  $result = mysqli_query($con, $exitQuery) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($_POST['productName'] != $row['ProductName']) {
    $productQuery = "insert into producttype values(null,'$product_name','$product_description', '$product_Category_user', '$productDate')";
    if (mysqli_query($con, $productQuery)) {
      echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Product category is added</strong>
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
            $sql = "SELECT * FROM producttype";

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
                        <td>" . $row['ProductName'] . "</td>
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
  // echo $_POST["currentId"];
  $query = "DELETE FROM producttype WHERE ProductTypeId = $currentId";
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
// Edit category product
if (isset($_POST["currentIdEdit"])) {
  session_start();
  extract($_POST);
  $query = "Select * from producttype where ProductTypeId=$currentIdEdit";
  $result = mysqli_query($con, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
  }
  $categoryName = $row["ProductName"];
  $categoryDescription = $row["ProductDescription"];
  echo   $currentIdEdit . "(array)" . $categoryName . "(array)" . $categoryDescription;
}
if (isset($_POST["updateProductId"]) && isset($_POST["updateProductDescription"])) {
  session_start();
  date_default_timezone_set("Asia/Karachi");
  $updateProductId = $_POST['updateProductId'];
  $updateProduct_name = $_POST['updateProductName'];
  $updateProduct_description = $_POST['updateProductDescription'];
  $updateProduct_Category_user = $_SESSION['Id'];
  $updateProductDate = date('Y-m-d h:ia');

  $exitQuery = "select * from producttype where ProductTypeId = $updateProductId";
  $result = mysqli_query($con, $exitQuery) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  if ($_POST['updateProductName'] != $row['ProductName']) {
    echo "query";
    $productQuery = "UPDATE producttype SET ProductName = '" . $updateProduct_name . "', ProductDescription = '" . $updateProduct_description . "', ProductCateDate = '" . $updateProductDate . "', ProductCateAddUser = " . $updateProduct_Category_user . "  WHERE ProductTypeId = $updateProductId";
    $result = mysqli_query($con, $productQuery) or die("Query Failed");
    if ($result) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
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


?>