 <!-- Overlays -->
 <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
 <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
 <!-- Sidebar Navigation Left -->
 <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
   <!-- Logo -->
   <div class="logo-sn ms-d-block-lg">
     <a class="pl-0 ml-0 text-center" href="http://localhost/aptechProject/lab/dashboard.php"> <img src="assets/img/toola.png" alt="logo"> </a>
     <a href="#" class="text-center ms-logo-img-link"> <img onerror="this.src='assets/user_image/user-default.png'" src="assets/user_image/<?php echo $_SESSION["user_image"] ?>" alt="logo_<?php echo $_SESSION["user_image"] ?>"></a>
     <h5 class="text-center text-white mt-2"><?php echo $_SESSION["user_name"] ?></h5>
     <h6 class="text-center text-white mb-3"><?php echo $_SESSION["user_role"] ?></h6>
   </div>
   <!-- Navigation -->
   <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">

     <?php
      echo "
      <li class='menu-item'>
        <a href='dashboard.php'>
          <span><i class='material-icons fs-16'>dashboard</i>".$_SESSION["user_role"]." Dashboard </span>
        </a>
      </li>
      ";
      if ($_SESSION["superAdmin"] == 1) {
        echo "
        <li class='menu-item'>
          <a href='allow-user.php' class='active'>
            <span><i class='fa fa-users fs-16'></i>Allow Users</span>
          </a>
        </li>
        ";
      }
      if ($_SESSION["user_role"] == "SRS" || $_SESSION["user_role"] == "Admin") {
        echo "
        <li class='menu-item'>
          <a href='#' class='has-chevron collapsed' data-toggle='collapse' data-target='#product' aria-expanded='false' aria-controls='department'>
          <span><i class='fas fa-archive'></i>Product</span>
          </a>
          <ul id='product' class='collapse' aria-labelledby='product' data-parent='#side-nav-accordion' style=''>
            <li> <a href='product-category.php'>Product Category</a> </li>
            <li> <a href='add-product.php'>Add Product</a> </li>
            <li> <a href='product-list.php'>Product List</a> </li>
            <li> <a href='reject-product.php'>Reject Product</a> </li>
          </ul>
        </li>

        <li class='menu-item'>
          <a href='market-product.php'>
            <span><i class='fas fa-archive'></i>Market Product</span>
          </a>
        </li>

        ";
      }
      if ($_SESSION["user_role"] == "CPRI" || $_SESSION["user_role"] == "Admin") {
        echo "
        <li class='menu-item'>
          <a href='#' class='has-chevron collapsed' data-toggle='collapse' data-target='#Testing' aria-expanded='false' aria-controls='department'>
          <span><i class='fas fa-archive'></i>Testing</span>
          </a>
          <ul id='Testing' class='collapse' aria-labelledby='Testing' data-parent='#side-nav-accordion' style=''>
            <li> <a href='testing-category.php'>Testing Category</a> </li>
            <li> <a href='start-testing.php'>Start Testing</a> </li>
            <li> <a href='testing-list.php'>Testing List</a> </li>
          </ul>
        </li>
        ";
      }
      ?>

   </ul>
 </aside>
