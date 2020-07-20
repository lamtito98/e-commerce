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
					   <li class="breadcrumb-item"><a href="products.php"> Products</a></li>
					  <li class="breadcrumb-item active"> <i class="fa fa-map"></i> Update Product</li>
					</ol>

					  <form action="update.php" method="POST">
  <fieldset>
    <legend>Modifier Produit</legend>

    <?php

    /*Condition pour faire l'ajout du produit dans la base de donnée*/
        if(isset($_POST["sendProduit"]))
        {
            $id_categorie = $_POST["id_categorie"];
            $nom_produit = $_POST["nom_produit"];
            $description_produit = $_POST["description_produit"];
            $desc_courte_produit = $_POST["desc_courte_produit"];
            $prix = $_POST["prix"];
            $qte = $_POST["qte"];
            $id_administrateur = $_POST["id_administrateur"];
            $images = $_POST["images"];

            $sql = "update produit set id_categorie='$id_categorie',nom_produit='$nom_produit', description_produit= '$description_produit', desc_courte_produit = '$desc_courte_produit',prix= '$prix', qte= '$qte', id_administrateur = '$id_administrateur', images='$images'
            WHERE nom_produit='$nom_produit' ";

            global $connection; 
            $produit =  mysqli_query($connection , $sql);
           $result = mysqli_fetch_array($produit);

    /*Envoie l'utilisateur a la page principale*/
            header("Location:admin.php"); 
        }
    ?>

<?php
              /*Affichage du produit selectionné*/
                $id = $_GET['id'];
                $result = afficher_produit_id($id);

                $row = mysqli_fetch_array($result);
              
              ?>
    <div class="form-group">

      <label for="exampleInputEmail1">Category Id : <?php   echo $row["id_categorie"]; ?></label>
      <input type="text" class="form-control" name="id_categorie" placeholder="Category Id">
    </div>
    <div class="form-group">

      <label for="exampleInputEmail1">Product name : <?php   echo $row["nom_produit"]; ?></label>
      <input type="text" class="form-control" name="nom_produit" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Description : <?php   echo $row["description_produit"]; ?></label>
      <input type="textbox" class="form-control" name="description_produit" placeholder="Enter description produit">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Short description : <?php   echo $row["desc_courte_produit"]; ?></label>
      <input type="text" class="form-control" name="desc_courte_produit" placeholder="Enter short description produit">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Price : <?php   echo $row["prix"]; ?></label>
      <input type="text" class="form-control" name="prix" placeholder="Price">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Quantity : <?php   echo $row["qte"]; ?></label>
      <input type="text" class="form-control" name="qte" placeholder="Quantity">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Id Administrator : <?php   echo $row["id_administrateur"]; ?> </label>
      <input type="text" class="form-control" name="id_administrateur" placeholder="Enter id administrator">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Image </label>
      <input type="text" class="form-control" name="images" placeholder="Enter link image">
    </div>
   
    <button type="submit" name="sendProduit" class="btn btn-primary"> Save Product </button>
  </fieldset>
</form>
			</div>
		</div>
	</div>
</div>
</body>

<?php
/* include du footer du site*/
include 'footer.php';
?>