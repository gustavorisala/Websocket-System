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

        $saldoOperacoes = buscarDadosTodasOrdensMomento();

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







				<br>
				<div>
					<p>Ordens Andamento</p>
				</div>

				<table class="table" style="width: 80%">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Quantidade</th>
							<th scope="col">expiracao</th>
							<th scope="col">precoAbertura</th>
							<th scope="col">tempoAbertura</th>
							<th scope="col">resultado</th>
						</tr>

					</thead>
                   
             
        
      
 <?php

        if (mysqli_num_rows($saldoOperacoes) > 0) {

            while ($row = mysqli_fetch_array($saldoOperacoes)) {
                echo "<tr >";
                echo "<th scope='row'>" . $row['trader'] . "</th>";
                echo "<th scope='row'>" . $row['quantidade'] . "</th>";
                echo "<th scope='row'>" .  date("d/m/y H:i:s", $row['expiracao']). "</th>";
                echo "<th scope='row'>" . $row['precoAbertura'] . "</th>";
                echo "<th scope='row'>" .  date("d/m/y H:i:s", $row['tempoAbertura']) . "</th>";
                echo "<th scope='row'>" . number_format($row['resultado'], 2, ',', '.') . "</th>";
            }
        } else {
            echo ' <div><p>Sem Operações</p></div>';
        }
        ?></table>




</div></form>


			</div>

</body>
</html>
<?php
    }
}
?>