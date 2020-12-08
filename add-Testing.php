<?php include "inc/header.php" ?>
<link rel="stylesheet" href="assets/slider-nav/css/flexslider.css" />
<link rel="stylesheet" href="assets/slider-nav/css/demo.css" />
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
          <li class="breadcrumb-item active" aria-current="page">Add Testing</li>
        </ol>
      </nav>
    </div>
   
    <div class="col-xl-12">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Product Testing List</h6>
        </div>
        <div class="ms-panel-body" id="test-product">
          <div class="table-responsive">
            <?php

            $sql = "SELECT * FROM sendfortest";
            $result  = mysqli_query($con, $sql) or die("query fail");
            
            ?>
            <table id="add-testing-product" class="table w-100 thead-primary">
              <thead>
                <tr>
                  <th>
                    Id
                  </th>
                  <th>
                    User Name
                  </th>
                  <th>
                    Product Category
                  </th>
                  <th>
                    Product Name
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
                  while ($getsenddeatilrow= mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>" . $i . "</td>
                        ";

                    $sql = "SELECT * FROM register where id=" . $getsenddeatilrow['sendbyuser'] . "";
                    $getRegister = mysqli_query($con, $sql);
                    $getRegisterRow = mysqli_fetch_assoc($getRegister);

                    echo   "<td>" . $getRegisterRow['name'] . "</td>";
                    
                    $sqlp = "SELECT * FROM product where ProductId= ".$getsenddeatilrow["productid"] ."";
                    $presult = mysqli_query($con, $sqlp) or die("query fail");
                    $productrow=mysqli_fetch_array($presult);
        

                    $productCategory = "SELECT * FROM producttype where ProductTypeId=" . $productrow['ProductIdType'] . "";
                    $getProductCategory = mysqli_query($con, $productCategory);
                    $getProductCategoryRow = mysqli_fetch_assoc($getProductCategory);
                    
                    echo "
                        <td class='product-name' style='text-transform:capitalize;'>" . $getProductCategoryRow['ProductName']  . "</td>
                        <td>" .$productrow['ProductName'] . "</td>
                        <td>" . $productrow['ProductCode'] . "</td>
                        <td style='min-width: 200px;max-width: 280px;word-break: break-word;white-space: initial;'>" . $productrow['ProductDetail'] . "</td>
                        <td style='min-width: 170px;white-space: initial;'> <b>Date: </b>" . explode(" ", $productrow['ProductDate'])[0] . "<br> <b>Time: </b>" . explode(" ", $productrow['ProductDate'])[1] . "</td>";
                       
                    echo "<td style='min-width: 200px;max-width: 280px;word-break: break-word;'>
                    <div class='input-group'>
                    <select class='form-control' id='addTestProductCategory' name='addTestProductCategory' required>
                    <option value='empty' selected disabled>Select</option>";
                    
                    $sqlf = 'SELECT * FROM producttype';

                    if ($results = mysqli_query($con, $sqlf)) {
                      
                      while ($row = mysqli_fetch_assoc($results)) {
                        echo "<option style='text-transform:lowercase; name='. $row[ProductTypeId] .' value= ' . $row[ProductTypeId] .' > . $row[ProductName] . </option>";
                      }
                    }
                    
                     echo" 
                      </select>
                     </div>
                     </td>
                        <td class='text-center'>
                        <button class='btn btn-primary  mt-2 d-block w-3 text-white'>Strat Testing</button>
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


