<?php

    function crypt_password($password) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        return $hashedPassword;
    }

    // echo crypt_password('khalid');

    function verify_crypting($password, $hashedPassword) {

        return password_verify($password, $hashedPassword);
    }
    /*
    echo '<br />';
    echo verify_crypting('khalid',crypt_password('khalid'));
    */