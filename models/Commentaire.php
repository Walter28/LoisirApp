<?php

    class Commentaire {
        private $id_utilisateur;
        private $id_activite;
        private $contenu;
        private $note;
        private $date_commentaire;

        public function __construct($id_utilisateur, $id_activite, $contenu, $note,  
                                    $date_commentaire)
        {
            $this->id_utilisateur = $id_utilisateur;
            $this->id_activite = $id_activite;
            $this->contenu = $contenu;
            $this->note = $note;
            $this->date_commentaire = $date_commentaire;
        }

        public function enregistrerCommentaire(){
                global $db;
                $resultat = false;

                $id_utilisateur = $this->id_utilisateur;
                $id_activite = $this->id_activite;
                $contenu = $this->contenu;
                $note = $this->note;
                $date_commentaire = $this->date_commentaire;

                $requete = "INSERT INTO commentaire(id_utilisateur, id_activite, contenu, note, date_commentaire) VALUES(?,?,?,?,?)";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_utilisateur, $id_activite, $contenu, $note, $date_commentaire));

                return $resultat = $execute ? true : false;
                
        }

        public function updateCommentaire($id_commentaire){
                global $db;
                $resultat = false;

                // var_dump($db);

                $id_utilisateur = $this->id_utilisateur;
                $id_activite = $this->id_activite;
                $contenu = $this->contenu;
                $note = $this->note;
                $date_commentaire = $this->date_commentaire;

                $requete = "UPDATE commentaire set id_utilisateur = ?, id_activite = ?, contenu = ? note = ?, date_commentaire = ? where id_commentaire = ?";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_utilisateur, $id_activite, $contenu, $note, $date_commentaire, $id_commentaire));

                return $resultat = $execute ? true : false;
        
        }

        static function deleteCommentaire($id_commentaire){
                global $db;
                $resultat = false;

                $requete = "DELETE FROM commentaire where id_commentaire = ? ";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_commentaire));

                return $resultat = $execute ? true : false;
                
        }

        static function deleteCommentaires(){
                global $db;
                $resultat = false;

                $requete = "DELETE FROM commentaire ";
                $statement = $db->prepare($requete);
                $execute=$statement->execute();

                return $resultat = $execute ? true : false;
                
        }

        public function getIdCommentaire() {
                global $db;
                $requete = 'SELECT id_commentaire FROM commentaire WHERE id_utilisateur = ? and id_activite = ? and date_commentaire ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($this->getIdUtilisateur(), $this->getIdActivite(), $this->getDateCommentaire()));

                if ($execute) {
                if($data = $statement -> fetch()){
                        $id = $data['id'];
                        return $id;
                } else return null;
                } else return null;
        }

        static function getCommentaireById($id_commentaire) {
                global $db;
                $requete = 'SELECT * FROM commentaire WHERE id_commentaire = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($id_commentaire));
                
                if ($execute) {
                if($data = $statement -> fetch()){
                        $commentaire = new Commentaire($data['id_utilisateur'], $data['id_activite'], $data['contenu'], $data['note'], $data['date_commentaire']);
                        return $commentaire;
                } else return null;
                } else return null;
        }

        static function getCommentaires() {
                global $db;
                $requete = 'SELECT * FROM commentaire ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute();

                $commentaires=[];

                if ($execute) {
                        while ($data = $statement -> fetch()) {
                                $commentaire = new Commentaire($data['id_utilisateur'], $data['id_activite'], $data['contenu'], $data['note'], $data['date_commentaire']);
                        array_push($commentaires,$commentaire);
                        }
                        return $commentaires;
                } else return [];
        }
        



        //++++++++++++++++++++++++++++++++++++++
        //
        // PHP GETTERS
        //
        //++++++++++++++++++++++++++++++++++++++


        /**
         * Get the value of id_utilisateur
         */
        public function getIdUtilisateur()
        {
                return $this->id_utilisateur;
        }

        /**
         * Get the value of id_activite
         */
        public function getIdActivite()
        {
                return $this->id_activite;
        }

        /**
         * Get the value of contenu
         */
        public function getContenu()
        {
                return $this->contenu;
        }

        /**
         * Get the value of note
         */
        public function getNote()
        {
                return $this->note;
        }

        /**
         * Get the value of date_commentaire
         */
        public function getDateCommentaire()
        {
                return $this->date_commentaire;
        }



        //++++++++++++++++++++++++++++++++++++++
        //
        // PHP SETTERS
        //
        //++++++++++++++++++++++++++++++++++++++

        /**
         * Set the value of id_utilisateur
         */
        public function setIdUtilisateur($id_utilisateur): self
        {
                $this->id_utilisateur = $id_utilisateur;

                return $this;
        }

        /**
         * Set the value of id_activite
         */
        public function setIdActivite($id_activite): self
        {
                $this->id_activite = $id_activite;

                return $this;
        }

        /**
         * Set the value of contenu
         */
        public function setContenu($contenu): self
        {
                $this->contenu = $contenu;

                return $this;
        }

        /**
         * Set the value of note
         */
        public function setNote($note): self
        {
                $this->note = $note;

                return $this;
        }

        /**
         * Set the value of date_commentaire
         */
        public function setDateCommentaire($date_commentaire): self
        {
                $this->date_commentaire = $date_commentaire;

                return $this;
        }
    }