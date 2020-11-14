<?php
session_start();
require_once "config.php";
require_once "connection.php";



$login=$_POST['input_login'];
$password=$_POST['input_password'];


try {
$query  = $conn->prepare("SELECT user_id, user_email, user_login, user_password FROM user WHERE user_login=:login");
} catch(PDOException $e) {
  array_push($errors,$e->getMessage());
}

$query->bindParam(':login',$login);
$query ->execute(); 
$result=$query->fetch(PDO::FETCH_ASSOC);


if($query->rowCount()==1){
  if(password_verify($password,($result['user_password']))){
    session_start(); 
    $_SESSION["user_id"]=$result['user_id'];
    $_SESSION["user_email"]=$result['user_email'];
    $_SESSION["user_login"]=$result['user_login'];
    header("Location: index.php");
    unset($login);
    unset($password);
    exit;
  }
  else{
    array_push($errors,"incorrect_password");
  }

}
else{
    array_push($errors,"incorrect_login");
}


if(!empty($errors)){

  echo sizeof($errors);
  $errorSize=sizeof($errors);
  print_r($errors);
  if($errorSize>1){
      for($i=0;$i<$errorSize-1;$i++){
      $errors[$i]=$errors[$i]."+";
  } 
  }

  echo implode('',$errors);
  header("Location: logowanie.php?error=".implode('',$errors));


}

?>