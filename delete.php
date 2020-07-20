<?php
/* remove article from the cart*/
require 'include/functions.php';
$_SESSION;
$id = 'id';
unset($_SESSION[array_search($id, $_SESSION)]);


$_SESSION['count'] -= 1;


header("Location:panier.php");