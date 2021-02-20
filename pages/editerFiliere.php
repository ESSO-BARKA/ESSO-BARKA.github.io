
<?php 

require_once("identifier.php");
require_once('connexiondb.php');

$idf=isset($_GET['idF'])?$_GET['idF']:0;

$requete="select * from filiere where idFiliere=$idf";

$resultat=$pdo-> query($requete);

$filiere=$resultat -> fetch();

$nomf=$filiere ['nomFiliere'];
$niveau=$filiere ['niveau'];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Edition d'une Filière</title>
</head>
        <body>
            <?php include("menu.php"); ?>
            

                </div>
                <div class="container">
                    <div class="panel panel-primary margintop">
                        <div class="panel-heading">Editer la filière</div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    <form method="post" action="updateFiliere.php" class="form">


                                    
                                    <div class="form-group">
                                            <label for="niveau"> Numéro :  <?php echo $idf ?></label>
                                            <input type="hidden" name="idF" 
                                            class="form-control"
                                            value="<?php echo $idf ?>"/>                                             
                                        </div>

                                        <div class="form-group">
                                            <label for="niveau"> Nom de la filière</label>
                                            <input type="text" name="nomF" 
                                            placeholder="Taper le nom de la filière"
                                            class="form-control"
                                            value="<?php echo $nomf ?>"/>                                             
                                        </div>

                                        <div class="form-group">
                                            <label for="niveau">Niveau:</label>
                                            <select name="niveau" class="form-control" id="niveau">
                                                <option value="LICENCE" <?php if($niveau=="LICENCE") echo "selected"?>>LICENCE</option>
                                                <option value="MASTER" <?php if($niveau=="MASTER") echo "selected"?>>MASTER</option>
                                                <option value="DOCTORAT" <?php if($niveau=="DOCTORAT") echo "selected"?>>DOCTORAT</option>
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
