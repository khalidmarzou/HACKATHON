<?php

require dirname(__DIR__).'/database/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['souvenirPhoto'])) {

    $Identifiant = $_SESSION['userInfo'] -> Identifiant;

    $file = $_FILES['souvenirPhoto'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    if ($fileError === 0) {

        $fileContent = file_get_contents($fileTmpName);
        $db = new Database();
        
        $db -> query('INSERT INTO Souvenir(identifiant, photo,  content) VALUES (:id, :photo,  :content)');
        $db -> bind(':content', $fileContent);
        $db -> bind(':photo', $fileName);
        $db -> bind(':id', $Identifiant);
        $db -> execute();

        
        echo "Profile picture updated successfully!";
        header("Location: /views/dashBoard.user.view.php?status=inserted");
        exit();
    } else {
        // Handle upload errors
        echo "Error uploading file.";
    }
}