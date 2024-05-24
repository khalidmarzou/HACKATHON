<?php
    session_start();
    require dirname(__DIR__) ."/database/database.php";
    $maricule = $_SESSION['userInfo'] -> Matricule;

    // get matricule and name :
    $db = new Database();
    $db -> query('SELECT * FROM Gestionnaire WHERE Matricule = :maricule');
    $db -> bind(':maricule', $maricule);
    $db -> execute();
    $admin = $db -> single();
    unset($admin -> Mdp);

    $adminName = $admin -> Nom . ' ' . $admin -> Prenom;
    $adminMatricule = $admin -> Matricule;

    // get count of users :
    $db -> query('SELECT Identifiant, nom, Prenom, Etablissement, Filiere, promotion FROM Laureat WHERE valide = 0');
    $db -> execute();
    $pendingUsers = $db -> resultSet();
    $countPendingUsers = $db -> rowCount();

    // Total Users :
    $db -> query('SELECT * FROM Laureat WHERE valide = 1');
    $db -> execute();
    $countUsers = $db -> rowCount();


    echo json_encode(array(
        'adminName' => $adminName,
        'adminMatricul' => $adminMatricule,
        'countPendingUsers'=> $countPendingUsers,
        'prendingUsers'=> $pendingUsers,
        'countUsers'=> $countUsers
    ));