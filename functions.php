<?php
    if(isset($_POST['action']) && !empty($_POST['action'])){
        switch($_POST['action']){
            case 'logout':
                logout();
                echo "done";
                exit;
            break;
        }
    }




    function logout(){
    session_start();
    session_destroy();
    setcookie ("user_id", "", time() - 3600);
    setcookie ("user_email", "", time() - 3600);
    setcookie ("user_login", "", time() - 3600);

    }


?>