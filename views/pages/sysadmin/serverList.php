<?php
include_once 'views/pages/sysadmin/header.php';
include_once 'views/pages/sysadmin/navbar.php';
?>
<div class="wrapper">
  <div id="serverList" class="hoc clear">
    <div class="serverList_container">
      <div class="addServer">
        <div class="addServer-btn">
          <img
            src="views/images/sysadmin/add.svg"
            alt="add-server-icon"
          />
          <h2>DODAJ SERWER</h2>
        </div>
      </div>
      <div class="searchInfo">znaleziono: <?php echo $totalResultCount ?> pozycji</div>
      <table>
        <tr>
          <th style="width: 5%">LP</th>
          <th style="width: 17%">NAZWA</th>
          <th style="width: 17%">DATA DODANIA</th>
          <th style="width: 51%">ADRES URL</th>
          <th style="width: 10%">
            <img src="views/images/sysadmin/setting.svg" alt="setting" />
          </th>
        </tr>
        <?php
if ($servers) {
    $i = 1;
    foreach ($servers as $server) {?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $server['server_name']; ?></td>
                  <td><?php echo $server['created_at']; ?></td>
                  <td><?php echo $server['server_url']; ?></td>
                  <td>
                    <img src="views/images/sysadmin/eye.svg" alt="eye"
                      onclick="editServer(<?php echo $server['id'] ?>,
                                      '<?php echo $server['server_name'] ?>',
                                        '<?php echo $server['server_url'] ?>',
                                          '<?php echo $server['bucket_name'] ?>',
                                          '<?php echo $server['access_key'] ?>',
                                          '<?php echo $server['secret_access_key'] ?>')"/>

                    <img src="views/images/sysadmin/close.svg" alt="close" onclick="deleteServer(<?php echo $server['id'] ?>)" />
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

<div class="server_edit_modal_container">
  <div class="modal_content">
    <div class="modal_header">
      <p>SERWER - EDYCJA</p>
    </div>
    <div class="modal_card">
      <div class="server_info_field">
        <p>Nazwa serwera</p>
        <input
          id="servername"
          type="text"
          class="search_form servername"
        />
      </div>

      <div class="server_info_field">
        <p>Adres URL</p>
        <input
          id="server_url"
          type="text"
          class="search_form server_url"
        />
      </div>

      <div class="server_info_field">
        <p>Bucket</p>
        <input
          id="bucket_name"
          type="text"
          class="search_form bucket"
        />
      </div>

      <div class="server_info_field">
        <p>Access key ID</p>
        <input
          id="accessKey"
          type="text"
          class="search_form accessKey"
        />
      </div>

      <div class="server_info_field">
        <p>Secret access key</p>
        <input
          id="secretKey"
          type="text"
          class="search_form secretKey"
        />
      </div>

      <div class="server_info_field">
        <p>Zapis</p>
        <div class="newServer_form checkBox">
          <label class="switch">
            <input type="checkbox" id="checkbox"/>
            <span class="slider round"></span>
          </label>
        </div>
      </div>
      <div class="modal_footer">
        <button class="edit_cancel modify_btn">Anuluj</button>
        <button class="edit_agree modify_btn">modyfikować</button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="views/layout/styles/sysadmin/serverList.css" />
<script src="views/layout/scripts/jquery.simplePagination.js"></script>
<script type="text/javascript">
    var currentPage = '<?php echo $page; ?>';
    var pages = '<?php echo $numberOfPages; ?>';
    var $filter = '<?php echo $filter; ?>';
</script>
<script src="js/sysadmin/serverList.js"></script>

<?php
include_once 'views/pages/sysadmin/footer.php';
?>