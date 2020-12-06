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
          <li class="breadcrumb-item"><a href=<?php echo $url ?>dashboard.php><i class="material-icons">home</i> Home</a></li>
          <li class="breadcrumb-item"><a href="">Testing</a></li>
          <li class="breadcrumb-item active" aria-current="page">Testing Category</li>
        </ol>
      </nav>
    </div>
    <div class="col-xl-6 col-md-12 testing-category">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Add Testing Category</h6>
        </div>
        <div class="ms-panel-body">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="productName">Product Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="testingCategoryName" name="testingCategoryName" placeholder="Enter Texting Name" required>
                  <div class="invalid-feedback">
                    Please provide a Texting name.
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="productDescription">Testing Description</label>
                <div class="input-group">
                  <textarea class="form-control" id="testingCategoryDescription" name="testingCategoryDescription" placeholder="Enter Testing Description" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a testing description.
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary mt-0 d-inline w-20" id="testingCateAdd" name="testingCateAdd" type="button">Add</button>
            <button class="btn btn-success mt-0 d-inline w-20" type="reset">Reset</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-12 update-testing-category" style="display: none;">
      <div class="ms-panel">
        <div class="ms-panel-header ms-panel-custome">
          <h6>Update Testing Category</h6>
        </div>

        <div class="ms-panel-body">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <input type="hidden" id="updateTestingId" name="updateTestingId" required>
              <div class="col-md-12 mb-3">
                <label for="testingName">Update Testing Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="updateTestingName" name="updateTestingName" placeholder="Update Testing Name" required>
                  <div class="invalid-feedback">
                    Please provide a Testing Name.
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="testingDescription">Update Testing Description</label>
                <div class="input-group">
                  <textarea class="form-control" id="updateTestingDescription" name="updateTestingDescription" placeholder="Update Testing Description" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a Testing Description.
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary mt-0 d-inline w-20" id="testingCateUpdate" name="testingCateUpdate" type="button">Update</button>
            <button class="btn btn-success mt-0 d-inline w-20 close-testing-category-box" type="button">Back</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  <div class="ms-panel w-100">
    <div class="ms-panel-header">
      <h6>Testing Category List</h6>
    </div>
    <!-- data table -->
    <div class="ms-panel-body" id="testing-category"></div>
  </div>
</div>


<?php include "inc/footer.php" ?>

<script>
  // show table first time
  $(document).ready(function() {
    fetch_testing_data();
  });

  // table run time update
  function fetch_testing_data() {
    let testingTable = 'fetch_the_data';
    $.ajax({
      method: "post",
      url: "inc/connection.php",
      data: {
        testingTable: testingTable
      },
      success: function(data) {
        $("#testing-category").html(data);
        $('#testing-category-table').DataTable();
      },
      error: function(data) {
        alert("failed to retrieved");
      }
    })
  }

  $(document).on('click', "#testingCateAdd", function() {
    let testingCategoryName = $("#testingCategoryName").val();
    let testingCategoryDescription = $("#testingCategoryDescription").val();
    // if (productName == "" && productDescription == "") {
      $.ajax({
        url: "inc/connection.php",
        method: "POST",
        data: {
          testingCategoryName: testingCategoryName,
          testingCategoryDescription: testingCategoryDescription
        },
        success: function(data) {
          $(".alert").remove();
          $("body").append(data);
          // alert(data);
          $(".testing-category input,.testing-category textarea").val("");
          fetch_testing_data();
        }
      });
    // } else {
    //   $("body").append('<div class="alert alert-danger alert-dismissible fade show" role="alert">\
    //         <strong>File the fields before submit.</strong>\
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
    //           <span aria-hidden="true">&times;</span>\
    //         </button>\
    //       </div>')
    // }
  });

  // delete
  $(document).on('click', "#delete-testing-category", function() {
    let deleteTestingCategory = $(this).attr("storedata");
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        deleteTestingCategory: deleteTestingCategory,
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        fetch_testing_data();
      }
    });
  });
  // edit
  $(document).on('click', "#edit-testing-category", function() {
    let editTestingCategory = $(this).attr("storedata");
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        editTestingCategory: editTestingCategory,
      },
      success: function(data) {
        console.log(data.spit);
        // alert(data.split("(array)"));
        $("#updateTestingId").val(data.split("(array)")[0]);
        $("#updateTestingName").val(data.split("(array)")[1]);
        $("#updateTestingDescription").val(data.split("(array)")[2]);
        $(".testing-category").hide();
        $(".update-testing-category").show();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }
    });
  });
  $(document).on('click', ".close-testing-category-box", function() {
    $(".testing-category").show();
    $(".update-testing-category").hide();
  })

  $(document).on('click', "#testingCateUpdate", function() {
    let updateTestingId = $("#updateTestingId").val();
    let updateTestingName = $("#updateTestingName").val();
    let updateTestingDescription = $("#updateTestingDescription").val();
    $.ajax({
      url: "inc/connection.php",
      method: "POST",
      data: {
        updateTestingId: updateTestingId,
        updateTestingName: updateTestingName,
        updateTestingDescription: updateTestingDescription
      },
      success: function(data) {
        $(".alert").remove();
        $("body").append(data);
        $(".update-testing-category input,.update-testing-category textarea").val("");
        $(".testing-category").show();
        $(".update-testing-category").hide();
        fetch_testing_data();
      }
    });
  });
</script>