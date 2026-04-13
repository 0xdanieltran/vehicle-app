<?php
include_once 'views/pages/sysadmin/header.php';
include_once 'views/pages/sysadmin/navbar.php';
?>
      <div class="wrapper">
        <div id="reportList" class="hoc clear">
          <div class="reportList_container">
            <div class="searchBar">
              <button class="report_header">RAPORTY</button>
              <button class="report_button">EKSPORTUJ</button>
            </div>
            <table>
              <tr>
                <th style="width: 35%">LOKALIZACJA</th>
                <th style="width: 35%">KONTO</th>
                <th style="width: 30%">ZDARZENIA</th>
              </tr>
              <?php
                if($reports) {
                  $i=1;
                foreach($reports as $report) { ?>
                  <tr>
                    <td><?php echo $report['location_name']; ?></td>
                    <td><?php echo $report['account_name']; ?></td>
                    <td><?php echo $report['events']; ?></td>
                  </tr>
              <?php }} ?>
            </table>
            <div class="pagination">
              <ul class="pagination simple-pagination" id="pagination"></ul>
            </div>
          </div>
        </div>
      </div>

  <link rel="stylesheet" href="views/layout/styles/sysadmin/reportList.css" />
  <script type="text/javascript">
    var currentPage = '<?php echo $page; ?>';
    var pages = '<?php echo $numberOfPages; ?>';
  </script>
  <script src="js/sysadmin/reportList.js"></script>

<?php
include_once 'views/pages/sysadmin/footer.php';
?>