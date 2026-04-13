let timeout;
// The strong and weak password Regex pattern checker

let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let strengthBadge = document.getElementById("strong_message");

function StrengthChecker(PasswordParameter){
  // We then change the badge's color and text based on the password strength

  if(strongPassword.test(PasswordParameter)) {
      return true;
  }
  else{
    return false;
  }
}

$(document).ready(function () {
  $(".login_button").on("click", function () { 

  let password = $("#password").val();
  let password_confirm = $("#password_confirm").val();

  if(StrengthChecker(password)){
    $(".strong_message").css("display", "none");
    console.log("strong password");
  }else{
    $(".strong_message").css("display", "block");
    console.log("weak password");
    return;
  }

  if(password !== password_confirm)
  {
    console.log("no matching");
    $(".confirm_message").css("display", "block");
    document.getElementById("password_confirm").value = "";
    return;
  }

  console.log(email);
  
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "index.php?controller=login/register",
    data: { password, email },
    success: function (res) {
      if (res) window.location = "index.php?controller=login/login";
      else alert("failed");
    },
    error: function (err) {
      console.log(err);
      alert("General system error");
    },
  });
  });
});
