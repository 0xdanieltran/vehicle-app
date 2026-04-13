<?php
include_once 'views/pages/admin/header.php';
include_once 'views/pages/admin/navbar.php';
?>
      <div class="wrapper">
        <div id="locationDetail" class="hoc clear">
          <div class="locationDetail_container">
            <div class="heading">NAZWA LOKALIZACJI</div>
            <div class="content">
              <div class="left_bar list_box">
                <div class="list_header">
                  <img src="views/images/admin/setting.svg" alt="setting" />
                  <p class="header_title">LISTA URZĄDZEŃ</p>
                </div>
                <div class="content_box">
                  <ul class="list_content">
                    <?php
                    if($devices){
                      foreach($devices as $devices) { ?>
                        <li class="list_item">
                          <h4><?php echo $devices['serial_num'] ?></h4>
                          <img src="views/images/admin/close.svg" alt="close" onclick="removeDevice(<?php echo $devices['id'] ?>)"/>
                        </li>
                    <?php }} ?>  
                  </ul>
                  <div class="add_device">
                    <img src="views/images/admin/add.svg" alt="add-icon" />
                  </div>
                </div>
              </div>

              <div class="right_bar list_box">
                <div class="list_header">
                  <img src="views/images/admin/user.svg" alt="user-icon" />
                  <p class="header_title">LISTA UŻYTKOWNIKÓW</p>
                </div>
                <div class="content_box">
                  <ul class="list_content">
                    <?php
                      if($users){
                        foreach($users as $user) { ?>
                          <li class="list_item">
                            <h4><?php echo $user['user_name'] ?></h4>
                            <img src="views/images/admin/close.svg" alt="close" onclick="removeUser(<?php echo $user['id'] ?>)"/>
                          </li>
                    <?php }} ?>
                  </ul>
                  <div class="add_user">
                    <img src="views/images/admin/add.svg" alt="add-icon" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="add_to_user_modal" class="add_to_device_modal add_user">
      <div class="modal_content">
        <div class="header">
          <p>Add User</p>
        </div>
        <div class="content">
          <select id="selectUser" name="selectUser" class="user_form selectUser">
            <option value = "0" name="#">--- Wybierz Użytkownik ---</option>
            <?php
                if($allUsers) {
                  foreach($allUsers as $user) { ?>
                  <option value= "<?php echo $user["id"] ?>"><?php echo $user["user_name"] ?></option>
            <?php }} ?>
          </select>
          <div class="modal_footer">
            <button class="cancel_btn user_cancel_btn">Anuluj</button>
            <button class="add_btn user_modify_btn">DODAJ URZĄDZENIA</button>
          </div>
        </div>
      </div>
    </div>

  <div id="add_to_device_modal" class="add_to_device_modal add_device">
    <div class="modal_content">
      <div class="header">
        <p>Add Device</p>
      </div>
      <div class="content">
        <select id="selectDevice" name="selectDevice" class="user_form selectDevice">
          <option value = "0" name="#">--- Wybierz urządzenie ---</option>
          <?php
            if($allDevices) {
              foreach($allDevices as $device) { ?>
              <option value= "<?php echo $device["id"] ?>"><?php echo $device["serial_num"] ?></option>
          <?php }} ?>
        </select>
        <div class="modal_footer">
          <button class="cancel_btn device_cancel_btn">Anuluj</button>
          <button class="add_btn device_modify_btn">DODAJ URZĄDZENIA</button>
        </div>
      </div>
    </div>
  </div>


  <link rel="stylesheet" href="views/layout/styles/admin/locationDetail.css" />
  <script>
    var location_id = <?php echo $location_id ?>;
  </script>
  <script src="js/admin/locationDetail.js"></script>


<?php
include_once 'views/pages/admin/footer.php';
?>
