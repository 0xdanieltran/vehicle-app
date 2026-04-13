<?php
include_once 'views/pages/sysadmin/header.php';
include_once 'views/pages/sysadmin/navbar.php';
?>
  <div class="wrapper">
    <div id="newAccount" class="hoc clear">
      <div class="newAccount_container">
        <div class="newAccount_card">
          <div class="header">
            <img
              src="views/images/sysadmin/add-user.svg"
              alt="search_icon"
            />
            <p class="search_header_content">DODAWANIE NOWEGO KONTA</p>
          </div>
          <div class="content">
            <input
              type="text"
              placeholder="Skrócona nazwa konta"
              class="newAccount_form account_name"
            />
            <div id = "account_name" class="error">Pole wymagane</div>
            <input
              type="text"
              placeholder="Pełna nazwa konta"
              class="newAccount_form account_fullName"
            />
            <div id = "account_fullname" class="error">Pole wymagane</div>
            <input
              type="text"
              placeholder="Nazwa użytkownika administratora"
              class="newAccount_form user_name"
            />
            <div id="user_name" class="error">Pole wymagane</div>
            <div id="regular_username" class="error">Niedozwolony znak</div>
            <input
              type="text"
              placeholder="Email administratora"
              class="newAccount_form user_email"
            />
            <div id="user_email" class="error">Pole wymagane</div>
            <input
              type="text"
              placeholder="Pełna nazwa administratora"
              class="newAccount_form user_fullname"
            />
            <div id="user_fullname" class="error">Pole wymagane</div>
            <div class="upload_logo">
              <div class="upload_btn">
                <input id="fileupload" type="file" accept="image/*" onchange="loadFile(event)">
                <button id="upload_btn">WYBIERZ PLIK</button>
              </div>
              <div style="width: auto; height: 100%; position: relative">
                    <img class="upload_preview" id="upload_image" />
                    <h3
                      class="remove_logo"
                      style="
                        position: absolute;
                        top: 0;
                        right: 0;
                        color: black;
                        cursor: pointer;
                        line-height: 100%;
                        z-index: 9999;
                      "
                    >
                      x
                    </h3>
                  </div>
              </div>
            </div>
        </div>
        <button class="newAccount_btn">DODAJ KONTO</button>
      </div>
    </div>
  </div>

<link rel="stylesheet" href="views/layout/styles/sysadmin/newAccount.css" />
<script src="js/sysadmin/newAccount.js"></script>

<?php
include_once 'views/pages/sysadmin/footer.php';
?>
