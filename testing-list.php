<?php $title="Testing List"; include "inc/header.php" ?>
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
        <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="">Testing</a></li>
          <li class="breadcrumb-item active" aria-current="page">Testing List</li>
        </ol>
      </nav>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Total Testing</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="pie-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Testing Entry</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="bar-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Testing List</h6>
        </div>
        <div class="ms-panel-body" id="test-product">
          <div class="table-responsive">
            <?php

            $testing = "SELECT * FROM testing";
            $testingresult  = mysqli_query($con, $testing) or die("query fail");
            if (mysqli_num_rows($testingresult) > 0) { ?>
              <table id="product-list" class="table w-100 thead-primary">
                <thead>
                  <tr>
                    <th>
                      Id
                    </th>
                    <th>
                      Product Name
                    </th>
                    <th>
                      Product Category
                    </th>
                    <th>
                      Product Detail
                    </th>
                    <th>
                      Tester Name
                    </th>
                    <th>
                      Testing Code
                    </th>
                    <th>
                      Testing Type
                    </th>
                    <th>
                      Date
                    </th>
                    <th class='text-center'>
                    Status
                    </th>
                    <th class="text-center">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  while ($testingRows = mysqli_fetch_assoc($testingresult)) {

                    echo "<tr> <td>" . $i . "</td>";

                    $productRow = 'SELECT *  FROM product where ProductId='.$testingRows["ProductId"].'';
                    $productRowList = mysqli_fetch_assoc(mysqli_query($con, $productRow));

                    $startTesting = "SELECT * FROM sendfortest WHERE productid=" . $testingRows["ProductId"] . "";
                    $startTestingResult = mysqli_query($con, $startTesting) or die("query fail");

                    echo "
                    <td style='text-transform:capitalize'>" . $productRowList["ProductName"] . "</td>";

                    $productTypeRow = 'SELECT *  FROM producttype where ProductTypeId ='.$productRowList["ProductIdType"].'';
                    $productTypeRowList = mysqli_fetch_assoc(mysqli_query($con, $productTypeRow));

                    $testingtypesrow = 'SELECT * FROM testingtypes Where TestingTypeID='.$testingRows["TestingType"].'';
                    $testTypeRowList = mysqli_fetch_assoc(mysqli_query($con, $testingtypesrow));

                    $testingUser = "SELECT * FROM register where id=" . $testingRows["TestingUser"]. "";
                    $getTestingUser = mysqli_query($con, $testingUser);
                    $getTestingUserList = mysqli_fetch_assoc($getTestingUser);

                    echo "
                    <td class='testing-name'>" . $productTypeRowList["ProductName"] . "</td>
                    <td>" . $productRowList["ProductDetail"] . "</td>
                    <td>" . $getTestingUserList['name'] . "</td>
                    <td>" . $testingRows["TestingCode"] . "</td>
                    <td>" . $testTypeRowList["TestingTypeName"] . "</td>
                    <td style='min-width: 170px;white-space: initial;'> <b>Date: </b>" . explode(" ", $testingRows['TestingDate'])[0] . "<br> <b>Time: </b>" . explode(" ", $testingRows['TestingDate'])[1] . "</td>

                    <td class='text-center'>";
                    if (mysqli_num_rows($startTestingResult) > 0) {
                      if ($productRowList['Status'] ==1) echo "<span class='badge badge-outline-info'>Testing start</span>";
                      else if ($productRowList['Status'] == 2) echo "<span class='badge badge-outline-success'>Approved</span>";
                      else if ($productRowList['Status'] == 3) echo "<span class='badge badge-outline-danger'>Rejected</span>";
                     else echo "<span class='badge badge-outline-warning'>Pending</span>";

                    } else echo "<span class='badge badge-outline-light'>Ready</span>";
                    echo " </td>
                        <td class='text-center'>
                        <a title='view detail' href='testing-detail.php?id=" . $productRowList['ProductId'] . "'><i class='fa fa-info-circle ms-text-primary'></i></a>
                        </td>";
                    // if ($_SESSION["Id"] == $testingRows['TestingUser'] || $_SESSION["user_role"] == "Admin") {
                    //   echo "
                    //     <a title='view detail' href='testing-detail.php?id=" . $productRowList['ProductId'] . "'><i class='fa fa-info-circle ms-text-primary'></i></a>
                    //   ";
                    // } else {
                    //   echo "<span class='badge badge-outline-danger'>No permission</span>";
                    // }
                    echo "</td>";
                    $i++;
                  }
                  ?>


                </tbody>
              </table>
            <?php  } else {
              echo '<script type="text/javascript">
              window.location = "' . $url . 'dashboard.php"
              </script>';
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
  var added = false;
  productArray = [];
  let product_length = $(".testing-name").length;
  $.map($(".testing-name"), function(elementOfArray, indexInArray) {
    function defaultProduct() {
      productArray.push({
        productName: $(elementOfArray).text(),
        productValue: 1
      });
    }
    let count = indexInArray;
    if (productArray == undefined || productArray.length == 0) {
      defaultProduct();
    } else {
      let added = false;
      let curruntIndex = 1;
      let count = 1;
      $.map(productArray, function(elementOrValue, indexOrKey) {
        if (elementOrValue.productName == $(elementOfArray).text()) {
          curruntIndex = indexOrKey;
          count = elementOrValue.productValue;
          added = true;
        }
      });
      if (!added) {
        defaultProduct();
      } else {
        productArray[curruntIndex].productValue = ++count;
        added = false;
      }
    }
  })

  $(document).ready(function() {
    let productNameList = [];
    let productValueList = [];
    let productColorList = [];
    $.map(productArray, function(elementOrValue, indexOrKey) {
      productNameList.push(
        productArray[indexOrKey].productName,
      );
      productValueList.push(
        productArray[indexOrKey].productValue,
      );
      productColorList.push(
        "#" + ((1 << 24) * Math.random() | 0).toString(16),
      );
    })
    new Chart(document.getElementById("pie-chart"), {
      type: 'pie',
      data: {
        labels: productNameList,

        datasets: [{
          label: "Population (millions)",
          backgroundColor: productColorList,
          data: productValueList
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Number of product added'
        }
      }
    });
    var barChart = new Chart(document.getElementById("bar-chart"), {
      type: 'bar',
      data: {
        labels: productNameList,
        datasets: [{
          label: "product",
          backgroundColor: productColorList,
          data: productValueList
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: 'Maximum number of product'
        }
      }
    });
  })
</script>