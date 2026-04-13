$(document).ready(function () {
  var date = new Date();

  var timeDisplay = document.getElementById("time");
  var dateDisplay = document.getElementById("date");

  timeDisplay.innerHTML = getCurTime();
  dateDisplay.innerHTML = getCurDate();

  function refreshTime() {
    timeDisplay.innerHTML = getCurTime();
    dateDisplay.innerHTML = getCurDate();
  } 

  function getCurTime(){
    time = 
        (date.getHours() >= 10 ? date.getHours() : "0" + date.getHours()) +
        ":" +
        (date.getMinutes() >= 10 ? date.getMinutes() : "0" + date.getMinutes());

    return time;
  }

  function getCurDate(){
    cur_date =
      date.getDate() + "." + (date.getMonth() + 1) + "." + date.getFullYear();

    return cur_date;
  }

  setInterval(refreshTime, 1000);
});
