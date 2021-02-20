<?php
try{
    $pdo= new PDO("mysql:host=localhost;dbname=gestion_stag","root","root");

} catch(Exeption $e) {

    die('Erreur de connexion :' .$e ->getMessage());

}

?>