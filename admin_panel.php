<?php
require_once "config.php";
require_once "header.php";
require_once "functions.php";

if(isset($_SESSION["user_permission"]) && $_SESSION["user_permission"]==10){}
else{
    header("Location:index");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="Settings__container">
        <div class="SettingsHeader__container">
            <p class="SettingsHeader">Panel Administracyjny</p>
        </div>
        <div class="SettingsOptions__container">
            <div class="SettingsOption active"> 
                <p class="SettingsOption--header select" >Produkty</p>
                <a class="SettingsOption--option" href=""> Wszystkie </a>
                <a class="SettingsOption--option" href=""> Dodaj </a>
            </div>
            <div class="SettingsOption "> 
                <p class="SettingsOption--header" >Kategorie</p>
                <a class="SettingsOption--option" href=""> Wszystkie </a>
                <a class="SettingsOption--option" href=""> Dodaj </a>
            </div>
            <div class="SettingsOption "> 
                <p class="SettingsOption--header" >Media</p>
            </div>

        </div>
        
    
    
    </div>
</body>
<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>
</html>
