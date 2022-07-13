<?php
    // Il est préférable de créer un fichier pour chaque classe qu'on construit, cela nous évite d'avoir un fichier volumineux (50 classes et 1532 lignes dans le même fichier) et de perdre le temps précieux pour faire une seule action.

    class Compte
    // On crée une classe "Compte" avec le même nom que le fichier ( !! Le fichier avec la première lettre en majuscule est considéré comme un fichier qui contient seulement la classe !!).
    {
        private string    $libelleCompte;
        private int       $soldeCompte;
        private string    $deviseCompte;
        private Titulaire $titulaire;

        public function __construct(Titulaire $titulaire, string $libelle_compte, int $solde_compte, string $devise_compte)
        {
            $this->libelleCompte = $libelle_compte;
            $this->soldeCompte = $solde_compte;
            $this->deviseCompte = $devise_compte;
            $titulaire->ajouterCompte($this);
            
        }

        public function credit(int $nbCredit)
        // Créditer un compte bancaire signifie y déposer de l'argent.
        {
            $creditCompte = $this->soldeCompte + $nbCredit;
            return "Vous avez crédité ".$nbCredit." ".$this->deviseCompte.
            "<br> Votre solde est désormais de ".$creditCompte." ".$this->deviseCompte;
        }

        public function debit($nbDebit)
        // Débiter un compte en banque, c'est retirer de l'argent sur un compte, qu'il s'agisse d'un chèque, d'un achat en ligne, d'un retrait de billets dans un distributeur, d'un virement, d'un règlement par carte bancaire ou d'agios.
        {
            $debitCompte = $this->soldeCompte - $nbDebit;
            return "Vous avez débité ".$nbDebit." ".$this->deviseCompte.
            "<br> Votre solde est désormais de ".$debitCompte." ".$this->deviseCompte;
        }

        public function virement(Compte $compte, int $nbVirement)
        {
            $retirement = $compte->soldeCompte - $nbVirement;
            $ajout = $this->soldeCompte + $nbVirement;
            return "Vous avez effectué un virement de ".$nbVirement." ".$this->deviseCompte.
            " au compte '".$this->libelleCompte."' à partir de ".$compte.
            "<br> Le solde du compte '".$this->libelleCompte."' est de ".$ajout." ".$this->deviseCompte.
            "<br> le solde du compte '".$compte."' est de ".$retirement." ".$this->deviseCompte;
        }

        public function __toString()
        {

            return "<br> Libellé du compte : ".$this->libelleCompte.
                    "<br> Solde actuel : ".$this->soldeCompte." (en ".$this->deviseCompte.")<br>";

        }

    }





?>