<?php

   
    require_once("identifier.php");
    require_once("connexiondb.php");
       
    

    $nomf=isset($_GET['nomF'])? $_GET['nomF']:"";
    $niveau=isset($_GET['niveau'])? $_GET['niveau']:"all";
    
    $size=isset($_GET['size'])? $_GET['size']:20;
    $page=isset($_GET['page'])? $_GET['page']:1;
    $offset=($page-1)*$size;

        if($niveau=="all") { 
            $requete="select * from filiere
            where nomFiliere like '%$nomf%'
            limit $size
            offset $offset";

        $requeteCount = "select count(*) countF from filiere
            where nomFiliere like '%$nomf%'";
            
          
        } else {
                $requete ="select * from filiere
                where nomFiliere like '%$nomf%'
                and niveau='$niveau'
                limit $size
                offset $offset";

                $requeteCount = "select count(*) countF from filiere
                where nomFiliere like '%$nomf%'
                and niveau='$niveau'";
              
              
            }
    $resulatF=$pdo->query($requete);
    $resulatCount=$pdo->query($requeteCount);
    $tabCount= $resulatCount->fetch();
    $nbrFiliere=$tabCount['countF'];

    $reste=$nbrFiliere % $size;
    if($reste===0)
        $nbrpage=$nbrFiliere/$size;
    else
        $nbrpage= floor($nbrFiliere/$size)+1;  // floor:la partie entière d'un nombre décimal
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Gestion des filières</title>
</head>
<body>
    <?php  include("menu.php"); ?>

    <div class="container">  
    <div class="panel panel-success margintop">
            <div class="panel-heading">Rechercher des filières...</div>
                   <div class="panel-body">
                    <form method="get" action="filieres.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomF" 
                            placeholder="Taper le nom de la filière"
                            class="form-control"
                            value ="<?php echo $nomf?>">                           
                         </div>
                        <label for="niveau">Niveau:</label>
                        <select name="niveau" class="form-control" id="niveau"
                        onchange="this.form.submit()">
                            <option value="all" <?php if($niveau==="all") echo "selected"?>>Tous les niveaux</option>
                            <option value="LICENCE"<?php if($niveau==="LICENCE") echo "selected"?>>LICENCE</option>
                            <option value="MASTER"<?php if($niveau==="MASTER") echo "selected"?>>MASTER</option>
                            <option value="DOCTORAT"<?php if($niveau==="DOCTORAT") echo "selected"?>>DOCTORAT</option>
                        </select>
                        <button class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Rechercher...
                        </button>
                            &nbsp; &nbsp;
                        <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                            <a href="nouvelleFiliere.php">
                            <span class="glyphicon glyphicon-plus">
                            </span>Nouvelle Filière</a>
                        <?php } ?>
                    </form>
                </div>
        </div>
        <div class="panel panel-primary margintop">
            <div class="panel-heading">Liste des filières (<?php echo $nbrFiliere ?>) Filières</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th><th>Nom filière</th><th>Niveau</th>
                                <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                                    <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                                <?php while($filiere=$resulatF->fetch()) { ?>
                                    <tr>                                
                                        <td> <?php echo $filiere['idFiliere']?> </td>
                                        <td> <?php echo $filiere['nomFiliere']?> </td>
                                        <td> <?php echo $filiere['niveau']?> </td> 
                                        
                                        <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                                            <td>
                                                <a href="editerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp; 
                                                <a onclick="return confirm('Êtes vous sûr de vouloir supprimer la Filière ?')"
                                                    href="supprimerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>">                               
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>      
                                        <?php } ?>                      
                                    </tr>
                                <?php }  ?>
                        </tbody>
                    </table>                    
                    <div>
                            <ul class="pagination">
                                <?php for($i=1;$i<=$nbrpage;$i++){ ?>
                                    <li class="<?php if($i==$page) echo 'active' ?>">
                                        <a  href="filieres.php?page=<?php echo $i; 
                                            ?>"
                                            &nomF=<?php echo $nomf ?>
                                         &niveau=<?php echo $niveau ?>>
                                            <?php echo $i; ?>   
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                    </div>                
                </div>
        </div>
    </div>   
</body>
</html>