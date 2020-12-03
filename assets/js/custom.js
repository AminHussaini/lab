$(document).ready(function () {
  let browserUrl = document.location.pathname.match(/[^\/]+$/)[0];
  if (browserUrl != "login.php" && browserUrl != "register.php") {
    $('#allow-user').DataTable();
    $("#product-category").ready(function () {
      $('#product-category-table').DataTable();
    })
  }
  $("body").mousemove(function () {
    $('.alert').delay(4000).fadeOut()
  });

  $(document).on("click", "#password-icon-btn", function () {
    passwordStatus = $(this).closest(".input-group").find(".password-field")
    let password =
      passwordStatus.attr("type") === "password" ? "text" : "password";
    passwordStatus.attr("type", password);

    icon = passwordStatus.attr("type") === "password" ? "fas fa-eye-slash" : "fas fa-eye";
    $(this).attr("class", icon)
  })
  $(".view-profile .btn-primary").on("click", function () {
    $(this).closest('.view-profile').hide();
    
    $('.edit-profile').show();
  });
  $(".edit-profile .btn-success").on("click", function () {
    $('.view-profile').show();
    $('.edit-profile').hide();
  });

  $(document).on("click","#edit-profile", function () {
    // $(this).closest('.view-profile').hide();
    
    // $('.edit-profile').show();
    alert("abc");
  });


});

