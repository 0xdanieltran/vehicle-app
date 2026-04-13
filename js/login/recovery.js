$(document).ready(function () {
  $(".recovery_confirm_btn").on("click", function () {
    window.location = "./index.php";
  });

  $(".recovery_btn").on("click", function () {
    let userMail = $(".userMail").val();
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=login/recovery",
      data: { userMail },
      success: function (res) {
        if (res) window.location = "index.php?controller=login/recoveryConfirm";
        else alert("failed");
      },
      error: function (err) {
        console.log(err);
        alert("General system error");
      },
    });
  });
});
