<?php

require_once "config.php";
require_once "header.php";
require_once "functions.php";
?>


<div class="logowanie_container">
  <div class="successfully_done"><span>Zalogowano!</span></div>


  <div class="header_container">
    <span class="header">Logowanie</span>
  </div>

  <form class="form_login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="login">
      <span>Nazwa Użytkownika</span>
      <input class="input_login" type="login" name="input_login" value="" placeholder="login" required>
      <div class="loginError  "></div>
    </div>


    <div class="password">
      <span>Hasło<a class="password--forgot_password" href="zapomnialem_hasla"> Zapomniałem hasła</a></span>
      <input class="input_password" type="password" name="input_password" value="" placeholder="hasło" required>
      <div class="passwordError "></div>
    </div>

    <div class="remember_me">
      <label class="checkmark_container">Zapamiętaj mnie
        <input class="input_remember_me" type="checkbox" name="input_remember_me">
        <span class="checkmark"></span>
      </label>
    </div>

    <div class="submit">
      <input class="input_submit" type="submit" name="" value="Zaloguj się">
    </div>
  </form>


  <div class="alternative">
    <div class="facebook_box login_box">
      <img class="facebook_img" src="img/facebook.svg" alt="">
    </div>
    <div class="google_box login_box">
      <img class="google_img" src="img/google.svg" alt="">
    </div>
    <div class="twitter_box login_box">
      <img class="twitter_img" src="img/twitter.svg" alt="">
    </div>
  </div>

</div>
<?php
require_once "footer.php";
?>