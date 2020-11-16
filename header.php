
<?php
session_start();
if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_email']) && isset($_COOKIE['user_login'])){
  $_SESSION['user_id']=$_COOKIE['user_id'];
  $_SESSION['user_email']=$_COOKIE['user_email'];
  $_SESSION['user_login']=$_COOKIE['user_login'];
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NieMaDżisu</title>
    <link href="fonts/Lato.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


  <div class="loader-container">
    <div class="loader"></div>
    <p>Proszę czekać</p>
</div>

<div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div class="overlay-content">
        <a href="sklep">Sklep</a>
        <a href="logowanie">Zaloguj się</a>
        <a href="rejestracja">Dołącz do nas</a>
      </div>
    </div>
<nav class="pasek width100">
  <a href="index"><img class="img_logo " src="img/icon-photo.svg"></a>
  <div class="pasek_zawartość">
    <div class="mr-auto ">
    <span class="nawigacja_telefon " onclick="openNav()">&#9776;</span>

    <div class="nawigacja">
      <div class="dropdown lgDisplayNone" >
        <a role="button" >
          <p class="navbarItem dropdownButton" data-dropdowntarget="x2j" >Kategorie<img class=" vector" src="img/vector.svg"></p>
        </a>
        <div class="dropdown-menu NavDropdown-menu" data-dropdowntarget="x2j" >
          <a class="dropdown-item" href="#">PHP</a>
          <a class="dropdown-item" href="#">JAVA</a>
          <a class="dropdown-item" href="#">JS</a>
          <a class="dropdown-item" href="#">C++</a>
        </div>
      </div>
      <a class="navbarItem lgDisplayNone" href="sklep">Sklep </a>
    </div>

    </div>
    <form  method="get">
      <div class="wyszukiwarka_pudelko ml-auto ">
        <div class="wyszukiwarka_patyk">
          <input class="wyszukiwarka_input" type="text" placeholder="Szukaj">
        </div>
        <div class="wyszukiwarka_potwierdz">
          <button class="potwierdz" type="submit">
            <img class="lupa " src="img/lupa.svg">
          </button>
        </div>
      </div>
    </form>
    <div class="navbar_konto">


    <?php
    if(isset($_SESSION["user_login"])){
      echo '
          <p class=" tworcy"><img class=" profile_avatar dropdownButton" data-dropdowntarget="x3d" src="profile_avatars/default_avatar.png"></p>
          <div class="dropdown-account dropdown-menu" data-dropdowntarget="x3d">
          <div class="account-header " ><p title="'.$_SESSION["user_login"].'">'.$_SESSION["user_login"].'</p></div>
          <a class="dropdown-item Myaccount" href="">Moje konto</a>
          <a class="dropdown-item settingsGear" href="ustawienia">Ustawienia</a>
          <a class="dropdown-item LogOutSketch" onclick="logout()">Wyloguj</a>
          <div class="account_SketchBar">

          </div>
        </div>

    
      ';
    }
    
    else
    echo '
    <p class="navbar_rejestracja  lgDisplayNone" href="rejestracja"><a href="rejestracja">Zarejestruj się</a></p>
    <p class="navbar_logowanie  smDisplayNone" href="logowanie"><a  href="logowanie">Zaloguj się</a></p>';
      ?>
    </div>
  </div>
</nav>
<div class="ErrorBar">
  <?php if(isset($_GET['error'])){
       parse_str($_GET['error'], $output);  
       $tok = strtok($_GET['error'], " ");
        while ($tok !== false) {

          switch($tok){
            case "connection_erorr":
              echo  '<div>Błąd połączenia!</div>';
            break;
            case "already_exist":
              echo  '<div>Użytkownik o podanych danych już istnieje!</div>';
            break;
            case "password_differs":
              echo  '<div>Hasła nie są takie same!</div>';
            break;
            case "empty_password":
              echo  '<div>Pole Hasło jest puste!</div>';
            break;
            case "empty_login":
              echo  '<div>Pole Nazwa Użytkownika jest puste!</div>';
            break;
            case "empty_email":
              echo  '<div>Pole Email jest puste!</div>';
            break;
            case "incorrect_login":
              echo  '<div>Błąd Błędny login!</div>';
            break;
            case "incorrect_password":
              echo  '<div>Błędne hasło!</div>';
            break;  
          }
          $tok = strtok(" ");
      }
    




  }
  ?>
</div>