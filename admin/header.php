
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
    		

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

		  <a class="navbar-brand" href="admin.php">Home</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		    	<li class="nav-item dropdown">
			      
		      <li class="nav-item">
		        <a class="nav-link" href="products.php">Products</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="update.php">Update Products</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="clients.php">Clients</a>
		      </li>
		    </ul>
		    



		    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    						<button type="button" class="btn btn-light"><i class="fa fa-user"></i> Compte</button>
    			<div class="btn-group" role="group">
				    <button id="btnGroupDrop4" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
					<?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
				    <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
				      <a class="dropdown-item" href="compte.php"> <i class="fa fa-user"></i>  <?php echo $_SESSION['username'] ; ?></a>
				      <a class="dropdown-item" href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>
					</div>
					<?php else : ?>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
				      <a class="dropdown-item" href="index.php"> <i class="fa fa-sign-in"></i>  Login</a>
					</div>
					<?php endif; ?>
  				</div>
    		</div>

		  </div>
	</nav>