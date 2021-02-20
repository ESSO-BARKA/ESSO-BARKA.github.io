<?php
    require_once("connexiondb.php");

    require_once("../Les_fonctions/fonctions.php");

    //echo 'Nombre de user1:'.rechercher_par_login("ADMIN");
    //echo 'Nombre de user1:'.rechercher_par_email("essossolim@gmail.com");

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $logine=$_POST['logine'];
    $pwd1=$_POST['pwd1'];
    $pwd2=$_POST['pwd2'];
    $email=$_POST['email'];
    

    $validationErrors=array();
    $success_smg=array();

    if(isset($logine)){

        $filtrelogine = filter_var($logine,FILTER_SANITIZE_STRING);

        if(strlen($filtrelogine)<4){
            $validationErrors[]="Erreur!!! Le nom doit au-moins contenir 4 lettres";
        }
    }


    
    if(isset($pwd1) && isset($pwd2)){
        if(empty($pwd1)) {
            $validationErrors[]="Erreur!!! Le mot de passe ne doit pas etre vide!!!";
        }

        if(md5($pwd1) !== md5($pwd2)){
            $validationErrors[]="Erreur!!! Les deux mots de passe ne sont pas identtiques!!!" ;
        }
    }

    if(isset($email)){

        $filtreEmail = filter_var($email , FILTER_SANITIZE_EMAIL);

        if($filtreEmail !=true) {
            $validationErrors[] ="Erreur!!! Email non valid";

        }   
    }
    if(empty($validationErrors)) {
      
        if(rechercher_par_login($logine)==0 & rechercher_par_email($email)==0){
            $requete =$pdo -> prepare("insert into  utilisateur(logine,email,roles,etat,pwd)
                values (?,?,?,?,?)");
            $requete-> execute(array( $logine, $email,'VISITEUR',0,md5($pwd1)));
            $success_smg[]=" Félicitation!!!, votre compte est bien crée, mais temporairement inactif jusqu'à l'activation de l'administrateur.";
        
        }else{
        
            if(rechercher_par_login($logine)>0){
                $validationErrors[]="Désolé!!! ce Nom existe déja";
            }
             if(rechercher_par_email($email)>0){
                $validationErrors[]="Désolé!!! ce Email existe déja";
            }
        }
        
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css"> 
    <title>Création de compte</title>
</head>
<body>
    <div class="container col-md-6 col-md-offset-3">

    <h1 class="text-center"> Création d'un nouveau compte d'utilisateur</h1>
        
        <form class="form" method="post" >
            <div class="input-container">
                <input type = "text"
                    required = "required"
                    minlength = "4"
                    title = "Le nom d'utilisateur doit contenir au-moins 4 lettres"
                    name = "logine"
                    placeholder = "Taper le nom d'utilisateur"
                    autocompete = "off"
                    class = "form-control"
                >
            </div>
            <div class="input-container">
                <input type = "password"
                    required = "required"
                    minlength = "3"
                    title = "Le mot de passe doit contenir au-moins 3 lettres"
                    name = "pwd1"
                    placeholder = "Taper le mot de passe"
                    autocompete = "new-password"
                    class = "form-control"
                >
            </div>

            <div class="input-container">
                <input type = "password"
                    required = "required"
                    minlength = "3"
                    name = "pwd2"
                    placeholder = "Confirmer le mot de passe"
                    autocompete = "new-password"
                    class = "form-control"
                >  
            </div>      

            <div class="input-container">
                <input type = "email"
                    required = "required"
                    name = "email"
                    placeholder = "Taper votre email"
                    autocompete = "off"
                    class = "form-control"
                >
            </div>
            <div class="input-container">
                <input type = "submit" class="btn btn-primary" value="Enregistrer">
            </div>
        </form>
        <br>
        <?php
       
    if(isset($validationErrors) & !empty($validationErrors)){
        foreach($validationErrors as $errors){
            echo '<div class="alert alert-danger">'.$errors.'</div>';
        }
    }else{ 
    
        
    if(isset($success_smg) & !empty($success_smg)){
        foreach($success_smg as $sucess){
            echo '<div class="alert alert-success">'.$sucess.'</div>';
        }   
    }
}

   
    

        ?>
    </div>
</body>
</html>