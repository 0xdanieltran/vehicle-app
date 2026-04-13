<?php 
	 include_once('views/pages/admin/header.php');
?>
    </div>
      <div class="wrapper">
        <div id="welcome" class="hoc clear">
          <div class="welcome_container">
            <div class="welcome_header">
              <p class="welcome_header_content">CO CHCESZ ZROBIĆ?</p>
            </div>
            <div class="welcome_card">
              <div class="welcome_box">
                <div class="welcome_box_btn user">
                  <div class="btn_top">
                    <img
                      src="views/images/admin/user.svg"
                      class="box_img"
                      alt="user"
                    />
                    <h2 class="box_title">UŻYTKOWNICY</h2>
                  </div>
                  <div class="btn_bottom">
                    <div class="btn_bottom_left new_user_btn">
                      <img src="views/images/admin/add.svg" alt="add" />
                    </div>
                    <div class="btn_bottom_right user_list_btn">
                      <img src="views/images/admin/list.svg" alt="list" />
                    </div>
                  </div>
                </div>

                <div class="welcome_box_btn location">
                  <div class="btn_top">
                    <img
                      src="views/images/admin/location.svg"
                      class="box_img"
                      alt="location"
                    />
                    <h2 class="box_title">LOKALIZACJE</h2>
                  </div>
                  <div class="btn_bottom">
                    <div class="btn_bottom_left new_location_btn">
                      <img src="views/images/admin/add.svg" alt="add" />
                    </div>
                    <div class="btn_bottom_right location_list_btn">
                      <img src="views/images/admin/list.svg" alt="list" />
                    </div>
                  </div>
                </div>

                <div class="welcome_box_btn devices">
                  <div class="btn_top device_list_btn">
                    <img
                      src="views/images/admin/devices.svg"
                      class="box_img"
                      alt="devices"
                    />
                    <h2 class="box_title">URZĄDZENIA</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <link rel="stylesheet" href="views/layout/styles/admin/welcome.css" />
    <script src="js/admin/welcome.js"></script>
<?php 
 include_once('views/pages/admin/footer.php');
?>
