<?php 

require dirname(__DIR__).'/database/database.php';
session_start();
$db = new Database();


// SELECT All Avis
$id = $_SESSION['userInfo']->Identifiant;
$db->query('SELECT * FROM Avis where Identifiant = :id ');
$db->bind(':id',$id);
$result = $db->resultSet();
$test = $result;
