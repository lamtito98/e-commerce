<?php

    include 'header.php';

?>

<form action="modification.php" method="POST">
  <fieldset>
    <legend>Modifier Client</legend>

    <?php
/*Condition pour si le bouton a été appuyé*/
        if(isset($_POST["send"])){

            $username = verificationUsername($_POST["username"]);
            $nom = verification($_POST["nom"]);
            $prenom = verification($_POST["prenom"]);
            $email = verificationEmail($_POST["email"]);
            $pass = verificationPassword($_POST["pass"]);
            $pass2 = verificationPassword($_POST["pass2"]);
            if($pass !== $pass2)
            {
              echo '<h1 class="alert alert-dismissible alert-danger">Passowrd do not match </h1> ' ; 
            }
            

            else
            {
              $sql = " Update utilisateur set username='$username', mot_de_passe = '$pass2', email = '$email', nom = '$nom', prenom = '$prenom',mot_de_passe = '$pass2'
               WHERE email='$email' ";

            global $connection; 

           $utilisateur =  mysqli_query($connection , $sql);
           $result = mysqli_fetch_array($utilisateur);
            /*Redirection de l'utilisateur a la page principale*/
          header("Location:clients.php");
            }
            
          /*

          */

        }
?>
            <?php
              /*Affichage du produit selectionné*/
                $id = $_GET['id'];
                $result = afficher_user_id($id);

                $row = mysqli_fetch_array($result);
              
              ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Old Pseudo : <?php echo $row["username"];?></label>
      <input type="text" class="form-control" name="username" placeholder="Enter new username" required="*">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1"> Old lastname : <?php echo $row["nom"];?></label>
      <input type="text" class="form-control" name="nom"   placeholder="Enter new lastname" required="*">
    
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Old firstname : <?php echo $row["prenom"];?></label>
      <input type="text" class="form-control" name="prenom"   placeholder="Enter new firstname" required="*">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">last Email : <?php echo $row["email"];?></label>
      <input type="email" class="form-control" name="email"   placeholder="Enter new email">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Password" required="*">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" class="form-control" name="pass2" placeholder="Confirmer Mot de Passe" required="*">
    </div>
    <button type="submit" name="send"  class="btn btn-primary"> Update Client </button>
  </fieldset>
</form>


<?php

    include 'footer.php';

?>