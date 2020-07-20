<?php
/* include des functions du site*/
  include '../include/configuration.php';
  include '../include/functions.php';
    ?>
<!DOCTYPE html>
<html>
    <head>

      <meta charset="utf-8">
        <title>Administration</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/cosmo/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body>
  <div class="container-fluid">
<form action="index.php" method="POST">
  <fieldset>
    <legend>Connection  </legend>

    <?php
/*Condition pour si le bouton a été appuyé*/
        if(isset($_POST["send"])){

            $username = verificationUsername($_POST["username"]);
            $pass = verificationPassword($_POST["pass"]);

            $sql = " SELECT * FROM administrateur  WHERE username='$username' AND mot_de_passe='$pass' ";

            global $connection; 

           $administrateur =  mysqli_query($connection , $sql);
           $result = mysqli_fetch_array($administrateur);
           if(mysqli_num_rows($administrateur) > 0){
            
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $result['username'];
            $_SESSION['user_id'] = $result['id'];

            /*Redirection de l'utilisateur a la page principale*/
          header("Location:admin.php");

           }
           else
           {
            /*Message d'erreur si le username ou le password est incorrect*/
            echo '<h1 class="alert alert-dismissible alert-danger">  Email or password incorrect </h1> ' ; 

           }
        }
?>

    <div class="form-group">
      <label for="exampleInputEmail1">Pseudo</label>
      <input type="text" class="form-control" name="username" placeholder="Enter your admin username">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de Passe</label>
      <input type="password" class="form-control" name="pass" placeholder="Passowrd">
    </div>
    <button type="submit" name="send"  class="btn btn-primary"> Login </button>
  </fieldset>
</form>
<a href="recuperation.php">Change Password</a>
<?php

    include 'footer.php';

?>