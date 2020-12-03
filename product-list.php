<?php include "inc/header.php" ?>
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "CPRI") echo $return_var;

?>
<!-- Body Content Wrapper -->
<!-- <div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="#">Department</a></li>
          <li class="breadcrumb-item active" aria-current="page">Department List</li>
        </ol>
      </nav>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Total Departments</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="pie-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Employes</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="bar-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="ms-panel">
        <div class="ms-panel-header  ms-panel-custome">
          <h6>Department List</h6>
          <a href="add-department.html" class="ms-text-primary">Add Department</a>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
            <table id="data-table5" class="table w-100 thead-primary"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->


<?php include "inc/footer.php" ?>