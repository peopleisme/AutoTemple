<?php
    if(isset($_GET['action'])&& !empty($_GET['action'])){
        switch($_GET['action']){
            case 'logout':
                logout();
                $output="jaja";
                echo $output;
                exit;
            break;
        }
    }




    function logout(){
    session_start();
    session_destroy();

    }


?>