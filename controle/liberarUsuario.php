<?php
$obj = "0";
$nome = "";
$email = "";
$papel = "admin";

function buscarDadosUsuarioPreCadastro($link)
{
    $sql = "SELECT id, nome, email, papel FROM user where id in (select idUser from statususer where status='preCadastro' and idUser not in (select idUser from statususer where status='completo')) and userativo=1 and papel='cliente'";
    echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosUsuario($link, $id)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where id=$id";
    echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosTodosUsuarios($link)
{
    $sql = "SELECT id, nome, email, papel, userAtivo FROM user where papel in ('consultorM', 'consultor', 'admin' ) order by nome DESC";
    echo ($sql);
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
    echo ($sql2);
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

function salvarUsuarioAdmin($nome, $email, $senha, $link, $papel)
{
    $sql2 = "INSERT INTO user(email, senha, userAtivo, papel, nome, indicacao) VALUES ('$email','$senha',1,'$papel','$nome', 0)";
    echo ($sql2);
    $resultado_id = mysqli_query($link, $sql2);

    return $resultado_id;
}

function getIdCliente($email, $link)
{
    $sql2 = "select id from user where email='" . $email . "'";
    // echo $sql2;
    $resultado_id = mysqli_query($link, $sql2);

    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        $id = $dados_usuario['id'];
    }
    return $id;
}

function mudarStatus($idAdm, $idCliente, $link)
{
    $sql2 = "INSERT INTO statususer(status, data, observacao, iduser, idadmin) VALUES ('completo'," . strtotime(date("Y-m-d H:i:s")) . ",'Cadastro alterado pelo suporte',$idCliente,$idAdm)";
     echo $sql2."<br>";
    $resultado_id = mysqli_query($link, $sql2);
    return $resultado_id;
}

function cadastrarIQ($email, $idCliente, $link)
{
    $sql2 = "INSERT INTO useriq(email, validade, idUser) VALUES ('$email','" . date("Y-m-d 00:00:00" , strtotime('90 days')) . "', $idCliente)";
    echo $sql2."<br>";
    $resultado_id = mysqli_query($link, $sql2);
    return $resultado_id;
}

function novaSenha($idCliente, $link)
{
    // gerar senha temporaria
    $senhaTemp = rand(100000, 999999);
    $sql2 = "update user set senha='".md5(utf8_encode($senhaTemp))."' where id=$idCliente";
    echo $sql2."<br>";
    $resultado_id = mysqli_query($link, $sql2);
    return $senhaTemp;
}

// session_start();
include_once ("conexaobd.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

if (isset($_POST["adm"]) && isset($_POST["email"])) {

    if (empty($_POST["email"]))
        $erro = "Campo E-mail Obrigatório";
    else {
        $idCliente=getIdCliente($_POST["email"], $link);
        mudarStatus($_POST["adm"], $idCliente, $link);
        cadastrarIQ($_POST["email"],$idCliente, $link);
        $novaSenha=novaSenha($idCliente, $link);
        echo $novaSenha;
    }
}

$dadosUsuarios = buscarDadosTodosUsuarios($link);
$dadosUsuariosPre = buscarDadosUsuarioPreCadastro($link);
?>