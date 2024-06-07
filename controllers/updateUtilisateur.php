<?php
session_start();
// if($_SESSION['message']) unset($_SESSION['message']);
include '../configuration/config.php';
include '../models/Utilisateur.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
    $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
    $profil_utilisateur = $_FILES['profil_utilisateur']['name'];
    $email_utilisateur = htmlspecialchars($_POST['email_utilisateur']);
    $phone_utilisateur = htmlspecialchars($_POST['phone_utilisateur']);
    $pwd_utilisateur = htmlspecialchars($_POST['pwd_utilisateur']);
    $date_creation_compte = null;
    $status_compte = "client";

    $additional = null;
    $description_utilisateur = null;
    $link_fb = null;
    $link_insta = null;
    $link_x = null;
    $link_yout = null;
    $job_utilisateur = null;
    $year_xperia_utilisateur = null;
    $address_utilisateur = null;

    $pwd_utilisateur = md5($pwd_utilisateur);

    $user = new Utilisateur($nom_utilisateur, $prenom_utilisateur, $profil_utilisateur, $email_utilisateur, $phone_utilisateur,
    $pwd_utilisateur, $date_creation_compte, $status_compte, $additional, $description_utilisateur, $link_fb, $link_insta,
    $link_x, $link_yout, $job_utilisateur, $year_xperia_utilisateur, $address_utilisateur);

    if ($user->enregistrerUtilisateur()) {
        $_SESSION['message'] = 200;
        header("Location:../login.php?success");
    } else {
        var_dump($_SESSION['message']);
        $_SESSION['message'] = 101;
        header("Location:../login.php?error");
    }
}
else {
    $_SESSION['message'] = 102;
    header("Location:../login.php?error");
}
