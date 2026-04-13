<?php
include_once 'views/pages/sysadmin/header.php';
include_once 'views/pages/sysadmin/navbar.php';
?>
<div class="wrapper">
  <div id="deviceList" class="hoc clear">
    <div class="deviceList_container">
      <div class="searchBar">
        <input id="deviceSearch" class = "deviceSearch" type="text" value = "<?php echo $filter ?>" />
        <?php  if (empty($filter)) {?>
          <img src="views/images/sysadmin/search.svg" alt="search-icon" />
        <?php }else{ ?>
          <img src="views/images/search-close.svg" alt="search-icon" id ="search_close" />
        <?php }?>
      </div>
      <div class="searchInfo">znaleziono: <?php echo $totalResultCount ?> pozycji</div>
      <table>
        <tr>
          <th style="width: 5%">LP</th>
          <th style="width: 17%">NUMER SERYJNY</th>
          <th style="width: 17%">NAZWA KONTA</th>
          <th style="width: 17%">LOKALIZACJA</th>
          <th style="width: 17%">DATA DODANIA</th>
          <th style="width: 10%">
            <img src="views/images/sysadmin/setting.svg" alt="setting" />
          </th>
        </tr>
        <?php
        if ($devices) {
          $i = 1;
          foreach ($devices as $device) {?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $device['serial_num']; ?></td>
                    <td>
                      <?php echo $device['account_name'] ?>
                    </td>
                    <td>
                      <?php echo $device['location_name'] ?>
                    </td>
                    <td><?php echo $device['created_at']; ?></td>
                    <td>
                      <img src="views/images/sysadmin/eye.svg" alt="eye"  onclick="editDevice(<?php echo $device['id'] ?>, <?php echo $device['account_id'] ? $device['account_id'] : 0 ?>, '<?php echo $device['serial_num'] ?>')"/>
                      <img src="views/images/sysadmin/close.svg" alt="close" onclick="deleteDevice(<?php echo $device['id'] ?>)" />
                    </td>
                  </tr>
                <?php }}?>
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
<div class="addAccount_modal">
  <div class="account_modal_content">
    <div class="header">
      <p>Add or Edit Account</p>
    </div>
    <div class="content">
      <input
        id="device_name"
        type="text"
        placeholder="Nazwa URZĄDZENIA"
        class="device_form device_name"
      />
      <select name="selectAccount" id="selectAccount" class="device_form selectAccount">
        <option value = "0" name="#">--- Select Account ---</option>
        <?php
          if($accounts) {
            foreach($accounts as $account) { ?>
            <option id="accountName" value= "<?php echo $account["id"] ?>"><?php echo $account["account_name"] ?></option>
        <?php }} ?>
      </select>
      <div class="modal_footer">
        <button class="account_cancel_btn modify_btn">Anuluj</button>
        <button class="account_add_btn modify_btn">
          DODAJ URZĄDZENIA
        </button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="views/layout/styles/sysadmin/deviceList.css" />
<script src="views/layout/scripts/jquery.simplePagination.js"></script>
<script type="text/javascript">
    var currentPage = '<?php echo $page; ?>';
    var pages = '<?php echo $numberOfPages; ?>';
    var $filter = '<?php echo $filter; ?>';
    var accounts =  <?php echo json_encode($accounts); ?>; 
</script>
<script src="js/sysadmin/deviceList.js"></script>

<?php
include_once 'views/pages/sysadmin/footer.php';
?>