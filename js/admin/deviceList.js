function deleteDevice(id) {
  // initialModal(id);
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
    window.location = "index.php?controller=admin/deviceList&del=" + id;
  });
  // Modal Cancel Button Event
  $(".remove_modal .button_group .cancel").on("click", function () {
    $(".remove_modal").hide();
  });
}

function editDevice(id, device_name, account_name, location_id)
{
  document.getElementById("device_name").value = device_name;
  document.getElementById("account_name").value = account_name;

  var selectElement = document.getElementById("selectLocation");

  for (let i = 0; i < selectElement.length; i++ ) {
    if(selectElement[i].value == location_id) {
      selectElement.options[i].selected = true;
    }else{
      selectElement.options[i].selected = false;
    }
  }
  $(".addLocation_modal").show();

  $(".addLocation_modal .modal_footer .location_add_btn").on("click", function () {
    $(".addLocation_modal").hide();
    
    var location_id = $("#selectLocation").val();
    var modify = true;

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=admin/deviceList",
      data: {id, location_id, modify},
      success: function (res) {
        if(res.status == true){
          window.location = "index.php?controller=admin/deviceList";
        }
      },
      error: function(err){
        console.log(err);
      }
    });
    
  });
  // Modal Cancel Button Event
  $(".addLocation_modal .modal_footer .location_cancel_btn").on("click", function () {
    $(".addLocation_modal").hide();
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
        "index.php?controller=admin/deviceList&page=" +
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
        "index.php?controller=admin/deviceList&page=" +
        currentPage +
        "&filter=" +
        filter;
    }
  });

  $("#search_close").on("click", function(){
    document.getElementById("device_search").value = "";
    window.location = "index.php?controller=admin/deviceList";
  });
});
