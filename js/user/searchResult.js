$(document).ready(function () {
    // Return Button Event
    $(".return_search_btn").on("click", function () {
      window.location = "index.php?controller=user/search";
    });

    // Item Click Event
    $(".list_box .list_content li").on("click", function () {
      var value = $(this).closest('li').data('value'); // = 9
      window.location = "index.php?controller=user/gallery&snapshot_id="+value;
    });
  });