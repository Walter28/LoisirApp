<?php
    include('../configuration/config.php');
    include_once('../models/Commentaire.php');
    include_once('../models/Utilisateur.php');

    function getListeCommentaires(){
        // $annee = $_SESSION['annee2'];
        return Commentaire::getCommentaires();
    }

    function getInfoCommentateur($id_utilisateur){
        // Get the name and the profiles of the commentator
        return Utilisateur::getUtilisateurById($id_utilisateur);
    }
