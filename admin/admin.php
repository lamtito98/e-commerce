<?php
  include 'header.php';
    ?>


<form action="admin.php" method="POST">
  <fieldset>
    <legend>New Category</legend>

    <?php

    /*Add a new category in the database*/
        if(isset($_POST["sendCategorie"]))
        {

            $catname = $_POST["catname"];

            $sql = "INSERT INTO categorie(nom_categorie) VALUES ('$catname') ";

            global $connection; 

            mysqli_query($connection , $sql);

    /*relocation*/
            header("Location:admin.php");
           
        }



    ?>
    <div class="form-group">
      <label for="exampleInputEmail1">Categoty name </label>
      <input type="text" class="form-control" name="catname" placeholder="Categoty name">
    
    </div>
   
    <button type="submit" name="sendCategorie" class="btn btn-primary"> Register Category </button>
  </fieldset>
</form>






  <form action="admin.php" method="POST">
  <fieldset>
    <legend>New Product</legend>

    <?php

    /*Add the product in the database*/
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

            $sql = "INSERT INTO produit(id_categorie, nom_produit, description_produit, desc_courte_produit, prix,qte, id_administrateur, images) VALUES ('$id_categorie', '$nom_produit' ,'$description_produit', '$desc_courte_produit' , '$prix' , '$qte' , '$id_administrateur', '$images' )";

            global $connection; 

            mysqli_query($connection , $sql);

    /* relocation*/
            header("Location:admin.php"); 
        }
    ?>

    <div class="form-group">

      <label for="exampleInputEmail1">Category Id </label>
      <input type="text" class="form-control" name="id_categorie" placeholder="Category Id">
    </div>
    <div class="form-group">

      <label for="exampleInputEmail1">Product name </label>
      <input type="text" class="form-control" name="nom_produit" placeholder="Product name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product description </label>
      <input type="text" class="form-control" name="description_produit" placeholder="Product description">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Short description </label>
      <input type="text" class="form-control" name="desc_courte_produit" placeholder="Short description">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Price </label>
      <input type="text" class="form-control" name="prix" placeholder="Price">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Quantity</label>
      <input type="text" class="form-control" name="qte" placeholder="Quantity">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Administrator Id</label>
      <input type="text" class="form-control" name="id_administrateur" placeholder="Administrator Id">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input type="text" class="form-control" name="images" placeholder="Enter image link">
    </div>
   
    <button type="submit" name="sendProduit" class="btn btn-primary"> Save Product </button>
  </fieldset>
</form>



    <?php
  include 'footer.php';
    ?>