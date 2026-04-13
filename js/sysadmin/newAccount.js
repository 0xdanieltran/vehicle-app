var is_setUrl = false;
var format = /[ `!@#$%^&*()+\=\[\]{};':"\\|,.<>\/?~]/;

$(document).ready(function () {
  $("#upload_btn").on("click", function () {
    $("#fileupload").trigger("click");    
  });

  $(".newAccount_btn").on("click", function () {
    
    var account_name = $(".account_name").val();
    var account_fullname = $(".account_fullName").val();
    var user_name = $(".user_name").val();
    var user_email = $(".user_email").val();
    var user_fullname = $(".user_fullname").val();

    if(!account_name) $("#account_name").css("display", "block"); else $("#account_name").css("display", "none");
    if(!account_fullname) $("#account_fullname").css("display", "block"); else $("#account_fullname").css("display", "none");
    if(!user_name) $("#user_name").css("display", "block"); else $("#user_name").css("display", "none");
    if(!user_fullname) $("#user_fullname").css("display", "block"); else $("#user_fullname").css("display", "none");
    if(!user_email) $("#user_email").css("display", "block"); else $("#user_email").css("display", "none");
    if(format.test(user_name)) {$("#regular_username").css("display", "block"); return;} else $("#regular_username").css("display", "none");

    if(account_name && account_fullname && user_name && user_email && user_fullname){
      console.log(is_setUrl);
      let formData = new FormData();
      formData.append("file", is_setUrl ? fileupload.files[0] : 'null');
      formData.append("account_name", account_name);
      formData.append("account_fullname", account_fullname);
      formData.append("user_name", user_name);
      formData.append("user_email", user_email);
      formData.append("user_fullname", user_fullname);

      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=sysadmin/newAccount_ajax",
        processData: false,
        contentType: false,
        data: formData,
        success: function (res) {
          if(res.status == true){
            $(".success_modal").show();
          }
        },
        error: function(err){
          console.log(err);
        }
      });
    }else{
      //alert("Register Correctly!");
    }

  });

  $(".success_btn").on("click", function () {
    window.location = 'index.php?controller=sysadmin/accountList';
  });

  $(".remove_logo").on("click", function () {
    console.log("onClick Remove Logo");
    document.getElementById("upload_image").removeAttribute('src');
    is_setUrl = false;
  });

});

function isEmpty(obj) {
  if (obj == null) {console.log("case 0"); return true;}

  if (obj.length > 0) {console.log("case 1"); return false;} 
  if (obj.length === 0)  {console.log("case 2"); return true;}

  if (typeof obj !== "object") {console.log("case 3"); return true;}

  for (var key in obj) {
      if (hasOwnProperty.call(obj, key)) return false;
  }

  return true;
}

function loadFile(event) {
  var output = document.getElementById("upload_image");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src); // free memory
    console.log("src : " + output.src);
    is_setUrl = true;
  };
}
