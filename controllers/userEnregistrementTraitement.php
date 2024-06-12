<?php
session_start();
// if($_SESSION['message']) unset($_SESSION['message']);
include '../configuration/config.php';
include '../models/Utilisateur.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //check if the image file was succesfully sent
    if(isset($_FILES['profil_utilisateur']) && $_FILES['profil_utilisateur']['error'] == 0) {
        $allowed = [
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png'
        ];
        

        $fileName = $_FILES['profil_utilisateur']['name'];
        $fileType = $_FILES['profil_utilisateur']['type'];
        $fileSize = $_FILES['profil_utilisateur']['size'];
        $fileTmpName = $_FILES['profil_utilisateur']['tmp_name'];

        // check the file extension
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!array_key_exists($fileExtension, $allowed)) {
            die("Erreur : Format de fichier non autorise.");
        }

        // check the MIME typeof the file
        if(!in_array($fileType, $allowed)){
            die("Erreur : Type de fichier non autorise.");
        }

        // check the file size (max : 5Mo)
        if($fileSize > 5 * 1024 * 1024){
            die("Erreur : La taille du fichier est trop grande.");
        }

        // Destination path
        $uploadDir = '../assets/images/profiles_users/';
        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0755, true);
        }

        $uploadFilePath  = $uploadDir . basename($fileName);

        // Move the file into the webapp directory
        if(move_uploaded_file($fileTmpName, $uploadFilePath)) {
            echo "L'image a ete telecharger avec succes.";
        } else {
            echo "Erreur lors du telechargement de l'image";
        }

    } else { echo "Erreur : " . $_FILES['profil_utilisateur']['error']; }


    $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
    $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
    $profil_utilisateur = $_FILES['profil_utilisateur']['name'];
    $email_utilisateur = htmlspecialchars($_POST['email_utilisateur']);
    $phone_utilisateur = htmlspecialchars($_POST['phone_utilisateur']);
    $pwd_utilisateur = htmlspecialchars($_POST['pwd_utilisateur']);
    $date_creation_compte = null;
    $status_compte = "client";

    $additional = False;
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
