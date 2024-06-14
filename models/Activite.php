<?php

    class Activite {
        private $id_utilisateur;
        private $titre_activite;
        private $domaine_activite;
        private $lieu_activite;
        private $description_activite;
        private $prix_activite;
        private $date_creation_activite;
        private $date_activite;
        private $heure;
        private $affiche_activite;
        private $photo1;
        private $photo2;
        private $photo3;
        private $a_payer_publicite;
        private $date_sponsored;

        public function __construct($id_utilisateur, $titre_activite, $domaine_activite, $lieu_activite, $description_activite, $prix_activite, $date_creation_activite, 
                                    $date_activite, $heure, $affiche_activite, $photo1, $photo2, $photo3, $a_payer_publicite, $date_sponsored)
        {
                
            $this->id_utilisateur = $id_utilisateur;
            $this->titre_activite = $titre_activite;
            $this->domaine_activite = $domaine_activite;
            $this->lieu_activite = $lieu_activite;
            $this->description_activite = $description_activite;
            $this->prix_activite = $prix_activite;
            $this->date_creation_activite = $date_creation_activite;
            $this->date_activite = $date_activite;
            $this->heure = $heure;
            $this->affiche_activite = $affiche_activite;
            $this->photo1 = $photo1;
            $this->photo2 = $photo2;
            $this->photo3 = $photo3;
            $this->a_payer_publicite = $a_payer_publicite;
            $this->date_sponsored = $date_sponsored;
        }

        public function enregistrerActivite(){
            global $db;
            $resultat = false;

            $id_utilisateur = $this->id_utilisateur;
            $titre_activite = $this->titre_activite;
            $domaine_activite = $this->domaine_activite;
            $lieu_activite = $this->lieu_activite;
            $description_activite = $this->description_activite;
            $prix_activite = $this->prix_activite;
            $date_creation_activite = $this->date_creation_activite ;
            $date_activite = $this->date_activite;
            $heure = $this->heure;
            $affiche_activite = $this->affiche_activite;
            $photo1 = $this->photo1;
            $photo2 = $this->photo2;
            $photo3 = $this->photo3;
            $a_payer_publicite = $this->a_payer_publicite;
            $date_sponsored = $this->date_sponsored;

            $requete = "INSERT INTO activite(id_utilisateur, titre_activite, domaine_activite, lieu_activite, description_activite, prix_activite, date_creation_activite,
            date_activite, heure, affiche_activite, photo1, photo2, photo3, a_payer_publicite, date_sponsored) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $statement = $db->prepare($requete);
            $execute=$statement->execute(array($id_utilisateur, $titre_activite, $domaine_activite, $lieu_activite, $description_activite, $prix_activite, 
            date('Y-m-d'), $date_activite, $heure, $affiche_activite, $photo1, $photo2, $photo3, $a_payer_publicite, $date_sponsored));


            $status_compte = "proprietaire";
            $requete2 = "UPDATE utilisateur set status_compte = ? where id_utilisateur = ?";
            $statement2 = $db->prepare($requete2);
            $execute2=$statement2->execute(array($status_compte, $id_utilisateur));


            return $resultat = $execute ? true : false;
            
        }

        public function updateActivite($id_activite){
            global $db;
            $resultat = false;

            // var_dump($db);

            $id_utilisateur = $this->id_utilisateur;
            $titre_activite = $this->titre_activite;
            $domaine_activite = $this->domaine_activite;
            $lieu_activite = $this->lieu_activite;
            $description_activite = $this->description_activite;
            $prix_activite = $this->prix_activite;
            $date_creation_activite = $this->date_creation_activite ;
            $date_activite = $this->date_activite;
            $heure = $this->heure;
            $affiche_activite = $this->affiche_activite;
            $photo1 = $this->photo1;
            $photo2 = $this->photo2;
            $photo3 = $this->photo3;
            $a_payer_publicite = $this->a_payer_publicite;
            $date_sponsored = $this->date_sponsored;

            $requete = "UPDATE activite set id_utilisateur = ?, titre_activite = ?, domaine_activite = ?, lieu_activite = ? description_activite = ?, prix_activite = ?, 
            date_creation_activite = ?, date_activite = ?, heure = ?, affiche_activite = ?, photo1 = ?, photo2 = ?, photo3 = ?, a_payer_publicite = ?, date_sponsored = ? where id_activite = ?";
            $statement = $db->prepare($requete);
            $execute=$statement->execute(array($id_utilisateur, $titre_activite, $domaine_activite, $lieu_activite, $description_activite, $prix_activite, 
            $date_creation_activite, $date_activite, $heure, $affiche_activite, $photo1, $photo2, $photo3, $a_payer_publicite, $date_sponsored));

            return $resultat = $execute ? true : false;
            
        }

        static function deleteActivite($id_activite){
                global $db;
                $resultat = false;

                $requete = "DELETE FROM activite where id_activite = ? ";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_activite));

                return $resultat = $execute ? true : false;
                
        }

        public function getIdActivite() {
                global $db;
                $requete = 'SELECT id_activite FROM activite WHERE titre_activite = ? and date_creation_activite = ? and date_activite = ? and domaine_activite = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($this->getTitreActivite(), $this->getDateCreationActivite(), $this->getDateActivite(), $this->getDomaineActivite()));

                if ($execute) {
                    if($data = $statement -> fetch()){
                        $id = $data['id_activite'];
                        return $id;
                    } else return null;
                } else return null;
        }

        static function getActiviteById($id_activite) {
                global $db;
                $requete = 'SELECT * FROM activite WHERE id_activite = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($id_activite));
                
                if ($execute) {
                    if($data = $statement -> fetch()){
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                        return $activite;
                    } else return null;
                } else return null;
        }

        static function getActivites() {
            global $db;
            $requete = 'SELECT * FROM activite ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute();

            $activites=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                    array_push($activites,$activite);
                    }
                    return $activites;
            } else return [];
        }

        static function getActivitesEnCour() {
            global $db;
            $current_date = date('Y-m-d');
            $requete = 'SELECT * FROM activite WHERE date_activite >= '.$current_date.' ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute();

            $activites=[];

            if ($execute) {
                while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                array_push($activites,$activite);
                }
                return $activites;
            } else return [];
        }

        static function getSponsoredActivite() {
                global $db;
                $requete = 'SELECT * FROM activite where a_payer_publicite = 1 ORDER BY date_sponsored ASC LIMIT 1';
                $statement = $db->prepare($requete);
                $execute = $statement->execute();
    
                $activites=[];
    
                if ($execute) {
                        while ($data = $statement -> fetch()) {
                            $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                            $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                            $data['a_payer_publicite'], $data['date_sponsored']);
                        array_push($activites, $activite);
                        }
                        return $activites;
                } else return [];
            }
        
        static function getSponsoredActivites() {
            global $db;
            $requete = 'SELECT * FROM activite where a_payer_publicite = 1 ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute();

            $activites=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                    array_push($activites, $activite);
                    }
                    return $activites;
            } else return [];
        }

        static function getRecenteActivites() {
            global $db;
            $requete = 'SELECT * FROM activite ORDER BY date_creation_activite DESC LIMIT 3 ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute();

            $activites=[];

            if ($execute) {
                while ($data = $statement -> fetch()) {
                    $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                    $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                    $data['a_payer_publicite'], $data['date_sponsored']);
                    array_push($activites, $activite);
                }
                return $activites;
           } else return [];
        }

        static function getActivitesSport() {
            global $db;
            $domaine_activite = "sport";
            $requete = 'SELECT * FROM activite where domaine_activite = ? ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute(array($domaine_activite));

            $activites=[];
            
            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                        array_push($activites, $activite);
                    }
                    return $activites;
            } else return [];
        }

        static function getActivitesReligion() {
            global $db;
            $domaine_activite = "religion";
            $requete = 'SELECT * FROM activite where domaine_activite = ? ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute(array($domaine_activite));

            $activites=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                        array_push($activites, $activite);
                    }
                    return $activites;
            } else return [];
        }

        static function getActivitesChill() {
            global $db;
            $domaine_activite = "chill";
            $requete = 'SELECT * FROM activite where domaine_activite = ? ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute(array($domaine_activite));

            $activites=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                        array_push($activites, $activite);
                    }
                    return $activites;
            } else return [];
        }

        static function getActivitesTourisme() {
            global $db;
            $domaine_activite = "tourisme";
            $requete = 'SELECT * FROM activite where domaine_activite = ? ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute(array($domaine_activite));

            $activites=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                        array_push($activites, $activite);
                    }
                    return $activites;
            } else return [];
        }

        static function getActivitesCulture() {
            global $db;
            $domaine_activite = "culture";
            $requete = 'SELECT * FROM activite where domaine_activite = ? ';
            $statement = $db->prepare($requete);
            $execute = $statement->execute(array($domaine_activite));

            $activites=[];

            if ($execute) {
                    while ($data = $statement -> fetch()) {
                        $activite = new Activite($data['id_utilisateur'], $data['titre_activite'], $data['domaine_activite'], $data['lieu_activite'], $data['description_activite'], $data['prix_activite'], 
                        $data['date_creation_activite'], $data['date_activite'], $data['heure'], $data['affiche_activite'], $data['photo1'], $data['photo2'], $data['photo3'], 
                        $data['a_payer_publicite'], $data['date_sponsored']);
                        array_push($activites, $activite);
                    }
                    return $activites;
            } else return [];
        }



        
        //++++++++++++++++++++++++++++++++++++++
        //
        // PHP GETTERS
        //
        //++++++++++++++++++++++++++++++++++++++


        /**
         * Get the value of titre_activite
         */
        public function getTitreActivite()
        {
                return $this->titre_activite;
        }
        

        /**
         * Get the value of description_activite
         */
        public function getDescriptionActivite()
        {
                return $this->description_activite;
        }
        

        /**
         * Get the value of prix_activite
         */
        public function getPrixActivite()
        {
                return $this->prix_activite;
        }
        

        /**
         * Get the value of date_creation_activite
         */
        public function getDateCreationActivite()
        {
                return $this->date_creation_activite;
        }
        

        /**
         * Get the value of date_activite
         */
        public function getDateActivite()
        {
                return $this->date_activite;
        }


        /**
         * Get the value of photo1
         */
        public function getPhoto1()
        {
                return $this->photo1;
        }
        

        /**
         * Get the value of affiche_activite
         */
        public function getAfficheActivite()
        {
                return $this->affiche_activite;
        }

        /**
         * Get the value of domaine_activite
         */
        public function getDomaineActivite()
        {
                return $this->domaine_activite;
        }

        
        /**
         * Get the value of a_payer_publicite
         */
        public function getAPayerPublicite()
        {
                return $this->a_payer_publicite;
        }

        /**
         * Get the value of lieu_activite
         */
        public function getLieuActivite()
        {
                return $this->lieu_activite;
        }

        /**
         * Get the value of heure
         */
        public function getHeure()
        {
                return $this->heure;
        }

        /**
         * Get the value of photo2
         */
        public function getPhoto2()
        {
                return $this->photo2;
        }

        /**
         * Get the value of photo3
         */
        public function getPhoto3()
        {
                return $this->photo3;
        }
        
        /**
         * Get the value of id_utilisateur
         */
        public function getIdUtilisateur()
        {
                return $this->id_utilisateur;
        }

        /**
         * Get the value of date_sponsored
         */
        public function getDateSponsored()
        {
                return $this->date_sponsored;
        }
        



        //++++++++++++++++++++++++++++++++++++++
        //
        // PHP SETTERS
        //
        //++++++++++++++++++++++++++++++++++++++
        

        /**
         * Set the value of titre_activite
         */
        public function setTitreActivite($titre_activite): self
        {
                $this->titre_activite = $titre_activite;

                return $this;
        }
        

        /**
         * Set the value of description_activite
         */
        public function setDescriptionActivite($description_activite): self
        {
                $this->description_activite = $description_activite;

                return $this;
        }
        

        /**
         * Set the value of prix_activite
         */
        public function setPrixActivite($prix_activite): self
        {
                $this->prix_activite = $prix_activite;

                return $this;
        }
        

        /**
         * Set the value of date_creation_activite
         */
        public function setDateCreationActivite($date_creation_activite): self
        {
                $this->date_creation_activite = $date_creation_activite;

                return $this;
        }
        

        /**
         * Set the value of date_activite
         */
        public function setDateActivite($date_activite): self
        {
                $this->date_activite = $date_activite;

                return $this;
        }
        

        /**
         * Set the value of photo1
         */
        public function setPhoto1($photo1): self
        {
                $this->photo1 = $photo1;

                return $this;
        }
        

        /**
         * Set the value of affiche_activite
         */
        public function setAfficheActivite($affiche_activite): self
        {
                $this->affiche_activite = $affiche_activite;

                return $this;
        }

        /**
         * Set the value of domaine_activite
         */
        public function setDomaineActivite($domaine_activite): self
        {
                $this->domaine_activite = $domaine_activite;

                return $this;
        }

        /**
         * Set the value of a_payer_publicite
         */
        public function setAPayerPublicite($a_payer_publicite): self
        {
                $this->a_payer_publicite = $a_payer_publicite;

                return $this;
        }

        /**
         * Set the value of lieu_activite
         */
        public function setLieuActivite($lieu_activite): self
        {
                $this->lieu_activite = $lieu_activite;

                return $this;
        }

        /**
         * Set the value of heure
         */
        public function setHeure($heure): self
        {
                $this->heure = $heure;

                return $this;
        }

        /**
         * Set the value of photo2
         */
        public function setPhoto2($photo2): self
        {
                $this->photo2 = $photo2;

                return $this;
        }

        /**
         * Set the value of photo3
         */
        public function setPhoto3($photo3): self
        {
                $this->photo3 = $photo3;

                return $this;
        }

        /**
         * Set the value of id_utilisateur
         */
        public function setIdUtilisateur($id_utilisateur): self
        {
                $this->id_utilisateur = $id_utilisateur;

                return $this;
        }

        /**
         * Set the value of date_sponsored
         */
        public function setDateSponsored($date_sponsored): self
        {
                $this->date_sponsored = $date_sponsored;

                return $this;
        }
    }
