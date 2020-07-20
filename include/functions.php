<?php
require 'configuration.php';
/* Session*/
session_start();
$sec = time()+ 60 * 60;

include 'configuration.php';

/*logout*/
function logout ()
{
	$_SESSION['logged'] = false;
    session_destroy();
    header("Location:index.php");
}

function logout_admin ()
{
	$_SESSION['logged'] = false;
    session_destroy();
    header("Location:index.php");
}

 function delete($id)
 {
 	$sql = "DELETE FROM utilisateur WHERE id_user = $id;";
	global $connection;
	return mysqli_query($connection, $sql);
 }

function update_client($id)
 {
 	$sql = "Update utilisateur set username='$username', mot_de_passe = '$pass2', email = '$email', nom = '$nom', prenom = '$prenom',email = '$email'
               WHERE id_user='$id' ";
	global $connection;
	return mysqli_query($connection, $sql);
 }

function afficher_user()
{
	$sql = "SELECT * FROM utilisateur";
	global $connection;
	return mysqli_query($connection, $sql);
}

function afficher_user_id($id)
{
	$sql = "SELECT * from utilisateur where id_user = $id";
	global $connection;
	return mysqli_query($connection, $sql);
}

function afficher_user_search($search)
{
	$sql = "SELECT * from utilisateur where username like '%$search%'";
	global $connection;
	return mysqli_query($connection, $sql);
}

/* Show all the products*/

function afficher_produits()
{
	$sql = "SELECT * FROM produit";
	global $connection;
	return mysqli_query($connection, $sql);
}

/*search a product*/
function afficher_produit($search)
{
	$sql = "SELECT * from produit where nom_produit like '%$search%'";
	global $connection;
	return mysqli_query($connection, $sql);
}


/*show product detail */
function afficher_produit_id($id)
{
	$sql = "SELECT * from produit where id_produit = $id";
	global $connection;
	return mysqli_query($connection, $sql);
}

/* delete a product*/
function delete_produit($id)
 {
 	$sql = "DELETE FROM produit WHERE id_produit = $id;";
	global $connection;
	return mysqli_query($connection, $sql);
 }


/*Select the top product in the database*/

function top_produit()
{
	$sql = "SELECT produit.id_produit,nom_produit,description_produit,desc_courte_produit,prix,qte,images from produit inner join commande_produit on produit.id_produit = commande_produit.id_produit
	inner join commande on commande_produit.id_commande = commande.id_commande limit 1";
	global $connection;
	return mysqli_query($connection, $sql);
}

/* Check for injections code*/
function verification($donneeEntrer)
{
	$donneeEntrer = strip_tags($donneeEntrer);
	$donneeEntrer = str_replace(" ", "", $donneeEntrer);
	$donneeEntrer = strtolower($donneeEntrer);
	$donneeEntrer = ucfirst($donneeEntrer);
	return $donneeEntrer;
}

function verificationUsername($donneeEntrer)
{
	$donneeEntrer = strip_tags($donneeEntrer);
	$donneeEntrer = str_replace(" ", "", $donneeEntrer);
	return $donneeEntrer;
}


function verificationSearch($donneeEntrer)
{
	$donneeEntrer = strip_tags($donneeEntrer);
	$donneeEntrer = str_replace(" ", "", $donneeEntrer);
	return $donneeEntrer;
}
function verificationPassword($donneeEntrer)
{
	$donneeEntrer = strip_tags($donneeEntrer);
	return $donneeEntrer;
}

function verificationEmail($donneeEntrer)
{
	$donneeEntrer = strip_tags($donneeEntrer);
	return $donneeEntrer;
}

?>