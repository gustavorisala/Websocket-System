<?php
require_once '../controle/dadosConsultor.php';

?>

<!doctype html>
<html lang="pt-br">
<head>

<title>Consultor</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<!--  link href="../estilo2.css" rel="stylesheet"-->

</head>

<body>
	<div id="menu">

<?php
include_once '../menus/consultor.php';
?>

</div>

	<div align="center">




		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">

			<p>Periodo</p>
			<div style="width: 80%">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">De :</span>
					</div>
					<input type="text" id="calendarioInicio" name="calendarioI"
						class="form-control" aria-describedby="basic-addon1"
						value="<?php echo $dataInicio ?>" />

				</div>
				<script>
$(function() {
    $( "#calendarioInicio" ).datepicker({dateFormat: 'dd/mm/yy'});
});
</script>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2">Ate:</span>
					</div>
					<input type="text" id="calendarioFim" name="calendarioF"
						class="form-control" aria-describedby="basic-addon2"
						value="<?php echo $dataFinal ?>" />
				</div>
				<script>
$(function() {
    $( "#calendarioFim" ).datepicker({dateFormat: 'dd/mm/yy'});
});
</script>
			</div>
			<input type='submit' value='Filtrar'><br>
		</form>


		<br>
		<div>
			<p>Qantidade De Clientes Aprovados No Periodo: <?=$quantidadeDeClienteAprovado?></p>
		</div>


		<table class="table" style="width: 80%">
			<thead class="thead-dark">
				<tr>


					<th scope="col">Resultado no Periodo</th>
					<th scope="col">Moeda Corrente</th>
				</tr>

			</thead>
                   
             
        
      
 <?php

if ($saldoOperacoes) {

    while ($row = mysqli_fetch_array($saldoOperacoes)) {

        echo "<tr >";
        echo "<th scope='row'>" . number_format($row['resultado'], 2, ',', '.') . "</th>";
        echo "<th scope='row'>" . $row['moedaCorrente'] . "</th>";
        echo "</tr> ";
    }
} else {
    echo utf8_encode('<tr><th>Sem Operações</th></tr>');
}

?>
    </table>






	</div>




</body>
</html>
