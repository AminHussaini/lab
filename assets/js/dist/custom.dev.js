"use strict";

$(document).ready(function () {
  var browserUrl = document.location.pathname.match(/[^\/]+$/)[0];

  if (browserUrl == "allow-user.php") {
    $('#allow-user').DataTable();
  }

  $("body").mousemove(function () {
    $('.alert').delay(4000).fadeOut();
  });
  $(document).on("click", "#password-icon-btn", function () {
    passwordStatus = $(this).closest(".input-group").find(".password-field");
    var password = passwordStatus.attr("type") === "password" ? "text" : "password";
    passwordStatus.attr("type", password);
    icon = passwordStatus.attr("type") === "password" ? "fas fa-eye-slash" : "fas fa-eye";
    $(this).attr("class", icon);
  });
  $(document).on("click", "#codeGenerator", function () {
    var code = Math.floor(Math.pow(10, 10 - 1) + Math.random() * 9 * Math.pow(10, 10 - 1));
    $(this).closest(".input-group").find("input").val(code);
  }); //

  $(document).on("click", ".image-box .img-session img", function () {
    $("#modal-13 .modal-body").css('background-image', 'url("' + $(this).attr("src") + '")');
  });

  if (browserUrl == "product-list.php") {
    new Chart(document.getElementById("pie-chart"), {
      type: 'pie',
      data: {
        labels: ["Emergency", "ICU", "Neurology", "Cardiology", "Gynaecology"],
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ["#141433", "#f7b11b", "#ff6c60", "#8663e1", "#08bf6f"],
          data: [2478, 5267, 734, 784, 433]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Number of staffs according to deparments'
        }
      }
    });
    var barChart = new Chart(document.getElementById("bar-chart"), {
      type: 'bar',
      data: {
        labels: ["Emergency", "ICU", "Neurology", "Cardiology", "Gynaecology"],
        datasets: [{
          label: "Employes",
          backgroundColor: ["#141433", "#f7b11b", "#ff6c60", "#8663e1", "#08bf6f"],
          data: [2000, 1267, 1734, 2384, 133]
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: 'Maximum number of employes in departments'
        }
      }
    });
  }
});