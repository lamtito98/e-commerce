<?php

require '../include/functions.php';

$id = $_POST['id'];

$result = delete_produit($id);

header("Location:products.php"); 
