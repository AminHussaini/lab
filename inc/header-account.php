<?php include("connection.php") ?>
<?php
session_start();
if (isset($_SESSION["user_name"])) {
  header("Location:dashboard.php");
  // exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php if (isset($title)) {echo $title;} else{echo "Lab Automation";} ?></title>
  <!-- Iconic Fonts -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <link href="material/iconic-fonts/font.css" rel="stylesheet">
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

<body class="ms-body ms-primary-theme ms-logged-out">
  <!-- Preloader -->
  <?php include("loader.php") ?>


  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

  <!-- Main Content -->
  <main class="body-content">
