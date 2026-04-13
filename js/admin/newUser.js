function setLocation(id, name) {
  $("#newAccount .popup").toggle();
  $(".location_name").html(name);
  $(".location_id").val(id);
}
var format = /[ `!@#$%^&*()+\=\[\]{};':"\\|,.<>\/?~]/;

$(document).ready(function () {
  var isAdmin = false;

  var left = $(".selectBox").position().left;
  var top = $(".selectBox").position().top;
  var width = $(".selectBox")[0].offsetWidth;
  $(".popup").css({ top: top, left: left + width + 10 });

  // Location Select Box Event
  $(".selectBox").on("click", function () {
    if ($(".switch input").is(":checked") !== true)
      $("#newAccount .popup").toggle();
  });

  // Check Box Event
  $(".checkBox .switch").on("change", function () {
    if ($(".switch input").is(":checked") === true) {
      $(".selectBox").css({ background: "#949494", opacity: ".21" });
      isAdmin = true;
    } else {
      $(".selectBox").css({ background: "#fff", opacity: "1" });
      isAdmin = false;
    }
  });

  $(".newAccount_btn").on("click", function () {
    var user_name = $(".user_name").val();
    var user_fullname = $(".user_fullname").val();
    var email = $(".email").val();

    if(!user_name) $("#empty_username").css("display", "block"); else $("#empty_username").css("display", "none");
    if(!user_fullname) $("#user_fullname").css("display", "block"); else $("#user_fullname").css("display", "none");
    if(!email) $("#user_email").css("display", "block"); else $("#user_email").css("display", "none");

    if(format.test(user_name)) {$("#regular_username").css("display", "block"); return;} else $("#regular_username").css("display", "none");
    
    var location_id = $(".location_id").val() ? $(".location_id").val() : 'null';
    if (isAdmin) {
      location_id = 'null';
    }

    if (user_name && location_id && user_fullname && email) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=admin/newUser_ajax",
        data: { user_name, user_fullname, email, location_id, isAdmin },
        success: function (res) {
          if(res.status == true){
            console.log(res.message);
            $(".success_modal").show();
          }
        },
        error: function (err) {
          console.log(err);
        },
      });
    } else {
    }
  });

  $(".success_btn").on("click", function () {
    window.location = 'index.php?controller=admin/userList';
  });
});
