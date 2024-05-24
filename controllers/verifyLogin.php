<?php

require dirname(__DIR__) . '/database/database.php';

require dirname(__DIR__) . '/cryptage_decrypt/cryptage.php' ;

$db = new Database();

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    



if($_POST['type'] == "laureat"){
$db->query('SELECT * FROM Laureat WHERE email = :email  ;');
$db->bind(":email", $_POST['email']);
$db->execute();
$result = $db->single();



if($result && verify_crypting($_POST['mdp'],$result->mdp)){
    session_start();
    
    if (property_exists($result, 'mdp')) {
        unset($result->mdp);
    } 

    $result->userType = $_POST['type'];

    $_SESSION['userInfo'] = $result;
   
    header('Location: /dashboard');
}else{
    header('Location: /?status=err');

}

}elseif ($_POST['type'] == "admin"){

    $db->query('SELECT * FROM Gestionnaire WHERE Matricule = :Matricule AND mdp = :mdp  ;');
    $db->bind(":Matricule", $_POST['matricule']);
    $db->bind(":mdp", $_POST['mdp']);
    $db->execute();
    $result = $db->single();



    if($result){
        session_start();
        
        if (property_exists($result, 'mdp')) {
            unset($result->mdp);
        } 

        $result->userType = $_POST['type'];

        $_SESSION['userInfo'] = $result;
        echo "done admin";
    
        header('Location: /dashboard');
    }else{
        header('Location: /?status=err');
       

    }

}



}