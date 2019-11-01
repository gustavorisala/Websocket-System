<?php
require_once ('conexaobd.php');
require_once ('util/mail.php');

$obj = "0";
$nome = "";
$email = "";
$papel = "admin";

function buscarDadosUsuario($link, $id)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where id=$id";
    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function enviarEmailUser($email, $senha, $nome)
{
    // Variável que junta os valores acima e monta o corpo do email
    // $Vai = "Nova Senha Solicitada, favor acessar link abaxo para definir nova Senha.\n\nlocalhost/painel/redefinirSenha.php?tokenrec=$token\n";
    $Vai = "<!doctype html>
    <html lang='pt-br'>
    <head></head>
    <body>
<p>MT BRASIL</p>
<br>
<p>Bem Vindo $nome</p>
<p>Usuario Criado com Sucesso por Reinaldo Duarte</p>
<br>
<p>Acesse o sistema pelo endereço: https://app.copytraderbrasil.com.br</p>
<p>E-mail: $email
<p>Senha Provisoria: $senha
<br>
<p>Link de Indicação: https://app.copytraderbrasil.com.br/provedorSinaisReinaldo/?a=".md5($email)."
<br><br>
<p>Equipe MT BRASIL</p>
</body>
    </html>";

    // Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER),
    // o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

    if (smtpmailer($email, 'MT BRASIL - Novo Usuario', $Vai)) {

        // Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.
        echo "E-mail Enviado com Sucesso!!!<br>Acesse seu e-mail para continuar.<br>";
    }
    if (! empty($error))
        echo $error;
}

function buscarDadosTodosUsuarios($link)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where papel in ('consultorM', 'consultor', 'admin' ) order by nome DESC";
    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosTodosUsuariosConsultor($link)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where papel ='consultor' order by nome DESC";
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
    // echo ($sql2);
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

function salvarUsuarioAdmin($nome, $email, $senha, $link, $papel)
{
    $sql2 = "INSERT INTO user(email, senha, userAtivo, papel, nome, indicacao, codigoindicacao) VALUES ('$email','$senha',1,'$papel','$nome', 0, '" . md5($email) . "')";
    // echo ($sql2);
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

// session_start();
include_once ("conexaobd.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["papel"]) && isset($_POST["obj"])) {

    if ($_POST["obj"] == "0") {

        if (empty($_POST["nome"]))
            $erro = "Campo Nome Obrigatório";
        else if (empty($_POST["email"]))
            $erro = "Campo E-mail Obrigatório";
        else if (empty($_POST["papel"]))
            $erro = "Campo Papel Obrigatório";
        else if (emailExiste($_POST["email"], $link))
            $erro = "E-mail Já Cadastrado no Sistema!!!";
        else {
            // gerar senha temporaria
            $senhaTemp = rand(100000, 999999);
            // echo $senhaTemp;

            // Vamos realizar o cadastro ou alteração dos dados enviados.
            if (salvarUsuarioAdmin($_POST["nome"], $_POST["email"], md5(utf8_encode($senhaTemp)), $link, $_POST["papel"])) {
                $sucesso = "Dados cadastrados com sucesso!<br/>Senha Temporaria: " . $senhaTemp;

                enviarEmailUser($_POST["email"], utf8_encode($senhaTemp), $_POST["nome"]);
            } else {
                $erro = "Erro ao Inserir Dados";
            }
        }
    } else {

        if (empty($_POST["nome"]))
            $erro = "Campo Nome Obrigatório";
        else if (empty($_POST["email"]))
            $erro = "Campo E-mail Obrigatório";
        else if (empty($_POST["papel"]))
            $erro = "Campo Papel Obrigatório";
        else 

        // Vamos realizar o cadastro ou alteração dos dados enviados.
        if (atualizarUsuarioAdmin($_POST["nome"], $_POST["email"], $link, $_POST["papel"], base64_decode($_POST["obj"]))) {
            $sucesso = "Dados Atualizado com sucesso!";
        } else {
            $erro = "Erro ao Inserir Dados";
        }

        $obj = "0";
    }
}

if (isset($_GET["objeto"])) {
    $objeto = base64_decode($_GET["objeto"]);
    // echo $objeto;
    $obj = $_GET["objeto"];

    $resultado_id = buscarDadosUsuario($link, $objeto);

    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);

        $nome = $dados_usuario['nome'];
        $email = $dados_usuario['email'];
        $papel = $dados_usuario['papel'];
    }
}
$dadosUsuarios = buscarDadosTodosUsuariosConsultor($link);

?>