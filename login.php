<?php
    include 'header.php';
?>

<form action="login.php" method="POST">
  <fieldset>
    <legend>Connection </legend>

    <?php
/*Condition pour si le bouton a été appuyé*/
        if(isset($_POST["send"])){

            $username = verificationUsername($_POST["username"]);
            $pass = verificationPassword($_POST["pass"]);
            $sql = " SELECT * FROM utilisateur  WHERE username='$username' AND mot_de_passe='$pass' ";

            global $connection; 

           $utilisateur =  mysqli_query($connection , $sql);
           $result = mysqli_fetch_array($utilisateur);
           if(mysqli_num_rows($utilisateur) > 0)
           {$_SESSION['logged'] = true;
            $_SESSION['username'] = $result['username'];
            $_SESSION['user_id'] = $result['id'];

            /*Redirection de l'utilisateur a la page principale*/
          header("Location:index.php");
           }
           else
           {
            /*Message d'erreur si le username ou le password est incorrect*/
            echo '<h1 class="alert alert-dismissible alert-danger">  Email or Password incorrect </h1> ' ; 
           }
        }
?>

    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter your username">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Enter your password">
    </div>
    <button type="submit" name="send"  class="btn btn-primary"> Login </button>
  </fieldset>
</form>
<a href="recuperation.php">Forgot Password?</a>

<?php
    include 'footer.php';
?>