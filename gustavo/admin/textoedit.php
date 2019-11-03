<?php


session_start();
require('db_config.php');


//if(move_uploaded_file($tmp, 'uploads/'.$image_name)){


$sql = "INSERT INTO text (texto) VALUES ('".$_POST['texto']."')";
$mysqli->query($sql);


?>
