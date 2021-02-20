<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>pageblanche</title>
</head>
<body>
    <?php include("menu.php"); ?>

    <div class="container">  
    <div class="panel panel-success margintop">
            <div class="panel-heading">Rechercher des filières....</div>
                <div class="panel-body">
                    Le continu du panel
                </div>
        </div>
        <div class="panel panel-primary margintop">
            <div class="panel-heading">Liste des filières</div>
                <div class="panel-body">
                    Le Tableau des filières
                </div>
        </div>
    </div>
    
    
</body>
</html>

<div>
                            <ul class="pagination">
                                <?php for($i=1;$i<=$nbrpage;$i++){ ?>
                                    <li class="<?php if($i==$page) echo 'active' ?>">
                                        <a href="filieres.php?page=<?php echo $i; ?>
                                        &nomF=<?php echo $nomf ?>
                                         &niveau=<?php echo $niveau ?>" >
                                            <?php echo $i; ?>   
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                    </div>
                    &nomF=<?php echo $nomf ?>
                                            &niveau=<?php echo $niveau ?>" >



                <div class="panel-body">
                    <form method="get" action="stagiaires.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomprenom" 
                            placeholder="Nom et Prénom"
                            class="form-control"
                            value ="<?php echo $nomprenom?>">                           
                         </div>
                        <label for="filiere">Filière</label>
                        <select name="filiere" class="form-control" id="filiere"
                           onchange="this.form.submit()">
                            <option value= 0> Toutes les filières</option>
                            <?php while($filiere=$resulatStagiaire->fetch())  { ?>
                                <option value=" <?php echo $filiere['idFiliere'] ?>"> 
                                        <?php echo $filiere['nomFiliere'] ?>
                                </option>                            
                            <?php }  ?>
                        </select>
                        <button class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Rechercher
                        </button>
                            &nbsp &nbsp;
                        <a href="nouvelleStagieres.php"><span class="glyphicon glyphicon-plus"></span>Nouveau Stagiaire</a>
                    </form>
                </div>



                <select name="idfiliere" class="form-control" id="idfiliere"
                            onchange="this.form.submit()">
                            <option value= 0 > Toutes les filières</option>
                            <?php   { ?>
                                    <option value=" <?php echo $idfiliere['nomFiliere'] ?>">                              
                                    <?php echo $idfiliere['nomFiliere'] ?>
                            </option>                            
                                <?php while($idfiliere= $resulatStagiaire->fetch() )  }  ?>
                        </select>




                        <?php 

session_start();
require_once('connexiondb.php');

$idlogine=isset($_POST['logine'])?$_POST['logine']:"";
$idpwd=isset($_POST['pwd'])?$_POST['pwd']:"";

$requete="select * from utilisateur where logine='$logine' and pwd=MD5('$pwd')";
$resultat=$pdo-> query($requete);

if($user=$resultat-> fetch()){
    if($user['etat']==1) {
        
        $_SESSION['user']=$user;
        header('location:../index.php');
    }
    else
    {
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Votre compte est desactivé. </br> 
        veuillez contacter  l'administrateur";
        header('location:login.php');
    }
}
else
{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou Mot de passe incorrect!!!!";
        header('location:login.php')
}


if(rechercher_par_login($logine)==0  && rechercher_par_email($email)==0){
    $requete =$pdo -> prepare("INSERT INTO  utilisateur(logine,email,pwd,roles,etat)
    VALUES (:plogine,:pemail,:ppwd,:proles,petat)");

    $requete -> execute(array(
                            'plogine'   => $logine,
                            'pemail'    => $email,
                            'ppwd'      => md5($pwd1),
                            'proles'    =>'VISITEUR',
                            'petat'      =>0,
                             ));
    $success_smg=" Félicitation, votre compte est bien crée, mais temporairement inactif jusqu'à l'activation de l'administrateur. ";
}else{

    if(rechercher_par_login($logine)> 0){
        $validationErrors[]="Désolé!!! ce Nom existe déja";
    }
     if(rechercher_par_email($email)> 0){
        $validationErrors[]="Désolé!!! ce Email existe déja";
    }
}
?>

glyphicon glyphicon-log-out