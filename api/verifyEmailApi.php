<?php

require dirname(__DIR__) .  '/database/database.php';
// problem 2


// Set response header to JSON
header('Content-Type: application/json');

// Get the POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['email'])) {
    $email = $data['email'];

   
    $db = new Database();
    $db->query('SELECT * FROM Laureat WHERE email = :email ');
    $db->bind(':email', $email);
    $db->execute();
    $result = $db->rowCount();
    if($result == 1){
        echo 'true';
    }else{
        echo 'false';
    }

}

