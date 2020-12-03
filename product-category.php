<?php $title="Product Categories"; include "inc/header.php"; ?>
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
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product Category <?php echo $_SESSION["editCategoryPanel"] ?></li>
        </ol>
      </nav>
    </div>
    <?php if ($_SESSION["editCategoryPanel"] == "close") { ?>
      <div class="col-xl-6 col-md-12 add-category">
        <div class="ms-panel">
          <div class="ms-panel-header ms-panel-custome">
            <h6>Add Product Category </h6>
          </div>
          <div class="ms-panel-body">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="productName">Product Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name" required>
                    <div class="invalid-feedback">
                      Please provide a product name.
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="productDescription">Product Description</label>
                  <div class="input-group">
                    <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Enter Product Description" required></textarea>
                    <div class="invalid-feedback">
                      Please provide a product description.
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary mt-4 d-inline w-20" id="productCateAdd" name="productCateAdd" type="button">Submit</button>
              <button class="btn btn-success mt-4 d-inline w-20" type="reset">Reset</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($_SESSION["editCategoryPanel"] == "open") { ?>
      <div class="col-xl-6 col-md-12 update-category">
        <div class="ms-panel">
          <div class="ms-panel-header ms-panel-custome">
            <h6>Update Product Category</h6>
          </div>
          <?php
          $select =  "select * From producttype where ProductTypeId=" . $_SESSION["editCategoryId"] . "";
          $result = mysqli_query($con, $select);
          $row = mysqli_fetch_array($result);
          ?>
          <div class="ms-panel-body">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="productName">Update Product Name</label>
                  <div class="input-group">
                    <input type="hidden" id="updateProductId" name="updateProductId" required readonly>
                    <input type="text" class="form-control" id="updateProductName" name="updateProductName" placeholder="Update Product Name" value='<?php echo $row["ProductName"] ?>' required>
                    <div class="invalid-feedback">
                      Please provide a product name.
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="productDescription">Update Product Description</label>
                  <div class="input-group">
                    <textarea class="form-control" id="updateProductDescription" name="updateProductDescription" placeholder="Update Product Description" required><?php echo $row["ProductDescription"] ?></textarea>
                    <div class="invalid-feedback">
                      Please provide a product description.
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary mt-4 d-inline w-20" id="productCateUpdate" name="productCateUpdate" type="button">Update</button>
              <button class="btn btn-success mt-4 d-inline w-20 panelCategoryClose" name="panelCategoryClose" type="button">Back</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="ms-panel">
    <div class="ms-panel-header">
      <h6>Product Category List</h6>
    </div>
    <!-- data table -->
    <div class="ms-panel-body" id="product-category"></div>
  </div>
</div>


<?php include "inc/footer.php" ?>

<script>
  // show table first time
  $(document).ready(function() {
    fetch_data();
  });

  // table run time update
  function fetch_data() {
    let operation = 'fetch_the_data';
    $.ajax({
      method: "post",
      url: "inc/connection.php",
      data: {
        operation: operation
      },
      success: function(data) {
        $("#product-category").html(data);
        $('#product-category-table').DataTable();
      },
      error: function(data) {
        alert("failed to retrieved");
      }
    })
  }

  $(document).on('click', "#productCateAdd", function() {
    let productName = $("#productName").val();
    let productDescription = $("#productDescription").val();
    console.log(productName, productDescription);
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        productName: productName,
        productDescription: productDescription
      },
      success: function(data) {
        $(".add-category input,.add-category textarea").val("");
        $(".alert").remove();
        $("body").append(data);
        fetch_data();
      }
    });
  });
  // delete
  $(document).on('click', "#delete-product-category", function() {
    let currentId = $(this).attr("storedata");
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        currentId: currentId,
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        fetch_data();
      }
    });
  });
  // edit panel
  $(document).on('click', "#edit-product-category", function() {
    let currentIdEdit = $(this).attr("storedata");
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        currentIdEdit: currentIdEdit,
      },
      success: function(data) {
        location.reload();

      }
    });
  });
  // close the panel
  $(document).on('click', ".panelCategoryClose", function() {
    // alert('aaa')
    let panelCategoryClose = "close";
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        panelCategoryClose: panelCategoryClose,
      },
      success: function(data) {
        location.reload();
      }
    });
  })
  // update the panel
  $(document).on('click', "#productCateUpdate", function() {
    let updateProductName = $("#updateProductName").val();
    let updateProductDescription = $("#updateProductDescription").val();
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        updateProductName: updateProductName,
        updateProductDescription: updateProductDescription
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        fetch_data();
      }
    });
  });
</script>