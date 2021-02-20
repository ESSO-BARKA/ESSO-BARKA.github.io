<?php

    require_once("identifier.php");
    require_once("connexiondb.php");

    

    $logine=isset($_GET['logine'])? $_GET['logine']:"";
    $size=isset($_GET['size'])? $_GET['size']:20;
    $page=isset($_GET['page'])? $_GET['page']:1;
    $offset=($page-1)*$size;


        
    $requeteUser="select * from utilisateur where logine like '%$logine%'";
    $requeteCount = "select count(*) countUser from utilisateur";
            
        
    $resulatUser=$pdo-> query($requeteUser);
    $resulatCount=$pdo-> query($requeteCount);


    $tabCount=$resulatCount-> fetch();
    $nbrUser=$tabCount['countUser'];

    $reste=$nbrUser % $size;
    if ($reste===0)
        $nbrpage=$nbrUser/$size;
    else
        $nbrpage= floor($nbrUser/$size)+1; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <?php include("menu.php"); ?>

    <div class="container">  
    <div class="panel panel-success margintop">
            <div class="panel-heading">Rechercher des utilisateurs</div>
            <div class="panel-body">
                    <form method="get" action="utilisateurs.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="logine" placeholder="Nom"
                            class="form-control"
                            value ="<?php echo $logine?>">                           
                         </div>
                        
                        <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span> Rechercher ....
                        </button>
                            &nbsp; &nbsp;
                    </form>
                </div>
        </div>
        <div class="panel panel-primary margintop">
            <div class="panel-heading">Liste des utilisateurs(<?php echo $nbrUser ?>) utilisateurs</div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th><th>Email</th><th>Role</th>
                                <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                                <th>Actions</th>
                                <?php }  ?>
                               
                            </tr>
                        </thead>
                        <tbody>
                                <?php while ($user= $resulatUser->fetch())  { ?>
                                    <tr class="<?php echo $user['etat']==1?'success':'danger'?>">                                                                  
                                    <td> <?php echo $user['logine']?> </td>
                                        <td> <?php echo $user['email']?> </td>
                                        <td> <?php echo $user['roles']?> </td> 

                                        <?php  if ($_SESSION['user']['roles']=='ADMIN')  {?>
                                            <td>
                                                <a href="editerUser.php?iduser=<?php echo $user['iduser'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                &nbsp; &nbsp;
                                                <a onclick="return confirm('Êtes vous sûr de vouloir supprimer cet utilisateur ?')"
                                                    href="supprimerUser.php?iduser=<?php echo $user['iduser'] ?>">                               
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                                &nbsp; &nbsp;
                                                <a href="activerUser.php?iduser=<?php echo $user['iduser'] ?>"&etat=<?php echo $user['etat'] ?>>
                                                <?php
                                                    if($user['etat']==1)
                                                    echo  '<span class="glyphicon glyphicon-remove"></span>';
                                                    else
                                                    echo  '<span class="glyphicon glyphicon-ok"></span>';
                                                ?>
                                                </a>
                                            </td> 
                                        <?php }  ?>                            
                                    </tr>
                                <?php }  ?>
                        </tbody>
                    </table>  
                    <div>
                            <ul class="pagination">
                                <?php for($i=1;$i<=$nbrpage;$i++){ ?>
                                    <li class="<?php if($i==$page) echo 'active' ?>">
                                        <a  href="utilisateurs.php?page=<?php echo $i; 
                                            ?>"
                                            &logine =<?php echo $logine?>>
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