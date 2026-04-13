
var userRole = 200;
var format = /[ `!@#$%^&*()+\=\[\]{};':"\\|,.<>\/?~]/;

$(document).ready(function () {

  // Select user Box Event
  $(".selectUser").on("change", function () {
    userRole = changeBack();
  });
  // Change backgrond color of location
  function changeBack() {
    var user = $(".selectUser").val();
    if (user === "Sysadmin" || user === "Admin") {
      $(".selectBox").css({ background: "#949494", opacity: ".21" });
    } else {
      $(".selectBox").css({ background: "#fff", opacity: "1" });
    }

    switch (user){
      case "Sysadmin":
        userRole = 200;
        break;
      case "Admin":
        userRole = 400;
        break;
      case "User":
        userRole = 500;
        break;
      default:
        userRole = 500;
        break;
    }

    console.log(userRole);
    return userRole;
  }

  $(".newAccount_btn").on("click", function () {
    console.log("New User Btn Click");
    var user_name = $(".user_name").val();
    var user_fullname = $(".user_fullname").val();
    var email = $(".email").val();
    var location_id = $(".location_id").val();

    if(role == 200) userRole = 400;
    
    if (userRole != 500) {
      location_id = "null";
    }

    if(!user_name) $("#empty_username").css("display", "block"); else $("#empty_username").css("display", "none");
    if(!user_fullname) $("#user_fullname").css("display", "block"); else $("#user_fullname").css("display", "none");
    if(!email) $("#user_email").css("display", "block"); else $("#user_email").css("display", "none");

    if(format.test(user_name)) {$("#regular_username").css("display", "block"); return;} else $("#regular_username").css("display", "none");

    if (user_name && location_id && user_fullname && email) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=sysadmin/newUser_ajax",
        data: { user_name, user_fullname, email, location_id, userRole },
        success: function (res) {
          if(res.status == true){
            $(".success_modal").show();
            //window.location = 'index.php?controller=sysadmin/userList';
          }
        },
        error: function (err) {
          console.log(err);
        },
      });
    } else {
      //alert("please input items correctly");
    }
  });

  $(".success_btn").on("click", function () {
    window.location = 'index.php?controller=sysadmin/userList';
  });
  
});
