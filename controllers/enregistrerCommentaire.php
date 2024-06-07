<?php
    session_start();
    include('../configuration/config.php');
    include_once('../models/Commentaire.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
        $id_utilisateur = htmlspecialchars($_POST['id_utilisateur']);
        $id_activite = htmlspecialchars($_POST['id_activite']);
        $contenu = htmlspecialchars($_POST['contenu']);
        $note = htmlspecialchars($_POST['note']);
        $date_commentaire = date('Y-m-d');
    
        $commentaire = new Commentaire($id_utilisateur, $id_activite, $contenu, $note, $date_commentaire);
    
        if ($commentaire->enregistrerCommentaire()) {
            $_SESSION['comment'] = 200;
            header("Location:../views/description.php?id=$id_activite");
        } else {
            $_SESSION['comment'] = 101;
            header("Location:../views/description.php?id=$id_activite");
        }
    }
    else {
        $_SESSION['comment'] = 101;
        header("Location:../views/description.php?id=$id_activite");
    }
    