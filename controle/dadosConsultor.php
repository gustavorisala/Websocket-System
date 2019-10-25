<?php
require_once 'buscarDados.php';

session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "consultor") {
        echo "<h1>Somente ADM<h1>";
    } else {

        $id_usuario = $_SESSION['id_usuario'];
        $papel = $_SESSION['papel'];

        // $UTC=-2; //horario de verão Brasilia
        date_default_timezone_set('America/Sao_Paulo');
        $dataInicio = date('d/m/Y', strtotime('-7 days'));
        $dataFinal = date('d/m/Y');

        if (isset($_POST['calendarioI']) && isset($_POST['calendarioF'])) {
            $dataInicio = $_POST['calendarioI'];
            $dataFinal = $_POST['calendarioF'];
        }

        $dFinal = str_replace('/', '-', $dataFinal);

        $dInicial = str_replace('/', '-', $dataInicio);

        $dInicial = strtotime($dInicial);

        $dFinal = (strtotime($dFinal) + 24 * 3600);
        $novosClientesNome = buscarClientesNovosPeriodoNome($dInicial, $dFinal, $id_usuario);  
        $novosClientes = buscarClientesNovosPeriodo($dInicial, $dFinal, $id_usuario);
        $saldoOperacoes = buscarResultadoClientesConsultor($dInicial, $dFinal, $id_usuario);

        $quantidadeDeClienteAprovado = 0;
        if ($novosClientes) {
            while ($row = mysqli_fetch_array($novosClientes)) {
                $quantidadeDeClienteAprovado = $row['quant'];
            }
        }
    }
}

?>