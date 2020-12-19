<?php $title = "Porfile";
include "inc/header.php";
error_reporting(0); ?>

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
      <div class="col-xl-5 col-md-12 view-profile">
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
                    <a class="btn btn-primary mt-4 d-block w-5 text-white" id="edit-profile">Edit Profile</a>
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
            <form  id="uploadimage" action="" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-12 ">
                  <label for="validationCustom01">Your name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" id="validationCustom01" name="name" placeholder="Enter name" value="<?php echo $row["name"] ?>" required="">
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
                  <label for="validationCustom04">Change Profile</label>
                  <br>
                  <label class='ms-switch'>
                    <input type='checkbox' class='user-image' value="yes" name="userImage" id="upload-switch">
                    <span class='ms-switch-slider ms-switch-warning round'></span>
                  </label>
                </div>
                <br>

                <div class="col-md-12 profile-image" style="display: none;">
                  <label for="file">Upload image</label>
                  <div class="input-group" >
                    <input type="file" class="form-control" name="file" id="file" required/>
                    <div class="invalid-feedback">
                      Please provide your profile image.
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary mt-4" value="Upload" name="editbtn" class="submit" />
                &nbsp;
                <input type="button" class="btn btn-success mt-4" value="Back" />
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
   let userImage;
    $("#upload-switch").change(function() {
      userImage = $(this).is(":checked") ? "upload" : "not-upload";
      if(userImage == "upload") {
        $(".profile-image").show();
      }else {
        $(".profile-image").hide();
      }
    })

    $("#uploadimage").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "inc/connection.php",
        type: "POST",
        data: new FormData($('#uploadimage')[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          // alert(data);
          $('body').append(data);
        }
      });
    }));

    // $(".view-profile .btn-primary").on("click", function() {
    //   $(this).closest('.view-profile').hide();
    //   $('.edit-profile').show();
    // });
    $(".edit-profile .btn-success").on("click", function() {
      $('.view-profile').show();
      $('.edit-profile').hide();
    });

    $(document).on("click", "#edit-profile", function() {
      $(this).closest('.view-profile').hide();
      $('.edit-profile').show();
    });

  })
</script>