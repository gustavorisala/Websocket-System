<?php


if (isset($_POST["i"])) {
   
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