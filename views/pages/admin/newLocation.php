<?php
  include_once 'views/pages/admin/header.php';
  include_once 'views/pages/admin/navbar.php';
?>
      <div class="wrapper">
        <div id="newLocation" class="hoc clear">
          <div class="newLocation_container">
            <div class="newLocation_card">
              <div class="header">
                <img src="views/images/admin/add.svg" alt="add" />
                <p class="search_header_content">DODAWANIE NOWEJ LOKALIZACJI</p>
              </div>
              <div class="content">
                <input
                  type="text"
                  placeholder="Nazwa lokalizacji"
                  class="newLocation_form"
                />
              </div>
            </div>
            <button class="newLocation_btn">DODAJ LOKALIZACJĘ</button>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/admin/newLocation.css" />
      <script src="js/admin/newLocation.js"></script>

<?php
  include_once 'views/pages/admin/footer.php';
?>
