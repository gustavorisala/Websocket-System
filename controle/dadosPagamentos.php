<?php
require_once 'buscarDados.php';
require_once 'EnviarDados.php';

session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "consultor" && $_SESSION['papel'] != "consultorM") {
        echo "<h1>Somente ADM<h1>";
    } else {
        $papel = $_SESSION['papel'];
        $idUser = $_SESSION['id_usuario'];
        if (isset($_POST["Pagseguro"])) {
            salvarPagseguro($idUser, $_POST["Pagseguro"]);
            $Sucesso = "Dados Salvos Com Sucesso.";
        }

        $Pagseguro = buscarPagseguro($idUser);
    }
}

?>