<?php
  session_start();

  require_once "config.php";
  require_once "header.php";
  require_once "functions.php";
  ?>


  <div class="logowanie_container">


    <div class="header_container">
        <span class="header">Logowanie</span>
    </div>
    <form class="form_login" action="login.php" method="post">
      <div class="login">
        <span>Nazwa Użytkownika</span>
        <input class="input_login" type="login" name="input_login" value="" placeholder="login" required>
      </div>

      <div class="password">
        <span>Hasło  <a class="password--forgot_password" href="https://www.w3schools.com"> Zapomniałem hasła</a>      </span>
        <input class="input_login" type="password" name="input_password" value="" placeholder="hasło" required>
      </div>
      <div class="remember_me">
        <label class="checkmark_container">Zapamiętaj mnie
          <input class="input_remember_me" type="checkbox" name="" value="">
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
      <div  class="google_box login_box">
        <img class="google_img" src="img/google.svg"  alt="">
      </div>
      <div class="twitter_box login_box">
        <img class="twitter_img" src="img/twitter.svg" alt="">
      </div>
    </div>
   
    </div>
    <?php
    require_once "footer.php";
  ?>
