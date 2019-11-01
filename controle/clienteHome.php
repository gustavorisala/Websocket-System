<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
$id_usuario = $_SESSION['id_usuario'];
// session_start();
include_once ("buscarDados.php");

$status = buscarstatusUser($id_usuario);

$atual = $status['status'];
if ($atual == 'preCadastro') {
    echo "<h2>Pre Cadastro Efetivado!<br>Favor realizar os procedimentos descritos no site para concluir seu acesso ao sistema do MT BRASIL.</h2>";
}
if ($atual == 'completo') {
    date_default_timezone_set('America/Sao_Paulo');
    $dInicial = strtotime(date('d-m-Y', strtotime('-30 days')));
    $dFinal = strtotime(date('d-m-Y', strtotime('+1 days')));

    $saldoSala = buscarDadosSalaSaldoUser($id_usuario, $dInicial, $dFinal);

    $saldo = number_format($saldoSala['total'], 2, ',', '.');
    $moeda = $saldoSala['moeda'];

    // $saldoSalaA = buscarDadosSalaSaldoUserAlpari($id_usuario, $dInicial, $dFinal);

    // echo "<th>Resultado Alpari ultimo 30 dias : " . number_format($saldoSalaA['total'], 2, ',', '.') . " " . $saldoSalaA['moeda'] . "</th><br><br>";

    $dados = buscarDadosUserCliente($id_usuario);

    $email = $dados['email'];
    $nome = $dados['nome'];
    $validade = $dados['validade'];

    $indicacao = $dados['indicacao'];

    $provedor = "Reinaldo Silva";
    if ($indicacao == '0') {
        $provedor = "MT BRASIL";
    }

    if ($indicacao == '18b1ea8041812e6af37320a7e283bd95') {
        $provedor = "AutoInvesting";
    }
}
?>