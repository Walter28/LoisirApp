<?php
session_start();
include("../configuration/config.php");


    if(isset($_POST['email_utilisateur']) AND isset($_POST['pwd_utilisateur'])){

        //pour eviter les injections du type SQL et XSS
        $email_utilisateur = htmlspecialchars($_POST['email_utilisateur']);
        $pwd_utilisateur = htmlspecialchars($_POST['pwd_utilisateur']);
        $pwd_utilisateur = md5($pwd_utilisateur);


        if($email_utilisateur !== "" && $pwd_utilisateur !== ""){
            $req = $db->query("SELECT count(*) as nb FROM utilisateur where email_utilisateur ='".$email_utilisateur."' and pwd_utilisateur='".$pwd_utilisateur."' ");
            $req2 = $db->query("SELECT id_utilisateur FROM utilisateur where email_utilisateur ='".$email_utilisateur."' and pwd_utilisateur='".$pwd_utilisateur."' ");
            $msg=$req->fetch();
            $msg2 = $req2->fetch();
            $count=$msg['nb'];
            echo $count;

            if($count == 0){
                header('location:../login.php?erreur=1'); //utilisateur ou mot de passe incorrect
            } 
            else {
                $_SESSION['useremail']=$email_utilisateur; ///user n pwd match
                $_SESSION['userid']=$msg2['id_utilisateur']; ///user n pwd match

                // print_r($_SESSION);
                // die;
                
                header('location:../index.php');
                
            }
        }
        
        else {
            header('location:../views/login.php?erreur=2'); //utilisateur ou mot de passe vide
        }
    } 
    else {
        header('location:../login.php');
    }