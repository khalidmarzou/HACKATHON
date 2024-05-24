<?php

require dirname(__DIR__).'/database/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['updatePhoto'])) {

    $Identifiant = $_SESSION['userInfo'] -> Identifiant;

    $file = $_FILES['updatePhoto'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    if ($fileError === 0) {

        $fileContent = file_get_contents($fileTmpName);
        $db = new Database();
        
        $db -> query('UPDATE profile_pic SET content = :content WHERE Identifiant = :id');
        $db -> bind(':content', $fileContent);
        $db -> bind(':id', $Identifiant);
        $db -> execute();

        
        echo "Profile picture updated successfully!";
        header("Location: /dashboard");
        exit();
    } else {
        // Handle upload errors
        echo "Error uploading file.";
    }
}