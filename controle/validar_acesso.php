<?php
session_start();

require_once ('conexaobd.php');

if (isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senhaMD5 = md5(utf8_encode($senha));

    $sql = " SELECT id, email, papel FROM user WHERE email = '$usuario' AND senha = '$senhaMD5' ";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['email'])) {

            $_SESSION['id_usuario'] = $dados_usuario['id'];
            $_SESSION['usuario'] = $dados_usuario['email'];

            $_SESSION['papel'] = $dados_usuario['papel'];

            if ($dados_usuario['papel'] == "admin") {
                header('Location: admin');
            } else if ($dados_usuario['papel'] == "consultorM") {
                header('Location: admin/consultorMaster.php');
            } else if ($dados_usuario['papel'] == "consultor") {
                header('Location: admin/consultor.php');
            } else {
                header('Location: cliente');
            }
        } else {
            $erro = "E-mail ou Senha Incorretos";
        }
    } else {
        $erro = "Erro na execuxão da consulta, favor entrar em contato com o admin do site";
    }
}
