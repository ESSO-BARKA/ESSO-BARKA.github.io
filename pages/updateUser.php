<?php 

require_once("identifier.php");
require_once('connexiondb.php');

$iduser=isset($_POST['iduser'])?$_POST['iduser']:0;
$logine=isset($_POST['logine'])?($_POST['logine']):"";
$email=isset($_POST['email'])?($_POST['email']):"";
$roles=isset($_POST['roles'])?strtoupper($_POST['roles']):"VISITEUR";

$requete ="update  utilisateur set logine=? , email=?,roles=? where iduser=?";
$params= array($logine,$email,$roles,$iduser);

$resultat=$pdo->prepare($requete);
$resultat-> execute($params);

header('location:utilisateurs.php');


?>