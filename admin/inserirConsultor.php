<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "consultorM") {
        echo "<h1>Somente ADM<h1>";
    } else {
        require_once '../controle/gerenciarUsuariosConsultor.php';



        ?>
<!doctype html>
<html lang="pt-br">
<head>

<title>Gerenciar Consultor</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://www.copytraderbrasil.com.br/css/backoffice/styleconsultor.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<!--  link href="../estilo2.css" rel="stylesheet"-->

</head>
<style>
.btn {
	border: 1px solid black !important;
	border-radius: 30px !important;
	color: black !important;
	cursor: pointer;
	font-size: 1rem;
	background-color: whitesmoke !important;
	box-shadow: 0 0 4px black !important;
	padding-left: 5%;
	padding-right: 5%;
}
body
{
  background-color: white;
  background-image: none;
}
.containerdados .conteudo
{
  height: auto !important;
}
.colcadastro {
	background-color: white !important;
}
.table .thead-dark th
{
  background-color: #bb914a;
  border: 1px solid;
  text-align: center;
}
.table td, .table th
{
  text-align: center;
}
#link {
	opacity: 0;
	color: transparent;
	text-align: center;
	font-size: 10px;
	margin-top: 1rem;
	border: 0px;
	text-align: center;
}

.input-group-text {
	width: 150px;
	justify-content: center;
	padding: 10px;
	background-color: #bb914a;
	color: white;
}

.btncreate {
	display: flex;
	margin-left: auto;
	justify-content: center;
	padding: 10px;
	background-color: #bb914a;
	color: white;
	padding-left: 2rem;
	padding-right: 2rem;
	padding-top: 0.3rem;
	padding-bottom: 0.3rem;
	font-size: 16px;
}
#barranav {
    box-shadow: 0 0px 0px 3px #bb914a;
}
.form-control {
	height: 3rem !important;
}
#listauser
{
  margin-bottom: 10rem;
}
</style>

<nav id="barranav" class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#conteudoNavbarSuportado"
		aria-controls="conteudoNavbarSuportado" aria-expanded="false"
		aria-label="Alterna navegação">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
		<ul class="navbar-nav mr-auto">
			<a class="navbar-brand" href="#"> <img class="ml-4 logotipo"
				src="../images/logosemfundo.png" alt="">
			</a>
		</ul>
			<?php
        include_once '../menus/consultorMaster.php';
        ?>
	</div>
</nav>
<div class="container-fluid">
	<div class="row headerdados">
		<div class="col text-center">
			<h1>Gerenciamento de Consultor</h1>
		</div>
	</div>
</div>
<div class="container-fluid containerdados">
	<div class="row conteudo">

		<div class="col colcadastro">
<?php

        if (isset($erro))
            echo '<div style="color:#F00">' . utf8_encode($erro) . '</div><br/><br/>';
        else if (isset($sucesso))
            echo '<div style="color:#00f">' . utf8_encode($sucesso) . '</div><br/><br/>';

        ?>


		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
				<p></p>
				<div class="col-4 mx-auto">
					<h2>Novo cadastro</h2>
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
						type="hidden" value="<?=$obj?>" name="obj"> <input
						class="btncreate" type='submit'
						value='<?=(isset($_GET["objeto"]))?"Atualizar":"Confirmar"?>'>
				</div>

			</form>
    </div>
    </div>
    </div>
    <div id="listauser" class="container">
      <div class="row">

			<div class="col mx-auto">
				<h3>Lista de usuários</h3>
			</div>

			<table class="table" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nome</th>
						<th scope="col">E-mail</th>
						<th scope="col">Status</th>
						<th scope="col">Alterar</th>
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
		</div>
<script>
  new ClipboardJS('.btn');
  </script>
  <footer class="fixed-bottom page-footer font-small special-color-dark pt-4">

  	<!-- Footer Elements -->
  	<!-- Footer Elements -->

  	<!-- Copyright -->
  	<div class="footer-copyright text-center py-3">
  		© 2019 Copyright <a href="#"> MTBrasil</a>
  	</div>
  	<!-- Copyright -->

  </footer>
</body>
</html>
<?php
    }
}
?>
