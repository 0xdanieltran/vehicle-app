$(document).ready(function () {
  $(".newServer_btn").on("click", function () {

    var serverName = $(".server_name").val();
    var serverUrl = $(".server_url").val();
    var bucketName = $(".bucket_name").val();
    var accessKey = $(".access_key").val();
    var secretKey = $(".secret_access_key").val();
    var writable = $(".checkbox").val();
    
    if (serverName && serverUrl && bucketName && accessKey && secretKey) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=sysadmin/newServer_ajax",
        data: { serverName: serverName, serverUrl: serverUrl,  bucketName: bucketName, accessKey:accessKey, secretKey:secretKey, writable:writable},
        success: function (res) {          
          if (res) {
            $(".success_modal").show();
          }
        },
        error: function (err) {
          console.log(err);
          alert("General system error");
        },
      });
    }else{
      alert("Register correctly!");
    }
});

$(".success_btn").on("click", function () {
  window.location = 'index.php?controller=sysadmin/serverList';
});
  
});