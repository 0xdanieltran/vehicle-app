<?php
  include_once('views/pages/admin/header.php');
  include_once('views/pages/admin/navbar.php');
?>

      <div class="wrapper">
        <div id="locationList" class="hoc clear">
          <div class="locationList_container">
            <div class="topContent">
              <div class="searchBar">
                <input id = "location_Search" class="locationSearch" type="text" value = "<?php echo $filter ?>"/>
                <?php if (empty($filter)) {?>
                  <img src="views/images/sysadmin/search.svg" alt="search-icon" />
                <?php } else {?>
                  <img src="views/images/search-close.svg" alt="search-icon" id ="search_close" />
                <?php }?>
              </div>
              <div class="add_btn">
                <img src="views/images/admin/add.svg" alt="add" />
              </div>
            </div>

            <div class="searchInfo">znaleziono: <?php echo $totalResultCount ?> pozycji</div>
            <table>
              <tr>
                <th style="width: 10%">LP</th>
                <th style="width: 40%">NAZWA</th>
                <th style="width: 30%">DATA DODANIA</th>
                <th style="width: 20%">
                  <img src="views/images/sysadmin/setting.svg" alt="setting" />
                </th>
              </tr>
              <?php
                if($locations) {
                $i=1;
                foreach($locations as $location) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $location['location_name']; ?></td>
                    <td><?php echo $location['created_at']; ?></td>
                    <td>
                      <img src="views/images/sysadmin/eye.svg" alt="eye" onclick="editLocation(<?php echo $location['id'] ?>)" />
                      <img src="views/images/sysadmin/close.svg" alt="close" onclick="deleteLocation(<?php echo $location['id'] ?>)" />
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

    <link rel="stylesheet" href="views/layout/styles/admin/locationList.css" />
    <script type="text/javascript">
      var currentPage = '<?php echo $page; ?>';
      var pages = '<?php echo $numberOfPages; ?>';
      var $filter = '<?php echo $filter; ?>';
    </script>
    <script src="js/admin/locationList.js"></script>
<?php
  include_once('views/pages/admin/footer.php');
?>