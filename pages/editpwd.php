<?php

require_once('identifier.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <sript src="../js/jquery-3.3.1.js"> </script>
    <sript src="../js/monstle.js"> </script>

    <title>Changer le mot de passe </title>
</head>
<body>
    
    <div  class="container editpwd-page">
    <h1 class="text-center">Changer le mot de passe</h1>
    <h2  class="text-center">Compte : <?php echo $_SESSION['user']['logine']  ?> </h2>
    <form class="form-horizontal" method="post" action="update.php">

    <div class="input-container ">

    <input
        minlenght=4
        class="form-control oldpassword"
        type="password"
        name="oldpwd"
        autocomplete="false"
        placeholder="Taper votre ancien mot de passe"
        required>
        <i class="glyphicon glyphicon-remove show-old-pass clickable"> </i>

    </div>
    <div class="input-container">
        <input

            minlenght=4
            class="form-control newpassword"
            type="password"
            name="newpwd"
            autocomplete="false"
            placeholder="Taper votre nouveau mot de passe"
            required>
            <i class="glyphicon glyphicon-remove show-new-pass clickable"> </i>
    </div>
            <input
                type="submit"
                value="Enregistrer"
                class="btn btn-primary btn-block"
                required
                >
    </form>
</div>
</body>
</html>