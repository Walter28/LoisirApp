<?php
    include('./configuration/config.php');
    include_once('./models/Activite.php');

    function getRecenteActivites(){
        // $annee = $_SESSION['annee2'];
        return Activite::getRecenteActivites();
    }