<?php
    require_once("identifier.php");

?>

<!DOCTYPE html>
<htm
l lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand">Gestion des stagiaires</a>
        </div>
            <ul class="nav navbar-nav">
                <li><a href ="stagiaires.php">Les stagiaires</a></li>
                <li><a href ="filieres.php">Filières</a></li>
                <li><a href ="utilisateurs.php">Utilisateurs</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href ="editerUtilisateur.php?id=<?php  echo $_SESSION['user']['iduser']?>">
                    <i class= "glyphicon glyphicon-user fa fa-user-circle-o">
                    </i>     
                    <?php echo  '  '.$_SESSION['user']['logine']?></a>
                </li>
                <li>
                    <a href ="sedeconnecter.php">
                    <i class= " glyphicon glyphicon-log-out fa fa-sign-out">
                    </i>&nbsp; Se déconnecter</a>
                </li>
            </ul>
        </div>
   </nav>
   
</body>
</html>