

<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<?php

spl_autoload_register(function ($class_name) {
    require_once './classfolder/' . $class_name . '.php';
});

$Titulaire1 = new Titulaire("BOESCH", "Jean-Marie", "2003-05-18", "Wittenheim");
$T1Account1 = new Account("Compte courant", 1500.24, "€", $Titulaire1);
$T1Account2 = new Account("Livret A", 120000000, "€", $Titulaire1);

$Titulaire2 = new Titulaire("GUTKNECHT", "Nicolas", "2003-05-18", "Wittenheim");
$T2Account1 = new Account("Compte courant", 1500000, "$", $Titulaire2);
$T2Account2 = new Account("Livret A", 0, "$", $Titulaire2);

$T1Account1->credit(150.56, "€");
$T1Account1->debit(140.54);

$Titulaire1->getInformation();
echo "<br>";
$Titulaire2->getInformation();
echo "<br>";

$T1Account2->virement($T2Account2, 100000000);
echo "<br>";

$Titulaire1->getInformation();
echo "<br>";
$Titulaire2->getInformation();

//Une class: est un moule qui regroupe des fonctions et des propriétés
//et qui permet de créer un nouvelle object

//Un object: est une instance de class

//Une méthode magique: est une function qui se lance automatiquement quand on fait une action précise

//Une encapsulation: c'est un principe de développement de classe qui consiste à protéger l'état des attributs 
//et à imposer de passer par des méthodes pour modifier les valeurs des attributs

//Les 4 principes de la poo:

//- L'encapsulation: Une encapsulation: c'est un principe de développement de classe qui consiste à protéger l'état des attributs 
//et à imposer de passer par des méthodes pour modifier les valeurs des attributs

//- L'abstraction :Son objectif principal est de gérer la complexité en masquant les détails inutiles à l’utilisateur. Cela permet 
//à l’utilisateur d’implémenter une logique plus complexe sans comprendre ni même penser à toute la complexité cachée.

//- L'héritage: l’héritage est un mécanisme qui permet, lors de la déclaration d’une nouvelle classe, d'y inclure les caractéristiques d’une autre classe.

//- Le polymorphisme: est l'idée d'autoriser le même code à être utilisé avec différents types, ce qui permet des implémentations plus abstraites et générales.

?>