<!doctype html>
<html lang="en">
<head>
  <title>Vehicle</title>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
  />

	<link rel="stylesheet" href="views/layout/styles/layout.css" />
	<link rel="stylesheet" href="views/layout/styles/framework.css" />

  <!-- JAVASCRIPTS -->
  <script src="views/layout/scripts/jquery.min.js"></script>
  <script src="views/layout/scripts/jquery.backtotop.js"></script>
  <script src="views/layout/scripts/jquery.mobilemenu.js"></script>
  <script src="views/layout/scripts/global.js"></script>

</head>

<body id="top">

<div class="wrapper">
	<div id="login" class="hoc clear">
	<div class="login_container">
		<img src="views/images/logo.png" alt="" />
		<div class="login_box">
		<h2 class="login_heading">WITAJ W SYSTEMIE CAR EYE</h2>
		<div class="login_card">
		<div class="login_alert">
			<p class="alert_content">Błędne dane logowania</p>
		</div>
			<input
			id="username"
			type="text"
			placeholder="login"
			class="login_form username"
			/>
			<input
			id="password"
			type="password"
			placeholder="hasło"
			class="login_form password"
			/>
			<button id="login_btn" class="login_button">ZALOGUJ</button>
		</div>
		<h3 class="login_footer">Nie pamiętam hasła</h3>
		</div>
	</div>
	</div>
</div>


<link rel="stylesheet" href="views/layout/styles/login.css" />
<script src="js/login/login.js"></script>

</body>
</html>
