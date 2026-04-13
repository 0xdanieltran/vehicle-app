<?php $currentUrl = explode("?controller=", $_SERVER['REQUEST_URI'])[1];?>
<div class="wrapper header">
          <header id="header" class="hoc clear">
            <nav id="mainav">
              <ul class="clear">
                <li id="home" style="width: 7%; background: #169FDB; border: #169FDB;">
                  <img src="views/images/home.svg" alt="home" />  
                </li>
                <li class="<?php echo strpos($currentUrl, 'sysadmin/userList') !== false || strpos($currentUrl, 'sysadmin/newUser') !== false ? 'active' : '' ?>">
                  <img src="views/images/sysadmin/friends.png"  alt="add-user"/>
                  <a class="drop" href="#">UŻYTKOWNICY</a>
                  <ul>
                    <li class="<?php echo strpos($currentUrl, 'sysadmin/newUser') !== false ? 'active' : '' ?>">
                      <a href="index.php?controller=sysadmin/newUser">DODAJ NOWEGO UŻYTKOWNIKA</a>
                    </li>
                    <li class="<?php echo strpos($currentUrl, 'sysadmin/userList') !== false ? 'active' : '' ?>">
                      <a href="index.php?controller=sysadmin/userList">LISTA UŻYTKOWNIKÓW</a>
                    </li>
                  </ul>
                </li>
                <li class="<?php echo strpos($currentUrl, 'sysadmin/accountList') !== false || strpos($currentUrl, 'sysadmin/newAccount') !== false? 'active' : '' ?>">
                  <img src="views/images/sysadmin/archive.png" alt="archive" />
                  <a class="drop" href="#">KONTA</a>
                  <ul>
                    <li class="<?php echo strpos($currentUrl, 'sysadmin/newAccount') !== false ? 'active' : '' ?>">
                      <a href="index.php?controller=sysadmin/newAccount">DODAJ NOWE KONTO</a>
                    </li>
                    <li class="<?php echo strpos($currentUrl, 'sysadmin/accountList') !== false ? 'active' : '' ?>">
                      <a href="index.php?controller=sysadmin/accountList">LISTA KONTA</a>
                    </li>
                  </ul>
                </li>
                <li class="<?php echo strpos($currentUrl, 'sysadmin/deviceList') !== false ? 'active' : '' ?>">
                  <img src="views/images/sysadmin/setting.png" alt="setting" />
                  <a href="index.php?controller=sysadmin/deviceList">URZĄDZENIA</a>
                </li>
                <li class="<?php echo strpos($currentUrl, 'sysadmin/serverList') !== false ? 'active' : '' ?>">
                  <img src="views/images/sysadmin/server.png" alt="server" />
                  <a href="index.php?controller=sysadmin/serverList">SERWERY</a>
                </li>
              </ul>
            </nav>
          </header>
        </div>
      </div>
