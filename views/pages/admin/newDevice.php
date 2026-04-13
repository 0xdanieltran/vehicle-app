        
<?php 
  include_once('views/pages/admin/header.php');
  include_once('views/pages/admin/navbar.php');
?>
      <div class="wrapper">
        <div id="newLocation" class="hoc clear">
          <div class="newLocation_container">
            <div class="newLocation_card">
              <div class="header">
                <img src="views/images/admin/add.svg" alt="add" />
                <p class="search_header_content">DODAWANIE NOWEJ URZĄDZENIA</p>
              </div>
              <div class="content">
                <input
                  type="text"
                  placeholder="Numer seryjny"
                  class="newDevice_form serialNumber"
                />
                <select name="selectLocation" class="newDevice_form selectLocation">
                  <option value="#">--- Wybierz lokalizację ---</option>
                  <?php
                    if($locations) {
                      foreach($locations as $location) { ?>
                      <option value= "<?php echo $location["id"] ?>"><?php echo $location["location_name"] ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>
            <button class="newDevice_btn">DODAJ URZĄDZENIA</button>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/admin/newDevice.css" />
      <script src="js/admin/newDevice.js"></script>

<?php 
  include_once('views/pages/admin/footer.php');
?>