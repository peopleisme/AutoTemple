
<?php
session_start();
require_once "config.php";
require_once "header.php";
require_once "functions.php";
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
            <p class="SettingsHeader">Ustawienia</p>
        </div>
        <div class="SettingsOptions__container">
            <p class="SettingsOption active">Dane osobowe</p>
            <p class="SettingsOption">Ustawienia konta</p>
            <p class="SettingsOption">Powiadomienia</p>
            <p class="SettingsOption">Preferencje</p>
        </div>
        
    
    
    </div>
</body>
<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>
</html>
