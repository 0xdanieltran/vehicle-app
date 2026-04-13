function deleteDevice(id) {
  // initialModal(id);
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
    window.location = "index.php?controller=sysadmin/deviceList&del=" + id;
  });
  // Modal Cancel Button Event
  $(".remove_modal .button_group .cancel").on("click", function () {
    $(".remove_modal").hide();
  });
}

$(document).ready(function () {
  $("#pagination").pagination({
    items: pages,
    itemOnPage: 8,
    currentPage: currentPage,
    cssStyle: "light-theme",
    prevText: '<span aria-hidden="true"><</span>',
    nextText: '<span aria-hidden="true">></span>',
    onInit: function () {},
    onPageClick: function (page, evt) {
      window.location =
        "index.php?controller=sysadmin/deviceList&page=" +
        page +
        "&filter=" +
        $filter;
    },
  });

  $(".deviceSearch").on("keypress", function (e) {
    if (e.keyCode == 13) {
      var filter = $(".deviceSearch").val();
      currentPage = 1;
      window.location =
        "index.php?controller=sysadmin/deviceList&page=" +
        currentPage +
        "&filter=" +
        filter;
    }
  });
});
