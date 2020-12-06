<?php
$title="Screen Lock";
session_start();
$_SESSION["user_lock"] = $_SESSION["Id"];
include('inc/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from primehostingindia.com/templatemonster/html/toolaboard/pages/prebuilt-pages/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Nov 2020 22:20:58 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Lab Automation</title>
  <!-- Iconic Fonts -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link href="vendors/iconic-fonts/material/font.css" rel="stylesheet">
  <link href="vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/iconic-fonts/flat-icons/flaticon.css">
  <link rel="stylesheet" href="vendors/iconic-fonts/cryptocoins/cryptocoins.css">
  <link rel="stylesheet" href="vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
  <!-- Lab Automation styles -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
</head>

<body class="ms-body ms-primary-theme">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <div class="ms-lock-screen-weather">
    <?php
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'));
    if ($query && $query['status'] == 'success') {
      echo "<p>" . $query['country'] . ', ' . $query['city'] . "</p>";
    }
    ?>
  </div>
  <ul class="ms-lock-screen-nav">
    <li class="ms-nav-item dropdown">
      <a href="#" class="text-disabled ms-has-notification" id="mailDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">email</i></a>
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown">
        <li class="dropdown-menu-header">
          <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Mail</span></h6>
          <span class="badge badge-pill badge-success">3 New</span>
        </li>
        <li class="dropdown-divider"></li>
        <li class="ms-scrollable ms-dropdown-list">
          <a class="media p-2" href="#">
            <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
              <img src="assets/img/dashboard/Engineer-1.jpg" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Hey man, looking forward to your new project.</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="ms-chat-status ms-status-online ms-chat-img mr-2 align-self-center">
              <img src="assets/img/dashboard/Engineer-2.jpg" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>Dear John, I was told you bought Lab Automation! Send me your feedback</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 28 minutes ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
              <img src="assets/img/dashboard/Engineer-3.jpg" class="ms-img-round" alt="people">
            </div>
            <div class="media-body">
              <span>How many people are we inviting to the dashboard?</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 6 hours ago</p>
            </div>
          </a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-menu-footer text-center">
          <a href="../apps/email.html">Go to Inbox</a>
        </li>
      </ul>
    </li>
    <li class="ms-nav-item dropdown">
      <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">notifications</i></a>
      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
        <li class="dropdown-menu-header">
          <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6>
          <span class="badge badge-pill badge-info">4 New</span>
        </li>
        <li class="dropdown-divider"></li>
        <li class="ms-scrollable ms-dropdown-list">
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>12 ways to improve your crypto dashboard</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>You have newly registered users</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 45 minutes ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>Your account was logged in from an unauthorized IP</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 2 hours ago</p>
            </div>
          </a>
          <a class="media p-2" href="#">
            <div class="media-body">
              <span>An application form has been submitted</span>
              <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 1 day ago</p>
            </div>
          </a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-menu-footer text-center">
          <a href="#">View all Notifications</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Main Content -->
  <main class="body-content ms-lock-screen">
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <img class="ms-user-img ms-img-round ms-lock-screen-user" src="./assets/user_image/<?php echo $_SESSION["user_image"] ?>" alt="logo_<?php echo $_SESSION["user_image"] ?>">
      <h1><?php echo $_SESSION["user_name"] ?></h1>
      <form method="POST">
        <div class="ms-form-group my-0 mb-0 has-icon fs-14">
          <input type="password" class="ms-form-input" name="pass" placeholder="Enter Password" value="">
          <a class="screen-logout-icon" title="logout Account" href="logout.php">
            <svg height="25px" width="25px"  fill="#fff" viewBox="0 0 511 512" >
              <path d="m361.5 392v40c0 44.113281-35.886719 80-80 80h-201c-44.113281 0-80-35.886719-80-80v-352c0-44.113281 35.886719-80 80-80h201c44.113281 0 80 35.886719 80 80v40c0 11.046875-8.953125 20-20 20s-20-8.953125-20-20v-40c0-22.054688-17.945312-40-40-40h-201c-22.054688 0-40 17.945312-40 40v352c0 22.054688 17.945312 40 40 40h201c22.054688 0 40-17.945312 40-40v-40c0-11.046875 8.953125-20 20-20s20 8.953125 20 20zm136.355469-170.355469-44.785157-44.785156c-7.8125-7.8125-20.476562-7.8125-28.285156 0-7.8125 7.808594-7.8125 20.472656 0 28.28125l31.855469 31.859375h-240.140625c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h240.140625l-31.855469 31.859375c-7.8125 7.808594-7.8125 20.472656 0 28.28125 3.90625 3.90625 9.023438 5.859375 14.140625 5.859375 5.121094 0 10.238281-1.953125 14.144531-5.859375l44.785157-44.785156c19.496093-19.496094 19.496093-51.214844 0-70.710938zm0 0" />
            </svg>
          </a>
        </div>
        <input type="submit" class="btn btn-success w-100" name="login" value="Unlock">
      </form>
    </div>
    <div class="ms-lock-screen-time">
      <p><?php date_default_timezone_set("Asia/Karachi");
          echo date("h:i"); ?> </p>
      <p><?php echo date("l F j") ?></p>
      <!-- <p><?php echo date("l") ?>, January 9</p> -->
    </div>
    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/perfect-scrollbar.js"> </script>
    <script src="assets/js/jquery-ui.min.js"> </script>
    <!-- Global Required Scripts End -->
    <!-- Lab Automation core JavaScript -->
    <script src="assets/js/framework.js"></script>
    <!-- Settings -->
    <script src="assets/js/settings.js"></script>
</body>
<?php
if (isset($_POST["login"])) {
  $status_query = "select * From register where password='" . $_POST["pass"] . "'and Id=" . $_SESSION["Id"] . "";
  $result_1 = mysqli_query($con, $status_query) or die("Query Failed");

  if (mysqli_num_rows($result_1) > 0) {
    unset($_SESSION["user_lock"]);
    echo '<script type="text/javascript">
             window.location = "' . $url . 'dashboard.php"
        </script>';
  } else {
    echo '
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <strong> Your password is invalid.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
}
?>


</html>