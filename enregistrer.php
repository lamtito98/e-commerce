<?php
    include 'header.php';
?>

<form action="enregistrer.php" method="POST">
  <fieldset>
    <legend>Creer un nouveau compte </legend>

    <?php
    /*Condition to check if the button is clic and add the user in the database*/
        if(isset($_POST["send"]))
        {
            $username = verificationUsername($_POST["username"]);
            $nom = verification($_POST["nom"]);
            $prenom = verification($_POST["prenom"]);
            $email = verificationEmail($_POST["email"]);
            $mot_de_passe = verificationPassword($_POST["pass"]);

              $sql = "INSERT INTO utilisateur(username,mot_de_passe,nom,prenom,email) VALUES ('$username' ,'$mot_de_passe','$nom','$prenom', '$email') ";

            global $connection; 

            mysqli_query($connection , $sql);
          
    /* Relocated the use to the login page*/
            header("Location:login.php");   
        }
    ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Username </label>
      <input type="text" class="form-control" name="username" minlength="8" maxlength="16" placeholder="Entrer votre pseudo">
    
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Lastname </label>
      <input type="text" class="form-control" name="nom"   placeholder="Entre votre nom">
    
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Firstname </label>
      <input type="text" class="form-control" name="prenom"   placeholder="Entre votre prenom">
    
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email"   placeholder="Entre votre email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="pass" class="form-control" placeholder="Mot de passe" minlength="8" maxlength="32">
    </div>
    <button type="submit" name="send" class="btn btn-primary"> Register </button>
  </fieldset>
</form>


<?php
    include 'footer.php';
?>