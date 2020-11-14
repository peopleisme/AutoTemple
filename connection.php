<?php try{
    $conn = new PDO("mysql:host=$servername;dbname=m17094_sklep", $database_username, $database_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $errors = array();
}catch(PDOException $e){
    $errors = array();
    array_push($errors,"connection_erorr");
    print_r($errors);
    exit;
}
?>
