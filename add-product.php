<?php include "inc/header.php" ?>
<?php include "inc/connection.php";
$return_var = '<script type="text/javascript">
window.location = "' . $url . 'dashboard.php"
</script>';
if ($_SESSION["user_role"] == "CPRI") echo $return_var;

?>

<div class="ms-content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0">
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Product <?php echo $_SESSION["editCategoryPanel"] ?></li>
        </ol>
      </nav>
    </div>

    <div class="col-xl-6 col-md-12 add-category">
        <div class="ms-panel">
          <div class="ms-panel-header ms-panel-custome">
            <h6>Add Product</h6>
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



              











<?php include "inc/footer.php" ?>