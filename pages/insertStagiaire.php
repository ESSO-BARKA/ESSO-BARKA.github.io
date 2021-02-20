<?php 

require_once("identifier.php");
require_once('connexiondb.php');


$nom=isset($_POST['nom'])?strtoupper($_POST['nom']):"";
$prenom=isset($_POST['prenom'])?strtoupper($_POST['prenom']):"";
$civilite=isset($_POST['civilite'])?strtoupper($_POST['civilite']):"F";
$idFiliere=isset($_POST['idFiliere'])?strtoupper($_POST['idFiliere']):1;

$nomphoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
$imageTemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp,"../images/".$nomphoto);


$requete ="insert into  stagiaire(nom,prenom,civilite,idFiliere,photo) values(?,?,?,?,?)";
$params= array($nom,$prenom,$civilite,$idFiliere,$nomphoto);

$resultat=$pdo->prepare($requete);
$resultat-> execute($params);

header('location:stagiaires.php');


?>