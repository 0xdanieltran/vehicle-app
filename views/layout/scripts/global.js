$(document).ready(function () {
  /** when click profile button */
  
  $(".user_box").on("click", function () {    
    
    document.getElementById("update_name").value = user_name;
    document.getElementById("update_fullname").value = user_fullname;
    document.getElementById("update_email").value = email;
    
    $(".user_modal_container").show();
  });

  $(".profile_agree").on("click", function () {
    $(".user_modal_container").hide();

    var user_name = $("#update_name").val();
    var user_fullname = $("#update_fullname").val();
    var email = $("#update_email").val();
    var password = $("#update_password").val();

    console.log(user_name);
    if (user_name && user_fullname && email && password) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=login/profileUpdate",
        data: { user_name, user_fullname, email, password, id},
        success: function (res) {          
          if (res) {
            window.location.reload();
            // window.location = "index.php?controller=sysadmin/userList";
          }
        },
        error: function (err) {
          console.log(err);
          alert("General system error");
        },
      });
    }else{
      alert("Register Correctly!");
    }
  });

  $("#home").on("click", function () {
    window.location = "index.php?controller=sysadmin/superadmin";
  });

  $(".cancel").on("click", function () {
    $(".user_modal_container").hide();
  });

  $("#admin_logo").on("click", function () {
    console.log(role);
    switch (role){
      case 100:
      case 200:
        window.location = "index.php?controller=sysadmin/superadmin";
        return;
      case 300:
      case 400:
        window.location = "index.php?controller=admin/superadmin";
        return;
      case 500:
        window.location = "index.php?controller=user/search";
        return;
      default:
        window.location = "./index.php";
        return;
    }
  });

});
