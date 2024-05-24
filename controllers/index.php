<?php

    require dirname(__DIR__) . '/database/database.php';

    $db = new Database();
    // count Laureats registred with confirmations :
    $db -> query('SELECT * FROM Laureat WHERE valide = true;');
    $db -> execute();
    $countLaureats = $db -> rowCount();


    // count avis :
    $db -> query('SELECT * FROM Avis;');
    $db -> execute();
    $countAvis = $db -> rowCount();


    // count souvenirs :
    $db -> query('SELECT * FROM Souvenir');
    $db -> execute();
    $countSouvenirs = $db -> rowCount();

    // get 10 last Avis with username and photo :
    $db -> query('SELECT Avis, nom, prenom, photo, content, dateA FROM Avis NATURAL JOIN Laureat LEFT JOIN profile_pic ON Laureat.Identifiant = profile_pic.Identifiant ORDER BY dateA LIMIT 10;');
    $db -> execute();
    $last10AVis = $db -> resultSet();

    require dirname(__DIR__) . '/views/index.view.php';