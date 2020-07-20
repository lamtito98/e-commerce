<?php

require '../include/functions.php';

$id = $_GET['id'];
$username = verificationUsername($_GET["username"]);
            $nom = verification($_GET["nom"]);
            $prenom = verification($_GET["prenom"]);
            $email = verificationEmail($_GET["email"]);
$result = update_client($id);

header("Location:clients.php");