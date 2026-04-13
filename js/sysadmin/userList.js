function deleteUser(id) {
  // initialModal(id);
  $(".remove_modal").show();

  $(".remove_modal .button_group .agree").on("click", function () {
    $(".remove_modal").hide();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=sysadmin/userList",
        data: { id },
        success: function (res) {
          if(res.status == true){
            window.location = "index.php?controller=sysadmin/userList";
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

function editUser($id, $user_name, $user_fullname, $email) {
  document.getElementById("user_name").value = $user_name;
  document.getElementById("user_fullname").value = $user_fullname;
  document.getElementById("email").value = $email;
  $(".user_edit_modal_container").show();

  $(".user_edit_modal_container .modal_footer .edit_cancel").on("click", function () {
    $(".user_edit_modal_container").hide();
  });

  $(".user_edit_modal_container .modal_footer .edit_agree").on("click", function () {
    $(".user_edit_modal_container").hide();

    var user_name = $("#user_name").val();
    var user_fullname = $("#user_fullname").val();
    var email = $("#email").val();
    var modify = true;

    if(user_name && user_fullname && email && modify){
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "index.php?controller=sysadmin/newUser_ajax",
        data: {id:$id, username : user_name, fullname : user_fullname, email : email, modify : modify},
        success: function (res) {
          if(res.status == true){
            window.location = "index.php?controller=sysadmin/userList";
          }
        },
        error: function(err){
          console.log(err);
        }
      });
    }else{

    }
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
        "index.php?controller=sysadmin/userList&page=" +
        page +
        "&filter=" +
        filter;
    },
  });

  $(".userSearch").on("keypress", function (e) {
    if (e.keyCode == 13) {
      var filter = $(".userSearch").val();
      currentPage = 1;
      window.location =
        "index.php?controller=sysadmin/userList&page=" +
        currentPage +
        "&filter=" +
        filter;
    }
  });

  $("#search_close").on("click", function(){
    document.getElementById("userSearch").value = "";
    window.location = "index.php?controller=sysadmin/userList";
  });

  $(".add_btn").on("click", function () {
    window.location = 'index.php?controller=sysadmin/newUser';
  });
  
});
