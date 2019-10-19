<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
$id_usuario = $_SESSION['id_usuario'];
require_once '../controle/operacoesIQ.php';

?>

<!doctype html>
<html lang="pt-br">
<head>

<title>Dados Cliente</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- bootstrap - link cdn -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

</head>

<div id="menu">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#conteudoNavbarSuportado"
			aria-controls="conteudoNavbarSuportado" aria-expanded="false"
			aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<a class="navbar-brand" href="#"> <img class="ml-4"
					src="../images/logosemfundo.png" width="30" height="30" alt="">
				</a>
			</ul>
	  <?php
include_once '../menus/cliente.php';
?>
	  </div>
	</nav>
</div>
<div align="center">
	<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
		<p>Periodo</p>

		<p>
			De : <input type="text" id="calendarioInicio" name="calendarioI"
				value="<?=$dataInicio ?>" />
		</p>
		<script>
$(function() {
    $( "#calendarioInicio" ).datepicker({dateFormat: 'dd/mm/yy'});
});
</script>

		<p>
			Ate: <input type="text" id="calendarioFim" name="calendarioF"
				value="<?=$dataFinal ?>" />
		</p>
		<script>
$(function() {
    $( "#calendarioFim" ).datepicker({dateFormat: 'dd/mm/yy'});
});
</script>

		<input type='submit' value='Filtrar'><br>
	</form>
	<br>
	<p>SALDO : <?=$saldo ?> <?=$moeda ?> </p>





	<table class="table" style="width: 80%">

		<p>Ordens</p>
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID Operacao</th>
				<th scope="col">Ativo</th>
				<th scope="col">Modo</th>
				<th scope="col">Sentido</th>
				<th scope="col">Hora Abertura</th>
				<th scope="col">Expiracao</th>
				<th scope="col">Preco Abertura</th>
				<th scope="col">Preco Fechamento</th>
				<th scope="col">Resultado</th>
			</tr>
		</thead>   
                   <?php

                if (mysqli_num_rows($dados) > 0) {

                    while ($row = mysqli_fetch_array($dados)) {

                        echo "<tr>";
                        echo "<th scope='row'>" . $row['idOperacao'] . "</th>";

                        $moeda = "";
                        if ($row['idAtivo'] == 1) {
                            $moeda = "EUR/USD";
                        }

                        if ($row['idAtivo'] == 6) {
                            $moeda = "USD/JPY";
                        }

                        if ($row['idAtivo'] == 5) {
                            $moeda = "GBP/USD";
                        }

                        echo "<th scope='row'>" . $moeda . "</th>";

                        echo "<th scope='row'>" . $row['tipo'] . "</th>";
                        echo "<th scope='row'>" . $row['direcao'] . "</th>";
                        echo "<th scope='row'>" . date("d/m/y H:i:s", $row['tempoAbertura']) . "</th>";
                        echo "<th scope='row'>" . date("d/m/y H:i:s", $row['expiracao']) . "</th>";
                        echo "<th scope='row'>" . $row['precoAbertura'] . "</th>";
                        echo "<th scope='row'>" . $row['precoFechamento'] . "</th>";

                        echo "<th scope='row'>$" . number_format($row['resultado'], 2, ',', '.') . "</th>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><th scope"row">Sem Ordens Fechadas...<th></tr>';
                }

                ?>
          </table>

</div>


<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>