<?php
require dirname(__DIR__) . '/database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    
    $db = new Database();
    $id =$_SESSION['userInfo']->Identifiant; // Vous pouvez changer cette valeur pour l'ID souhaité
    $db->query('INSERT INTO Avis (identifiant, Avis) VALUES (:identifiant, :avis)');
    $db->bind(':identifiant', $id);
    $db->bind(':avis', $_POST['avis']);
    $db->execute();

    //redirect
    header("Location: /views/dashBoard.user.view.php?");
}
