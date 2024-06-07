<?php
    include('./configuration/config.php');
    include_once('./models/Utilisateur.php');

    function getStatusCompte(){
        // $annee = $_SESSION['annee2'];
        return Utilisateur::getStatusCompteById($_SESSION['userid']);
    }