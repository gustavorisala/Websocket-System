<?php

// session_start();
include_once ("buscarDados.php");

// $UTC=-2; //horario de verão Brasilia
date_default_timezone_set('America/Sao_Paulo');
$dataInicio = date('d/m/Y', strtotime('-7 days'));
$dataFinal = date('d/m/Y');

if (isset($_POST['calendarioI']) && isset($_POST['calendarioF'])) {
    $dataInicio = $_POST['calendarioI'];
    $dataFinal = $_POST['calendarioF'];
}
// $dFinal=date('Y-d-m', strtotime($dataFinal));
$dFinal = str_replace('/', '-', $dataFinal);

$dInicial = str_replace('/', '-', $dataInicio);

// echo strtotime($dInicial)." -- ".(strtotime($dFinal)+24*3600);

$dInicial = strtotime($dInicial);
$dFinal = (strtotime($dFinal) + 24 * 3600);

$saldoSala = buscarDadosSalaSaldoUser($id_usuario, $dInicial, $dFinal);

$saldo = number_format($saldoSala['total'], 2, ',', '.');
$moeda = $saldoSala['moeda'];


$dados = buscarOperacaoFechadasClientePeriodo($id_usuario, $dInicial, $dFinal);
?>