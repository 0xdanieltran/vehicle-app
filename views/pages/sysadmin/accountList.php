<?php
include_once 'views/pages/sysadmin/header.php';
include_once 'views/pages/sysadmin/navbar.php';
?>
  <div class="wrapper">
    <div id="accountList" class="hoc clear">
      <div class="accountList_container">
        <div class="topContent">
          <div class="searchBar">
            <input id = "action_search" class="accountSearch" type="text" value = "<?php echo $filter ?>"/>
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
            <th style="width: 17%">NAZWA SKRÓCONA</th>
            <th style="width: 17%">NAZWA PEŁNA</th>
            <th style="width: 17%">PIERWSZY ADMINISTRATOR</th>
            <th style="width: 17%">EMAIL ADMINISTRATORA</th>
            <th style="width: 17%">DATA DODANIA</th>
            <th style="width: 10%">
              <img src="views/images/sysadmin/setting.svg" alt="setting" />
            </th>
          </tr>
          <?php
if ($accounts) {
    $i = 1;
    foreach ($accounts as $account) {?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $account['account_name']; ?></td>
                <td><?php echo $account['account_fullname']; ?></td>
                <td><?php echo $account['user_fullname']; ?></td>
                <td><?php echo $account['email']; ?></td>
                <td><?php echo $account['created_at']; ?></td>
                <td>
                  <img src="views/images/sysadmin/eye.svg" alt="eye" onclick="editAccount(<?php echo $account['id'] ?>, '<?php echo $account['account_name'] ?>', '<?php echo $account['account_fullname'] ?>', '<?php echo $account['avatar_name'] ?>')"/>
                  <img src="views/images/sysadmin/close.svg" alt="close" onclick="deleteAccount(<?php echo $account['id'] ?>)" />
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

  <!-- account edit modal -->
  <div class="account_edit_modal">
    <div class="account_content">
      <div class="modal_header">
        <img src="views/images/smile.svg" alt="warn" />
        <p>KONTO - EDYCJA</p>
      </div>
      <div class="modal_card">
        <div class="account_info_field">
          <p>Skrócona nazwa konta</p>
          <input id = "account_name" type="text" class="info_form">
        </div>
        <div class="account_info_field">
          <p>Pełna nazwa konta</p>
          <input id = "account_fullname" type="text" class="info_form">
        </div>
        <div class="account_info_field">
          <p>Logotyp</p>
          <div class="logo_part">
            <img class="logo_preview" id="upload_image" src=""/>
            <h3
              class="remove_logo"
              style="
                color: black;
                cursor: pointer;
                line-height: 100%;
                z-index: 9999;
              "
            >
              x
            </h3>
            <input type="file" accept="image/*" name="image" id="fileupload"  onchange="loadFile(event)">
            <button class="upload_btn">WYBIERZ PLIK</button>
          </div>
        </div>
        <div class="modal_footer">
          <button class="cancel">ANULUJ</button>
          <button class="agree">ZAPISZ</button>
        </div>
      </div>
    </div>
  </div>

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

<link rel="stylesheet"  href="views/layout/styles/sysadmin/accountList.css"/>
<script src="js/sysadmin/accountList.js"></script>

<script type="text/javascript">
    var currentPage = '<?php echo $page; ?>';
    var pages = '<?php echo $numberOfPages; ?>';
    var $filter = '<?php echo $filter; ?>';
</script>


<?php
include_once 'views/pages/sysadmin/footer.php';
?>