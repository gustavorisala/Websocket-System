<?php
require_once ('util/mail.php');
$obj = "0";
$nome = "";
$email = "";
$papel = "admin";

function enviarEmailUser($email, $senha, $nome, $senhaIQ)
{
    // Variável que junta os valores acima e monta o corpo do email
    // $Vai = "Nova Senha Solicitada, favor acessar link abaxo para definir nova Senha.\n\nlocalhost/painel/redefinirSenha.php?tokenrec=$token\n";
    $Vai = "<!doctype html>
    <html lang='pt-br'>
    <head><meta charset='utf-8'></head>
    <body>
<p>MT BRASIL</p>
<br>
<p>Bem Vindo $nome</p>
<p>Usuario Criado com Sucesso no MT BRASIL</p>
<br>
<p>Acesse o sistema pelo endereço: https://app.copytraderbrasil.com.br</p>
<p>E-mail: $email
<p>Senha Provisoria: $senha
<br><br>
<p>Conta Criada na IQ Option, segue dados de acesso
<p>Email: $email
<p>Senha Provisoria: $senhaIQ
<h4><b>Favor Alterar da senha na IQ Option por questões de Segurança</b></h4>
<br>
<p>Link para Download do programa: https://app.copytraderbrasil.com.br/downloads/clienteVersaoAtual
<br><br>
<p>Equipe MT BRASIL</p>
</body>
    </html>";

    // Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER),
    // o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

    if (smtpmailer($email, 'MT BRASIL - Novo Cliente', $Vai)) {

        // Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.
        echo "E-mail Enviado com Sucesso!!!";
    }
    if (! empty($error))
        echo $error;
}

function buscarDadosUserEmail($link, $email)
{
    $sql = "SELECT id, nome, email, papel FROM user where email='$email'";
   // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($resultado_id)) {
        return $row;
    }
    return null;
}

function buscarDadosUsuarioPreCadastro($link)
{
    $sql = "SELECT id, nome, email, papel FROM user where id in (select idUser from statususer where status='preCadastro' and idUser not in (select idUser from statususer where status='completo')) and userativo=1 and papel='cliente'";
   // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosUsuario($link, $id)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where id=$id";
   // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosTodosUsuarios($link)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where papel in ('consultorM', 'consultor', 'admin' ) order by nome DESC";
   // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function emailExiste($email, $link)
{
    $sql = " SELECT email FROM user WHERE email = '$email'";
    $resultado_id = mysqli_query($link, $sql);
    $quantidade = $resultado_id->num_rows;

    return $quantidade > 0;
}

function salvarUsuario($nome, $email, $senha, $link, $indicacao)
{
    $sql = "INSERT INTO user(email, senha, userAtivo, papel, nome, indicacao) VALUES ('$email','$senha',1,'cliente','$nome', $indicacao)";
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function atualizarUsuarioAdmin($nome, $email, $link, $papel, $id)
{
    $sql2 = "Update user set email='$email', papel='$papel', nome='$nome' where id='$id'";
 //   echo ($sql2);
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

function salvarUsuarioAdmin($nome, $email, $senha, $link, $papel)
{
    $sql2 = "INSERT INTO user(email, senha, userAtivo, papel, nome, indicacao) VALUES ('$email','$senha',1,'$papel','$nome', 0)";
   // echo ($sql2);
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

function getIdCliente($email, $link)
{
    $sql2 = "select id, nome from user where email='" . $email . "'";
    // echo $sql2;
    $resultado_id = mysqli_query($link, $sql2);

    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        return $dados_usuario;
      
    }
    return null;
}

function mudarStatus($idAdm, $idCliente, $link)
{
    $sql2 = "INSERT INTO statususer(status, data, observacao, iduser, idadmin) VALUES ('completo'," . strtotime(date("Y-m-d H:i:s")) . ",'Cadastro alterado pelo suporte',$idCliente,$idAdm)";
   // echo $sql2 . "<br>";
    $resultado_id = mysqli_query($link, $sql2);
    return $resultado_id;
}

function cadastrarIQ($email, $idCliente, $link)
{
    $sql2 = "INSERT INTO useriq(email, validade, idUser) VALUES ('$email','" . date("Y-m-d 00:00:00", strtotime('90 days')) . "', $idCliente)";
   // echo $sql2 . "<br>";
    $resultado_id = mysqli_query($link, $sql2);
    return $resultado_id;
}

function novaSenha($idCliente, $link)
{
    // gerar senha temporaria
    $senhaTemp = rand(100000, 999999);
    $sql2 = "update user set senha='" . md5(utf8_encode($senhaTemp)) . "' where id=$idCliente";
  //  echo $sql2 . "<br>";
    $resultado_id = mysqli_query($link, $sql2);
    return $senhaTemp;
}

// session_start();
include_once ("conexaobd.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

if (isset($_POST["adm"]) && isset($_POST["email2"])) {
   
    if (isset($_POST["contaIQ"]) && isset($_POST["pagamento"])) {
        if (empty($_POST["email"]))
            $erro = "Campo E-mail Obrigatório";
        else {
           
            $dados_usuario = getIdCliente($_POST["email2"], $link);
            $idCliente=$dados_usuario['id'];
            $nome=$dados_usuario['nome'];
            mudarStatus($_POST["adm"], $idCliente, $link);
            cadastrarIQ($_POST["email2"], $idCliente, $link);
            $novaSenha = novaSenha($idCliente, $link);
         //   echo $novaSenha;
            $senhaTemp = substr($_POST["email2"], 0, 3) . date("dm");
            enviarEmailUser($_POST["email2"], $novaSenha, $nome, $senhaTemp);
        }
    }else{
        echo "Setar Confirmações";
    }
}

$dadosUsuarios = buscarDadosTodosUsuarios($link);
$dadosUsuariosPre = buscarDadosUsuarioPreCadastro($link);
if (isset($_POST["email"])) {
    $dadosUser = buscarDadosUserEmail($link, $_POST["email"]);
    $senhaTemp = substr($_POST["email"], 0, 3) . date("dm");
}
?>