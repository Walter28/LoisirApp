<?php

    class Reservation {
        private $id_utilisateur;
        private $id_activite;
        private $date_reservation;
        private $status_reservation;

        public function __construct($id_utilisateur, $id_activite, $date_reservation, $status_reservation)
        {
            $this->id_utilisateur = $id_utilisateur;
            $this->id_activite = $id_activite;
            $this->date_reservation = $date_reservation;
            $this->status_reservation = $status_reservation;
        }

        
        public function enregistrerReservation(){
                global $db;
                $resultat = false;

                $id_utilisateur = $this->id_utilisateur;
                $id_activite = $this->id_activite;
                $date_reservation = $this->date_reservation;
                $status_reservation = $this->status_reservation;

                $requete = "INSERT INTO reservation(id_utilisateur, id_activite, date_reservation, status_reservation) VALUES(?,?,?,?)";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_utilisateur, $id_activite, $date_reservation, $status_reservation));

                return $resultat = $execute ? true : false;
                
        }

        public function updateReservation($id_reservation){
                global $db;
                $resultat = false;

                $id_utilisateur = $this->id_utilisateur;
                $id_activite = $this->id_activite;
                $date_reservation = $this->date_reservation;
                $status_reservation = $this->status_reservation;

                $requete = "UPDATE reservation set id_utilisateur = ?, id_activite = ?, date_reservation  = ?, status_reservation = ? where id_reservation = ?";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_utilisateur, $id_activite, $date_reservation, $status_reservation, $id_reservation));

                return $resultat = $execute ? true : false;
        
        }

        static function deleteReservation($id_reservation){
                global $db;
                $resultat = false;

                $requete = "DELETE FROM reservation where id_reservation = ? ";
                $statement = $db->prepare($requete);
                $execute=$statement->execute(array($id_reservation));

                return $resultat = $execute ? true : false;
                
        }

        static function deleteRervations(){
                global $db;
                $resultat = false;

                $requete = "DELETE FROM reservation ";
                $statement = $db->prepare($requete);
                $execute=$statement->execute();

                return $resultat = $execute ? true : false;
                
        }

        public function getIdReservation() {
                global $db;
                $requete = 'SELECT id_reservation FROM reservation WHERE id_utilisateur = ? and id_activite = ? and date_reservation ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($this->getIdUtilisateur(), $this->getIdActivite(), $this->getDateReservation()));

                if ($execute) {
                if($data = $statement -> fetch()){
                        $id = $data['id'];
                        return $id;
                } else return null;
                } else return null;
        }

        static function getReservationById($id_reservation) {
                global $db;
                $requete = 'SELECT * FROM reservation WHERE id_reservation = ? ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute(array($id_reservation));
                
                if ($execute) {
                if($data = $statement -> fetch()){
                        $reservation = new Reservation($data['id_utilisateur'], $data['id_activite'], $data['date_reservation'], $data['status_reservation']);
                        return $reservation;
                } else return null;
                } else return null;
        }

        static function getReservations() {
                global $db;
                $requete = 'SELECT * FROM reservation ';
                $statement = $db->prepare($requete);
                $execute = $statement->execute();

                $reservations=[];

                if ($execute) {
                        while ($data = $statement -> fetch()) {
                                $reservation = new Reservation($data['id_utilisateur'], $data['id_activite'], $data['date_reservation'], $data['status_reservation']);
                        array_push($reservations,$reservation);
                        }
                        return $reservations;
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
         * Get the value of date_reservation
         */
        public function getDateReservation()
        {
                return $this->date_reservation;
        }

        /**
         * Get the value of status_reservation
         */
        public function getStatusReservation()
        {
                return $this->status_reservation;
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
         * Set the value of date_reservation
         */
        public function setDateReservation($date_reservation): self
        {
                $this->date_reservation = $date_reservation;

                return $this;
        }

        /**
         * Set the value of status_reservation
         */
        public function setStatusReservation($status_reservation): self
        {
                $this->status_reservation = $status_reservation;

                return $this;
        }
        
    }