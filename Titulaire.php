<?php

    class Titulaire
    {

        private string $nomTitulaire;
        private string $prenomTitulaire;
        private        $dateNaissance;
        private string $lieuTitulaire;
        private array  $comptesTitulaire;

        public function __construct(string $nom_titulaire, string $prenom_titulaire, $date, string $lieu_titulaire)
        {
            $this->nomTitulaire     = $nom_titulaire;
            $this->prenomTitulaire  = $prenom_titulaire;
            $this->dateNaissance    = new DateTime($date);
            $this->lieuTitulaire    = $lieu_titulaire;
            $this->comptesTitulaire = [];
        }
        
        public function __toString()
        {
            return "Prénom du titulaire : ".$this->prenomTitulaire.
                    "<br>Num du titulaire : ".$this->nomTitulaire.
                    "<br>Lieu d'habitation : ".$this->lieuTitulaire.
                    "<br>Age du titulaire : ".$this->obtenirAge()."<br>";

        }

        public function ajouterCompte(Compte $compte)
        {
            $this->comptesTitulaire[] = $compte;
        }

        public function afficherComptes()
        {
            foreach($this->comptesTitulaire as $compte)
            {
                echo $compte;
            }
        }

        public function obtenirAge()
        {

            $dateAujourdhui = new DateTime();
            $differenceAge = $this->dateNaissance->diff($dateAujourdhui);
            return $differenceAge->y." ans";

        }


    }

?>