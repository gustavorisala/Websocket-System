<?php


if (isset($_POST["i"])) {
   
    $i = $_POST["indicacao"];
    if (empty($_POST["emailUser"]))
        $erro = "Campo E-mail Obrigat�rio";
    else if (empty($_POST["nome"]))
        $erro = "Campo Nome Obrigat�rio";
    elseif (empty($_POST["senhaUser"]) || empty($_POST["confirmarSenhaUser"]))
        $erro = "Campo Senha Obrigat�rio";
    else if ($_POST["senhaUser"] != $_POST["confirmarSenhaUser"])
        $erro = "Senhas N�o Correspondem!!!";
    else if (emailExiste($_POST["emailUser"], $link))
        $erro = "E-mail J� Cadastrado no Sistema!!!";
    else {
        // Vamos realizar o cadastro ou altera��o dos dados enviados.
        if (salvarUsuario($_POST["nome"], $_POST["emailUser"], md5(utf8_encode($_POST["senhaUser"])), $link, $_POST["indicacao"])) {
            $sucesso = "Dados cadastrados com sucesso!";
        } else {
            $erro = "Erro ao Inserir Dados";
        }
    }

   
}

?>