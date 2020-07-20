
<?php
/* include of the header*/
include 'header.php';

?>	
<div class="row">	
	<div class="col-md-12">
		<div class="card mt-3">
			<div class="card-body">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="index.php"> Home</a></li>
					   <li class="breadcrumb-item"><a href="produit.php"> Products</a></li>
					  <li class="breadcrumb-item active"> <i class="fa fa-map"></i> Details</li>
					</ol>

					<div class="card mt-3">
						<div class="row no-gutters">
							<?php
							/*Show the selected product*/
								$id = $_GET['id'];
								$result = afficher_produit_id($id);

								$row = mysqli_fetch_array($result);
							
								?>
							<div class="col-md-4 col-sm-12">
								<div class="card text-center">
									<img src="include/<?php   echo $row["images"]; ?>"  class="card-img-top" style="height:400px;width:auto;object-fit:cover;">	
									<div class="card-body">
										<h4 class="card-title"><?php   echo $row["nom_produit"]; ?></h4>
										<p> <span><?php echo '$'.$row["prix"].' US';?></span></p>
										<form action="checkout.php" method="POST">
											<input type="hidden" name="title" value="<?php   echo $row["nom_produit"]; ?>" >
											<input type="hidden" name="id" value="<?php   echo $row["id_produit"]; ?>" >
											<button type="submit" class="btn btn-primary"> Add to cart </button>
										</form>
									</div>
								</div>
							</div>

							<div class="col-md-8">
								<p class="card-text"><?php   echo $row["description_produit"]; ?></p>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php
/* include of the footer*/
include 'footer.php';
?>