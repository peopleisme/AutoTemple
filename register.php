<?php
session_start();
require_once "config.php";
require_once "connection.php";
$input_login=trim($_POST["input_login"]);
$input_email=trim($_POST["input_email"]);
$input_password=$_POST["input_password"];
$input_password_check=$_POST["input_password_check"];

$query_existing_check  = $conn->prepare("SELECT user_id, user_email, user_login FROM user WHERE user_login=:login OR user_email=:user_email");
$query_existing_check->bindParam(':login',$input_login);
$query_existing_check->bindParam(':user_email',$input_email );
$query_existing_check ->execute(); 
//obsługa błędu dla input_login
if($query_existing_check->rowCount()>0){
    array_push($errors,"login_exists");
}
if(!isset($input_login) || $input_login == ''){
    array_push($errors,"login_empty");
}
elseif(strlen($input_login)<6 ){
    array_push($errors,"login_short");
}
elseif(strlen($input_login)>32 ){
    array_push($errors,"login_long");
}
if(!preg_match('/^[A-Za-z0-9_]*$/',$input_login)){
    array_push($errors,"login_incorrect");
}
//obsługa błędów dla input_email
if(!isset($input_email) || $input_email == ''){
    array_push($errors,"email_empty");
}
if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',trim($input_email))){
    array_push($errors,"email_incorrect");
}

//obsługa błędów dla input_password
if(!isset($input_password) || $input_password == ''){
    array_push($errors,"password_empty");
}
elseif(strlen($input_password)<6 ){
    array_push($errors,"password_short");
}
elseif(strlen($input_password)>32 ){
    array_push($errors,"password_long");
}
if(!preg_match('/^(?=.*[a-z])/',$input_password)){
    array_push($errors,"password_incorrect_NoLowerCase");
}
if(!preg_match('/^(?=.*[A-Z])/',$input_password)){
    array_push($errors,"password_incorrect_NoUpperCase");
}
if(!preg_match('/^(?=.*[0-9])/',$input_password)){
    array_push($errors,"password_incorrect_NoNumber");
}
//obsługa błędów dla input_password_check

if(!isset($input_password_check) || $input_password_check == ''){
    array_push($errors,"password_check_empty");
}
elseif(strlen($input_password_check)<6 ){
    array_push($errors,"password_check_short");
}
elseif(strlen($input_password_check)>32 ){
    array_push($errors,"password_check_long");
}
if(!preg_match('/^(?=.*[a-z])/',$input_password_check)){
    array_push($errors,"password_check_incorrect_NoLowerCase");
}
if(!preg_match('/^(?=.*[A-Z])/',$input_password_check)){
    array_push($errors,"password_check_incorrect_NoUpperCase");
}
if(!preg_match('/^(?=.*[0-9])/',$input_password_check)){
    array_push($errors,"password_check_incorrect_NoNumber");
}
if(isset($input_password) && isset($input_password_check) && $input_password_check!=$input_password){
    array_push($errors,"password_differ");
}







if(empty($errors)){
    session_start();
    $input_passwordHashed=password_hash($input_password,PASSWORD_BCRYPT);
    $_SESSION['input_login']=$input_login;
    $_SESSION['input_email']=$input_email;
    $_SESSION['input_passwordHashed']=$input_passwordHashed;

    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet="UTF-8";
    $mail->Host = "	s1.ct8.pl"; /* Zależne od hostingu poczty*/
    $mail->SMTPDebug = 0;
    $mail->Port = 465 ; /* Zależne od hostingu poczty, czasem 587 */
    $mail->SMTPSecure = 'ssl'; /* Jeżeli ma być aktywne szyfrowanie SSL */
    $mail->SMTPAuth = true;
    $mail->IsHTML(true);
    $mail->Username = "noreply@carparts.pl"; /* login do skrzynki email często adres*/
    $mail->Password = "Q@wertyuiop123"; /* Hasło do poczty */
    $mail->setFrom('noreply@carparts.pl', 'AutoTemple'); /* adres e-mail i nazwa nadawcy */
    $mail->AddAddress($input_email); /* adres lub adresy odbiorców */
    $mail->Subject = "Weryfikacja aresu email AutoTemple.ct8.pl"; /* Tytuł wiadomości */
    $mail->Body = "Witaj,".$input_login." Udało ci się założyć konto w naszym serwisie! Ostatnim krokiem będzie potwierdzenie adresu email oraz korzystanie z naszego serwisu. 
    


    Link aktywacyjny: <a href=\"https://autotemple.ct8.pl/email_verification?authenticator=".password_hash($input_email,PASSWORD_BCRYPT)."\">http://autotemple.ct8.pl/email_verification?authenticator=".password_hash($input_email,PASSWORD_BCRYPT)."</a><p>   
    
        Pozdrawiamy, Zespół AutoTemple ";
    

    


    if(!$mail->Send()) {
        array_push($errors,"mail_error");
    } else {
        
    }
    
}
else {
    $errorSize=sizeof($errors);
    echo json_encode($errors);
    exit;
}






?>