<?php

function emailExiste($email, $link)
{
    $sql = " SELECT email FROM user WHERE email = '$email'";
    $resultado_id = mysqli_query($link, $sql);
    $quantidade = $resultado_id->num_rows;

    return $quantidade > 0;
}

function salvarUsuario($nome, $email, $senha, $link, $indicacao)
{
    $sql = "INSERT INTO user(email, senha, userAtivo, papel, nome, indicacao, codigoindicacao) VALUES ('$email','$senha',1,'cliente','$nome', '$indicacao', '" . md5($email) . "')";
   // echo $sql;
    $resultado_id = mysqli_query($link, $sql);

    $sqlA = " SELECT id FROM user WHERE email = '$email'";
    $resultado_id = mysqli_query($link, $sqlA);
    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        $id = $dados_usuario['id'];
    }

    $sql2 = "INSERT INTO statususer(status, data, observacao, iduser, idadmin) VALUES ('preCadastro'," . strtotime(date("Y-m-d H:i:s")) . ",'Cadastro feito pelo site',$id,0)";
   // echo $sql2;
    $resultado_id = mysqli_query($link, $sql2);
    return $resultado_id;
}

function salvarUsuarioIQ($email, $link)
{
    $sql2 = "INSERT INTO useriq(ativo, operacaoAtivo, idUser, valorEntrada) VALUES (1,0,(select id from user where email='" . $email . "'),2.0)";
   // echo ("<script>console.log('PHP: " . $sql2 . "');</script>");
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

// session_start();
include_once ("conexaobd.php");

if (isset($_POST["nome"]) && isset($_POST["indicacao"]) && isset($_POST["emailUser"]) && isset($_POST["senhaUser"]) && isset($_POST["confirmarSenhaUser"])) {
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $i = $_POST["indicacao"];
    if (empty($_POST["emailUser"]))
        $erro = "Campo E-mail Obrigatório";
    else if (empty($_POST["nome"]))
        $erro = "Campo Nome Obrigatório";
    elseif (empty($_POST["senhaUser"]) || empty($_POST["confirmarSenhaUser"]))
        $erro = "Campo Senha Obrigatório";
    else if ($_POST["senhaUser"] != $_POST["confirmarSenhaUser"])
        $erro = "Senhas Não Correspondem!!!";
    else if (emailExiste($_POST["emailUser"], $link))
        $erro = "E-mail Já Cadastrado no Sistema!!!";
    else {
        // Vamos realizar o cadastro ou alteração dos dados enviados.
        if (salvarUsuario($_POST["nome"], $_POST["emailUser"], md5(utf8_encode($_POST["senhaUser"])), $link, $_POST["indicacao"])) {
            $sucesso = "Dados cadastrados com sucesso!";
        } else {
            $erro = "Erro ao Inserir Dados";
        }
    }
}

?>