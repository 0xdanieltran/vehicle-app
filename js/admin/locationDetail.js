var device_id;
function removeDevice(deviceId) {
  $(".remove_modal").show();

  device_id = deviceId;
}

function removeUser(user_id) {
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
    //window.location = "index.php?controller=admin/deviceList&removeId=" + device_id;
  });

  // Modal Cancel Button Event
  $(".remove_modal .button_group .cancel").on("click", function () {
    $(".remove_modal").hide();
  });
}

$(document).ready(function () {
  // Add Button Event
  $(".right_bar .add_user").on("click", function () {
    $("#add_to_user_modal").show();
  });

  $(".left_bar .add_device").on("click", function () {
    $("#add_to_device_modal").show();
  });

  $(".user_cancel_btn").on("click", function () {
    $(".add_to_device_modal").hide();
  });

  $(".device_cancel_btn").on("click", function () {
    $(".add_to_device_modal").hide();
  });

  $(".user_modify_btn").on("click", function () {
    $(".add_to_device_modal").hide();
    var userid = $("#selectUser").val();
    var user_modify = true;

    if(userid == 0) {
      alert("Please select User");
      return;
    }

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=admin/locationDetail",
      data: { userid, location_id, user_modify },
      success: function (res) {
        if (res.status == true) {
          window.location =
            "index.php?controller=admin/locationDetail&id=" + location_id;
        }
      },
      error: function (err) {
        console.log(err);
      },
    });
  });

  $(".device_modify_btn").on("click", function () {
    $(".add_to_device_modal").hide();

    var deviceId = $("#selectDevice").val();
    var device_modify = true;
    
    if(deviceId == 0) {
      alert("Please select device");
      return;
    }

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=admin/locationDetail",
      data: { deviceId, location_id, device_modify },
      success: function (res) {
        if (res.status == true) {
          window.location =
            "index.php?controller=admin/locationDetail&id=" + location_id;
        }
      },
      error: function (err) {
        console.log(err);
      },
    });
  });

  $(".remove_modal .button_group .agree").on("click", function () {    
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=admin/locationDetail",
      data: {location_id,  device_id },
      success: function (res) {
        if (res.status == true) {
          $(".remove_modal").hide();
          window.location =
            "index.php?controller=admin/locationDetail&id=" + location_id;
        } else {
          console.log(res.message);
        }
      },
      error: function (err) {
        console.log(err);
      },
    });
  });

  // Modal Cancel Button Event
  $(".remove_modal .button_group .cancel").on("click", function () {
    $(".remove_modal").hide();
  });
});
