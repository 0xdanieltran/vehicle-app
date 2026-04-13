<script type="text/javascript">
    var id = '<?php echo $_SESSION['id']; ?>';
    var role = <?php echo $_SESSION['role']; ?>;
</script>

<div class="user_modal_container">
  <div class="modal_content">
    <div class="modal_header">
      <p>EDYCJA PROFILU</p>
    </div>
    <div class="modal_card">
      <div class="user_info_field">
        <p>Nazwa Użytkownika / login</p>
        <input type="text" id ="update_name" class="search_form username" value="<?php echo $_SESSION['user_name'] ?>">
      </div>
      <div class="user_info_field">
        <p>Imię i nazwisko</p>
        <input type="text" id ="update_fullname" class="search_form user_fullname" value="<?php echo $_SESSION['user_fullname'] ?>">
      </div><div class="user_info_field">
        <p>Email</p>
        <input type="text" id ="update_email" class="search_form email" value="<?php echo $_SESSION['email'] ?>">
      </div>
      <div class="user_info_field">
        <p>Nowe hasło</p>
        <input type="password" id ="update_password" class="search_form password" value="hasło">
      </div>
      <div class="modal_footer">
        <button class="cancel modify_btn">Anuluj</button>
        <button class="agree modify_btn">modyfikować</button>
      </div>
    </div>
  </div>
</div>

<div class="wrapper custom_footer">
        <div id="copyright" class="hoc clear">
          <img src="views/images/logo.png" alt="logo" />
          <p>Wszelkie prawa zastrzeżone &copy; 2022</p>
        </div>
      </div>
    </div>  

    </body>
</html>