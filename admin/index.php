<?php
require_once '../controle/buscarDados.php';

session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=1');
} else {
    if ($_SESSION['papel'] != "admin") {
        echo "<h1>Somente ADM<h1>";
    } else {

        $id_usuario = $_SESSION['id_usuario'];

        // $UTC=-2; //horario de verão Brasilia
        date_default_timezone_set('America/Sao_Paulo');
        $dataInicio = date('d/m/Y', strtotime('-7 days'));
        $dataFinal = date('d/m/Y');

        if (isset($_POST['calendarioI']) && isset($_POST['calendarioF'])) {
            $dataInicio = $_POST['calendarioI'];
            $dataFinal = $_POST['calendarioF'];
        }

        ?>

<!doctype html>
<html lang="pt-br">
<head>

<title>ADMIN</title>
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">


		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li><a class="navbar-brand" href="../cliente/operacoes.php">Ordens</a></li>

				<li><a class="navbar-brand" href="../cliente/dadosCliente.php">Dados</a></li>
				

			
                         <?php

        if ($_SESSION['papel'] == "admin") {
            echo "<li><a class=\"navbar-brand\" href='../admin/admin.php'>ADMIN</a></li>";
        }
        ?>        
                               
	          </ul>
			<ul class="navbar-nav  my-2 my-lg-0">
				<li><a href="../sair.php">Sair</a></li>
			</ul>

			<!--/.nav-collapse -->

		</div>
	</nav>

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
		
		
        <?php

        // $dFinal=date('Y-d-m', strtotime($dataFinal));
        $dFinal = str_replace('/', '-', $dataFinal);

        $dInicial = str_replace('/', '-', $dataInicio);

        // echo strtotime($dInicial)." -- ".(strtotime($dFinal)+24*3600);

        $dInicial = strtotime($dInicial);
        $dFinal = (strtotime($dFinal) + 24 * 3600);

        $saldoOperacoes = buscarDadosTodasOrdens($dInicial, $dFinal);

        // $saldo= buscarSaldoUser($id_usuario);

        // echo "<p> Sessao NOME Usuario : ".$_SESSION['usuario']."</p><br><br><br><br>";

        // $dados2= buscarNomeSalaUser($id_usuario);

        ?>       
        <br>
		<div>
			<p>Resultados</p>
		</div>

		<table class="table" style="width: 80%">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">E-mail</th>
					<th scope="col">Resultado</th>
					<th scope="col">Moeda Corrente</th>
				</tr>

			</thead>
                   
             
        
      
 <?php

        $total = 0.0;
        $totalBRL = 0.0;
        $cont = 0;
        if (mysqli_num_rows($saldoOperacoes) > 0) {

            while ($row = mysqli_fetch_array($saldoOperacoes)) {
                $cont ++;
                echo "<tr >";
                echo "<th scope='row'>" . $cont . "</th>";
                echo "<th scope='row'>" . $row['emailiq'] . "</th>";
                echo "<th scope='row'>" . number_format($row['resultado'], 2, ',', '.') . "</th>";
                echo "<th scope='row'>" . $row['moedaCorrente'] . "</th>";

                echo "</tr> ";
                if ($row['moedaCorrente'] == "USD") {
                    $total = $total + $row['resultado'];
                }

                if ($row['moedaCorrente'] == "BRL") {
                    $totalBRL = $totalBRL + $row['resultado'];
                }
            }
        } else {
            echo ' <div><p>Sem Operações</p></div>';
        }
        ?></table><?php
        echo "<br><p>SALDO : " . number_format($total, 2, ',', '.') . "  USD</p>";
        echo "<br><p>SALDO : " . number_format($totalBRL, 2, ',', '.') . "  BRL</p><br>";

        ?>
    
   
    
	
	


	</div>




</body>
</html>
<?php
    }
}
?>