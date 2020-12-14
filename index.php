<?php include "inc/header.php" ?>
<?php $con = mysqli_connect("localhost", "root", "", "lab")?>
<?php include "inc/upload.php"?>

<!--Home-Product-->

<div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Product</li>
        </ol>
      </nav>
    </div>

  <!--Form--->

  <div class="col-xl-12 col-md-12 add-product">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Add Product</h6>
        </div>
        <div class="ms-panel-body">
          <form id="addTestingProduct" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-xl-4 col-md-12 mb-3">
                <label for="productName">Product Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="addProductName" name="addProductName" placeholder="Enter Product Name" required>
                  <div class="invalid-feedback">
                    Please provide a product name.
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-12 mb-3 input-icon">
                <label for="productDescription">Product Code</label>
                <div class="input-group">
                  <input type="text" maxlength="10" minlength="10" class="form-control" id="productCode" name="productCode" placeholder="Enter ProductCode" required>
                  <i id="codeGenerator" class="fas fa-redo"></i>
                  <div class="invalid-feedback">
                    Please provide a Product Code.
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-12 mb-3">
                <label for="productDescription">You Can Add multiple image</label>
                <div class="input-group">
                  <input type="file" multiple="multiple" maxlength="10" class="form-control" id="addProductImage" name="addProductImage[]" placeholder="Enter ProductCode" required>
                  <div class="invalid-feedback">
                    Please provide a image.
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-12 mb-3">
                <label>Select Category</label>
                <div class="input-group">
                  <select class="form-control" id="addTestProductCategory" name="addTestProductCategory" required>
                    <option value="empty" selected disabled>---Select---</option>
                    <?php
                    $sql = "SELECT * FROM producttype";

                    if ($result = mysqli_query($con, $sql)) {
                      $i = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option style='text-transform:lowercase;' name='" . $row["ProductTypeId"] . "' value='" . $row["ProductTypeId"] . "'>" . $row["ProductName"] . "</option>";
                      }
                    }
                    ?>
                  </select>
                  <div class="invalid-feedback">
                    Please select a Categories.
                  </div>
                </div>
              </div>
              
              <div class="col-xl-4 col-md-12 mb-3">
                <label for="productDescription">Product Description</label>
                <div class="input-group">
                  <textarea class="form-control" id="addTestProductDescription" name="addTestProductDescription" placeholder="Product Description" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a product description.
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <button class="btn btn-primary mt-0 d-inline w-20" name="submit" type="submit" id="file" >Add</button>
                &nbsp;
                <button class="btn btn-success mt-0 d-inline w-20" type="reset">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-12 col-md-12">
      <div class="ms-panel w-100">
        <div class="ms-panel-header">
          <h6>Product List</h6>
    </div>

    <div class="ms-panel-body" id="test-product">
        <table id="product-category-table" class="table w-100 thead-primary">
          <thead>
            <tr>
              <th>
                Id
              </th>
            <th>Product Name</th>
              <th>Product Code</th>
              <th>
                User Name
              </th>
              <th>
                Product Details
              </th>
              <th>
                Category Name
              </th>
              <th>
                Date
              </th>
              <th>
              
                Action
              </th>
              
            </tr>
          </thead>
        </div>
  



      <!------Script-------->

      <script type="text/javascript">
      $(document).ready(function(){

        $().click();

      });
      </script>

        
        <?php
$select1 =  "select * From product";
$result1 = mysqli_query($con, $select1);
while($row1 = mysqli_fetch_array($result1)){
?>
  <tbody>
<td><?php echo $row1['productId']?></td>
<td><?php echo $row1['ProductName']?></td>
<td><?php echo $row1['ProductCode']?></td>
<td><?php echo $_SESSION["user_name"]?></td>
<td><?php echo $row1['ProductDetail']?></td>
<td><?php echo $row1['ProductIdType']?></td>
<td><?php echo $row1['ProductDate']?></td>
<td><a href="add-product.php?edit=<?php echo $row1['productId']?>"><i class="fas fa-pencil-alt ms-text-primary"></i></a>
<a href="add-product.php?delete=<?php echo $row1['productId']?>"><i class="far fa-trash-alt ms-text-danger"></i></a></td>

            
          </tbody>
          <?php }
 ?>
        </table>
      </div></div>
  </div>

</div>   
        
<?php include "inc/footer.php" ?>