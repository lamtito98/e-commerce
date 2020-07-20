<?php

require '../include/functions.php';

$id = $_POST['id'];

$result = delete($id);

header("Location:clients.php");  