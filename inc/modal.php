<!-- MODALS -->

<!-- Reminder Modal -->
<div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title has-icon text-white"> New Reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="ms-form-group">
            <label>Remind me about</label>
            <textarea class="form-control" name="reminder"></textarea>
          </div>
          <div class="ms-form-group">
            <span class="ms-option-name fs-14">Repeat Daily</span>
            <label class="ms-switch float-right">
              <input type="checkbox">
              <span class="ms-switch-slider round"></span>
            </label>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="ms-form-group">
                <input type="text" class="form-control datepicker" name="reminder-date" value="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="ms-form-group">
                <select class="form-control" name="reminder-time">
                  <option value="">12:00 pm</option>
                  <option value="">1:00 pm</option>
                  <option value="">2:00 pm</option>
                  <option value="">3:00 pm</option>
                  <option value="">4:00 pm</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Notes Modal -->
<div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="ms-form-group">
            <label>Note Title</label>
            <input type="text" class="form-control" name="note-title" value="">
          </div>
          <div class="ms-form-group">
            <label>Note Description</label>
            <textarea class="form-control" name="note-description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ms-modal-dialog-width">
    <div class="modal-content ms-modal-content-width">
      <div class="modal-header  ms-modal-header-radius-0">
        <h4 class="modal-title text-white">Make An Appointment</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>

      </div>
      <div class="modal-body p-0 text-left">
        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-bshadow-none">
            <div class="ms-panel-header">
              <h6>Client Information</h6>
            </div>
            <div class="ms-panel-body">
              <form class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Client Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Name" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Date Of Birth</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom02" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom03">Disease</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom03" placeholder="Disease" required>

                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom04">Address</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom04" placeholder="Add Address" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom05">Phone no.</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom05" placeholder="Enter Phone No." required>

                    </div>

                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="validationCustom06">Department Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom06" placeholder="Enter Department Name" required>

                    </div>
                  </div>
                </div>



                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom07">Appointment With</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom07" placeholder="Enter Engineer Name" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom08">Appointment Date</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom08" placeholder="Enter Appointment Date" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label>Sex</label>
                    <ul class="ms-list d-flex">
                      <li class="ms-list-item pl-0">
                        <label class="ms-checkbox-wrap">
                          <input type="radio" name="radioExample" value="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Male </span>
                      </li>
                      <li class="ms-list-item">
                        <label class="ms-checkbox-wrap">
                          <input type="radio" name="radioExample" value="" checked="">
                          <i class="ms-checkbox-check"></i>
                        </label>
                        <span> Female </span>
                      </li>
                    </ul>
                  </div>
                </div>
                <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button>
                <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Add Appointment</button>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="prescription" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ms-modal-dialog-width">
    <div class="modal-content ms-modal-content-width">
      <div class="modal-header  ms-modal-header-radius-0">
        <h4 class="modal-title text-white">Make a prescription</h4>
        <button type="button" class="close  text-white" data-dismiss="modal" aria-hidden="true">x</button>

      </div>
      <div class="modal-body p-0 text-left">
        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-bshadow-none">
            <div class="ms-panel-header">
              <h6>Client Information</h6>
            </div>
            <div class="ms-panel-body">
              <form class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom09">Client Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom09" placeholder="Enter Name" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom10">Date Of Birth</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom10" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom11">Address</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom11" placeholder="Add Address" required>

                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom12">Phone no.</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom12" placeholder="Enter Phone No." required>

                    </div>

                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="validationCustom13">Medication</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom13" placeholder="Acetaminophen" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom14">Period Of medication</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom14" placeholder="" required>

                    </div>
                  </div>
                </div>



                <div class="form-row">

                  <div class="col-md-4 mb-3">
                    <label for="validationCustom15">Appointment With</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom15" placeholder="Enter Engineer Name" required>

                    </div>
                  </div>

                </div>
                <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Save Prescription</button>
                <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Save & Print</button>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="report1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ms-modal-dialog-width">
    <div class="modal-content ms-modal-content-width">
      <div class="modal-header  ms-modal-header-radius-0">
        <h4 class="modal-title text-white">Generate report</h4>
        <button type="button" class="close  text-white" data-dismiss="modal" aria-hidden="true">x</button>

      </div>
      <div class="modal-body p-0 text-left">
        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-bshadow-none">
            <div class="ms-panel-header">
              <h6>Client Information</h6>
            </div>
            <div class="ms-panel-body">
              <form class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom16">Client Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom16" placeholder="Enter Name" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom17">Date Of Birth</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom17" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom22">Address</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom22" placeholder="Add Address" required>

                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom18">Phone no.</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom18" placeholder="Enter Phone No." required>

                    </div>

                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="validationCustom19">Report Type</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom19" placeholder="Diseases Report" required>

                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom23">Report Period</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="validationCustom23" placeholder="" required>

                    </div>
                  </div>
                </div>



                <div class="form-row">

                  <div class="col-md-4 mb-3">
                    <label for="validationCustom20">Appointment With</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustom20" placeholder="Enter Engineer Name" required>

                    </div>
                  </div>

                </div>
                <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Generate Report</button>
                <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Generate & Print</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Forgot Password Modal -->
<div class="modal fade" id="modal-12" tabindex="-1" role="dialog" aria-labelledby="modal-12" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-min" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="flaticon-secure-shield d-block"></i>
        <h1>Forgot Password?</h1>
        <p> Enter your email to recover your password </p>
        <form method="POST">
          <div class="ms-form-group has-icon">
            <input type="text" placeholder="Email Address" class="form-control" name="reset_email" value="">
            <i class="material-icons">email</i>
          </div>
          <input name="forget_pass" type="submit" class="btn btn-primary shadow-none" value="Reset Password" />
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add product Modal -->
<div class="modal fade" id="modal-13" tabindex="-1" role="dialog" aria-labelledby="modal-13" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-min" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['forget_pass'])) {
  $to = $_POST['reset_email'];
  $query = "select * From register where email='" . $to . "'";
  $result = mysqli_query($con, $query) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
  $fetch_mail = $row['email'];
  if ($to == $fetch_mail) {
    $subject = "User Password";

    $body = '<!doctype html>
      <html lang="en-US">

      <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Reset Password Email Template</title>
        <meta name="description" content="Reset Password Email Template.">
        <style type="text/css">
          a:hover {
            text-decoration: underline !important;
          }
        </style>
      </head>

      <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
        <!--100% body table-->
        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);">
          <tr>
            <td>
              <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="height:80px;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                  <td>
                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                      <tr>
                        <td style="height:40px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td style="padding:0 35px;">
                        <img width="120" src="https://i.ibb.co/MpG7WfV/kissclipart-orange-b52ab9fbcfbc7431.png" title="logo" alt="logo">
                          <h1 style="color:black !important">Hello ' . $row["name"] . '</h1>
                          <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                          <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                            You"re receiving this e-mail because you requested a password for your ' . $row["role"] . ' account.
                            Please look below to  check your password..
                          </p>
                          <a href="javascript:void(0);" style="background:#ff4c01;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">
                          Your login password is : ' . $row["password"] . '
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td style="height:40px;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                <tr>
                  <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="height:80px;">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!--/100% body table-->
      </body>

      </html>';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <robinjone12@gmail.com>' . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
      echo '
        <div class="alert alert-success alert-dismissible fade show " role="alert">
          <strong>Your password send to your Email.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
  } else {
    echo '
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <strong>You are not register.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
};
?>