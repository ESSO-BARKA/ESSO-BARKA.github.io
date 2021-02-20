
<?php 
   session_start();
   if(isset($_SESSION['erreurLogin']))
     $erreurLogin=$_SESSION['erreurLogin'];
    else{
        $erreurLogin="";
    }
    
    session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle1.css"> 
    <title>Se connecter</title>
</head>
        <body>
            
            

            <div class="solim">
                <div class="container col-lg-4 col-lg-offset-4 col-md-6">
                    <div class="panel panel-primary margintop">
                        <div class="panel-heading">Se connecter</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                <?php if(!empty($erreurLogin)) {?>
                                <div class="alert alert-danger">
                                        <?php  echo $erreurLogin ?>
                                <?php } ?>
                                </div>
                                    <form method="post" action="seConnecter.php" class="form">

                                        <div class="form-group">
                                            <label for="logine"> Nom</label>
                                            <input type="text" name="logine" 
                                            placeholder=" Nom d'utilisateur "
                                            class="form-control"
                                            />                                             
                                        </div>

                                       
                                        <div class="form-group">
                                            <label for="pwd"> Mot de passe</label>
                                            <input type="password" name="pwd" 
                                            placeholder=" Mot de passe"
                                            class="form-control"
                                           />                                             
                                        </div>


                                      
                                        <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-log-in">
                                        </span> 
                                        Se connecter
                                        </button>
                                        <p></p>
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                        <p><a href="initialiserpwd.php"> Mot de passe oublié</a>
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="nouvelleUtilisareur.php">Créer un compte</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>  
            </div> 
        </body>
