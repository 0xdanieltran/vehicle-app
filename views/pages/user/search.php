<?php
  include_once ('views/pages/user/header.php');
?>
      <div class="wrapper">
        <div id="search" class="hoc clear">
          <div class="search_container">
            <div class="search_header">
              <img src="views/images/user/search.svg" alt="search_icon" />
              <p class="search_header_content">WYSZUKAJ POJAZD</p>
            </div>
            <div class="search_card">
              <input
                type="text"
                placeholder="numer rejestracyjny pojazdu"
                class="search_form regi_num"
              />
              <p class="search_middle">lub</p>
              <div class="form_calender">
                <input
                  type="date"
                  placeholder="data wizyty (dd-mm-rrrr)"
                  class="search_form visit_date"
                  data-date-format="DD MMMM YYYY"
                />
                <!-- <img
                  src="views/images/user/calendar-alt.svg"
                  alt="calendar-icon"
                  class="calender_icon"
                /> -->
              </div>
              <button class="search_btn">wyszukaj</button>
            </div>
            <div class="search_alert">
              <img src="views/images/login/alert.svg" alt="alert_icon" />
              <p class="alert_content">Brak danych!</p>
            </div>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/user/search.css" />
      <script type="text/javascript">
        var location_id = '<?php echo $_SESSION['location_id']; ?>';
        // $(".visit_date").datepicker()
        // {
        //     "dateFormat" : "dd-mm-yyyy" //any valid format that you want to have
        // });
      </script>
      <script src="js/user/search.js"></script>

<?php
  include_once ('views/pages/user/footer.php');
?>
