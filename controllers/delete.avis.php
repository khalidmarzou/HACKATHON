<?php

require dirname(__DIR__) . '/database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (isset($data['identifiant']) && is_numeric($data['identifiant'])) {
        $db = new Database();
        $id = intval($data['identifiant']);
        $db->query('DELETE FROM Avis WHERE identifiant_avis = :id');
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
