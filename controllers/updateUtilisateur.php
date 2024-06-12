<?php
session_start();
// if($_SESSION['message']) unset($_SESSION['message']);
include '../configuration/config.php';
include '../models/Utilisateur.php';

print_r($_POST);
print_r($_FILES);
if($_FILES['profil_utilisateur']['name'] == "") echo "nothin''''";
die;


if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
    $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
    $profil_utilisateur = $_FILES['profil_utilisateur']['name'];
    if($_FILES['profil_utilisateur']['name'] == "") $profil_utilisateur = htmlspecialchars($_POST['profil_utilisateur_old']);
    $email_utilisateur = htmlspecialchars($_POST['email_utilisateur']);
    $phone_utilisateur = htmlspecialchars($_POST['phone_utilisateur']);
    $pwd_utilisateur = htmlspecialchars($_POST['pwd_utilisateur']);
    if($_POST['$pwd_utilisateur'] == "") $pwd_utilisateur = htmlspecialchars($_POST['pwd_utilisateur_old']);
    else $pwd_utilisateur = md5($pwd_utilisateur);
    $date_creation_compte = null;
    $status_compte = "client";

    $additional = htmlspecialchars($_POST['additional']);
    $description_utilisateur = htmlspecialchars($_POST['description_utilisateur']);
    $link_fb = htmlspecialchars($_POST['link_fb']);
    $link_insta = htmlspecialchars($_POST['link_insta']);
    $link_x = htmlspecialchars($_POST['link_x']);
    $link_yout = htmlspecialchars($_POST['link_yout']);
    $job_utilisateur = htmlspecialchars($_POST['job_utilisateur']);
    $year_xperia_utilisateur = htmlspecialchars($_POST['year_xperia_utilisateur']);
    $address_utilisateur = htmlspecialchars($_POST['address_utilisateur']);

    $user = new Utilisateur($nom_utilisateur, $prenom_utilisateur, $profil_utilisateur, $email_utilisateur, $phone_utilisateur,
    $pwd_utilisateur, $date_creation_compte, $status_compte, $additional, $description_utilisateur, $link_fb, $link_insta,
    $link_x, $link_yout, $job_utilisateur, $year_xperia_utilisateur, $address_utilisateur);

    if ($user->updateUtilisateur($_SESSION['userid'])) {
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
