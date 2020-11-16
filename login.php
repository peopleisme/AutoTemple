<?php
session_start();
require_once "config.php";
require_once "connection.php";




$input_login = trim($_POST["input_login"]);
$input_password = $_POST["input_password"];
$input_remember_me=$_POST["input_remember_me"];

try {
  $query  = $conn->prepare("SELECT user_id, user_email, user_login, user_password FROM user WHERE user_login=:login");
} catch (PDOException $e) {
  array_push($errors, $e->getMessage());
}

$query->bindParam(':login', $input_login);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);


if ($query->rowCount() == 1) {
  if (password_verify($input_password, ($result['user_password']))) {
    $_SESSION["user_id"] = $result['user_id'];
    $_SESSION["user_email"] = $result['user_email'];
    $_SESSION["user_login"] = $result['user_login'];
    unset($input_login);
    unset($input_password);
    session_regenerate_id();
    if($input_remember_me){
      setcookie("user_id",$_SESSION["user_id"] , time() + 60*60*24*30);
      setcookie("user_email",$_SESSION["user_email"] , time() + 60*60*24*30);
      setcookie("user_login",$_SESSION["user_login"] , time() + 60*60*24*30);
    }
    exit;


  } else {
    array_push($errors, "incorrect_password");  
  }
} else {
  array_push($errors, "incorrect_login");
}


if (!empty($errors)) {

  echo json_encode($errors);
  exit;
}
