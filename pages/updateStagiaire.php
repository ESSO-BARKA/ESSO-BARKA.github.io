<?php 

require_once("identifier.php");
require_once('connexiondb.php');

$ids=isset($_POST['idS'])?$_POST['idS']:0;
$nom=isset($_POST['nom'])?strtoupper($_POST['nom']):"";
$prenom=isset($_POST['prenom'])?strtoupper($_POST['prenom']):"";
$civilite=isset($_POST['civilite'])?strtoupper($_POST['civilite']):"M";
$idFiliere=isset($_POST['idFiliere'])?strtoupper($_POST['idFiliere']):1;


$nomphoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
$imageTemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp,"../images/".$nomphoto);

if(!empty($nomphoto)) {
    $requete ="update stagiaire set nom=?,prenom=?,civilite=?,photo=? where idStagiaire=?";
    $params= array($nom,$prenom,$civilite,$nomphoto,$ids);
} else
{
    $requete ="update stagiaire set  nom=? , prenom=?,civilite=? where idStagiaire=?";
    $params= array($nom,$prenom,$civilite,$ids);
}
$resultat=$pdo->prepare($requete);
$resultat-> execute($params);

header('location:stagiaires.php');


?>