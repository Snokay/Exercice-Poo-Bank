<?php

class Account {
    private string $libelle;
    private float $solde;
    private string $devise;
    private Titulaire $titulaire;

    //function __construct is the constructor used for create a new object
    public function __construct(string $libelle, float $solde, string $devise, Titulaire $titulaire){
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->addAccount($this);
    }

    //function credit is used for credit money in the account and converts the money if necessary
    public function credit($newValue, $devise){
        if ($devise == "€" && $this->devise == "$"){
            //1,09$
            $convert = $newValue/1.09;
            $this->solde += $convert;
        }elseif ($devise == "$" && $this->devise == "€"){
            //0,92€
            $convert = $newValue/0.92;
            $this->solde += $convert;
        }elseif ($devise == $this->devise){
            $this->solde += $newValue;
        }
    }

    //function debit is used for credit money in the account
    public function debit($debitValue){
        $this->solde -= $debitValue;
    }

    //function getName is used for return the full name of a titulaire
    public function getName(){
        $fullName = $this->titulaire->getFullName();
        return $fullName;
    }

    //function getSolde is used fot return the solde of the account
    public function getSolde(){
        return $this->solde;
    }

    //function virement is used for make a transfer between two accounts
    public function virement($compteDestinataire, $montant) {
        if ($this->solde >= $montant) {
            $this->debit($montant);
            $compteDestinataire->credit($montant, $this->devise);
            echo "Le $this->libelle de " . $this->getName() . " a fait un virement au compte bancaire " . $compteDestinataire->getName() . " de $montant $this->devise <br>";
        }
    }

    //function getInformation is used for return all the infomation we need
    public function getInformation(){
        $name = $this->getName();
        echo "Le $this->libelle de $name a actuellement en solde : $this->solde $this->devise";
    }

    //function __toString is a magic function used for return all the value in string
    public function __toString(){
        $name = $this->getName();
        return "$this->libelle de $name avec la somme actuel de " . number_format($this->solde, 2, ',', ' ') . $this->devise;
    }
}