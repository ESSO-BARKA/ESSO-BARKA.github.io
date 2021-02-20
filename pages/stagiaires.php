<?php

    require_once("identifier.php");
    require_once("connexiondb.php");

    

    $nomPrenom=isset($_GET['nomPrenom'])? $_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])? $_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])? $_GET['size']:20;
    $page=isset($_GET['page'])? $_GET['page']:1;
    $offset=($page-1)*$size;


        $requeteFiliere="select * from filiere";

        if($idfiliere==0) { 
            $requeteStagiaire="select idStagiaire,nom,prenom,nomFiliere,photo,civilite
             from filiere as f,stagiaire as s 
            where f.idFiliere= s.idFiliere
            and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
            order by idStagiaire
            limit $size
            offset $offset"; 

        $requeteCount = "select count(*) countS from stagiaire
            where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
            
          
        } 
        else
         {
           $requeteStagiaire ="select idStagiaire,nom,prenom,nomFiliere,photo,civilite
           from filiere as f, stagiaire as s
           where f.idFiliere=s.idFiliere
           and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
           and f.idFiliere=$idfiliere
           order by idStagiaire
           limit $size
           offset $offset";

           $requeteCount="select count(*) countS from stagiaire
           where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
           and  idFiliere= $idfiliere";
           
         }

        
    $resulatFiliere=$pdo-> query($requeteFiliere);
    $resulatStagiaire=$pdo-> query($requeteStagiaire);
    $resulatCount=$pdo-> query($requeteCount);


    $tabCount=$resulatCount-> fetch();
    $nbrStagiaire=$tabCount['countS'];

    $reste=$nbrStagiaire % $size;
    if ($reste===0)
        $nbrpage=$nbrStagiaire/$size;
    else
        $nbrpage= floor($nbrStagiaire/$size)+1; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Gestion des Stagiaires</title>
</head>
<body>
    <?php include("menu.php"); ?>

    <div class="container">  
    <div class="panel panel-success margintop">
            <div class="panel-heading">Rechercher des stagiaires</div>
            <div class="panel-body">
                    <form method="get" action="stagiaires.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomPrenom" placeholder="Nom et Prénom"
                            class="form-control"
                            value ="<?php echo $nomPrenom?>">                           
                         </div>
                        <label for="idfiliere">Filière:</label>
                        <select name="idfiliere" class="form-control" id="idfiliere"
                           onchange="this.form.submit()" >
                            <option value= 0 > Toutes les filières</option>
                            <?php while($filiere=$resulatFiliere->fetch())  { ?>
                                <option value=" <?php echo $filiere['idFiliere'] ?>"
                                <?php if($filiere['idFiliere']==$idfiliere) echo "selected" ?>> 
                                        <?php echo $filiere['nomFiliere'] ?>
                                </option>                            
                            <?php }  ?>
                        </select>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Rechercher
                        </button>
                            &nbsp; &nbsp;
                        <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                            <a href="nouveauStagiaire.php">
                            <span class="glyphicon glyphicon-plus">
                            </span>Nouveau stagiaire</a>
                        <?php } ?>
                    </form>
                </div>
        </div>
        <div class="panel panel-primary margintop">
            <div class="panel-heading">Liste des Stagiaires (<?php echo $nbrStagiaire ?>) Stagiaires</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th><th>Nom </th><th>prénom</th><th>Filière</th>
                                <th>Sexe</th><th>Photo</th>
                                <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                                <?php while ($stagiaire= $resulatStagiaire->fetch())  { ?>
                                    <tr>                                                                  
                                    <td> <?php echo $stagiaire['idStagiaire']?> </td>
                                        <td> <?php echo $stagiaire['nom']?> </td>
                                        <td> <?php echo $stagiaire['prenom']?> </td> 
                                        <td> <?php echo $stagiaire['nomFiliere']?> </td> 
                                        <td> <?php echo $stagiaire['civilite']?> </td> 
                                        <td>
                                            <img src="../images/<?php echo $stagiaire['photo']?>"
                                            width="50px" height="50px" class="img-circle"> 
                                        </td> 

                                        <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                                            <td>
                                                <a href="editerStagiaire.php?idS=<?php echo $stagiaire['idStagiaire'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp; 
                                                <a onclick="return confirm('Êtes vous sûr de vouloir supprimer le Stagiaire ?')"
                                                    href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idStagiaire'] ?>">                               
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
                                        <a  href="stagiaires.php?page=<?php echo $i; 
                                            ?>"
                                            &nomPrenom=<?php echo $nomPrenom ?>
                                         &idfiliere=<?php echo $idfiliere ?>>
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