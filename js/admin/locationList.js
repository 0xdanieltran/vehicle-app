function deleteLocation(id) {
  // initialModal(id);
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
    window.location = "index.php?controller=admin/locationList&del=" + id;
  });
  // Modal Cancel Button Event
  $(".remove_modal .button_group .cancel").on("click", function () {
    $(".remove_modal").hide();
  });
}

function editLocation(id){
  window.location = "index.php?controller=admin/locationDetail&id=" + id;
}

$(document).ready(function () {
  $("#pagination").pagination({
    items: pages,
    itemOnPage: 8,
    currentPage: currentPage,
    cssStyle: "light-theme",
    prevText: '<span aria-hidden="true"><</span>',
    nextText: '<span aria-hidden="true">></span>',
    onInit: function () {
      // fire first page loading
    },
    onPageClick: function (page, evt) {
      window.location =
        "index.php?controller=admin/locationList&page=" +
        page +
        "&filter=" +
        $filter;
    },
  });

  // View Button Event
  $(".view_btn").on("click", function () {
    window.location = "index.php?controller=admin/locationDetail";
  });

  $(".add_btn").on("click", function () {
    window.location = "index.php?controller=admin/newLocation";
  });

  $(".locationSearch").on("keypress", function (e) {
    if (e.keyCode == 13) {
      var filter = $(".locationSearch").val();
      currentPage = 1;
      window.location =
        "index.php?controller=admin/locationList&page=" +
        currentPage +
        "&filter=" +
        filter;
    }
  });

  $("#search_close").on("click", function(){
    document.getElementById("location_Search").value = "";
    window.location = "index.php?controller=admin/locationList";
  });

});
