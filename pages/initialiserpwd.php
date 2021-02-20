<?php

require_once('connexiondb.php');
require_once('../Les_fonctions/fonctions.php');


if(isset($_POST['email']))
    $email=$_POST['email'];
    
    else
    $email="";
  

    $user=rechercher_par_email($email);


        if($user !=null){ 
            $id= $user['iduser'];
            $requete=$pdo->prepare("update utilisateur set pwd=MD5('0000') where iduser=$id");

            $requete->execute();

            $to=$email;

            $objet="Initialisation de mot de passe";

            $content="Votre nouveau mot de passe est 0000 ; veuillez le modifier pour votre prochaine connexion!!!";

            $entete="From: App Gestion stagiaire" ."/n". "cc: essossolim.barka@gmail.com";

            $email($to,$objet,$content,$entete);
        }
        else
        {
            
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
    <title>Se connecter</title>
</head>
        <body>
            
            

                </div>
                <div class="container col-lg-4 col-lg-offset-4 col-md-6">
                    <div class="panel panel-primary margintop">
                        <div class="panel-heading">Initialisation de mot de passe</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                <?php if(!empty($erreurLogin)) {?>
                                <div class="alert alert-danger">
                                        <?php  echo $erreurLogin ?>
                                <?php } ?>
                                </div>
                                  <label method='post' action='https://www.sendmail.com' class='form'>

                                        <div class="form-group">
                                            <label for="email"> Email</label>
                                            <input type="text" name="email" 
                                            placeholder=" Taper votre email "
                                            class="form-control"
                                            />                                             
                                        </div>

                                       

                                      
                                        <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-log-in">
                                        </span> 
                                        Valider
                                        </button>
                                  