<?php
    include_once('../configuration/config.php');
    include_once('../models/Activite.php');

    function getListeActivites(){
        // $annee = $_SESSION['annee2'];
        return Activite::getActivites();
    }