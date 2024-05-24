<?php

require dirname(__DIR__) .  '/database/database.php';


$db = new Database();

$db->query('SELECT * FROM Filiere ');

$result = $db->resultSet();

$info = ['filiere'=>$result];

$db->query('SELECT * FROM EFP ');

$result = $db->resultSet();
$info ['EFP'] = $result;

echo json_encode($info);
