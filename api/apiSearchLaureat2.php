<?php

require dirname(__DIR__) . '/database/database.php';
header('Content-Type: application/json; charset=utf-8');

// Get the POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!empty($data)) {

    if ($data['type'] == 'nom') {
        $type = 'nom';
        $query = 'SELECT * FROM Laureat WHERE valide = :valide AND nom = :valu';
    }
    if ($data['type'] == 'promotion') {
        $type = 'promotion';
        $query = 'SELECT * FROM Laureat WHERE valide = :valide AND promotion = :valu';
    }
    if ($data['type'] == 'Filiere') {
        $type = 'Filiere';
        $query = 'SELECT * FROM Laureat WHERE valide = :valide AND Filiere = :valu';
    }
    if ($data['type'] == 'Etablissement') {
        $type = 'Etablissement';
        $query = 'SELECT * FROM Laureat WHERE valide = :valide AND Etablissement = :valu';
    }
    if ($data['type'] == 'Fonction') {
        $type = 'Fonction';
        $query = 'SELECT * FROM Laureat WHERE valide = :valide AND Fonction = :valu';
    }
    if ($data['type'] == 'all') {
        $type = 'Fonction';
        $query = 'SELECT * FROM Laureat WHERE valide = 1';
    }
    if ($data['type'] == 'souvenir') {
        $type = 'Fonction';
        $query = 'SELECT * FROM Souvenir NATURAL JOIN Laureat WHERE valide = 1 AND promotion = :promotion';
    }

    $db = new Database();

    $db->query($query);

    if ($data['type'] != 'all' && $data['type'] != 'souvenir') {
        $db->bind(':valide', 1);
        $db->bind(':valu', $data['val']);
    } elseif ($data['type'] == 'souvenir') {
        $db->bind(':promotion', $data['val']);
    }

    $result = $db->resultSet();

    // Ensure UTF-8 encoding for each field that may contain binary data
    foreach ($result as &$row) {
        foreach ($row as $key => &$value) {
            if (is_string($value)) {
                $value  = base64_encode($value);
            }
        }
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}