<?php
    require dirname(__DIR__) . "/database/database.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $identifiant = $_POST['Identifiant']; 
        $db = new Database();
        $db -> query('UPDATE Laureat SET valide = 1 WHERE Identifiant = :id');
        $db -> bind(':id', $identifiant);
        header('Content-Type: application/json');
        if ($db -> execute()){
            echo 'success';
            $db -> query('SELECT email FROM Laureat WHERE Identifiant = :id');
            $db -> bind(':id', $identifiant);
            $db -> execute();
            require dirname(__DIR__) . '/controllers/sendMail.php';
            sendEmail($db->single() -> email ,'Congrats!! Your account has been verified, You can Now Enjoy Us in : www.exemple.com');
            
        }else{
            echo 'error in update data';
        }
    }