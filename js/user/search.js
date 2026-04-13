$(document).ready(function () {
  // Button Event
  $(".search_btn").on("click", function () {
    var regi_num = $(".regi_num").val();
    var visit_date = $(".visit_date").val();

    if (regi_num || visit_date){
      window.location =
        "index.php?controller=user/searchResult&location_id=" +
        location_id +
        "&regi_num=" +
        regi_num + 
        "&visit_date=" +
        visit_date;
    }      
    else $(".search_alert").css("visibility", "visible");
  });
});
