<?php


session_start();
require('conexao.php');


if(isset($_POST) && !empty($_FILES['nome_arquivo']['name']) && !empty($_POST['nome_foto'])){


$name = $_FILES['nome_arquivo']['name'];
list($txt, $ext) = explode(".", $name);
$image_name = time().".".$ext;
$tmp = $_FILES['nome_arquivo']['tmp_name'];


if(move_uploaded_file($tmp, 'uploads/'.$image_name)){


$sql = "INSERT INTO imagens_site (nome_foto, nome_arquivo) VALUES ('".$_POST['nome_foto']."', '".$image_name."')";
$conn->query($sql);


$_SESSION['success'] = 'Image Uploaded successfully.';
header("Location: /");
}else{
$_SESSION['error'] = 'image uploading failed';
header("Location: /");
}
}else{
$_SESSION['error'] = 'Please Select Image or Write title';
header("Location: /");
}


?>
