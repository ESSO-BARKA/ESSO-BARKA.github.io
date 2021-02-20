<?php 

require_once("identifier.php");
require_once('connexiondb.php');

$requeteF="select * from filiere ";
$resultatF=$pdo-> query($requeteF);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Nouveau stagiaire</title>
</head>
        <body>
            <?php include("menu.php"); ?>
            

                </div>
                <div class="container">
                    <div class="panel panel-primary margintop">
                        <div class="panel-heading">Les informations du nouveau stagiaire</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    <form method="post" action="insertStagiaire.php" class="form" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="nom"> Nom </label>
                                            <input type="text" name="nom" 
                                            placeholder=" Nom "
                                            class="form-control"
                                            />                                             
                                        </div>

                                       
                                        <div class="form-group">
                                            <label for="prenom"> Prénom</label>
                                            <input type="text" name="prenom" 
                                            placeholder=" Prénom"
                                            class="form-control"
                                           />                                             
                                        </div>

                                       
                                        <div class="form-group">
                                            <label for="civilite">sexe :</label>
                                            <div class="radio">
                                               <label><input type="radio" name="civilite" value="F" 
                                                /> F </label><br/>
                                                <label><input type="radio" name="civilite" value="M"/> M </label>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="idFiliere">Filière</label>
                                            <select name="idFiliere" class="form-control" id="idFiliere">
                                                <?php  while ($filiere=$resultatF->fetch())  {?>
                                                <option value="<?php echo $filiere['idFiliere'] ?>">
                                                    <?php echo $filiere['nomFiliere'] ?>
                                                </option>

                                                <?php } ?>
                                               
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="photo"> Photo</label>
                                            <input type="file" name="photo"                                           
                                            />                                            
                                        </div>

                                      
                                        <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Enregistrer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            
        </body>
