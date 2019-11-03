<?php


session_start();
require('conexao.php');


if(isset($_POST) && !empty($_POST['id'])){


$sql = "DELETE FROM imagens_site WHERE id = ".$_POST['id'];
$conn->query($sql);


$_SESSION['success'] = 'Image Deleted successfully.';
header("Location: /");
}else{
$_SESSION['error'] = 'Please Select Image or Write title';
header("Location: /");
}


?>
