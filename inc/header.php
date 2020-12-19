
<?php
session_start();
if (!isset($_SESSION["user_name"])) {
  header("Location:index.php");
  // exit();
}
if (isset($_SESSION["user_lock"])) {
  header("Location:lock-screen.php");
  // exit();
}
if ($_SERVER['REQUEST_URI'] != "/aptechProject/lab/product-category.php") {
  $_SESSION["editCategoryPanel"] = "close";
}

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php if (isset($title)) {echo $title;} else{echo "Lab Automation";} ?></title>
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
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="assets/css/slick.css" rel="stylesheet">
  <!-- Data table styles -->
  <link href="assets/css/datatables.min.css" rel="stylesheet">
  <!-- Lab Automation styles -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Page Specific CSS (Morris Charts.css) -->
  <link href="assets/css/morris.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
</head>
<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
  <!-- Preloader -->
  <?php include 'loader.php' ?>

  <?php include 'sidebar.php'; include 'connection.php' ?>

  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-white"></span>
        <span class="ms-toggler-bar bg-white"></span>
        <span class="ms-toggler-bar bg-white"></span>
      </div>
      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href=<?php echo $url ?>dashboard.php><img src="assets/img/toola.png" alt="logo"> </a>
      </div>
      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">

        <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img onerror="this.src='assets/user_image/user-default.png'" class="ms-user-img ms-img-round float-right" src="assets/user_image/<?php echo $_SESSION["user_image"] ?>" alt="logo_<?php echo $_SESSION["user_image"] ?>"> </a>
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, <?php echo $_SESSION["user_name"] ?></span></h6>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-dropdown-list">
              <a class="media fs-14 p-2" href=<?php echo $url ?>profile.php> <span><i class="flaticon-user mr-2"></i> Profile</span> </a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href=<?php echo $url ?>lock-screen.php> <span><i class="flaticon-security mr-2"></i> Lock</span> </a>
            </li>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="logout.php"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span> </a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
        <span class="ms-toggler-bar bg-white"></span>
        <span class="ms-toggler-bar bg-white"></span>
        <span class="ms-toggler-bar bg-white"></span>
      </div>
    </nav>
