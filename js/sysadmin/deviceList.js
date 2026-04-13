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

function editDevice(device_id, account_id, serial_num)
{
  var selectElement = document.getElementById("selectAccount");
  document.getElementById("device_name").value = serial_num;

  for (let i = 0; i < selectElement.length; i++ ) {
    if(selectElement[i].value == account_id) {
      selectElement.options[i].selected = true;
    }else{
      selectElement.options[i].selected = false;
    }
  }

  $(".addAccount_modal").show();

  $(".addAccount_modal .modal_footer .account_cancel_btn").on("click", function () {
    $(".addAccount_modal").hide();
  });

  $(".addAccount_modal .modal_footer .account_add_btn").on("click", function () {
    $(".addAccount_modal").hide();

    var account_id = $("#selectAccount").val();
    var device_name = $("#device_name").val();
    var modify = true;
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=sysadmin/deviceList",
      data: {device_id, account_id, device_name, modify},
      success: function (res) {
        if(res.status == true){
          window.location = "index.php?controller=sysadmin/deviceList";
        }
      },
      error: function(err){
        console.log(err);
      }
    });
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

  $("#search_close").on("click", function(){
    console.log("doronin");
    document.getElementById("deviceSearch").value = "";
    window.location = "index.php?controller=sysadmin/deviceList";
  });

});
  