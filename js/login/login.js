$(document).ready(function () {
  // Forgot password event
  $(".login_footer").click(function () {
    window.location = "./recovery.php";
  });

  // Login Button Key Event
  $(document).on("keypress", function (e) {
    if (e.keyCode == 13) {
      $(".login_button").click();
    }
  });

  // Login Button Event
  $(".login_button").click(function () {
    var username = $("#username").val();
    var password = $("#password").val();
    if (username && password) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=login/login_ajax",
        data: { username: username, password: password },
        success: function (res) {
          if (res.success == true) {
            console.log("Doronin");
            switch (res.role) {
              case "100":
              case "200":
                window.location = 'index.php?controller=sysadmin/superadmin';
                break;
              case "300":
              case "400":
                window.location = 'index.php?controller=admin/superadmin';
                break;
              case "500":
                window.location = 'index.php?controller=user/search';
                break;
              default:
                window.location = 'index.php?controller=user/search';
                break;
            }
          }
        },
        error: function (err) {
          console.log(err);
          $(".login_alert").css("display", "block");
        },
      });
    } else {
      $(".login_alert").css("display", "block");
    }
  });
});
