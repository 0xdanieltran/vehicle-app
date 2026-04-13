<?php
include_once 'views/pages/sysadmin/header.php';
include_once 'views/pages/sysadmin/navbar.php';
?>
      <div class="wrapper">
        <div id="userList" class="hoc clear">
          <div class="userList_container">
            <div class="topContent">
              <div class="searchBar">
                <input id="userSearch" class="userSearch" type="text" value= "<?php echo $filter ?>"/>
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
                <th style="width: 5%">LP</th>
                <th style="width: 17%">NAZWA / LOGIN</th>
                <th style="width: 17%">IMIĘ I NAZWISKO</th>
                <th style="width: 17%">EMAIL</th>
                <th style="width: 17%">CZY ADMIN?</th>
                <th style="width: 17%">LOKALIZACJA</th>
                <th style="width: 10%">
                  <img src="views/images/sysadmin/setting.svg" alt="setting" />
                </th>
              </tr>
              <?php
if ($users) {
    $i = 1;
    foreach ($users as $user) {?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_fullname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php
if ($user['role'] != 500) {
        echo '<img src= "views/images/admin/check.svg"; alt="check" />';
    }
        ?>
                    </td>
                    <td>
                      <?php
$location_name = $user['role'] == 500 ? $user['location_name'] : '';
        echo $location_name;
        ?>
                    </td>
                    <td>
                      <img src="views/images/sysadmin/eye.svg"  alt="eye"
                        onclick="editUser(<?php echo $user['id'] ?>,
                                             '<?php echo $user['user_name'] ?>',
                                              '<?php echo $user['user_fullname'] ?>',
                                               '<?php echo $user['email'] ?>')"/>
                      <img src="views/images/sysadmin/close.svg" alt="close" onclick="deleteUser(<?php echo $user['id'] ?>)" />
                    </td>
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

      <div class="user_edit_modal_container">
        <div class="modal_content">
          <div class="modal_header">
            <p>EDYCJA PROFILU</p>
          </div>
          <div class="modal_card">
            <div class="user_info_field">
              <p>Nazwa Użytkownika / login</p>
              <input type="text" class="search_form username" id="user_name"/>
            </div>

            <div class="user_info_field">
              <p>Imię i nazwisko</p>
              <input
                id="user_fullname"
                type="text"
                class="search_form user_fullname"
              />
            </div>

            <div class="user_info_field">
              <p>Email</p>
              <input
                id="email"
                type="text"
                class="search_form email"
              />
            </div>
            <div class="modal_footer">
              <button class="edit_cancel modify_btn">Anuluj</button>
              <button class="edit_agree modify_btn">modyfikować</button>
            </div>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/sysadmin/userList.css" />
      <script type="text/javascript">
        var currentPage = '<?php echo $page; ?>';
        var pages = '<?php echo $numberOfPages; ?>';
        var filter = '<?php echo $filter; ?>';
      </script>
      <script src="js/sysadmin/userList.js"></script>

<?php
include_once 'views/pages/sysadmin/footer.php';
?>