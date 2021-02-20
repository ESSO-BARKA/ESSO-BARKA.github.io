<?php 

require_once("identifier.php");
require_once('connexiondb.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$requete="select * from utilisateur where iduser=$id";

$resultat=$pdo-> query($requete);

$utilisateur=$resultat -> fetch();

$logine=$utilisateur['logine'];
$email=$utilisateur['email'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Edition d'un utilisateur</title>
</head>
        <body>
            <?php include("menu.php"); ?>
            

                </div>
                <div class="container">
                    <div class="panel panel-primary margintop">
                        <div class="panel-heading">Editer l'utilisateur</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    <form method="post" action="updateUser.php" class="form" >


                                    
                                    <div class="form-group">
                                            <label for="id"> </label>
                                            <input type="hidden" name="iduser" 
                                            class="form-control"
                                            value="<?php echo $id ?>"/>                                             
                                        </div>

                                        <div class="form-group">
                                            <label for="logine"> Nom </label>
                                            <input type="logine" name="logine" 
                                            placeholder=" Login "
                                            class="form-control"
                                            value="<?php echo $logine ?>"/>                                             
                                        </div>

                                       
                                        <div class="form-group">
                                            <label for="email"> E_mail</label>
                                            <input type="email" name="email" 
                                            placeholder=" E_mail"
                                            class="form-control"
                                            value="<?php echo $email ?>"/>                                             
                                        </div>

                                       
                                       

                                      
                                        <button class="btn btn-success">
                                            <span class="glyphicon glyphicon-save">
                                            </span> 
                                            Enregistrer
                                        </button>
                                        &nbsp; 
                                        <a href="editpwd.php">Changer le mot de passe</a>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            
        </body>
