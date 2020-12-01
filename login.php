<?php include('inc/header-account.php') ?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper ms-auth login">
  <div class="ms-auth-container">
    <div class="ms-auth-col">
      <div class="ms-auth-bg"></div>
    </div>
    <div class="ms-auth-col">
      <div class="ms-auth-form">
        <form class="needs-validation" method="post" novalidate="">
<<<<<<< HEAD
          <h1>Login to FOrget</h1>
=======
          <h1>Login to Accounts</h1>
>>>>>>> deb288c7b0c30f2ba7e234e54eb9d89bd6c36bb4
          <p>Please enter your email and password to continue</p>
          <div class="mb-3">
            <label for="validationCustom08">Email Address</label>
            <div class="input-group">
              <input type="email" class="form-control" name="email" id="validationCustom08" placeholder="Email Address" required="">
              <div class="invalid-feedback">
                Please provide a valid email.
              </div>
            </div>
          </div>
          <div class="mb-2">
            <label for="validationCustom09">Password</label>
            <div class="input-group">
              <input type="password" class="form-control password-field" name="pass" id="validationCustom09" placeholder="Password" required="">
              <i id="password-icon-btn" class="fas fa-eye-slash"></i>
              <div class="invalid-feedback">
                Please provide a password.
              </div>
            </div>
          </div>
          <div class="form-group">
            <!-- <label class="ms-checkbox-wrap">
              <input class="form-check-input" type="checkbox" value="">
              <i class="ms-checkbox-check"></i>
            </label>
            <span> Remember Password </span> -->
            <label class="d-block mt-3"><a href="#" class="btn-link" data-toggle="modal" data-target="#modal-12">Forgot Password?</a></label>
          </div>
          <input class="btn btn-primary mt-4 d-block w-100" name="btn" type="submit" value="Sign In">
          <p class="mb-0 mt-3 text-center">Don't have an account? <a class="btn-link" href="register.php">Create Account</a> </p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST["btn"])) {


  $status_query = "select * From register where email='" . $_POST["email"] . "'and status='Accepted'";
  $result_1 = mysqli_query($con, $status_query) or die("Query Failed");
  if (mysqli_num_rows($result_1) == 1) {
    $query = "select Id, name, role, image, status From register where email='" . $_POST["email"] . "' and password='" . $_POST["pass"] . "'";
    $result_2 = mysqli_query($con, $query) or die("Query Failed");

    if (mysqli_num_rows($result_2) > 0) {

      while ($row = mysqli_fetch_assoc($result_2)) {
        $_SESSION["user_name"] = $row["name"];
        $_SESSION["Id"] = $row["Id"];
        $_SESSION["user_role"] = $row["role"];
        $_SESSION["user_status"] = $row["status"];
        $_SESSION["user_image"] = $row["image"];

        echo '<script type="text/javascript">
             window.location = "'.$url.'dashboard.php"
        </script>';
      }
    } else {
      echo '
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <strong>User and Password does not match</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  } else {
    echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Your account is still pending</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}
?>
<?php include('inc/footer-account.php') ?>