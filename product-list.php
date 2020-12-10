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
          <li class="breadcrumb-item"><a href="#">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product List</li>
        </ol>
      </nav>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Total Product</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="pie-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Product Entry</h6>
        </div>
        <div class="ms-panel-body">
          <canvas id="bar-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Product List</h6>
        </div>
        <div class="ms-panel-body" id="test-product">
          <div class="table-responsive">
            <?php
            $sql = "SELECT * FROM product";
            $result = mysqli_query($con, $sql) or die("query fail");
            ?>
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
                    Product Image
                  </th>
                  <th>
                    Product Name
                  </th>
                  <th>
                    Product Code
                  </th>
                  <th>
                    Product Category
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Date
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
                  $startTesting = "SELECT * FROM sendfortest";
                  $startTestingResult = mysqli_query($con, $startTesting) or die("query fail");
                  $startTestingResultRow = mysqli_fetch_assoc($startTestingResult);
                  while ($row = mysqli_fetch_assoc($result)) {
                   if ($row['ProductId'] == $startTestingResultRow['productid'] ) echo "<tr style='background-color:#ffd5789e'>";
                    else echo "<tr>";


                    echo "
                        <td>" . $i . "</td>
                        ";

                    $sql = "SELECT * FROM register where id=" . $row['ProductaddUserName'] . "";
                    $getRegister = mysqli_query($con, $sql);
                    $getRegisterRow = mysqli_fetch_assoc($getRegister);

                    echo   "<td>" . $getRegisterRow['name'] . "</td><td><div class='image-box'>";
                    $productID =  $row['ProductId'];

                    $multi = "SELECT * FROM multiimages";
                    $getMulti = mysqli_query($con, $multi) or die("Query fail");
                    $getMultiRow = mysqli_fetch_array($getMulti);
                    $j = 0;
                    if (mysqli_num_rows($getMulti) > 0) {
                      // show the limit image uncommit code
                      // $imageLength = 3;
                      while ($fetch = mysqli_fetch_assoc($getMulti)) {
                        // if ($productID == $fetch["parentId"] && $j < $imageLength ) { REVIEW remove the 463 line
                        if ($productID == $fetch["parentId"]) {
                          echo "<div class='img-session'><img src='assets/product-image/" . $fetch['file_name'] . "' data-toggle='modal' data-target='#modal-13'/></div>";
                          // $j++;
                        }
                        // if($j == $imageLength){
                        //   $j=$imageLength+1;
                        // }
                      }
                    }
                    $productCategory = "SELECT * FROM producttype where ProductTypeId=" . $row['ProductIdType'] . "";
                    $getProductCategory = mysqli_query($con, $productCategory);
                    $getProductCategoryRow = mysqli_fetch_assoc($getProductCategory);

                    echo "</div></td>
                        <td class='product-name' style='text-transform:capitalize;'>" . $row['ProductName'] . "</td>
                        <td>" . $row['ProductCode'] . "</td>
                        <td>" . $getProductCategoryRow['ProductName'] . "</td>
                        <td style='min-width: 200px;max-width: 280px;word-break: break-word;white-space: initial;'>" . $row['ProductDetail'] . "</td>
                        <td style='min-width: 170px;white-space: initial;'> <b>Date: </b>" . explode(" ", $row['ProductDate'])[0] . "<br> <b>Time: </b>" . explode(" ", $row['ProductDate'])[1] . "</td>
                        <td class='text-center'>
                        <a title='view detail' href='product-detail.php?id=" . $row['ProductId'] . "'><i class='fa fa-info-circle ms-text-primary'></i></a>
                        </td>
                        </tr>
                        ";
                    $i++;
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
       "#"+((1<<24)*Math.random()|0).toString(16),
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