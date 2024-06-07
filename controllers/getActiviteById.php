<?php
    include('../configuration/config.php');
    include_once('../models/Activite.php');

    function getActiviteById($id_activite){
        return Activite::getActiviteById($id_activite);
    }