$(document).ready(function () {
    // New Location Button Event
    $(".newDevice_btn").on("click", function () {

      var serial_num = $('.serialNumber').val();
      var location_id = $('.selectLocation').val();

      if(location_id == '#'){
        alert("please input items correctly");
        return;
      }

      if (serial_num && location_id) {
        $.ajax({
          type: "POST",
          dataType: "json",
          url: "index.php?controller=admin/newDevice_ajax",
          data: { serial_num, location_id},
          success: function (res) {
              alert("successfully registerd");
              window.location = "index.php?controller=admin/deviceList";
          },
          error: function (err) {
            //console.log(err);
          },
        });
      } else {
        alert("please input items correctly");
      }
    });

  });