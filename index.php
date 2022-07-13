<?php

    require "Titulaire.php";
    require "Compte.php";

    $titulaire1 = new Titulaire("Braus", "Sasha", "1998-05-08", "Strasbourg");
    $compte1 = new Compte($titulaire1, "compte courant", 516, "€");
    $compte2 = new Compte($titulaire1, "livret A", 230, "€");

    // var_dump($titulaire1);
    echo $titulaire1;
    $titulaire1->afficherComptes();
    echo "<br>";
    echo $compte1->debit(363);
    echo "<br>";
    echo $compte2->credit(123);
    echo "<br>";
    echo $compte1->virement($compte2, 123);
    
?>