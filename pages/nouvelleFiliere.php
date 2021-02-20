<?php
    require_once("identifier.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Nouvelle Filière </title>
</head>
        <body>
            <?php include("menu.php"); ?>
            

                </div>
                <div class="container">
                    <div class="panel panel-primary margintop">
                        <div class="panel-heading">Veuillez saisir les données de la nouvelle filière:</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    <form method="post" action="insertFiliere.php" class="form">
                                        <div class="form-group">
                                            <label for="niveau"> Nom de la filière</label>
                                            <input type="text" name="nomF" 
                                            placeholder="Taper le nom de la filière "
                                            class="form-control"/> 
                                                                    
                                        </div>
                                        <div class="form-group">
                                            <label for="niveau">Niveau:</label>
                                            <select name="niveau" class="form-control" id="niveau">
                                                <option value="LICENCE">LICENCE</option>
                                                <option value="MASTER">MASTER</option>
                                                <option value="DOCTORAT">DOCTORAT</option>
                                            </select>
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
        </html>