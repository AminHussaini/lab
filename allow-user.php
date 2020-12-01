<?php include "inc/header.php" ?>
<?php include "inc/connection.php"; if ($_SESSION["user_role"] != "Admin") echo '<script type="text/javascript">
             window.location = "'.$url.'dashboard.php"
        </script>';
 ?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Allow User</li>
        </ol>
      </nav>
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Responsive Datatable</h6>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
            <table id="allow-user" class="table w-100 thead-primary">
              <thead>
                <tr>
                  <th>
                    Id
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Password
                  </th>
                  <th>
                    Role
                  </th>
                  <th class="text-center">
                    Status
                  </th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM register";

                if ($result = mysqli_query($con, $sql)) {
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    if ($_SESSION["Id"] != $row['Id']) {
                    echo "<tr>
                      <td>" . $i . "</td>
                      <td><div class='img-session'><img src='assets/user_image/" . $row['image'] . "'/></div></td>
                      <td>" . $row['name'] . "</td>
                      <td class='email'>" . $row['email'] . "</td>
                      <td>" . $row['password'] . "</td>
                      <td>" . $row['role'] . "</td>
                      <td class='text-center'><form method='POST'> ";

                    if ($row['status'] == "Pending") {
                      echo "
                       <span>Block &nbsp;</span>
                        <label class='ms-switch'>
                          <input type='checkbox' class='change-user-permission' id=" . $row['Id'] . " >
                          <span class='ms-switch-slider ms-switch-warning round'></span>
                        </label>
                        <span> &nbsp;Allow</span>";
                    } else {
                      echo "
                        <span>Block &nbsp;</span>
                        <label class='ms-switch'>
                        <input type='checkbox' class='change-user-permission' checked id=" . $row['Id'] . ">
                        <span class='ms-switch-slider ms-switch-warning round'></span>
                        </label>
                        <span> &nbsp;Allow</span>";
                    }

                    echo "</form>
                        </td>
                        </tr>";
                    $i++;
                    }
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "inc/footer.php" ?>
<script>
  $(document).ready(function() {
    let user_current_id;
    let edited;
    $(".change-user-permission").change(function() {
      user_current_id = $(this).attr("id");
      edited = $(this).is(":checked") ? "Accepted" : "Pending";
      let user_current_email = $(this).closest("tr").find(".email").text();
      $.ajax({
        url: "inc/connection.php",
        method: "POST",
        data: {
          current_id: user_current_id,
          edited: edited,
          email: user_current_email,
        },
        success: function(data) {
          $('body').append(data);
        }
      })
    });

  })
</script>