<?php
  include_once ('views/pages/user/header.php');
?>
      <div class="wrapper">
        <div id="search_result" class="hoc clear">
          <div class="search_result_container">
            <div class="left_side">
              <div class="searched_place_box searched_card">
                <div class="header">
                  <img src="views/images/user/car.svg" alt="car" />
                  <p class="header_title">numer rejestracyjny</p>
                </div>
                <div class="content">
                  <h1><?php echo $snapshots[0]['license_plate']; ?></h1>
                </div>
              </div>
              <div class="record_box searched_card">
                <div class="header">
                  <img src="views/images/user/record.svg" alt="record" />
                  <p class="header_title">ilość wizyt serwisowych</p>
                </div>
                <div class="content">
                  <h1><?php echo count($snapshots); ?></h1>
                </div>
              </div>
              <button class="return_search_btn">
                <img src="views/images/user/left-caret.svg" alt="left-caret" />
                <p>POWRÓT DO WYSZUKIWANIA</p>
              </button>
            </div>
            <div class="right_side list_box">
              <div class="list_header">
                <img
                  src="views/images/user/calendar-check.svg"
                  alt="calendar-check"
                />
                <p class="header_title">
                  Wybierz datę wizyty, aby zobaczyć zdjęcia
                </p>
              </div>
              <ul class="list_content">
                <?php
                  if($snapshots) {
                  foreach($snapshots as $snapshot) { ?>
                    <li data-value= "<?php echo $snapshot['id']; ?>" class="list_item"><?php echo $snapshot['upload_time']; ?></li>
                <?php }} ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/user/searchResult.css" />      
      <script src="js/user/searchResult.js"></script>

<?php
  include_once ('views/pages/user/footer.php');
?>

