function formatDate(date) {
  var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

  if (month.length < 2) 
      month = '0' + month;
  if (day.length < 2) 
      day = '0' + day;

  return [year, month, day].join('-');
}

function formatTime(date){
  var d = new Date(date),
      hour = d.getHours() >= 10 ? d.getHours() : "0" + d.getHours(),
      min = ""+d.getMinutes() >= 10 ? d.getMinutes() : "0" + d.getMinutes(),
      sec = ""+d.getSeconds() >= 10 ? d.getSeconds() : "0" + d.getSeconds();


      return [hour, min, sec].join(':');
}

var value;

$(document).ready(function () {
  
  // Return Button Event
  $(".return_search_btn").on("click", function () {
    window.location = "index.php?controller=user/search";
  });

  // Open Modal
  $(".car").on("click", function () {
    $(".modal__window").show();

    value = $(this).closest("div").data("value");
    var licensePlate = snapArray[value]["license_plate"];
    var date = snapArray[value]["upload_time"];
    var upload_date = formatDate(date);
    var upload_time = formatTime(date);

    console.log(upload_time);
    var path = snapArray[value]["path"];
    var upload_name = path.split("/").pop();

    $("#upload_title").html(licensePlate);
    $("#upload_date").html(upload_date);
    $("#upload_datetime").html(upload_time);
    $("#upload_name").html(upload_name);
    $('#image').prop('src', snapArray[value]['path']);
  });

  // Close Modal
  $(".return_btn").on("click", function () {
    $(".modal__window").hide();
  });
  $(".modal_close").on("click", function () {
    $(".modal__window").hide();
  });

  // Modal Image Carousel
  $(".left-button").on("click", function () {
    value--;
    if(value < 0 || (value > snapArray.length-1)){
      value = snapArray.length-1;
    }

    console.log(value);
    var licensePlate = snapArray[value]["license_plate"];
    var date = snapArray[value]["upload_time"];
    var upload_date = formatDate(date);
    var upload_time = formatTime(date);

    console.log(upload_time);
    var path = snapArray[value]["path"];
    var upload_name = path.split("/").pop();

    $("#upload_title").html(licensePlate);
    $("#upload_date").html(upload_date);
    $("#upload_datetime").html(upload_time);
    $("#upload_name").html(upload_name);
    $('#image').prop('src', snapArray[value]['path']);

  });
  $(".right-button").on("click", function () {
    value++;
    
    if(value < 0 || (value > snapArray.length-1)){
      value = 0;
    }
    console.log(value);
    var licensePlate = snapArray[value]["license_plate"];
    var date = snapArray[value]["upload_time"];
    var upload_date = formatDate(date);
    var upload_time = formatTime(date);

    console.log(upload_time);
    var path = snapArray[value]["path"];
    var upload_name = path.split("/").pop();

    $("#upload_title").html(licensePlate);
    $("#upload_date").html(upload_date);
    $("#upload_datetime").html(upload_time);
    $("#upload_name").html(upload_name);
    $('#image').prop('src', snapArray[value]['path']);

  });

  $("#download_btn").on("click", function () {
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=user/gallery&type=download",
      data: { downloadPath: "views/images/user/gallery/" },
      success: function (res) {
        if(res.result == true){
          window.location.href = res.filename;
        }
      },
      error: function (err) {
        console.log(err);
        alert("General system error");
      },
    });
  });

  $("#download_modal_btn").on("click", function () {
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "index.php?controller=user/gallery&type=download",
      data: { downloadPath: "views/images/user/gallery/"+ document.getElementById("upload_name").textContent },
      success: function (res) {
        if(res.result == true){
          window.location.href = res.filename;
        }
      },
      error: function (err) {
        console.log(err);
        alert("General system error");
      },
    });
  });

  $(".return_btn").on("click", function(){
    $(".modal__window").hide();
  });

  $(".return_search_btn").on("click", function(){
    $(".modal__window").hide();
  });

});
