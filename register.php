<?php $title="Registration"; include('inc/header-account.php') ?>
<!-- Body Content Wrapper -->
<div class="ms-content-wrapper ms-auth register">
  <div class="ms-auth-container">
    <div class="ms-auth-col">
      <div class="ms-auth-bg"></div>
    </div>
    <div class="ms-auth-col">
      <div class="ms-auth-form">
        <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
          <h1>Create Account</h1>
          <p>Please enter personal information to continue</p>
          <div class="form-row">
            <div class="col-md-12 ">
              <label for="validationCustom01">Your name</label>
              <div class="input-group">
                <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="First name" required="">
                <div class="invalid-feedback">
                  Please provide a valid name.
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 ">
              <label for="validationCustom03">Email Address</label>
              <div class="input-group">
                <input type="email" class="form-control" id="validationCustom03" name="email" placeholder="Email Address" required="">
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
              </div>
            </div>
            <div class="col-md-12 ">
              <label for="validationCustom04">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="validationCustom04" name="pass" placeholder="Password" required="">
                <div class="invalid-feedback">
                  Please provide a password.
                </div>
              </div>
            </div>
            <div class="col-md-12 ">
              <label for="validationCustom05">Upload profile</label>
              <div class="input-group">
                <input type="file" class="form-control" id="validationCustom05" name="file" required="">
                <div class="invalid-feedback">
                  Please provide a file.
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <label>Categories</label>
              <div class="input-group">
                <select class="form-control" id="validationCustom220" name="role" required>
                  <option value="">---Select---</option>
                  <option value="Admin">Admin</option>
                  <option value="SRS">SRS</option>
                  <option value="CPRI">CPRI</option>
                </select>
                <div class="invalid-feedback">
                  Please select a Categories.
                </div>

              </div>
            </div>
          </div>

          <input type="submit" class="btn btn-primary mt-4 d-block w-100" name="btn" value="Create Account">
          <p class="mb-0 mt-3 text-center">Already have an account? <a class="btn-link" href="login.php">Login</a> </p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php

if (isset($_POST["btn"])) {


  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $role = $_POST["role"];
  $status = "Pending";
  $default = "later";
  $file = $_FILES["file"]["name"];


  $qurey_em=mysqli_query($con,"select * from register where email='$email'");

  if(mysqli_num_rows($qurey_em) >0){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry, your Email are already Exists.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  else{
    $target_dir = $imagelocation ."user_image/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file size 1mb
    if ($_FILES["file"]["size"] > 1000000) {
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry, your file is too large.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $uploadOk = 0;
    }
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $uploadOk = 0;
    }
    if ($uploadOk != 0) {
      if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Sorry, there was an error uploading your file.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      } else {
        // echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
        mysqli_query($con, "insert into register values(null,'$name','$email','$pass','$role','$status','$file')");
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Account has been created</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
    }
    // else {
    //   echo '
    //   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //     <strong>Sorry, your file was not uploaded.</strong>
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //       <span aria-hidden="true">&times;</span>
    //     </button>
    //   </div>';
    // }

  }

  }
  // else {
  //   echo '
  //     <div class="alert alert-danger alert-dismissible fade show" role="alert">
  //       <strong>Some thing went wrong</strong>
  //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //         <span aria-hidden="true">&times;</span>
  //       </button>
  //     </div>';
  // }


?>

<?php include('inc/footer-account.php') ?>