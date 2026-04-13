<?php $currentUrl = explode("?controller=", $_SERVER['REQUEST_URI'])[1];?>
<!-- Admin Header -->
<div class="wrapper header">
          <header id="header" class="hoc clear">
            <nav id="mainav">
              <ul class="clear">
                <li class="<?php echo $currentUrl == 'admin/userList' || $currentUrl == 'admin/newUser' ? 'active' : '' ?>">
                  <img src="views/images/admin/friends.png" alt="friends" />
                  <a class="drop" href="#">UŻYTKOWNICY</a>
                  <ul>
                    <li class="<?php echo $currentUrl == 'admin/newUser' ? 'active' : '' ?>">
                      <a href="index.php?controller=admin/newUser">dodaj nowego użytkownika</a>
                    </li>
                    <li class="<?php echo $currentUrl == 'admin/userList' ? 'active' : '' ?>">
                      <a href="index.php?controller=admin/userList">lista użytkowników</a>
                    </li>
                  </ul>
                </li>
                <li class="<?php echo $currentUrl == 'admin/newLocation' || $currentUrl == 'admin/locationList' ? 'active' : '' ?>">
                  <img src="views/images/admin/location.png" alt="location" />
                  <a class="drop" href="#">Lokalizacja</a>
                  <ul>
                    <li class="<?php echo $currentUrl == 'admin/newLocation' ? 'active' : '' ?>">
                      <a href="index.php?controller=admin/newLocation">Dodaj nową lokalizację</a>
                    </li>
                    <li class="<?php echo $currentUrl == 'admin/locationList' ? 'active' : '' ?>">
                      <a href="index.php?controller=admin/locationList">Lista lokalizacji</a>
                    </li>
                  </ul>
                </li>
                <li class="<?php echo $currentUrl == 'admin/deviceList' ? 'active' : '' ?>">
                  <img src="views/images/admin/setting.png" alt="setting" />
                  <a class="drop" href="index.php?controller=admin/deviceList">URZĄDZENIA</a>
                </li>
              </ul>
            </nav>
          </header>
        </div>
      </div>