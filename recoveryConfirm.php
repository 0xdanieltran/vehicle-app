
<?php
include_once 'header.php';
?>
  <div class="recovery_card">
          <div class="recovery_info">
            <div class="imgBox">
              <img src="./views/images/plane.svg" alt="plan" />
            </div>
            <div class="infoTitle">
              <div>
                Na podany adres wysłany został mail z linkiem do
                zresetowania hasła.
              </div>
              <div>
                Aby ustawić nowe hasło postępuj zgodnie ze wskazówkami w
                mailu.
              </div>
            </div>
          </div>

          <button class="recovery_confirm_btn">PRZEJDŹ DO OKNA LOGOWANIA</button>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="./views/layout/styles/recoveryConfirm.css" />

<script>
  $(document).ready(function() {
    $(".recovery_confirm_btn").on("click", function() {
      location.href = 'index.php?controller=login/login';
    })
  })
</script>

<?php
include_once 'footer.php';
?>

