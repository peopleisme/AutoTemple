<?php

require_once "config.php";
require_once "connection.php";
session_start();
if (isset($_POST['input_password']) && isset($_POST['input_password_check'])) {
    if ($_POST['input_password'] == $_POST['input_password_check']) {
        $query_existing_check  = $conn->prepare("UPDATE user SET password=:password WHERE email=:email ");
        $query_existing_check->bindParam(':email', $_SESSION['input_email']);
        $query_existing_check->bindParam(':password', password_hash($_POST['input_password'], PASSWORD_BCRYPT));
        $query_existing_check->execute();
    } else {
        array_push($errors, "password_differ");
    }
} else {

    $input_email = trim($_POST['input_email']);
    $query_existing_check  = $conn->prepare("SELECT user_id, email FROM user WHERE email=:email");
    $query_existing_check->bindParam(':email', $input_email);
    $query_existing_check->execute();
    //obsługa błędu dla input_login
    if ($query_existing_check->rowCount() < 1) {
        array_push($errors, "email_not_exists");
    }







    if (empty($errors)) {

        $_SESSION['input_email'] = $input_email;


        require("PHPMailer/src/PHPMailer.php");
        require("PHPMailer/src/SMTP.php");
        require("PHPMailer/src/Exception.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet = "UTF-8";
        $mail->Host = "	s1.ct8.pl"; /* Zależne od hostingu poczty*/
        $mail->SMTPDebug = 0;
        $mail->Port = 465; /* Zależne od hostingu poczty, czasem 587 */
        $mail->SMTPSecure = 'ssl'; /* Jeżeli ma być aktywne szyfrowanie SSL */
        $mail->SMTPAuth = true;
        $mail->IsHTML(true);
        $mail->Username = "noreply@carparts.pl"; /* login do skrzynki email często adres*/
        $mail->Password = "Q@wertyuiop123"; /* Hasło do poczty */
        $mail->setFrom('noreply@carparts.pl', 'AutoTemple'); /* adres e-mail i nazwa nadawcy */
        $mail->AddAddress($input_email); /* adres lub adresy odbiorców */
        $mail->Subject = "Przywracanie hasła AutoTemple.ct8.pl"; /* Tytuł wiadomości */
        $mail->Body = " 
        Link do zmiany hasła: <a href=\"https://autotemple.ct8.pl/zapomnialem_hasla?authenticator=" . password_hash($input_email, PASSWORD_BCRYPT) . "\">http://autotemple.ct8.pl/zapomnialem_hasla?authenticator=" . password_hash($input_email, PASSWORD_BCRYPT) . "</a><p>   
        
            Pozdrawiamy, Zespół AutoTemple ";





        if (!$mail->Send()) {
            array_push($errors, "mail_error");
        } else {
        }
    }
}
if ($errors)
    echo json_encode($errors);
exit;
