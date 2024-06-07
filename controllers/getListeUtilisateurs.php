<?php
    include('../configuration/config.php');
    include_once('../models/Utilisateur.php');

    function getListeUtilisateurs(){
        // $annee = $_SESSION['annee2'];
        return Utilisateur::getUtilisateurs();
    }

    function getUtilisateurById($id_utilisateur){
        return Utilisateur::getUtilisateurById($id_utilisateur);
    }