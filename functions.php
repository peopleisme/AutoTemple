<?php
if (isset($_POST['action']) && !empty($_POST['action'])) {
    switch ($_POST['action']) {
        case 'logout':
            logout();
            echo "done";
            exit;
            break;
    }
}
function logout()
{
    session_start();
    session_destroy();
    setcookie("user_id", "", time() - 3600);
    setcookie("user_email", "", time() - 3600);
    setcookie("user_login", "", time() - 3600);
}

if (isset($_POST['function']) && $_POST['function'] == 'temporaryFileUpload') {
    $Uploadarray = array();
    for ($i = 0; $i < $filesLength = count($_FILES['temporaryImage']['tmp_name']); $i++) {
        if (is_uploaded_file($_FILES['temporaryImage']['tmp_name'][$i]) && !file_exists('temporary/' . $_FILES['temporaryImage']['name'][$i])) {
            move_uploaded_file($_FILES['temporaryImage']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/temporary/' . $_FILES['temporaryImage']['name'][$i]);
            array_push($Uploadarray,  $_FILES['temporaryImage']['name'][$i]);
        }
    }
    echo json_encode($Uploadarray);
}
if (isset($_POST['function']) && $_POST['function'] == 'temporaryFileDelete') {
    echo $_POST['deleteFile'];
    if (isset($_POST['deleteFile'])) unlink($_POST['deleteFile']);
}

if (isset($_POST['function']) && $_POST['function'] == 'addProduct') {
    require_once "config.php";
    require_once "connection.php";



    $query = $conn->prepare("INSERT INTO item(title,description,quantity,price) VALUES (:title,:description,:quantity,:price)");
    $query->bindParam(":title", $_POST['title']);
    $query->bindParam(":description", $_POST['description']);
    $query->bindParam(":quantity", $_POST['quantity']);
    $query->bindParam(":price", $_POST['price']);
    $query->execute();
    $lastID = $conn->lastInsertId();
    $dir = "productsImg/item_{$lastID}";
    mkdir($dir);
    $imageArray = json_decode($_POST['imageArray']);

    $query = $conn->prepare("INSERT INTO gallery(item_id,link) VALUES (:item_id,:link)");

    foreach ($imageArray as $key => $value) {
        $dirPhoto = "{$dir}/image{$key}.jpg";
        rename($value, $dirPhoto);
        echo $lastID . "  ";
        echo $dirPhoto . "  ";
        $query->bindParam(":item_id", $lastID);
        $query->bindParam(":link", $dirPhoto);
        $query->execute();
    }
}
