<?php
require_once ('conexaobd.php');
require_once ('util/mail.php');

function buscarTokenRec($token, $link)
{
    $sql = " SELECT email FROM user WHERE tokenrec = '$token'";
    echo $sql;
    $resultado_id = mysqli_query($link, $sql);
    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        return $dados_usuario['email'];
    }
    return null;
}

if (isset($_GET["tokenrec"])) {

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $email = buscarTokenRec($_GET["tokenrec"], $link);
    $token=$_GET["tokenrec"];
}

function enviarNovaSenha($token, $senha)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql1 = "UPDATE user SET senha='" . md5(utf8_encode($senha)) . "' WHERE tokenrec='" . $token . "'";
    echo ($sql1 . "<br>");
    $resultado_id = mysqli_query($link, $sql1);
    
    $sql2 = "UPDATE user SET tokenrec=NULL WHERE tokenrec='" . $token . "';";
    echo ($sql2 . "<br>");
    $resultado_id = mysqli_query($link, $sql2);
    
    return $resultado_id;
}

if (isset($_POST["senha1"]) && isset($_POST["senha2"]) && isset($_POST["token"]) && isset($_POST["email"])) {
    $email=$_POST["email"];
    $token=$_POST["token"];
    if ($_POST["senha1"] == $_POST["senha2"]) {
        enviarNovaSenha($_POST["token"], $_POST["senha1"]);
        $sucesso = "Senha Atualizadas com Sucesso.";
    } else {
        $erro = "A senha deve ser iguais a senha de confirmação";
    }
}
