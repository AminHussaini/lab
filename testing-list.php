<?php include "inc/header.php" ?>
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "CPRI") echo $return_var;

?>
<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="#">Testing</a></li>
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
            $result  = mysqli_query($con, $testing) or die("query fail");

            $testingtypesrow = 'SELECT * FROM testingtypes';
            if (mysqli_num_rows(mysqli_query($con, $testingtypesrow)) > 0) { ?>
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
                      Product Detail
                    </th>
                    <th>
                      Test Code
                    </th>
                    <th>
                      Testing Type
                    </th>
                    <th>
                      Date
                    </th>
                    <th class="text-center">
                      Action
                    </th>
                  </tr>
                </thead>

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
  var added = false;
  productArray = [];
  let product_length = $(".product-name").length;
  $.map($(".product-name"), function(elementOfArray, indexInArray) {
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