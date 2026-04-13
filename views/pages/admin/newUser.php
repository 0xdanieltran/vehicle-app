<?php
include_once 'views/pages/admin/header.php';
include_once 'views/pages/admin/navbar.php';
?>
      <div class="wrapper">
        <div id="newAccount" class="hoc clear">
          <div class="newAccount_container">
            <div class="newAccount_card">
              <div class="header">
                <img src="views/images/admin/add.svg" alt="add" />
                <p class="search_header_content">
                  DODAWANIE NOWEGO UŻYTKOWNIKA
                </p>
              </div>
              <div class="content">
                <input
                  type="text"
                  placeholder="Nazwa Użytkownika / login"
                  class="newAccount_form user_name"
                />
                <div id="empty_username" class="error">Pole wymagane</div>
                <div id="regular_username" class="error">Niedozwolony znak</div>
                <input
                  type="text"
                  placeholder="Imię i nazwisko"
                  class="newAccount_form user_fullname"
                />
                <div id="user_fullname" class="error">Pole wymagane</div>
                <input
                  type="text"
                  placeholder="Email"
                  class="newAccount_form email"
                />
                <div id="user_email" class="error">Pole wymagane</div>
                <div class="newAccount_form checkBox">
                  <p class="title">Czy admin?</p>
                  <label class="switch">
                    <input type="checkbox" />
                    <span class="slider round"></span>
                  </label>
                </div>

                <div class="newAccount_form selectBox">
                  <p class="location_name">Lokalizacja</p>
                  <input type="hidden" class="location_id" value="" />
                  <img
                    src="views/images/admin/down-carrot.svg"
                    alt="down-carrot"
                  />
                </div>
              </div>
            </div>
            <button class="newAccount_btn">DODAJ UŻYTKOWNIKA</button>
          </div>
          <div class="popup">
              <?php
                if ($locations) {
                  $i = 1;
                  foreach ($locations as $location) {?>
                  <div onclick="setLocation(<?php echo $location['id'] ?>, '<?php echo $location['location_name'] ?>')">
                    <?php echo $location['location_name'] ?>
                  </div>
              <?php }}?>
          </div>
        </div>
      </div>

      <link rel="stylesheet" href="views/layout/styles/admin/newUser.css" />
      <script src="js/admin/newUser.js"></script>
<?php
include_once 'views/pages/admin/footer.php';
?>

