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
<form action="recuperation.php" method="POST">
  <fieldset>
    <legend>Change Password</legend>

    <?php
/*Condition pour si le bouton a été appuyé*/
        if(isset($_POST["send"])){

            $username = verificationUsername($_POST["username"]);
            $pass = verificationPassword($_POST["pass"]);
            $pass2 = verificationPassword($_POST["pass2"]);
            if($pass !== $pass2)
            {
            	echo '<h1 class="alert alert-dismissible alert-danger">Les Mots de passe sont differents </h1> ' ; 
            }
            

            else
            {
            	$sql = " Update administrateur set mot_de_passe = '$pass2' WHERE username='$username' ";

            global $connection; 

           $utilisateur =  mysqli_query($connection , $sql);
           $result = mysqli_fetch_array($utilisateur);
            /*Redirection*/
          header("Location:recuperation.php");
            }
          }
?>

    <div class="form-group">
      <label for="exampleInputEmail1">Pseudo</label>
      <input type="text" class="form-control" name="username" placeholder="Enter username">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm password</label>
      <input type="password" class="form-control" name="pass2" placeholder="Confirmer Mot de Passe">
    </div>
    <button type="submit" name="send"  class="btn btn-primary"> Change Password</button>
  </fieldset>
</form>
<a href="index.php">Connect</a>

<?php
include 'footer.php';
?>