<?php
include_once ('conexaobd.php');

function salvarPagseguro($id, $pagseguro)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "Update user SET pagseguro='$pagseguro' where id=$id";
   // echo $sql;
    return mysqli_query($link, $sql);
}

function salvarUsuarioAlpari($nome, $email, $ssid, $idconta)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "Insert useralpari SET email='$email',nome='$nome', idConta=$idconta, ssid='$ssid'";

    return mysqli_query($link, $sql);
}

function enviarDadosUserIQ($email, $senha, $id, $copy, $entrada, $entradaFixoAtivo, $valorBase, $valorMaximo)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "UPDATE useriq SET email='$email',senha='$senha', operacaoAtivo=$copy, valorEntrada=$entrada, valorBase=$valorBase, valorMaximo=$valorMaximo, entradaValorFixo=$entradaFixoAtivo WHERE idUser=$id";

    $resultado_id = mysqli_query($link, $sql);
    return $sql;
}

function enviarDadosSala($sala, $id)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "UPDATE useriq SET idSala='$sala' WHERE idUser=$id";
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function enviarNovaSenha($id_usuario, $senha)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "UPDATE user SET senha='" . $senha . "' WHERE id=" . $id_usuario;
  //  echo ($sql . "<br>");
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

?>