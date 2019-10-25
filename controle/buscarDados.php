<?php
include_once ('conexaobd.php');

function buscarClientesNovosPeriodo($dInicial, $dFinal, $id_usuario)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = " SELECT count(user.id) as quant FROM user join statususer on statususer.idUser= user.id where indicacao = (select codigoindicacao from user where id=$id_usuario) and statususer.status='completo' and statususer.data >= $dInicial and statususer.data <= $dFinal";
    // echo ($sql);

    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}
function buscarClientesNovosPeriodoNome($dInicial, $dFinal, $id_usuario)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = " SELECT nome, sobrenome FROM user join statususer on statususer.idUser= user.id where indicacao = (select codigoindicacao from user where id=$id_usuario) and statususer.status='completo' and statususer.data >= $dInicial and statususer.data <= $dFinal";
    // echo ($sql);
    
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosTodasOrdens($inicio, $fim)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT  iq.email as emailiq , sum(o.resultado) as resultado, iq.moedaCorrente FROM operacao o join useriq iq on o.idUser=iq.idConta where o.expiracao >= " . $inicio . " and o.expiracao <= " . $fim . " group by o.idUser";
    // $sql = "SELECT sum(resultado) as total, (SELECT s.nome from sala s where id=iq.idSala) as nomesala , iq.moedaCorrente as moeda FROM operacao o join useriq iq on iq.idConta=o.idUser where o.status=1 and iq.idUser=".$id." and from_unixtime(o.expiracao) BETWEEN '".$inicio."' and '".$fim."' GROUP BY o.idUser";
    echo ("<script>console.log('PHP: " . $sql . "');</script>");

    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarResultadoClientesConsultor($dInicial, $dFinal, $id_usuario)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT sum(o.resultado) as resultado, iq.moedaCorrente FROM operacao o join useriq iq on o.idUser=iq.idConta join user u on u.id=iq.idUser where u.indicacao = (select user.codigoindicacao from user where user.id=$id_usuario) and o.expiracao >= " . $dInicial . " and o.expiracao <= " . $dFinal . " group by  iq.moedaCorrente";

    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarResultadoClientesConsultorTodos($dInicial, $dFinal, $id_usuario)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT idOperacao, precoAbertura, precoFechamento, tempoAbertura, expiracao, idAtivo, resultado, tipo, direcao, iq.moedaCorrente FROM operacao o join useriq iq on o.idUser=iq.idConta join user u on u.id=iq.idUser where u.indicacao in (select user.codigoindicacao from user where user.papel='consultor' or user.papel='consultorM') and o.expiracao >= " . $dInicial . " and o.expiracao <= " . $dFinal;

    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosUserCliente($id)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT nome, email, codigoindicacao FROM user WHERE id = $id";
    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
        return mysqli_fetch_array($resultado_id);
    }
    return null;
}

function buscarstatusUser($id)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT status from statususer WHERE idUser = $id order by data desc";
    // $sql = "SELECT idOperacao, precoAbertura, precoFechamento, tempoAbertura, expiracao, idAtivo, resultado, tipo, direcao FROM operacao WHERE idUser = (SELECT idConta from useriq where idUser=".$id.") and status =1 and from_unixtime(expiracao) BETWEEN '".$inicio."' and '".$fim."' ORDER BY expiracao DESC";
    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);

        return $dados_usuario;
    }
    return null;
}

function buscarOperacaoFechadasClientePeriodo($id, $inicio, $fim)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT idOperacao, precoAbertura, precoFechamento, tempoAbertura, expiracao, idAtivo, resultado, tipo, direcao FROM operacao WHERE idUser = (SELECT idConta from useriq where id=" . $id . ") and status =1 and expiracao >= " . $inicio . "  and expiracao <=" . $fim . "  ORDER BY expiracao DESC";
    // $sql = "SELECT idOperacao, precoAbertura, precoFechamento, tempoAbertura, expiracao, idAtivo, resultado, tipo, direcao FROM operacao WHERE idUser = (SELECT idConta from useriq where idUser=".$id.") and status =1 and from_unixtime(expiracao) BETWEEN '".$inicio."' and '".$fim."' ORDER BY expiracao DESC";
    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarDadosSalaSaldoUser($id, $inicio, $fim)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT sum(o.resultado) as total , iq.moedaCorrente as moeda FROM operacao o join useriq iq on iq.idConta=o.idUser where o.status=1 and iq.id=" . $id . " and o.expiracao >=" . $inicio . " and o.expiracao <=" . $fim . " GROUP BY o.idUser";
    // $sql = "SELECT sum(resultado) as total, (SELECT s.nome from sala s where id=iq.idSala) as nomesala , iq.moedaCorrente as moeda FROM operacao o join useriq iq on iq.idConta=o.idUser where o.status=1 and iq.idUser=".$id." and from_unixtime(o.expiracao) BETWEEN '".$inicio."' and '".$fim."' GROUP BY o.idUser";
    // echo ($sql);
    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);

        return $dados_usuario;
    } else {
        return 0;
    }
}

function confirmarSenhaAtual($id_user, $senha)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT count(id) as quant from user where id=" . $id_user . " and senha='" . $senha . "'";
    // echo ($sql . "<br>");
    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if ($dados_usuario['quant'] == 0) {

            return false;
        } else {
            return true;
        }
    }
    return false;
}

function buscarClientesNovosPeriodoMaster($dInicial, $dFinal, $id_usuario)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = " SELECT email, count(user.id) as quant FROM user join statususer on statususer.idUser= user.id where indicacao in (select codigoindicacao from user where papel = 'consultor') and statususer.status='completo' and statususer.data >= $dInicial and statususer.data <= $dFinal group by indicacao";
   // echo ($sql);

    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

function buscarClientesNovosPeriodoConsultores($dInicial, $dFinal, $id_usuario)
{
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = " SELECT count(user.id) as quant FROM user join statususer on statususer.idUser= user.id where indicacao in (select codigoindicacao from user where papel = 'consultor') and statususer.status='completo' and statususer.data >= $dInicial and statususer.data <= $dFinal";
    // echo ($sql);
    
    $resultado_id = mysqli_query($link, $sql);
    return $resultado_id;
}

?>