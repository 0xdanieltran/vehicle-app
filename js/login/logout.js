$(document).ready(function () {
    /**  when click log out button */
  $(".logout_box").on("click", function () {
    var html = "";
    html += '<div class="logout_modal_container">';
    html += '<div class="modal_content">';
    html += '<div class="modal_header">';
    html += '<img src="views/images/sysadmin/warn.svg" alt="warn" />';
    html += "</div>";
    html += '<div class="modal_card">';
    html += '<div class="warn_info">';
    html += "<h1>CZY NA PEWNO CHCESZ SIĘ WYLOGOWAĆ?</h1>";
    html += "</div>";
    html += '<div class="modal_footer">';
    html += '<button class="cancel modify_btn">Anuluj</button>';
    html += '<button class="agree modify_btn">WYLOGUJ</button>';
    html += "</div>";
    html += "</div>";
    html += "</div>";
    html += "</div>";

    $("body").append(html);
    $(".logout_modal_container").show();
    $(".logout_modal_container .cancel").on("click", function () {
      $(".logout_modal_container").hide();
      $(".logout_modal_container").remove();
    });
    $(".logout_modal_container .agree").on("click", function () {
      $(".logout_modal_container").hide();
      $(".logout_modal_container").remove();
      window.location = 'index.php?controller=login/logout';
    });
  });
});