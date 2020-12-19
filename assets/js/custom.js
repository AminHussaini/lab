$(document).ready(function () {
  let browserUrl = document.location.pathname.match(/[^\/]+$/)[0];
  if (browserUrl == "allow-user.php") {
    $('#allow-user').DataTable();
  }
  $("body").mousemove(function () {
    $('.alert').delay(3000).fadeOut()
  });

  $(document).on("click", "#password-icon-btn", function () {
    passwordStatus = $(this).closest(".input-group").find(".password-field")
    let password =
      passwordStatus.attr("type") === "password" ? "text" : "password";
    passwordStatus.attr("type", password);

    icon = passwordStatus.attr("type") === "password" ? "fas fa-eye-slash" : "fas fa-eye";
    $(this).attr("class", icon)
  })

  $(document).on("click", "#codeGenerator", function () {
    let code = Math.floor(Math.pow(10, 10 - 1) + Math.random() * 9 * Math.pow(10, 10 - 1))
    $(this).closest(".input-group").find("input").val(code);
  });

  //image showing
  $(document).on("click", ".image-box .img-session img", function () {
    $("#modal-13 .modal-body").css('background-image', 'url("' + $(this).attr("src") + '")');
  });
});

