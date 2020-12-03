<<<<<<< Updated upstream
<?php include "inc/header.php";
error_reporting(0); ?>
=======

<?php $title="Profile"; include "inc/header.php";
error_reporting(0);?>
>>>>>>> Stashed changes

<!-- Main Content -->
<main>
  <!-- Navigation Bar -->
  <?php
  //-----------GETTING UPDATED DATA FROM DATABASE ACCORDING TO SESSION---------------
  $select =  "select * From register where Id=" . $_SESSION["Id"] . "";
  $result = mysqli_query($con, $select);
  $row = mysqli_fetch_array($result);
  ?>
  <!-- Body Content Wrapper -->
  <div class="ms-content-wrapper">
    <div class="ms-profile-overview">
      <div class="ms-profile-cover">
        <img class="ms-profile-img" onerror="this.src='assets/user_image/user-default.png'" src="assets/user_image/<?php echo $_SESSION["user_image"] ?>" alt="logo_<?php echo $_SESSION["user_image"] ?>">
        <div class="ms-profile-user-info">
          <h3 class="ms-profile-username text-white"><?php echo $row["name"] ?></h3>
          <h6 class="ms-profile-role text-white"><?php echo $row["role"] ?></h6>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-5 col-md-12 view-profile" >
        <div class="ms-panel ms-panel-fh">
          <div class="ms-panel-body">
            <h2 class="section-title">Basic Information</h2>
            <table class="table ms-profile-information">
              <tbody>
                <tr>
                  <th scope="row">Full Name</th>
                  <td><?php echo $row["name"] ?></td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td><?php echo $row["email"] ?></td>
                </tr>
                <tr>
                <tr>
                  <th scope="row">Password</th>
                  <td><?php echo $row["password"] ?></td>
                </tr>
                <tr>
                <tr>
                  <td colspan='2'>
                    <!-- ?EDIT= WILL HELP US TO GET THE ID IN EDIT PAGE, EDIT IS THE NAME WHERE ID STORE-->
                    <a class="btn btn-primary mt-4 d-block w-5 text-white">Edit Profile</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-md-12 edit-profile" style="display: none;">
        <div class="ms-panel ms-panel-fh">
          <div class="ms-panel-body">
            <h2 class="section-title">Edit Personal Information </h2>
            <form id="uploadimage" action="" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-12 ">
                  <label for="validationCustom01">Your name</label>
                  <div class="input-group">
                    <input type="hidden"  id="user_id" name="user_id"  value="<?php echo $row["Id"] ?>"  required="">
                    <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Enter name" value="<?php echo $row["name"] ?>"  required="">
                    <div class="invalid-feedback">
                      Please provide a valid name.
                    </div>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <label for="validationCustom03">Email Address</label>
                  <div class="input-group">
                    <input type="email" class="form-control" id="validationCustom03" name="email" value="<?php echo $row["email"] ?>" placeholder="Email Address" required="">
                    <div class="invalid-feedback">
                      Please provide a valid email.
                    </div>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <label for="validationCustom04">Password</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationCustom04" name="pass" placeholder="Password" value="<?php echo $row["password"] ?>" required="">
                    <div class="invalid-feedback">
                      Please provide a password.
                    </div>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <label for="file">Upload image</label>
                  <div class="input-group">
                    <input type="file" class="form-control" name="file" id="file" required />
                    <div class="invalid-feedback">
                      Please provide your profile image.
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary mt-4" value="Upload" class="submit" />
                  <input type="button" class="btn btn-success mt-4" value="Back" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<?php include "inc/footer.php" ?>
<script>
  $(document).ready(function() {
    $("#update_user").on('submit', (function(e) {
      // alert("aaaa");
      e.preventDefault();
      $.ajax({
        url: "inc/connection.php", // Url to which the request is send
        type: "POST", // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false, // The content type used when sending data to the server.
        // cache: false, // To unable request pages to be cached
        // processData: false, // To send DOMDocument or non processed data file it is set to false
        success: function(data) // A function to be called if request succeeds
        {
          $('body').append(data);
        }
      });
    }));
  })
</script>