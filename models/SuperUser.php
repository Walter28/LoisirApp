<?php

class SuperUser {

    private $nom_su;
    private $prenom_su;
    private $username_su;
    private $pwd_su;

    function __construct($nom_su, $prenom_su, $username_su, $pwd_su){
        $this->nom_su = $nom_su;
        $this->prenom_su = $prenom_su;
        $this->username_su = $username_su;
        $this->pwd_su = $pwd_su;
    }

    function insertUtilisateur() {
        global $db;
        $result = FALSE;

        $nom_su = $this->nom_su;
        $prenom_su = $this->prenom_su;
        $username_su = $this->username_su;
        $pwd_su = $this->pwd_su;

        $requete = 'INSERT INTO super_user(nom_su, prenom_su, username_su, pwd_su) VALUES(?,?,?,?)';

        $statement = $db->prepare($requete);
        $execute=$statement->execute(array($nom_su, $prenom_su, $username_su, $pwd_su));

        return $resultat = $execute ? true : false;
    }    
}
