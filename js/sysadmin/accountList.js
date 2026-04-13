var ret = 0, id, img_url;
function deleteAccount(id) {
  // initialModal(id);
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
      window.location = "index.php?controller=sysadmin/accountList&del=" + id;
  });
  // Modal Cancel Button Event
  $(".remove_modal .button_group .cancel").on("click", function () {
    $(".remove_modal").hide();
  });
}

function editAccount($id, $account_name, $account_fullname, $img_url) {
  // initialModal(id);
  ret = $img_url ? 0 : -1; img_url = $img_url;
  document.getElementById("account_name").value = $account_name;
  document.getElementById("account_fullname").value = $account_fullname;
  document.getElementById("upload_image").src = $img_url;
  $(".account_edit_modal").show();

  // Modal Cancel Button Event
  $(".account_edit_modal .modal_footer .cancel").on("click", function () {
    $(".account_edit_modal").hide();
  });

  $(".account_edit_modal .modal_footer .agree").on("click", function () {
    $(".account_edit_modal").hide();
    var account_name = $("#account_name").val();
    var account_fullname = $("#account_fullname").val();

    if(ret == -1)
      img_url = 'null';
    else if(ret == 1)
      img_url = fileupload.files[0];
    
    let formData = new FormData();
    if(ret === 1)
      formData.append("file", img_url);
    else
      formData.append("url", img_url);

    formData.append("id", $id);
    formData.append("account_name", account_name);
    formData.append("account_fullname", account_fullname);
    formData.append("modify", true);

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=sysadmin/newAccount_ajax",
      processData: false,
      contentType: false,
      data: formData,
      success: function (res) {
        if(res.status == true){
          window.location = "index.php?controller=sysadmin/accountList";
        }
      },
      error: function(err){
        console.log(err);
      }
    });
  });

  $(".upload_btn").on("click", function () {
    $("#fileupload").trigger("click");    
  });
}

var is_setUrl = false;
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
        "index.php?controller=sysadmin/accountList&page=" +
        page +
        "&filter=" +
        $filter;
    },
  });

  $(".add_btn").on("click", function () {
    window.location = 'index.php?controller=sysadmin/newAccount';
  });

  $(".accountSearch").on("keypress", function (e) {
    if (e.keyCode == 13) {
      var filter = $(".accountSearch").val();
      currentPage = 1;
      window.location =
        "index.php?controller=sysadmin/accountList&page=" +
        currentPage +
        "&filter=" +
        filter;
    }
  });
  
  
  $("#search_close").on("click", function(){
    console.log("doronin");
    document.getElementById("action_search").value = "";
    window.location = "index.php?controller=sysadmin/accountList";
  });

  $(".remove_logo").on("click", function () {
    console.log("onClick Remove Logo");
    document.getElementById("upload_image").removeAttribute('src');
    ret = -1;
  });

});

function loadFile(event) {
  var output = document.getElementById("upload_image");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src); // free memory
  };
  ret = 1;
}