<?php

    include 'header.php';

?>

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
            	$sql = " Update utilisateur set mot_de_passe = '$pass2' WHERE username='$username' ";

            global $connection; 

           $utilisateur =  mysqli_query($connection , $sql);
           $result = mysqli_fetch_array($utilisateur);
            /*Redirection de l'utilisateur a la page principale*/
          header("Location:recuperation.php");
            }
            
          /*

          */

        }
?>

    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter username">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Passowrd</label>
      <input type="password" class="form-control" name="pass2" placeholder="Confirm Password">
    </div>
    <button type="submit" name="send"  class="btn btn-primary"> Change passowrd</button>
  </fieldset>
</form>
<a href="login.php">login</a>


<?php

    include 'footer.php';

?>