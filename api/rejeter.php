<?php
    require dirname(__DIR__) . "/database/database.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $identifiant = $_POST['Identifiant']; 

        $db = new Database();
        $db -> query('SELECT email FROM Laureat WHERE Identifiant = :id');
        $db -> bind(':id', $identifiant);
        $db -> execute();
        require dirname(__DIR__) . '/controllers/sendMail.php';
        sendEmail($db->single() -> email ,'Unfortunally!! Your account has not been verified, Try to verify your informations in : www.exemple.com');

        $db -> query('DELETE FROM Laureat WHERE Identifiant = :id');
        $db -> bind(':id', $identifiant);
        header('Content-Type: application/json');
        if ($db -> execute()){
            echo 'success';
        }else{
            echo 'error in delete data';
        }
    }