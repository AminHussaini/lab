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

?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <!-- Notifications Widgets -->

    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6>Admin</h6>
              <p class="ms-card-change"><?php echo $rowAdmin?></p>
            </div>
          </div>
          <i class="fas fa-user-tie ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">SRS</h6>
              <p class="ms-card-change"> <?php echo $rowSrs ?></p>
            </div>
          </div>
          <i class="fa fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">CPRI</h6>
              <p class="ms-card-change"> <?php echo $rowCpri ?> </p>
            </div>
          </div>
          <i class="fa fa-user ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6>Product Send</h6>
              <p class="ms-card-change"> Not Ready</p>
            </div>
          </div>
          <i class="fas fa-project-diagram ms-icon-mr"></i>
        </div>
      </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6">
      <a href="#">
        <div class="ms-card card-gradient-custom ms-widget ms-infographics-widget ms-p-relative">
          <div class="ms-card-body media">
            <div class="media-body">
              <h6 class="bold">Testing Done</h6>
              <p class="ms-card-change"> Not Ready</p>
            </div>
          </div>
          <i class="material-icons  ms-icon-mr">assignment</i>
        </div>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-4 col-lg-6 col-md-12">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6 class="bold">Appointments</h6>
            <h3><strong>3,973</strong></h3>
          </div>
        </div>
        <canvas id="line-chart-2"></canvas>
      </div>

      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        <div class="ms-card-body media">
          <div class="media-body">
            <h6>New Clients</h6>
            <h3><strong>593</strong></h3>
          </div>
        </div>
        <canvas id="line-chart-3"></canvas>
      </div>

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

    <div class="col-xl-4 col-lg-6 col-md-12">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-body calendar-wedgit">
          <div id="calendar"></div>
        </div>

      </div>
    </div>

    <div class="col-xl-4 col-md-12">

      <div class="ms-card ms-widget ms-profile-widget ms-card-fh br-0">
        <div class="ms-card-img">
          <img src="assets/img/portfolio/gallery-4-760x260.jpg" alt="card_img">
        </div>
        <img src="assets/img/dashboard/Engineer-1.jpg" class="ms-img-large ms-img-round ms-user-img" alt="people">
        <div class="ms-card-body">
          <h2>Anny Farisha</h2>
          <span>Engineer</span>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
          <button type="button" class="btn btn-primary btn-sm" name="button"><i class="material-icons">person_add</i> Assign</button>
          <ul class="ms-profile-stats">
            <li>
              <h3 class="ms-count">5790</h3>
              <span>Operations</span>
            </li>
            <li>
              <h3 class="ms-count">4.8</h3>
              <span>Medical Rating</span>
            </li>
          </ul>
        </div>
      </div>

    </div>

    <div class="col-xl-6 col-lg-12">
      <div class="ms-panel ms-device-sessions ms-quick-mic">
        <div class="ms-panel-header">
          <h6>Project base Analytics</h6>
        </div>
        <div class="ms-panel-body">
          <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-4 col-6 ms-device">
              <i class="fas fa-thumbs-up"></i>
              <h4>Done</h4>
              <p class="ms-text-primary">45.07%</p>
              <span class="ms-text-primary">201,434</span>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-4 col-6 ms-device">
              <i class="fas fa-spinner"></i>
              <h4>Current</h4>
              <p class="ms-text-current">29.05%</p>
              <span class="ms-text-current">134,693</span>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-4 col-6 ms-device">
              <i class="fas fa-sync-alt"></i>
              <h4>Pending</h4>
              <p class="ms-text-warning">18.43%</p>
              <span class="ms-text-warning">81,525</span>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 45.07%" aria-valuenow="45.07" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-current" role="progressbar" style="width: 29.05%" aria-valuenow="29.05" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-warning" role="progressbar" style="width: 25.48%" aria-valuenow="25.48" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-12">
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
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-1.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Anny</h5>
                <span>Engineer</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-2.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Jude</h5>
                <span>Surgeon</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-3.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Jordan</h5>
                <span>Engineer</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-4.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Micheal</h5>
                <span>Nurse</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-2.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Rouge</h5>
                <span>Engineer</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-1.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Lilly</h5>
                <span>Surgeon</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-3.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Sameul</h5>
                <span>Surgeon</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-4.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Ricky</h5>
                <span>Engineer</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-1.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Venus</h5>
                <span>Engineer</span>
              </div>
            </a>
          </div>
          <div class="ms-crypto-overview">
            <a href="#" class="ms-profile">
              <img src="assets/img/dashboard/Engineer-3.jpg" class="ms-img-large ms-img-round ms-user-img mx-auto d-block" alt="people">
              <div class="ms-card-body">
                <h5>Johan</h5>
                <span>Nurse</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<?php include "inc/footer.php" ?>