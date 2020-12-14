<?php include "inc/header.php" ?>
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "SRS") echo $return_var;
?>



<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="#">Testing</a></li>
          <li class="breadcrumb-item active" aria-current="page">Start-testing</li>
        </ol>
      </nav>
    </div>

    <div class="col-xl-12">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Start Testing List</h6>
        </div>
        <div class="ms-panel-body" id="test-product">
          <div class="table-responsive">
            <?php

            $sql = "SELECT * FROM sendfortest";
            $result  = mysqli_query($con, $sql) or die("query fail");

            $testingrow = 'SELECT * FROM testingtypes';
            if (mysqli_num_rows(mysqli_query($con, $testingrow)) > 0) { ?>
              <table id="start-testing-product" class="table w-100 thead-primary">
                <thead>
                  <tr>
                    <th>
                      Id
                    </th>
                    <th>
                      User Name
                    </th>
                    <th>
                      Product Name
                    </th>
                    <th>
                      Product Category
                    </th>
                    <th>
                      Product Code
                    </th>
                    <th>
                      Product Detail
                    </th>
                    <th>
                      Date
                    </th>
                    <th>
                      Testing Type
                    </th>
                    <th class="text-center">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if ($result = mysqli_query($con, $sql)) {
                    $i = 1;
                    while ($getsenddeatilrow = mysqli_fetch_assoc($result)) {
                      $sqlp = "SELECT * FROM product where ProductId= " . $getsenddeatilrow["productid"] . "";
                      $presult = mysqli_query($con, $sqlp) or die("query fail");
                      $productrow = mysqli_fetch_array($presult);

                      if ($productrow["Status"] == 0) {

                        echo "<tr>
                        <td class='userid' id=".$getsenddeatilrow['sendbyuser'].">" . $i . "</td>
                        ";

                        $sql = "SELECT * FROM register where id=" . $getsenddeatilrow['sendbyuser'] . "";
                        $getRegister = mysqli_query($con, $sql);
                        $getRegisterRow = mysqli_fetch_assoc($getRegister);

                        echo   "<td>" . $getRegisterRow['name'] . "</td>";



                        $productID = $productrow['ProductIdType'];
                        $productCategory = "SELECT * FROM producttype where ProductTypeId=$productID" or die("query fail");
                        $getProductCategory = mysqli_query($con, $productCategory);
                        $getProductCategoryRow = mysqli_fetch_assoc($getProductCategory);

                        echo "
                        <td class='product-name' style='text-transform:capitalize;'>" . $productrow['ProductName'] . "</td>
                        <td style='text-align:center!important;'>" . $getProductCategoryRow['ProductName']  . "</td>
                        <td>" . $productrow['ProductCode'] . "</td>
                        <td style='min-width: 200px;max-width: 280px;word-break: break-word;white-space: initial;'>" . $productrow['ProductDetail'] . "</td>
                        <td style='min-width: 170px;white-space: initial;'> <b>Date: </b>" . explode(" ", $getsenddeatilrow['Datetime'])[0] . "<br> <b>Time: </b>" . explode(" ", $getsenddeatilrow['Datetime'])[1] . "</td>";

                        echo "<td style='min-width: 200px;max-width: 280px;word-break: break-word;'>
                        <div class='testing-category'>
                        <select class='form-control' id='addTestProductCategory' name='addTestProductCategory' required>
                        <option value='empty' selected disabled>Select</option>";

                        $sqlf = 'SELECT * FROM testingtypes';

                        if ($results = mysqli_query($con, $sqlf)) {

                          while ($row = mysqli_fetch_assoc($results)) {
                            echo "<option style='text-transform:lowercase; name='$row[TestingTypeID]' value='$row[TestingTypeID]' > $row[TestingTypeName] </option>";
                          }
                        }

                        echo "
                          </select>
                        </div>
                        </td>
                            <td class='text-center'>
                            <button id=" . $productrow['ProductId'] . " type='button' class='btn btn-pill btn-outline-light m-0 start-testing'>Start Testing</button>
                            </td>
                            </tr>
                        ";

                        $i++;
                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            <?php  } else {
              echo "<h6 class='text-center' style='color:var(--red);font-weight:700'>Add the testing First</h6>";
            };
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "inc/footer.php" ?>
<script>
  $(document).ready(function() {
    $(document).on('click', ".start-testing", function() {

      let user_id = $(this).closest("tr").find(".userid").attr("id");
      let product_id = $(this).attr("id");
      let testing_id = $(this).closest("tr").find(".testing-category select").val()
      if (testing_id != null || testing_id != undefined) {
        $.ajax({
          type: "POST",
          url: "inc/connection.php",
          data: {
            user_id: user_id,
            product_id: product_id,
            testing_id: testing_id,
          },
          success: function(response) {
            $("body").append(response);
            // alert(response)
          }
        });
      } else {
        $(".alert").remove();
        $("body").append('<div class="alert alert-danger alert-dismissible fade show" role="alert">\
             <strong>Select the testing category.</strong>\
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
               <span aria-hidden="true">&times;</span>\
             </button>\
           </div>')
      }
    });

    $('#start-testing-product').DataTable();
  })
</script>