<?php

require_once('identifier.php');

require_once('connexiondb.php');

$iduser = $_SESSION['user']['iduser'];

$oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";

$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";



$requete ="select * from  utilisateur where iduser=$iduser  and  pwd= MD5('$oldpwd') ";

$resultat =$pdo ->prepare($requete);

$resultat -> execute();



$msg = "";

$interval = 3;
$url = "login.php";


if($resultat->fetch())  {

    $requete= "update utilisateur set  pwd=MD5(?) where iduser=? ";
    $params= array($newpwd,$iduser);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    $msg=  "<div class = 'alert alert-success' >
                <strong> Félicitation !!!</strong> votre mot de passe est modifié avec succès.
            </div>";
}
else
    { 
        $msg="<div class = 'alert alert-danger' >
                    <strong> Erreur !!!</strong> l'ancien mot de passe est incorrect..
                </div>";
        $url = $_SERVER['HTTP_REFERER'];
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Changement de mot de passe</title>
</head>
<body>
    <div class="container">
        <br><br>
        <?php

            echo $msg ;
            header("refresh:$interval; url=$url");

        ?>
    </div>
</body>
</html>

