<?php
require_once ('conexaobd.php');
require_once ('util/mail.php');

function emailExiste($email, $link)
{
    $sql = " SELECT email FROM user WHERE email = '$email'";
   // echo $sql;
    $resultado_id = mysqli_query($link, $sql);
    $quantidade = $resultado_id->num_rows;

    return $quantidade > 0;
}

function enviarEmailToken($email, $token)
{
    // Variável que junta os valores acima e monta o corpo do email
   // $Vai = "Nova Senha Solicitada, favor acessar link abaxo para definir nova Senha.\n\nlocalhost/painel/redefinirSenha.php?tokenrec=$token\n";

    $Vai = "<!doctype html>
    <html lang='pt-br'>
    <head></head>
    <body>
<p>Nova Senha Solicitada, favor acessar link abaxo para definir nova Senha.</p>
<br><br>
<a target='_blank' href='https://app.copytraderbrasil.com.br/redefinirSenha.php?tokenrec=$token'>app.copytraderbrasil.com.br/redefinirSenha.php?tokenrec=$token</a>
<br><br>
<p>Equipe MT BRASIL</p>
</body>
    </html>";

    // Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER),
    // o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

    if (smtpmailer($email, 'Redefinir Senha', $Vai)) {

        // Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.
        $sucesso="E-mail Enviado com Sucesso!!!<br>Acesse seu e-mail para continuar.";
    }
    if (! empty($error))
        echo $error;
}

function criarTokenEmail($email, $link)
{
    $tokenRec = md5(utf8_encode(date("d h-m-s") . $email));
    $sql = "update user SET tokenRec = '$tokenRec' where email='$email'";
    //echo $sql;
    $resultado_id = mysqli_query($link, $sql);
    if ($resultado_id) {
        return $tokenRec;
    }
    return "erro";
}

if (isset($_POST["email"])) {

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    if (emailExiste($_POST["email"], $link)) {
        $token = criarTokenEmail($_POST["email"], $link);
        enviarEmailToken($_POST["email"], $token);
    } else {
        $erro = "E-mail não encontrado no sistema!!!";
    }
}
