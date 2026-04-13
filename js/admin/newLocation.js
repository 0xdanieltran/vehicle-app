$(document).ready(function () {
  // New Location Button Event
  $(".newLocation_btn").on("click", function () {
    var location_name = $(".newLocation_form").val();
    if (location_name) {
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=admin/newLocation_ajax",
        data: { location_name },
        success: function (res) {
          $(".success_modal").show();
          //window.location = "index.php?controller=admin/locationList";
        },
        error: function (err) {
          console.log(err);
        },
      });
    } else {
    }
  });

  $(".success_btn").on("click", function () {
    window.location = 'index.php?controller=admin/locationList';
  });
});
