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
    <link rel="stylesheet" href="views/layout/styles/register.css" />
  </head>

  <body id="top">
    <div class="wrapper">
      <div id="login" class="hoc clear">
        <div class="login_container">
          <img src="./views/images/logo.png" alt="" />
          <div class="login_box">
            <h2 class="login_heading">Zarejestrować</h2>
            <div class="login_card">
              <div class="userInfoBox">
                <strong>Login: </strong><span><?php echo $user['user_name'] ?></span></br>
                <strong>Imię i nazwisko: </strong><span><?php echo $user['user_fullname'] ?></span></br>
                <strong>Email: </strong><span><?php echo $user['email'] ?></span>
              </div>
              <input
			  	id="password"
                type="password"
                placeholder="hasło"
                class="login_form password"
              />
              <div class="login_alert">
                <p class="alert_content strong_message">
                  ZBYT SŁABE HASŁO. Hasło powinno mieć minimalnie: 
                  8 znaków, 1 małą literę, 1 dużą literę, 1 cyfrę, 1 znak specjalny.
                </p>
              </div>
              <input
			  	id="password_confirm"
                type="password"
                placeholder="powtórz hasło"
                class="login_form confirm_password"
              />
              <div class="login_alert">
                <p class="alert_content confirm_message">Hasła nie są jednakowe.</p>
              </div>
              <div class="warnInfo">
                <p> Hasło powinno mieć minimalnie: </p>
                <p> 8 znaków, 1 małą literę, 1 dużą literę, 1 cyfrę, 1 znak specjalny </p>
              </div>
              <button class="login_button">POTWIERDŹ HASŁO</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="views/layout/scripts/jquery.min.js"></script>
    <script src="views/layout/scripts/jquery.backtotop.js"></script>
    <script src="views/layout/scripts/jquery.mobilemenu.js"></script>
	<script src="js/login/register.js"></script>

    <script>
      var email = '<?php echo $user['email'] ?>';
    </script>
  </body>
</html>
