<?php $title="Add Product"; include "inc/header.php" ?>
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
          <li class="breadcrumb-item active" aria-current="page">Add Product</li>
        </ol>
      </nav>
    </div>
    <div class="col-xl-12 col-md-12 add-product">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Add Product</h6>
        </div>
        <div class="ms-panel-body">
          <form id="addTestingProduct" class="needs-validation" novalidate enctype="multipart/form-data">
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
                <button class="btn btn-primary mt-0 d-inline w-20" id="addTestProduct" name="addTestProduct" type="submit">Add</button>
                &nbsp;
                <button class="btn btn-success mt-0 d-inline w-20" type="reset">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-12 col-md-12 update-testing-product" style="display:none">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Update Product</h6>
        </div>
        <div class="ms-panel-body">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-xl-4 col-md-12 mb-3">
                <label for="productName">Update Product Name</label>
                <div class="input-group">
                  <input type="hidden" id="updateTestProductId" name="updateTestProductId" required>
                  <input type="text" class="form-control" id="updateTestProductName" name="updateTestProductName" placeholder="Enter Product Name" required>
                  <div class="invalid-feedback">
                    Please provide a product name.
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-12 mb-3">
                <label>Select Category</label>
                <div class="input-group">
                  <select class="form-control" id="updateTestProductCategory" name="updateTestProductCategory" required>
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
                  <textarea class="form-control" id="updateTestProductDescription" name="updateTestProductDescription" placeholder="Product Description" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a product description.
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <button class="btn btn-primary mt-0 d-inline w-20" id="updateTestProduct" name="updateTestProduct" type="button">Update</button>
                &nbsp;
                <button class="btn btn-success mt-0 d-inline w-20 close-product-box" type="button">Cancel</button>
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
        <!-- data table -->
        <div class="ms-panel-body" id="test-product"></div>
      </div>
    </div>
  </div>
</div>


<?php include "inc/footer.php" ?>

<script>
  // show table first time
  $(document).ready(function() {
    fetch_ProductData();
  });

  // table run time update
  function fetch_ProductData() {
    let addTestingProductTable = 'fetch_ProductData';
    $.ajax({
      method: "post",
      url: "inc/connection.php",
      data: {
        addTestingProductTable: addTestingProductTable
      },
      success: function(data) {
        $("#test-product").html(data);
        $('#add-testing-product').DataTable();
      },
    })
  }

  //Add
  $("#addTestingProduct").on('submit', (function(e) {
    e.preventDefault();
    if ($("#addTestingProduct").find('input:text, input:password, input:file, select, textarea').val() == "") {
      $('body').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">\
          <strong>Fill all the Field.</strong>\
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
            <span aria-hidden="true">&times;</span>\
          </button>\
        </div>');
    } else {
      $.ajax({
        url: "inc/connection.php",
        type: "POST",
        data: new FormData($('#addTestingProduct')[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
          $("body").append(msg);
          // alert(msg);
          $("#addTestingProduct").trigger("reset");
          $(".needs-validation").removeClass('was-validated');
          fetch_ProductData();
        }
      });
    }
  }));

  // delete
  $(document).on('click', "#delete-product", function() {
    let productCurrentId = $(this).attr("storedata");
    // alert("asda")
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        productCurrentId: productCurrentId,
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        // alert(data);
        fetch_ProductData();
      }
    });
  });


  // edit
  $(document).on('click', "#edit-product", function() {
    let productCurrentIdEdit = $(this).attr("storedata");
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        productCurrentIdEdit: productCurrentIdEdit,
      },
      success: function(data) {
        $("#updateTestProductId").val(data.split("(array)")[0]);
        $("#updateTestProductName").val(data.split("(array)")[1]);
        $("#updateTestProductDescription").val(data.split("(array)")[2]);
        $.map($("#updateTestProductCategory option"), function(elementOrValue, indexOrKey) {
          $(elementOrValue).attr("selected",false)
          if ($(elementOrValue).attr("value") == data.split("(array)")[3]) {
            $(elementOrValue).attr("selected", true)
          }
        });

        $(".add-product").hide();
        $(".update-testing-product").show();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }
    });
  });
  $(document).on('click', ".close-product-box", function() {
    $(".add-product").show();
    $(".update-testing-product").hide();
  })

  $(document).on('click', "#updateTestProduct", function() {

    let updateTestProductId = $("#updateTestProductId").val();
    let updateTestProductName = $("#updateTestProductName").val();
    let updateTestProductCategory = $("#updateTestProductCategory").val();
    let updateTestProductDescription = $("#updateTestProductDescription").val();
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        updateTestProductId: updateTestProductId,
        updateTestProductName: updateTestProductName,
        updateTestProductCategory: updateTestProductCategory,
        updateTestProductDescription: updateTestProductDescription
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        // alert(data);
        $(".update-category input,.update-category textarea").val("");
        $(".add-product").show();
        $(".update-testing-product").hide();
        fetch_ProductData();
      }
    });
  });
</script>