<?php

require_once '../controle/buscarDados.php';
require_once '../controle/EnviarDados.php';

session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=1');
}
$id_usuario = $_SESSION['id_usuario'];
$papel = $_SESSION['papel'];

if (isset($_POST['senhaatual']) && isset($_POST['novasenha']) && isset($_POST['confirmacaosenhanova'])) {
    
    if (confirmarSenhaAtual($id_usuario, md5(utf8_encode($_POST['senhaatual'])))) {
        if ($_POST['novasenha'] == $_POST['confirmacaosenhanova']) {
            enviarNovaSenha($id_usuario, md5(utf8_encode($_POST['novasenha'])));
            $sucesso = "Senha Atualizada";
        } else {
            $erro = "Nova Senha deve ser igual a Confirmacao da Senha!!!";
        }
    } else {
        $erro = "Senha Atual nao corresponde!!!";
    }
}


$dados_usuario = buscarDadosUserClienteConf($id_usuario);

//$dados_usuario = mysqli_fetch_array($dados);

?>