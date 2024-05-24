<?php

require dirname(__DIR__) .  '/database/database.php';


if($_SERVER["REQUEST_METHOD"] == 'POST'){

   require dirname(__DIR__) . '/cryptage_decrypt/cryptage.php' ;
    

  

    $db = new Database();
    $db->query("INSERT INTO Laureat( nom, Prenom, email, mdp, Tel, promotion, Filiere, Etablissement, Fonction, Employeur, valide) VALUES (:nom, :Prenom, :email, :mdp, :Tel, :promotion, :Filiere, :Etablissement, :Fonction, :Employeur, :valide)");
    $db->bind(':nom', $_POST['nom']);
    $db->bind(':Prenom', $_POST['prenom']);
    $db->bind(':email', $_POST['email']);
    $db->bind(':mdp', crypt_password($_POST['hide']));
    $db->bind(':Tel', $_POST['Tel']);
    $db->bind(':promotion', $_POST['hide-promotion']);
    $db->bind(':Filiere', $_POST['hide-filiere']);
    $db->bind(':Etablissement', $_POST['hide-etablissement']);
    $db->bind(':Fonction', $_POST['fonction']);
    $db->bind(':Employeur', $_POST['employeur']);
    $db->bind(':valide', 0);
    

    
    if($db->execute()){
        
    
        $db -> query('SELECT identifiant FROM Laureat WHERE email = :email');
        $db -> bind(':email',$_POST['email']);
        $db -> execute();
        $identifiant = $db -> single();
    
        // insert photo
        if(isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK){
            $photo = $_FILES['photo']['tmp_name'];
            $photoContent = file_get_contents($photo);
            $photoName = basename($_FILES['photo']['name']);
    
            $db->query('INSERT INTO profile_pic (photo , content, identifiant) VALUE (:photo , :content , :identifiant) ;');
            $db->bind(':photo',$photoName);
            $db->bind(':content',$photoContent);
            $db->bind(':identifiant', $identifiant -> identifiant);
            $db->execute();
            echo 'success';
    
    
    
    
        }else{
            echo 'not received';
        }
    
    
            
        $db->query('SELECT * FROM Laureat WHERE email = :email;');
        $db->bind(":email", $_POST['email']);
        $db->execute();
        $result = $db->single();
    
        if($result){
            session_start();
            
            if (property_exists($result, 'mdp')) {
                unset($result->mdp);
            } 
            $result->userType = 'laureat';
            $_SESSION['userInfo'] = $result;
            
        }

        header('Location: /dashboard');
    }

    
   
    
    
  


}