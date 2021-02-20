<?php 


session_start();
if(isset($_SESSION['user'])){
    require_once('connexiondb.php');
    $iduser=isset($_GET['iduser'])?$_GET['iduser'] : 0;


    $requete="delete from utilisateur where iduser=?";
    $params= array($iduser);
    $resultat=$pdo->prepare($requete);
    $resultat-> execute($params);
    header('location:utilisateurs.php');
}else{
    header('location:login.php');
}
?>