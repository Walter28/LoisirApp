<?php
    include('./configuration/config.php');
    include_once('./models/Activite.php');

    function getListeActivitesSport(){
        // $annee = $_SESSION['annee2'];
        return Activite::getActivitesSport();
    }

    function getListeActivitesReligion(){
        // $annee = $_SESSION['annee2'];
        return Activite::getActivitesReligion();
    }

    function getListeActivitesChill(){
        // $annee = $_SESSION['annee2'];
        return Activite::getActivitesChill();
    }

    function getListeActivitesTourisme(){
        // $annee = $_SESSION['annee2'];
        return Activite::getActivitesTourisme();
    }

    function getListeActivitesCulture(){
        // $annee = $_SESSION['annee2'];
        return Activite::getActivitesCulture();
    }