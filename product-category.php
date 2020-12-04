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
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product Category</li>
        </ol>
      </nav>
    </div>
    <div class="col-xl-6 col-md-12 add-category">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Add Product Category</h6>
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
    <div class="col-xl-6 col-md-12 update-category" style="display: none;">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Update Product Category</h6>
        </div>

        <div class="ms-panel-body">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <input type="hidden" id="updateProductId" name="updateProductId" required>
              <div class="col-md-12 mb-3">
                <label for="productName">Update Product Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="updateProductName" name="updateProductName" placeholder="Update Product Name" required>
                  <div class="invalid-feedback">
                    Please provide a product name.
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="productDescription">Update Product Description</label>
                <div class="input-group">
                  <textarea class="form-control" id="updateProductDescription" name="updateProductDescription" placeholder="Update Product Description" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a product description.
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary mt-4 d-inline w-20" id="productCateUpdate" name="productCateUpdate" type="button">Update</button>
            <button class="btn btn-success mt-4 d-inline w-20 close-category-box" type="button">Back</button>
          </form>
        </div>
      </div>
    </div>

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
        $(".alert").remove();
        $("body").append(data);
        $(".add-category input,.update-category textarea").val("");
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
  // edit
  $(document).on('click', "#edit-product-category", function() {
    let currentIdEdit = $(this).attr("storedata");
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        currentIdEdit: currentIdEdit,
      },
      success: function(data) {
        console.log(data.spit);
        // alert(data.split("(array)"));
        $("#updateProductId").val(data.split("(array)")[0]);
        $("#updateProductName").val(data.split("(array)")[1]);
        $("#updateProductDescription").val(data.split("(array)")[2]);
        $(".add-category").hide();
        $(".update-category").show();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }
    });
  });
  $(document).on('click', ".close-category-box", function() {
    $(".add-category").show();
    $(".update-category").hide();
  })
  $(document).on('click', "#productCateUpdate", function() {
    let updateProductId = $("#updateProductId").val();
    let updateProductName = $("#updateProductName").val();
    let updateProductDescription = $("#updateProductDescription").val();
    console.log(updateProductName, updateProductDescription);
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        updateProductId: updateProductId,
        updateProductName: updateProductName,
        updateProductDescription: updateProductDescription
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        $(".update-category input,.update-category textarea").val("");
        $(".add-category").show();
        $(".update-category").hide();
        fetch_data();
      }
    });
  });
</script>