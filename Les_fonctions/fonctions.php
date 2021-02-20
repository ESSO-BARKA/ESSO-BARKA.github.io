<?php

function rechercher_par_login($logine){
global $pdo;
$requete=$pdo->prepare("select * from utilisateur where logine=?");
$requete->execute(array($logine));
return $requete->rowCount();
}

function rechercher_par_email($email){
    global $pdo;
    $requete=$pdo->prepare("select * from utilisateur where email=?");
    $requete->execute(array($email));
    return $requete->rowCount();
    }

?>