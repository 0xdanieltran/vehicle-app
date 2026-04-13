<?php
locked();
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <title>Vehicle</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <link
      href="views/layout/styles/layout.css"
      rel="stylesheet"
      type="text/css"
      media="all"
    />
    
    <!-- JAVASCRIPTS -->
    <script src="views/layout/scripts/jquery.min.js"></script>
    <script src="views/layout/scripts/jquery.backtotop.js"></script>
    <script src="views/layout/scripts/jquery.mobilemenu.js"></script>
    <script src="views/layout/scripts/global.js"></script>
    <script src="js/user/topbar.js"></script>
    <script src="js/login/logout.js"></script>
  </head>
  
  <body id="top">
    <div class="full-content">
      <div class="wrapper topbar">
        <div id="topbar" class="hoc clear user_topbar">
          <div class="fl_left">
          <img id="admin_logo" class= <?php echo $_SESSION['url'] == 'views/images/logo.png' ? "sysadmin_logo" : "admin_logo"; ?> src = '<?php echo $_SESSION['url']; ?>' >
          </div>
          <div class="fl_right">
            <ul class="nospace">
              <li>
                <div class="topbar_date_box">
                  <h5 id = "time" class="topbar_date"></h5>
                  <h5 id = "date" class="topbar_date">piątek </h5>
                </div>
              </li>
              <li>
                <h3 class="topbar_username"><?php echo $user_fullname ?></h3>
              </li>
              <li>
                <div class="user_box">
                  <img src="views/images/user.svg" alt="user" />
                </div>
              </li>
              <li>
                <div class="logout_box">
                  <img src="views/images/logout.svg" alt="logout" />
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>