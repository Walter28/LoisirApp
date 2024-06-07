<?php
    session_start();
    include('../configuration/config.php');
    include_once('../models/Reservation.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
        $id_utilisateur = htmlspecialchars($_POST['id_utilisateur']);
        $id_activite = htmlspecialchars($_POST['id_activite']);
        $date_reservation = date('Y-m-d');
        $status_reservation = "encours";
    
        $reservation = new Reservation($id_utilisateur, $id_activite, $date_reservation, $status_reservation);
    
        if ($reservation->enregistrerReservation()) {
            $_SESSION['reserv'] = 200;
            header("Location:../views/description.php?id=$id_activite");
        } else {
            $_SESSION['reserv'] = 101;
            header("Location:../views/description.php?id=$id_activite");
        }
    }
    else {
        $_SESSION['reserv'] = 101;
        header("Location:../views/description.php?id=$id_activite");
    }
    