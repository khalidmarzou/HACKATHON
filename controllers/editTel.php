<?php
 require dirname(__DIR__) . "/database/database.php";

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $tel = $_POST['phones'];
    $identifiant = $_SESSION['userInfo'] -> Identifiant;
    $db = new Database();
    $db -> query('UPDATE Laureat SET Tel = :tel WHERE Identifiant = :id');
    $db -> bind(':tel', $tel);
    $db -> bind(':id', $identifiant);
    $db -> execute();
    header('Location: /dashboard');
 }