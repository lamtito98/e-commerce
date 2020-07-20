<?php
	include 'header.php';
?>

<form class="form-inline my-2 my-lg-0" action="search_produit.php" method="POST">
              <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0"  type="submit">Search</button>
</form>
    	<div class="col-md-12">
    		<div class="card mt-3">
    			<div class="card-body">
    				<h4 class="card-header bg-light"><i class="fa fa-map"></i> Products</h4>

    				<div class="row">

    					<?php
    					$result = afficher_produits();
    					while ($row = mysqli_fetch_array($result)): 
    					?>
    					<div class="col-md-4 col-sm-12 text-center">
    						<div class="card" style="width:100%;margin-bottom:10px">
                                <img src="../include/<?php echo $row["images"];?>"  class="card-img-top" style="height:400px;width:auto;object-fit:cover;">
    							<div class="card-body" style="min-height:220px;display:flex;flex-direction:column;justify-content:space-between">
    							
    						<h4 class="card-title" ><?php echo $row["nom_produit"];?></h4>
    						<p class="card-text"><?php echo $row["desc_courte_produit"];?></p>
    						<p>
    							<span><?php echo '$'.$row["prix"].' US';?></span>
    						</p>
                            <a  href="update.php?id=<?php   echo $row["id_produit"]; ?> " class="btn btn-primary">Update Product</a>
                            <form action="supprimer.php" method="POST">
                                <input type="hidden" name="id" value="<?php   echo $row["id_produit"]; ?>" >
                                <button type="submit" class="btn btn-primary"> Delete </button>
                            </form>

    						</div>
    						</div>
    						
    					</div>
    					<?php   endwhile ; ?>	
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</body>

<?php
include 'footer.php';
?>