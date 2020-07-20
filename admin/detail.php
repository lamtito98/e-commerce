<?php
/* include du header du site*/
include 'header.php';
?>

<div class="row">	
	<div class="col-md-12">
		<div class="card mt-3">
			<div class="card-body">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="admin.php"> Home</a></li>
					   <li class="breadcrumb-item"><a href="clients.php"> Clients</a></li>
					  <li class="breadcrumb-item active"> <i class="fa fa-map"></i> Details Client</li>
					</ol>

					<div class="card mt-3">
						<div class="row no-gutters">
							<?php
							/*Affichage du produit selectionné*/
								$id = $_GET['id'];
								$result = afficher_user_id($id);

								$row = mysqli_fetch_array($result);
							
								?>
							<div class="col-md-4 col-sm-12 text-center">
    						<div class="card" style="width:100%;margin-bottom:10px">
                                <img src="../include/img/portrait.png"  class="card-img-top" style="height:400px;width:auto;object-fit:cover;">
        							<div class="card-body" style="min-height:220px;display:flex;flex-direction:column;justify-content:space-between">
                						<h4 class="card-title" ><input type="text" value="<?php echo $row["username"];?>" name="username"></h4>
                						<p class="card-text"><input type="text" value="<?php echo $row["nom"];?>" name="nom"></p>
                						<p class="card-text"><input type="text" value="<?php echo $row["prenom"];?>" name="prenom"></p>
                						<p>
                							<span><input type="text" value="<?php echo $row["email"];?>" name="email"></span>
                						</p>
                						<form action="update_client.php" method="GET">
                                            <input type="hidden" name="id" value="<?php   echo $row["id_user"]; ?>" >
                                            <input type="hidden" name="nom" value="<?php   echo $row["nom"]; ?>" >
                                            <input type="hidden" name="prenom" value="<?php   echo $row["prenom"]; ?>" >
                                            <input type="hidden" name="username" value="<?php   echo $row["username"]; ?>" >
                                            <input type="hidden" name="email" value="<?php   echo $row["email"]; ?>" >
                                            <button type="submit" class="btn btn-primary"> Update </button>
                                        </form>

        						</div>
    						</div>	
    					</div>
    				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php
/* include du footer du site*/
include 'footer.php';
?>