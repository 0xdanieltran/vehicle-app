<?php
  include_once ('views/pages/admin/header.php');
  include_once ('views/pages/admin/navbar.php');
?>

      <div class="wrapper">
        <div id="deviceList" class="hoc clear">
          <div class="deviceList_container">
            <div class="searchBar">
              <input id = "device_search" class="deviceSearch" type="text" value = "<?php echo $filter ?>"/>
              <?php if (empty($filter)) {?>
                <img src="views/images/sysadmin/search.svg" alt="search-icon" />
              <?php } else {?>
                <img src="views/images/search-close.svg" alt="search-icon" id ="search_close" />
              <?php }?>
            </div>
            <div class="searchInfo">znaleziono: <?php echo $totalResultCount ?> pozycji</div>
            <table>
              <tr>
                <th style="width: 5%">LP</th>
                <th style="width: 20%">NUMER SERYJNY</th>
                <th style="width: 30%">LOKALIZACJA</th>
                <th style="width: 30%">DATA DODANIA</th>
                <th style="width: 15%">
                  <img src="views/images/sysadmin/setting.svg" alt="setting" />
                </th>
              </tr>
              <?php
                if($devices) {
                $i=1;
                foreach($devices as $device) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $device['serial_num']; ?></td>
                    <td><?php echo $device['location_name']; ?></td>
                    <td><?php echo $device['created_at']; ?></td>
                    <td>
                      <img src="views/images/sysadmin/eye.svg" alt="eye" onclick="editDevice(<?php echo $device['id'] ?>, '<?php echo $device['serial_num'] ?>', '<?php echo $device['account_name'] ?>', '<?php echo $device['location_id'] ?>')"/>
                      <img src="views/images/sysadmin/close.svg" alt="close" onclick="deleteDevice(<?php echo $device['id'] ?>)" />
                    </td>
                </tr>
              <?php }} ?>         
            </table>
            <div class="pagination">
              <ul class="pagination simple-pagination" id="pagination"></ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Device Remove Confirm Modal -->
      <div class="remove_modal">
        <div class="remove_content">
          <div class="header">
            <img src="views/images/sysadmin/warn.svg" alt="warn" />
          </div>
          <div class="content">
            <div class="warn_info">
              <h1>CZY NA PEWNO CHCESZ USUNĄĆ TO URZĄDZENIE?</h1>
              <h4>To działanie jest nieodwracalne.</h4>
            </div>
            <div class="button_group">
              <button class="cancel">ANULUJ</button>
              <button class="agree">USUŃ</button>
            </div>
          </div>
        </div>
      </div>

    <div class="addLocation_modal">
      <div class="location_modal_content">
        <div class="header">
          <p>Dodaj lub edytuj konto</p>
        </div>
        <div class="content">
          <input
            id = "device_name"
            type="text"
            placeholder="Nazwa URZĄDZENIA"
            class="device_form device_name"
            disabled        
          />
          <input
            id = "account_name"
            type="text"
            placeholder="Nazwa Nazwa konta"
            class="device_form account_name"
            disabled
          />
          <select name="selectLocation" id="selectLocation" class="device_form selectLocation">
            <option value = "0" name="#">--- Wybierz lokalizację ---</option>
            <?php
              if($locations) {
                foreach($locations as $location) { ?>
                <option value= "<?php echo $location["id"] ?>"><?php echo $location["location_name"] ?></option>
            <?php }} ?>
          </select>
          <div class="modal_footer">
            <button class="location_cancel_btn modify_btn">Anuluj</button>
            <button class="location_add_btn modify_btn">
              DODAJ URZĄDZENIA
            </button>
          </div>
        </div>
      </div>
    </div>

    <link rel="stylesheet" href="views/layout/styles/admin/deviceList.css" />
    <script type="text/javascript">
      var currentPage = '<?php echo $page; ?>';
      var pages = '<?php echo $numberOfPages; ?>';
      var $filter = '<?php echo $filter; ?>';
    </script>
    <script src="js/admin/deviceList.js"></script>
<?php
  include_once ('views/pages/admin/footer.php');
?>
