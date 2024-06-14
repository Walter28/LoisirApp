<?php
    include('./configuration/config.php');
    include_once('./models/Activite.php');

    // function getListeActivites(){
    //     // $annee = $_SESSION['annee2'];
    //     return Activite::getActivites();
    // }

    function getActiviteSponsored(){
        return Activite::getSponsoredActivite();
    }

    function getActivitesSponsored(){
        return Activite::getSponsoredActivites();
    }