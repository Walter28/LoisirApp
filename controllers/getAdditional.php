<?php
    include('../configuration/config.php');
    include_once('../models/Utilisateur.php');

    function getAdditional($iduser){
        // $annee = $_SESSION['annee2'];
        return Utilisateur::isAdditionalTrue($iduser);
    }