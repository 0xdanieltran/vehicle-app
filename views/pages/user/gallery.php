
<?php
include_once 'views/pages/user/header.php';
?>
      <div class="wrapper">
        <div id="search_result" class="hoc clear">
          <div class="search_result_container">
            <div class="left_side">
              <div class="searched_place_box searched_card">
                <div class="header">
                  <img src="views/images/user/car.svg" alt="car" />
                  <p class="header_title license_plate" id="license_plate"><?php echo $snapshots[0]['license_plate']; ?></p>
                </div>
              </div>
              <div class="record_box searched_card">
                <div class="list_header">
                  <img src="views/images/user/record.svg" alt="record" />
                  <p class="header_title">
                    Wybierz datę wizyty, aby zobaczyć zdjęcia
                  </p>
                </div>
                <ul class="list_content">
                <?php
if ($snapshots) {
    foreach ($snapshots as $snapshot) {?>
                    <li  data-value= "<?php echo $snapshot['id']; ?>" class="list_item"><?php echo $snapshot['upload_time']; ?></li>
                <?php }}?>
                </ul>
              </div>
            </div>

            <div class="right_side">
              <div class="targetHeader">
                <img
                  src="views/images/user/calendar-day.svg"
                  alt="calendar-day"
                />
                <p  id="upload_time" class="header_title"><?php echo $upload_time; ?></p>
              </div>
              <div class="targetContent">
                <div class="targetInnerContent">
                  <?php
$totalCnt = count($snapshots);
for ($i = 0; $i < ceil($totalCnt / 4); $i++) {?>
                    <div class="rows">
                      <div class="gallery_header">
                        <div class="number">
                          <h4><?php echo $i + 1; ?> </h4>
                        </div>
                        <div class="time">
                          <img src="views/images/user/clock.svg" alt="clock" />
                          <h4><?php echo $snapshots[$i]['upload_time']; ?></h4>
                        </div>
                      </div>
                      <div class="gallery_content">
                      <?php
$loops = ($totalCnt / (($i + 1) * 4)) > 1 ? 4 : ($totalCnt % 4);

    for ($j = 0; $j < $loops; $j++) {?>
                        <div class="car" data-value="<?php echo $j + ($i * 4) ;?>" >
                          <img
                            src="<?php echo $snapshots[$j + ($i * 4)]['path']; ?>"
                            alt="car1"
                          />
                          <img
                          src="views/images/user/gallery/search-plus.svg"
                            alt="search-plus"
                            class="search"
                          />
                        </div>
                        <?php }?>
                      </div>
                    </div>
                  <?php }?>
                </div>
              </div>
              <div class="buttonGroup">
                <button class="return_search_btn">
                  <img
                    src="views/images/user/left-caret.svg"
                    alt="left-caret"
                  />
                  <p>POWRÓT DO WYSZUKIWANIA</p>
                </button>
                <button id="download_btn" class="download_btn normal_btn">
                  <img src="views/images/user/download.svg" alt="download" />
                  <p>POBIERZ WSZYSTKO</p>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Box -->
      <div class="modal__window">
        <div class="modal__content">
          <div class="modal__header">
            <img
              src="views/images/user/modal-close.svg"
              class="modal_close"
              alt="close"
            />
          </div>
          <div class="modal__image">
            <div class="narrow">
              <img
                src="views/images/user/carousel_left.svg"
                class="left-button"
                alt="left"
              />
              <img
                src="views/images/user/carousel_right.svg"
                class="right-button"
                alt="right"
              />
            </div>
            <div class="content">
              <img
                id = "image"
                src="views/images/user/gallery/modal_car0.png"
                alt="car1-modal"
              />
            </div>
          </div>
          <div class="modal__footer">
            <div class="car_name">
              <div class="img_box">
                <img src="views/images/user/car.svg" alt="car-icon" />
              </div>
              <div class="title_box">
                <h3 id="upload_title">WX2345U</h3>
              </div>
            </div>
            <div class="record_date">
              <div class="img_box">
                <img
                  src="views/images/user/calendar-day.svg"
                  alt="calendar-day-icon"
                />
              </div>
              <div class="title_box">
                <h3 id="upload_date">11.12.2021</h3>
              </div>
            </div>
            <div class="record_time">
              <div class="img_box">
                <img src="views/images/user/clock.svg" alt="clock-icon" />
              </div>
              <div class="title_box">
                <h3 id="upload_datetime">11:10:25</h3>
              </div>
            </div>
            <div class="image_name">
              <div class="img_box">
                <img src="views/images/user/picture.svg" alt="picture-icon" />
              </div>
              <div class="title_box">
                <h3 id="upload_name">zdjęcie 1.2</h3>
              </div>
            </div>
            <div id="download_modal_btn" class="download_btn modal_btn">
              <img src="views/images/user/download-white.svg" alt="download" />
              <h3>POBIERZ</h3>
            </div>
            <div class="return_btn modal_btn">
              <img src="views/images/user/left-caret.svg" alt="left-caret" />
              <h3>POWRÓT</h3>
            </div>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/user/gallery.css" />
      <script>
        var snapArray = <?php echo json_encode($snapshots); ?>;
      </script>
      <script src="js/user/gallery.js"></script>

<?php
include_once 'views/pages/user/footer.php';
?>
