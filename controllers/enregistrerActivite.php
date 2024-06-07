<?php
    session_start();
    include("../configuration/config.php");
    include("../models/Activite.php");


    if (isset($_POST['submit'])) {

        // print_r($_FILES);
        //check if the image file was succesfully sent
        if(isset($_FILES['affiche_activite']) &&
                 $_FILES['photo1'] &&
                 $_FILES['photo2'] &&
                 $_FILES['photo3'] &&

                 $_FILES['affiche_activite']['error'] == 0 &&
                 $_FILES['photo1']['error'] == 0 &&
                 $_FILES['photo2']['error'] == 0 &&
                 $_FILES['photo3']['error'] == 0) {
            $allowed = [
                'jpg' => 'image/jpg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png'
            ];

            // FOR THE AFFICHE IMAGE 

            $fileName = $_FILES['affiche_activite']['name'];
            $fileType = $_FILES['affiche_activite']['type'];
            $fileSize = $_FILES['affiche_activite']['size'];
            $fileTmpName = $_FILES['affiche_activite']['tmp_name'];

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
            $uploadDir = '../assets/images/activities_photos/';
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


            // FOR THE FIRST IMAGE 
            
            $fileName = $_FILES['photo1']['name'];
            $fileType = $_FILES['photo1']['type'];
            $fileSize = $_FILES['photo1']['size'];
            $fileTmpName = $_FILES['photo1']['tmp_name'];

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
            $uploadDir = '../assets/images/activities_photos/';
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



            // FOR THE SECOND IMAGE 
            
            $fileName = $_FILES['photo2']['name'];
            $fileType = $_FILES['photo2']['type'];
            $fileSize = $_FILES['photo2']['size'];
            $fileTmpName = $_FILES['photo2']['tmp_name'];

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
            $uploadDir = '../assets/images/activities_photos/';
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




            // FOR THE THIRD IMAGE 
            
            $fileName = $_FILES['photo3']['name'];
            $fileType = $_FILES['photo3']['type'];
            $fileSize = $_FILES['photo3']['size'];
            $fileTmpName = $_FILES['photo3']['tmp_name'];

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
            $uploadDir = '../assets/images/activities_photos/';
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

        } else {
            echo "Erreur : " . $_FILES['affiche_activite']['error'];
            echo "Erreur : " . $_FILES['photo1']['error'];
            echo "Erreur : " . $_FILES['photo2']['error'];
            echo "Erreur : " . $_FILES['photo3']['error'];
        }

        // print_r($_FILES['photo1']['name']);


        $id_utilisateur = $_SESSION['userid'];
        $titre_activite = $_POST['titre_activite'];
        $domaine_activite = $_POST['domaine_activite'];
        $lieu_activite = $_POST['lieu_activite'];
        $description_activite = $_POST['description_activite'];
        $prix_activite = $_POST['prix_activite'];
        $date_creation_activite = null;
        $date_activite = $_POST['date_activite'];
        $heure = $_POST['heure'];
        $affiche_activite = $_FILES['affiche_activite']['name'];
        $photo1 = $_FILES['photo1']['name'];
        $photo2 = $_FILES['photo2']['name'];
        $photo3 = $_FILES['photo3']['name'];
        $a_payer_publicite = False;
        $date_sponsored = null;

        $activite = new Activite($id_utilisateur, $titre_activite, $domaine_activite, $lieu_activite, $description_activite, $prix_activite, 
                        $date_creation_activite, $date_activite, $heure, $affiche_activite, $photo1, $photo2, $photo3, 
                        $a_payer_publicite, $date_activite);

        if ($activite->enregistrerActivite()) {
            header("Location:../views/create_activity.php?success");
        } else {
            echo "data not arrived";
        }
    } else {
        echo "The form was nerver been sent";
    }