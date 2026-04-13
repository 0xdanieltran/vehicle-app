$(document).ready(function () {
    var date =  new Date();

    var cur_date = date.getDate() + "." + (date.getMonth() + 1) + "." + date.getFullYear();
    $("#date").append(cur_date);

    var time = date.getHours() + ':' + date.getMinutes();
    $("#time").append(time);
})