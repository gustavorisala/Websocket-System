<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "suporte") {
        echo "<h1>Somente ADM<h1>";
    } else {
        require_once '../controle/gerenciarUsuarios.php';
        ?>

<!doctype html>
<html lang="pt-br">
<head>

<title>Gerenciar Usuarios ADMIN</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<meta charset="utf-8">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<!--  link href="../estilo2.css" rel="stylesheet"-->

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">


		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li><a class="navbar-brand" href="admin.php">um</a></li>

				<li><a class="navbar-brand" href="admin2.php">dois</a></li>
			</ul>
			<ul class="navbar-nav  my-2 my-lg-0">
				<li><a href="../sair.php">Sair</a></li>
			</ul>

			<!--/.nav-collapse -->

		</div>
	</nav>

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
						<span class="input-group-text" id="basic-addon3">E-mail</span>
					</div>

					<select class="selectpicker" data-live-search="true" name="papel">

<?php
        if ($dadosUsuariosPre) {

            while ($row = mysqli_fetch_array($dadosUsuariosPre)) {

                echo "<option value=\"" . $row['email'] . "\">" . $row['email'] . "</option>";
            }
        }

        ?>



					</select>
				</div>
				<input type="hidden" value="<?=$obj?>" name="obj">


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
					<th scope="col">Papel</th>
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
                echo "<th scope='row'>" . $row['papel'] . "</th>";
                echo "<th scope='row'>" . ($row['userAtivo'] == 1 ? 'Ativo' : 'Inativo') . "</th>";
                echo '  <td><a href="' . $_SERVER["PHP_SELF"] . '?objeto=' . base64_encode($row['id']) . '">Editar</a></td>';
            }
        }
        ?></table>







	</div>


	</div>

</body>
</html>
<?php
    }
}
?>