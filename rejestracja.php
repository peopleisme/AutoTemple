<?php

require_once "config.php";
require_once "header.php";
?>

<div class="logowanie_container">
  <div class="successfully_done"><span>Potwierdź rejestrację za pomocą adresu email!</span></div>
  <div class="header_container">
    <span class="header">Rejestracja</span>
  </div>

  <form class="form_register" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <ul class="RegisterErrorTooltip">





    </ul>
    <div class="login">
      <span>Nazwa Użytkownika</span>
      <input class="input_login" type="login" name="input_login" value="" autocomplete="off" placeholder="login" pattern="[A-Za-z][A-Za-z0-9]{5,31}$" title="Nazwa Użytkownika musi zaczynać się literą, może zawierać tylko wielkie litery, małe litery oraz cyfry, i musi mieć od 6 do 32 znaków" required autofocus>
      <div class="loginError  "></div>
    </div>


    <div class="email ">
      <span>Email</span>
      <input class="input_email " type="text" name="input_email" value="" placeholder="email" pattern='^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' title="Nieprawidłowy adres Email" required>
      <div class="emailError  "></div>
    </div>
    <div class="password">
      <span>Hasło</span>
      <input class="input_password" type="password" name="input_password" value="" placeholder="hasło" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,31}" title="Hasło musi zawierać conajmniej jedną wielką literę, jedną małą literę oraz jedną cyfrę, i mieć od 6 do 32 znaków" required>
      <div class="passwordError  "></div>
    </div>
    <div class="password_check">
      <span>Powtórz hasło</span>
      <input class="input_password" type="password" name="input_password_check" value="" placeholder="hasło" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,31}" title="Hasło musi zawierać conajmniej jedną wielką literę, jedną małą literę oraz jedną cyfrę, i mieć od 6 do 32 znaków " required>
      <div class="password_checkError"></div>
    </div>
    <div class="registration_reminder">
      <span> Masz już konto? <a href="logowanie.php">Zaloguj sie</a></span>
    </div>
    <div class="submit">
      <input class="input_submit" type="submit" value="Zarejestruj się">
    </div>
  </form>

</div>

<?php
require_once "footer.php";
?>