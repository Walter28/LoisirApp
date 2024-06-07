<?php

    class Utilisateur {
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $profil_utilisateur;
        private $email_utilisateur;
        private $phone_utilisateur;
        private $pwd_utilisateur;
        private $date_creation_compte;
        private $status_compte;

        // For Proprio User
        private $additional;
        private $description_utilisateur;
        private $link_fb;
        private $link_insta;
        private $link_x;
        private $link_yout;
        private $job_utilisateur;
        private $year_xperia_utilisateur;
        private $address_utilisateur;

        public function __construct($nom_utilisateur, $prenom_utilisateur, $profil_utilisateur, $email_utilisateur, $phone_utilisateur,
                                $pwd_utilisateur, $date_creation_compte, $status_compte, $additional, $description_utilisateur, $link_fb,
                                $link_insta, $link_x, $link_yout, $job_utilisateur, $year_xperia_utilisateur, $address_utilisateur)
        {
            $this->nom_utilisateur = $nom_utilisateur;
            $this->prenom_utilisateur = $prenom_utilisateur;
            $this->profil_utilisateur = $profil_utilisateur;
            $this->email_utilisateur = $email_utilisateur;
            $this->phone_utilisateur = $phone_utilisateur;
            $this->pwd_utilisateur = $pwd_utilisateur;
            $this->date_creation_compte = $date_creation_compte;
            $this->status_compte = $status_compte;

            $this->additional = $additional;
            $this->description_utilisateur = $description_utilisateur;
            $this->link_fb = $link_fb;
            $this->link_insta = $link_insta;
            $this->link_x = $link_x;
            $this->link_yout = $link_yout;
            $this->job_utilisateur = $job_utilisateur;
            $this->year_xperia_utilisateur = $year_xperia_utilisateur;
            $this->address_utilisateur = $address_utilisateur;
        }

        public function enregistrerUtilisateur(){
            global $db;
            $resultat = false;

            $nom_utilisateur = $this->nom_utilisateur;
            $prenom_utilisteur = $this->prenom_utilisateur;
            $profil_utilisateur = $this->profil_utilisateur;
            $email_utilisateur = $this->email_utilisateur ;
            $phone_utilisateur = $this->phone_utilisateur;
            $pwd_utilisateur = $this->pwd_utilisateur;
            $date_creation_compte = $this->date_creation_compte;
            $status_compte = $this->status_compte;

            $additional = $this->additional;
            $description_utilisateur = $this->description_utilisateur;
            $link_fb = $this->link_fb;
            $link_insta = $this->link_insta;
            $link_x = $this->link_x;
            $link_yout = $this->link_yout;
            $job_utilisateur = $this->job_utilisateur;
            $year_xperia_utilisateur = $this->year_xperia_utilisateur;
            $address_utilisateur = $this->address_utilisateur;

            $requete = "INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, profil_utilisateur, email_utilisateur,
                        phone_utilisateur, pwd_utilisateur, date_creation_compte, status_compte,
                        additional, description_utilisateur, link_fb, link_insta, link_x, link_yout, job_utilisateur,
                        year_xperia_utilisateur, address_utilisateur) 
                        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $statement = $db->prepare($requete);
            $execute=$statement->execute(array($nom_utilisateur, $prenom_utilisteur, $profil_utilisateur, $email_utilisateur,
            $phone_utilisateur, $pwd_utilisateur, date('Y-m-d'), $status_compte, $additional, $description_utilisateur, $link_fb,
            $link_insta, $link_x, $link_yout, $job_utilisateur, $year_xperia_utilisateur, $address_utilisateur));

            return $resultat = $execute ? true : false;
            
        }

        public function updateUtilisateur($id_utilisateur){
            global $db;
            $resultat = false;

            $nom_utilisateur = $this->nom_utilisateur;
            $prenom_utilisteur = $this->prenom_utilisateur;
            $profil_utilisateur = $this->profil_utilisateur;
            $email_utilisateur = $this->email_utilisateur ;
            $phone_utilisateur = $this->phone_utilisateur;
            $pwd_utilisateur = $this->pwd_utilisateur;
            $date_creation_compte = $this->date_creation_compte;
            $status_compte = $this->status_compte;

            $additional = $this->additional;
            $description_utilisateur = $this->description_utilisateur;
            $link_fb = $this->link_fb;
            $link_insta = $this->link_insta;
            $link_x = $this->link_x;
            $link_yout = $this->link_yout;
            $job_utilisateur = $this->job_utilisateur;
            $year_xperia_utilisateur = $this->year_xperia_utilisateur;
            $address_utilisateur = $this->address_utilisateur;

            $requete = "UPDATE utilisateur set nom_utilisateur = ?, prenom_utilisateur = ?, profil_utilisateur = ? 
            email_utilisateur = ?, phone_utilisateur = ?, pwd_utilisateur = ?, date_creation_compte = ?, satus_compte = ? 
            additional, description_utilisateur, link_fb, link_insta, link_x, link_yout, job_utilisateur, year_xperia_utilisateur,
            address_utilisateur where id_utilisateur = ?";
            $statement = $db->prepare($requete);
            $execute=$statement->execute(array($nom_utilisateur, $prenom_utilisteur, $profil_utilisateur, $email_utilisateur,
            $phone_utilisateur, $pwd_utilisateur, $date_creation_compte, $status_compte,
            $additional, $description_utilisateur, $link_fb, $link_insta, $link_x, $link_yout, $job_utilisateur, 
            $year_xperia_utilisateur, $address_utilisateur, $id_utilisateur));

            return $resultat = $execute ? true : false;
            
        }

        static function deleteUser($id_utilisateur){
                global $db;
                $resultat = false;

                $requete = "DELETE FROM utilisateur where id_utilisateur = ? ";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_utilisateur));

                return $resultat = $execute ? true : false;
                
        }

        public function getIdUtilisateur() {
                global $db;
                $requete = 'SELECT id_utilisateur FROM utilisateur WHERE nom_utilisateur = ? and prenom_utilisateur = ? and phone_utilisateur = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($this->getNomUtilisateur(), $this->getPrenomUtilisateur(), $this->getPhoneUtilisateur()));

                if ($execute) {
                    if($data = $statement -> fetch()){
                        $id = $data['id_utilisateur'];
                        return $id;
                    } else return null;
                } else return null;
        }

        static function getStatusCompteById($id_utilisateur) {
                global $db;
                $requete = 'SELECT status_compte FROM utilisateur WHERE id_utilisateur = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($id_utilisateur));

                if ($execute) {
                    if($data = $statement -> fetch()){
                        $status_compte = $data['status_compte'];
                        return $status_compte;
                    } else return null;
                } else return null;
        }

        static function getUtilisateurById($id_utilisateur) {
                global $db;
                $requete = 'SELECT * FROM utilisateur WHERE id_utilisateur = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($id_utilisateur));
                
                if ($execute) {
                    if($data = $statement -> fetch()){
                        $utilisateur = new Utilisateur($data['nom_utilisateur'], $data['prenom_utilisateur'], $data['profil_utilisateur'], $data['email_utilisateur'], $data['phone_utilisateur'], 
                        $data['pwd_utilisateur'], $data['date_creation_compte'], $data['status_compte'],
                        $data['additional'], $data['description_utilisateur'], $data['link_fb'], $data['link_insta'],
                        $data['link_x'], $data['link_yout'], $data['job_utilisateur'], $data['year_xperia_utilisateur'],
                        $data['address_utilisateur']);
                        return $utilisateur;
                    } else return null;
                } else return null;
        }

        static function getUtilisateurs() {
            global $db;
            $requete = 'SELECT * FROM utilisateur ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute();

            $utilisateur=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $utilisateur = new Utilisateur($data['nom_utilisateur'], $data['prenom_utilisateur'], $data['profil_utilisateur'], $data['email_utilisateur'], $data['phone_utilisateur'], 
                        $data['pwd_utilisateur'], $data['date_creation_compte'], $data['status_compte'],
                        $data['additional'], $data['description_utilisateur'], $data['link_fb'], $data['link_insta'],
                        $data['link_x'], $data['link_yout'], $data['job_utilisateur'], $data['year_xperia_utilisateur'],
                        $data['address_utilisateur']);
                    array_push($utilisateurs,$utilisateur);
                    }
                    return $utilisateurs;
            } else return [];
        }




        //++++++++++++++++++++++++++++++++++++++
        //
        // PHP GETTERS
        //
        //++++++++++++++++++++++++++++++++++++++


        /**
         * Get the value of nom_utilisateur
         */
        public function getNomUtilisateur()
        {
                return $this->nom_utilisateur;
        }

        /**
         * Get the value of prenom_utilisateur
         */
        public function getPrenomUtilisateur()
        {
                return $this->prenom_utilisateur;
        }

        /**
         * Get the value of profil_utilisateur
         */
        public function getProfilUtilisateur()
        {
                return $this->profil_utilisateur;
        }

        /**
         * Get the value of email_utilisateur
         */
        public function getEmailUtilisateur()
        {
                return $this->email_utilisateur;
        }

        /**
         * Get the value of phone_utilisateur
         */
        public function getPhoneUtilisateur()
        {
                return $this->phone_utilisateur;
        }

        /**
         * Get the value of pwd_utilisateur
         */
        public function getPwdUtilisateur()
        {
                return $this->pwd_utilisateur;
        }

        /**
         * Get the value of date_creation_compte
         */
        public function getDateCreationCompte()
        {
                return $this->date_creation_compte;
        }

        /**
         * Get the value of status_compte
         */
        public function getStatusCompte()
        {
                return $this->status_compte;
        }


        //++++++++++++++++++++++++++++++++++++++
        //
        // PHP SETTERS
        //
        //++++++++++++++++++++++++++++++++++++++
        


        /**
         * Set the value of nom_utilisateur
         */
        public function setNomUtilisateur($nom_utilisateur): self
        {
                $this->nom_utilisateur = $nom_utilisateur;

                return $this;
        }

        /**
         * Set the value of prenom_utilisateur
         */
        public function setPrenomUtilisateur($prenom_utilisateur): self
        {
                $this->prenom_utilisateur = $prenom_utilisateur;

                return $this;
        }

        /**
         * Set the value of profil_utilisateur
         */
        public function setProfilUtilisateur($profil_utilisateur): self
        {
                $this->profil_utilisateur = $profil_utilisateur;

                return $this;
        }

        /**
         * Set the value of email_utilisateur
         */
        public function setEmailUtilisateur($email_utilisateur): self
        {
                $this->email_utilisateur = $email_utilisateur;

                return $this;
        }

        /**
         * Set the value of pwd_utilisateur
         */
        public function setPwdUtilisateur($pwd_utilisateur): self
        {
                $this->pwd_utilisateur = $pwd_utilisateur;

                return $this;
        }

        /**
         * Set the value of date_creation_compte
         */
        public function setDateCreationCompte($date_creation_compte): self
        {
                $this->date_creation_compte = $date_creation_compte;

                return $this;
        }

        /**
         * Set the value of status_compte
         */
        public function setStatusCompte($status_compte): self
        {
                $this->status_compte = $status_compte;

                return $this;
        }


        /**
         * Set the value of phone_utilisateur
         */
        public function setPhoneUtilisateur($phone_utilisateur): self
        {
                $this->phone_utilisateur = $phone_utilisateur;

                return $this;
        }

        /**
         * Get the value of additional
         */
        public function getAdditional()
        {
                return $this->additional;
        }

        /**
         * Set the value of additional
         */
        public function setAdditional($additional): self
        {
                $this->additional = $additional;

                return $this;
        }

        /**
         * Get the value of description_utilisateur
         */
        public function getDescriptionUtilisateur()
        {
                return $this->description_utilisateur;
        }

        /**
         * Set the value of description_utilisateur
         */
        public function setDescriptionUtilisateur($description_utilisateur): self
        {
                $this->description_utilisateur = $description_utilisateur;

                return $this;
        }

        /**
         * Get the value of link_fb
         */
        public function getLinkFb()
        {
                return $this->link_fb;
        }

        /**
         * Set the value of link_fb
         */
        public function setLinkFb($link_fb): self
        {
                $this->link_fb = $link_fb;

                return $this;
        }

        /**
         * Get the value of link_insta
         */
        public function getLinkInsta()
        {
                return $this->link_insta;
        }

        /**
         * Set the value of link_insta
         */
        public function setLinkInsta($link_insta): self
        {
                $this->link_insta = $link_insta;

                return $this;
        }

        /**
         * Get the value of link_x
         */
        public function getLinkX()
        {
                return $this->link_x;
        }

        /**
         * Set the value of link_x
         */
        public function setLinkX($link_x): self
        {
                $this->link_x = $link_x;

                return $this;
        }

        /**
         * Get the value of link_yout
         */
        public function getLinkYout()
        {
                return $this->link_yout;
        }

        /**
         * Set the value of link_yout
         */
        public function setLinkYout($link_yout): self
        {
                $this->link_yout = $link_yout;

                return $this;
        }

        /**
         * Get the value of job_utilisateur
         */
        public function getJobUtilisateur()
        {
                return $this->job_utilisateur;
        }

        /**
         * Set the value of job_utilisateur
         */
        public function setJobUtilisateur($job_utilisateur): self
        {
                $this->job_utilisateur = $job_utilisateur;

                return $this;
        }

        /**
         * Get the value of year_xperia_utilisateur
         */
        public function getYearXperiaUtilisateur()
        {
                return $this->year_xperia_utilisateur;
        }

        /**
         * Set the value of year_xperia_utilisateur
         */
        public function setYearXperiaUtilisateur($year_xperia_utilisateur): self
        {
                $this->year_xperia_utilisateur = $year_xperia_utilisateur;

                return $this;
        }

 

        /**
         * Get the value of address_utilisateur
         */
        public function getAddressUtilisateur()
        {
                return $this->address_utilisateur;
        }

        /**
         * Set the value of address_utilisateur
         */
        public function setAddressUtilisateur($address_utilisateur): self
        {
                $this->address_utilisateur = $address_utilisateur;

                return $this;
        }
    }