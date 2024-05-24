<?php

require dirname(__DIR__) . '/database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (isset($data['id']) && is_numeric($data['id'])) {
        $db = new Database();
        $id = intval($data['id']);
        $db->query('DELETE FROM Souvenir WHERE identifiant_souvenir = :id');
        $db->bind(':id', $id);
        if ($db->execute()) {
            echo 'Ok';
        } else {
            echo 'err';
        }
    } else {
        echo 'ID invalide ou manquant.';
    }
} else {
    echo 'Méthode de requête non supportée.';
}
?>
