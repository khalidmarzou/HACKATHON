<?php


    session_start();
    
    
    $identifiant = $_SESSION['userInfo'] -> Identifiant;
    $dbt = new Database();
    $dbt -> query('SELECT Tel from Laureat  where Identifiant = :id');
    $dbt -> bind(':id', 19);
    $dbt -> execute();
    $Tela = $dbt->single();
