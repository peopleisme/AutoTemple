<?php
session_start();
require_once "config.php";
require_once "connection.php";
if(isset($_GET['authenticator']) && isset($_SESSION['input_email'])){
    
    if(password_verify($_SESSION['input_email'],$_GET['authenticator'])){

        $query_existing_check  = $conn->prepare("SELECT user_id, user_email, user_login FROM user WHERE user_login=:login OR user_email=:user_email");
        $query_existing_check->bindParam(':login',$_SESSION['input_login']);
        $query_existing_check->bindParam(':user_email',$_SESSION['input_email']);
        $query_existing_check ->execute(); 
        if($query_existing_check->rowCount()<1){
            $query  = $conn->prepare("INSERT INTO user ( user_email, user_login, user_password) VALUES (:user_email,:login,:input_password  ) ");
            $query->bindParam(':login',$_SESSION['input_login']);
            $query->bindParam(':user_email',$_SESSION['input_email']);
            $query->bindParam(':input_password',$_SESSION['input_passwordHashed']);
            $query ->execute(); 
            
        }
        header("Location: logowanie");





    }
    else{
        echo "nie zgadzają się";
    }
}
else{
    echo "nieprawidłowy link";
}






?>