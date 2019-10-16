<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "consultorM") {
        echo "<h1>Somente ADM<h1>";
    } else {
        require_once '../controle/gerenciarUsuariosConsultor.php';
        ?>

<!doctype html>
<html lang="pt-br">
<head>

<title>Gerenciar Usuarios ADMIN</title>
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
        include_once '../menus/consultorMaster.php';
        ?>

</div>

	<div align="center">

<?php

        if (isset($erro))
            echo '<div style="color:#F00">' . utf8_encode($erro) . '</div><br/><br/>';
        else if (isset($sucesso))
            echo '<div style="color:#00f">' . utf8_encode($sucesso) . '</div><br/><br/>';

        ?>


		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
			<p></p>
			<div style="width: 80%">

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Nome</span>
					</div>
					<input type="text" class="form-control" placeholder="Nome"
						aria-label="Nome" aria-describedby="basic-addon1" name="nome"
						value="<?=$nome?>">
				</div>
				<div class="input-group mb-3">

					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2">E-mail</span>
					</div>
					<input type="text" class="form-control" placeholder="E-mail"
						aria-label="E-mail" aria-describedby="basic-addon2" name="email"
						value="<?=$email?>">
				</div>

				<input type="hidden" value="consultor" name="papel"> <input
					type="hidden" value="<?=$obj?>" name="obj">


			</div>

			<input type='submit'
				value='<?=(isset($_GET["objeto"]))?"Atualizar":"Criar"?>'><br>
		</form>



		<br>
		<div>
			<p>Usuarios</p>
		</div>

		<table class="table" style="width: 80%">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
					<th scope="col">Ativo</th>
					<th scope="col">#</th>
				</tr>

			</thead>
                   
             
        
      
 <?php

        $cont = 0;
        if ($dadosUsuarios) {

            while ($row = mysqli_fetch_array($dadosUsuarios)) {
                $cont ++;
                echo "<tr >";
                echo "<th scope='row'>" . $cont . "</th>";
                echo "<th scope='row'>" . $row['nome'] . "</th>";
                echo "<th scope='row'>" . $row['email'] . "</th>";
                echo "<th scope='row'>" . ($row['userAtivo'] == 1 ? 'Ativo' : 'Inativo') . "</th>";
                echo '  <td><a href="' . $_SERVER["PHP_SELF"] . '?objeto=' . base64_encode($row['id']) . '">Editar</a></td>';
            }
        }
        ?></table>







	</div>



</body>
</html>
<?php
    }
}
?>