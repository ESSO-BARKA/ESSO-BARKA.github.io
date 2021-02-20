<?php 


session_start();
require_once('connexiondb.php');

$logine=isset($_POST['logine'])?$_POST['logine']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

$requete="select iduser,logine,email,roles,etat from utilisateur where logine='$logine' and pwd=MD5('$pwd')";
$resultat=$pdo->query($requete);

if($user=$resultat->fetch()){
    if($user['etat']==1){
        
        $_SESSION['user']=$user;
        header('location:../index.php');
    }
    else
    {
        $_SESSION['erreurLogin']="<strong>Veuillez Patienté Svp!!!</strong> Votre compte n'est pas encore activé. </br> 
        Veuillez contacter  l'administrateur.";
        header('location:login.php');
    }
}
else
{
        $_SESSION['erreurLogin']="<strong>Erreur!!!</strong> Nom  ou Mot de passe incorrect.";
        header('location:login.php');
}

?>