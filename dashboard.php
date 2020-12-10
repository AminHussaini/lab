<?php $title = "Dashboard";
include "inc/header.php";
// ADMIN
$adminQuery = "SELECT * From register where role='Admin'";
$resultAdmin = mysqli_query($con, $adminQuery);
$rowAdmin = mysqli_num_rows($resultAdmin);
// SRS
$srsQuery = "SELECT * From register where role='SRS'";
$resultSrs = mysqli_query($con, $srsQuery);
$rowSrs = mysqli_num_rows($resultSrs);
// CPRI
$cpriQuery = "SELECT * From register where role='CPRI'";
$resultCpri = mysqli_query($con, $cpriQuery);
$rowCpri = mysqli_num_rows($resultCpri);

$productSend;
$data = mysqli_query($con, "SELECT * From sendfortest");
if (mysqli_num_rows($data) > 0) {
  $productSend =mysqli_num_rows($data);
} else {
  $productSend = "Not Ready";
}
?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <!-- Notifications Widgets -->

    <?php if ($_SESSION["user_role"] == "Admin") { ?>
      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6>Admin</h6>
              <p class="ms-card-change"><?php echo $rowAdmin ?></p>
            </div>
          </div>
          <i class="fas fa-user-tie ms-icon-mr"></i>
        </div>
      </div>
    <?php } ?>
    <?php if ($_SESSION["user_role"] != "CPRI") { ?>
      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">SRS</h6>
              <p class="ms-card-change"> <?php echo $rowSrs ?></p>
            </div>
          </div>
          <i class="fa fa-user ms-icon-mr"></i>
        </div>
      </div>
    <?php } ?>
    <?php if ($_SESSION["user_role"] != "SRS") { ?>
      <div class="col-xl-3 col-md-6 col-sm-6">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">CPRI </h6>
              <p class="ms-card-change"> <?php echo $rowCpri ?> </p>
            </div>
          </div>
          <i class="fa fa-user ms-icon-mr"></i>
        </div>
      </div>
    <?php } ?>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6>Product Send</h6>
            <p class="ms-card-change"> <?php echo $productSend?> </p>
          </div>
        </div>
        <i class="fas fa-project-diagram ms-icon-mr"></i>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6 class="bold">Testing Done</h6>
            <p class="ms-card-change"> Not Ready</p>
          </div>
        </div>
        <i class="material-icons  ms-icon-mr">assignment</i>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6 class="bold">Testing Reject</h6>
            <p class="ms-card-change"> Not Ready</p>
          </div>
        </div>
        <i class="material-icons  ms-icon-mr">assignment</i>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6 class="bold">Appointments</h6>
            <h3><strong>3,973</strong></h3>
          </div>
        </div>
        <canvas id="line-chart-2"></canvas>
      </div>
    </div>
    <div class="col-lg-4 col-md-12">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6>New Clients</h6>
            <h3><strong>593</strong></h3>
          </div>
        </div>
        <canvas id="line-chart-3"></canvas>
      </div>
    </div>
    <div class="col-lg-4 col-md-12">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6 class="bold">Total Earning</h6>
            <h3><strong>3,973</strong></h3>
          </div>
        </div>
        <canvas id="line-chart-4"></canvas>
      </div>
    </div>
    <div class="col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
          <h6>Our Staff</h6>
          <div class="ms-slider-arrow">
            <a href="#" class="prev-item">
              <i class="far fa-caret-square-left"></i>
            </a>
            <a href="#" class="next-item">
              <i class="far fa-caret-square-right"></i>
            </a>
          </div>
        </div>
        <div class="ms-panel-body p-0 ms-medical-overview-slider">
          <?php
          $query;
          if ($_SESSION['user_role'] == "Admin") {
            $query = "SELECT * From register where status='Accepted'";
          } else {
            $user_role = $_SESSION['user_role'];
            $query = "SELECT * From register where role='" . $user_role . "' AND status='Accepted'";
          }
          $queryResult = mysqli_query($con, $query);
          while ($totalRow = mysqli_fetch_assoc($queryResult)) {
            if (mysqli_num_rows($queryResult) > 1) {
              if ($totalRow["Id"] != $_SESSION["Id"]) {
                echo '<div class="ms-crypto-overview">
                <a href="#" class="ms-profile">
                  <img src="assets/user_image/' . $totalRow["image"] . '" style="height:100px" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
                  <div class="ms-card-body">
                    <h5>' . $totalRow["name"] . '</h5>
                    <span>' . $totalRow["role"] . '</span>
                  </div>
                </a>
              </div>';
              }
            } else {
              echo "<h6>Currently you are the only one.</h6>";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "inc/footer.php" ?>
<script>
  $('.ms-medical-overview-slider').slick({
    dots: false,
    arrows: false,
    infinite: false,
    slidesToShow: 4,
    arrows: true,
    prevArrow: $('.prev-item'),
    nextArrow: $('.next-item'),
    responsive: [{
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 420,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
</script>