<?php 

    //3 infos important pour se connecter a la data base
    // $dns = 'mysql:host=127.0.0.1;dbname = bibliotheque';
    // $login = 'root';
    // $pwd = '';

    // $db = new PDO($dns, $login, $pwd);


    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $db = new PDO('mysql:host=localhost;dbname=loisirapp', 'root', '', $pdo_options);

    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
