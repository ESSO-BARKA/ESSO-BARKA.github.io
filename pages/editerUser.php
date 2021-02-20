<?php 

require_once('connexiondb.php');

$iduser=isset($_GET['iduser'])?$_GET['iduser']:0;

$requeteUser="select * from utilisateur where iduser=$iduser";

$resultatUser=$pdo-> query($requeteUser);
$user=$resultatUser-> fetch();

$logine=$user['logine'];
$email=$user['email'];
$roles=$user['roles'];

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
                                    <form method="post" action="updateUser.php" class="form" enctype="multipart/form-data">


                                    
                                    <div class="form-group">
                                            <label for="iduser"> ID  <?php echo $iduser ?></label>
                                            <input type="hidden" name="iduser" 
                                            class="form-control"
                                            value="<?php echo $iduser ?>"/>                                             
                                        </div>

                                        <div class="form-group">
                                            <label for="nom"> Login </label>
                                            <input type="hidden" name="logine" 
                                            placeholder="login"
                                            class="form-control"
                                            value="<?php echo $logine ?>"/>                                             
                                        </div>

                                       
                                        <div class="form-group">
                                            <label for="email"> Email</label>
                                            <input type="hidden" name="email" 
                                            placeholder=" Email"
                                            class="form-control"
                                            value="<?php echo $email ?>"/>                                             
                                        </div>

                                         <div class="form-group">
                                         <label for="roles"> Role</label>
                                         <select name="roles" class="form-control">
                                            <option value="ADMIN" <?php if($roles=="ADMIN") echo "selected"  ?>>Admin</option>
                                            <option value="VISITEUR" <?php if($roles=="VISITEUR") echo "selected"  ?>>Visiteur</option>
                                         </select>
                                         
                                         </div> 

                                        <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-save">
                                        </span> Enregistrer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            
        </body>
