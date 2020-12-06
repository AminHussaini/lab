 <!-- Overlays -->
 <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
 <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
 <!-- Sidebar Navigation Left -->
 <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
   <!-- Logo -->
   <div class="logo-sn ms-d-block-lg">
     <a class="pl-0 ml-0 text-center" href="index-2.html"> <img src="assets/img/toola.png" alt="logo"> </a>
     <a href="#" class="text-center ms-logo-img-link"> <img onerror="this.src='assets/user_image/user-default.png'" src="assets/user_image/<?php echo $_SESSION["user_image"] ?>" alt="logo_<?php echo $_SESSION["user_image"] ?>"></a>
     <h5 class="text-center text-white mt-2"><?php echo $_SESSION["user_name"] ?></h5>
     <h6 class="text-center text-white mb-3"><?php echo $_SESSION["user_role"] ?></h6>
   </div>
   <!-- Navigation -->
   <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">

     <?php

      if ($_SESSION["user_role"] == "Admin") {
        echo "
        <li class='menu-item'>
          <a href='dashboard.php'>
            <span><i class='material-icons fs-16'>dashboard</i>Admin Dashboard </span>
          </a>
        </li>
        <li class='menu-item'>
          <a href='allow-user.php' class='active'>
            <span><i class='fa fa-users fs-16'></i>Allow Users</span>
          </a>
        </li>
        <li class='menu-item'>
            <a href='#' class='has-chevron collapsed' data-toggle='collapse' data-target='#product' aria-expanded='false' aria-controls='department'>
            <span><i class='fas fa-archive'></i>Product</span>
            </a>
            <ul id='product' class='collapse' aria-labelledby='product' data-parent='#side-nav-accordion' style=''>
              <li> <a href='product-category.php'>Product Category</a> </li>
              <li> <a href='add-product.php'>Add Product</a> </li>
              <li> <a href='product-list.php'>Product List</a> </li>
            </ul>
        </li>
        <li class='menu-item'>
          <a href='#' class='has-chevron collapsed' data-toggle='collapse' data-target='#testing' aria-expanded='false' aria-controls='department'>
          <span><i class='fas fa-archive'></i>Testing</span>
          </a>
          <ul id='testing' class='collapse' aria-labelledby='testing' data-parent='#side-nav-accordion' style=''>
            <li> <a href='testing-category.php'>Testing Category</a> </li>
            <li> <a href='add-testing.php'>Add Testing</a> </li>
            <li> <a href='testing-list.php'>Testing List</a> </li>
          </ul>
        </li>
        ";
      }

      if ($_SESSION["user_role"] == "SRS") {
        echo "
        <li class='menu-item'>
          <a href='dashboard.php'>
            <span><i class='material-icons fs-16'>dashboard</i>SRS Dashboard </span>
          </a>
        </li>
        <li class='menu-item'>
          <a href='#' class='has-chevron collapsed' data-toggle='collapse' data-target='#product' aria-expanded='false' aria-controls='department'>
          <span><i class='fas fa-archive'></i>Product</span>
          </a>
          <ul id='product' class='collapse' aria-labelledby='product' data-parent='#side-nav-accordion' style=''>
            <li> <a href='product-category.php'>Product Category</a> </li>
            <li> <a href='add-product.php'>Add Product</a> </li>
            <li> <a href='product-list.php'>Product List</a> </li>
          </ul>
        </li>
        ";
      }

      if ($_SESSION["user_role"] == "CPRI") {
        echo "
        <li class='menu-item'>
          <a href='dashboard.php'>
            <span><i class='material-icons fs-16'>dashboard</i>CPRI Dashboard </span>
          </a>
        </li>
        <li class='menu-item'>
          <a href='#' class='has-chevron collapsed' data-toggle='collapse' data-target='#Testing' aria-expanded='false' aria-controls='department'>
          <span><i class='fas fa-archive'></i>Testing</span>
          </a>
          <ul id='Testing' class='collapse' aria-labelledby='Testing' data-parent='#side-nav-accordion' style=''>
            <li> <a href='testing-category.php'>Testing Category</a> </li>
            <li> <a href='add-Testing.php'>Add Testing</a> </li>
            <li> <a href='Testing-list.php'>Testing List</a> </li>
          </ul>
        </li>
        ";
      }

      ?>

   </ul>
 </aside>
 <!-- Sidebar Right -->
 <aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">
   <div class="ms-aside-header">
     <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">
       <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active" role="tab" data-toggle="tab"> Activity Log</a></li>
       <li role="presentation" class="fs-12"><a href="#recentPosts" aria-controls="recentPosts" role="tab" data-toggle="tab"> Settings </a></li>
       <li><button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity" data-toggle="slideRight"><span aria-hidden="true">&times;</span></button></li>
     </ul>
   </div>
   <div class="ms-aside-body">
     <div class="tab-content">
       <div role="tabpanel" class="tab-pane active fade show" id="activityLog">
         <ul class="ms-activity-log">
           <li>
             <div class="ms-btn-icon btn-pill icon btn-light">
               <i class="flaticon-gear"></i>
             </div>
             <h6>Update 1.0.0 Pushed</h6>
             <span> <i class="material-icons">event</i>1 January, 2019</span>
             <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
           </li>
           <li>
             <div class="ms-btn-icon btn-pill icon btn-success">
               <i class="flaticon-tick-inside-circle"></i>
             </div>
             <h6>Profile Updated</h6>
             <span> <i class="material-icons">event</i>4 March, 2018</span>
             <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
           </li>
           <li>
             <div class="ms-btn-icon btn-pill icon btn-warning">
               <i class="flaticon-alert-1"></i>
             </div>
             <h6>Your payment is due</h6>
             <span> <i class="material-icons">event</i>1 January, 2019</span>
             <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
           </li>
           <li>
             <div class="ms-btn-icon btn-pill icon btn-danger">
               <i class="flaticon-alert"></i>
             </div>
             <h6>Database Error</h6>
             <span> <i class="material-icons">event</i>4 March, 2018</span>
             <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
           </li>
           <li>
             <div class="ms-btn-icon btn-pill icon btn-info">
               <i class="flaticon-information"></i>
             </div>
             <h6>Checkout what's Trending</h6>
             <span> <i class="material-icons">event</i>1 January, 2019</span>
             <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
           </li>
           <li>
             <div class="ms-btn-icon btn-pill icon btn-secondary">
               <i class="flaticon-diamond"></i>
             </div>
             <h6>Your Dashboard is ready</h6>
             <span> <i class="material-icons">event</i>4 March, 2018</span>
             <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
           </li>
         </ul>
         <a href="#" class="btn btn-primary d-block"> View All </a>
       </div>
       <div role="tabpanel" class="tab-pane fade" id="recentPosts">
         <h6>General Settings</h6>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Location Tracking</span>
           <label class="ms-switch float-right">
             <input type="checkbox">
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Allow Notifications</span>
           <label class="ms-switch float-right">
             <input type="checkbox">
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Allow Popups</span>
           <label class="ms-switch float-right">
             <input type="checkbox" checked>
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <h6>Log Settings</h6>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Enable Logging</span>
           <label class="ms-switch float-right">
             <input type="checkbox" checked>
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Audit Logs</span>
           <label class="ms-switch float-right">
             <input type="checkbox">
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Error Logs</span>
           <label class="ms-switch float-right">
             <input type="checkbox" checked>
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <h6>Advanced Settings</h6>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Enable Logging</span>
           <label class="ms-switch float-right">
             <input type="checkbox" checked>
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Audit Logs</span>
           <label class="ms-switch float-right">
             <input type="checkbox">
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
         <div class="ms-form-group">
           <span class="ms-option-name fs-14">Error Logs</span>
           <label class="ms-switch float-right">
             <input type="checkbox" checked>
             <span class="ms-switch-slider round"></span>
           </label>
         </div>
       </div>
     </div>
   </div>
 </aside>