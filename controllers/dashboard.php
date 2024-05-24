<?php
    session_start();
    if (isset($_SESSION["userInfo"])){
        if($_SESSION["userInfo"]-> userType == 'admin'){
            header('Location: /views/dashBoard.admin.view.php');
            exit();
        }else{
            if($_SESSION["userInfo"]-> valide == 1){
                header('Location: /views/dashBoard.user.view.php');
                exit();
            }else{
                header('Location: /views/notvalidate.php');
            }
            
        }
    }