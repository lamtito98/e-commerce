<?php

require 'include/functions.php';

$id = $_POST['id'];

$result = afficher_produit_id($id);

$produit = mysqli_fetch_array($result);

$_SESSION['produit_'.$produit['id_produit']] = array(
	
	'Products'=> $produit['images'],
    'id'=> $produit['id_produit'],
    'titre'=>$produit['nom_produit'],
    'total'=>$produit['prix'],
);

$_SESSION['totals'] += $_SESSION['produit_'.$produit['prix'] ['total']];
$_SESSION['count'] += 1;
header("Location:panier.php"); 