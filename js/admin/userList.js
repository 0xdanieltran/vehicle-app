function deleteUser(id) {
  // initialModal(id);
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=admin/userList",
        data: { id },
        success: function (res) {
          if(res.status == true){
            window.location = "index.php?controller=admin/userList";
          }
        },
        error: function(err){
          console.log(err);
        }
      });
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
    onInit: function () {
      // fire first page loading
    },
    onPageClick: function (page, evt) {
      window.location =
        "index.php?controller=admin/userList&page=" +
        page +
        "&filter=" +
        $filter;
    },
  });

  $(".userSearch").on("keypress", function (e) {
    if (e.keyCode == 13) {
      var filter = $(".userSearch").val();
      currentPage = 1;
      window.location =
        "index.php?controller=admin/userList&page=" +
        currentPage +
        "&filter=" +
        filter;
    }
  });

  $("#search_close").on("click", function(){
    document.getElementById("user_search").value = "";
    window.location = "index.php?controller=admin/userList";
  });

  $(".add_btn").on("click", function () {
    window.location = "index.php?controller=admin/newUser";
  });

});
