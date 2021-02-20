
<?php
    require_once("identifier.php");
    $message= isset($_GET['message'])?$_GET['message']:"Erreur";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Alerte</title>
</head>
<body>
    <?php include("menu.php"); ?>

     <div class="container">  
            <div class="panel panel-danger margintop">
            <div class="panel-heading"><h4>Erreur</h4></div>
                <div class="panel-body">
                    <h3><?php echo $message  ?></h3>
                 <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">  Retour  >>></a></h4>
                </div>
            
            </div>
        </div>
    
    
</body>
</html>
