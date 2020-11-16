<?php

require_once "config.php";
require_once "header.php";
require_once "functions.php";
?>


<?php
if (isset($_SESSION['input_email']) && isset($_GET['authenticator'])) {
  if (password_verify($_SESSION['input_email'], $_GET['authenticator'])) {


    $pattern = '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,31}';
    echo '<div class="logowanie_container">
  <div class="successfully_done "><span></span> </div>
  <div class="header_container">
    <span class="header">Zmiana hasła</span>
  </div>
  <form class="form_change_password" action="' . $_SERVER['PHP_SELF'] . '" method="post">
  
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
  
    <div class="submit">
      <input class="input_submit" type="submit" name="" value="Wyślij">
    </div>
  </form>
  </div>';
  } else {
  }
} else {
  $pattern = '^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$';
  echo '<div class="logowanie_container">
<div class="successfully_done "><span></span> </div>
<div class="header_container">
  <span class="header">Zapomniałem hasła</span>
</div>
<form class="form_forgot_password " action="' . $_SERVER['PHP_SELF'] . '" method="post">

  <div class="email">
    <span>Email</span>
    <input class="input_email" type="login" name="input_email" placeholder="email" pattern=\'';
  echo $pattern;
  echo '\' required>
    <div class="emailError  "></div>
  </div>

  <div class="submit">
    <input class="input_submit" type="submit" name="" value="Wyślij">
  </div>
</form>
</div>';
}




?>



<?php
require_once "footer.php";
?>