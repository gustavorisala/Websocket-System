<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "suporte") {
        echo "<h1>Somente ADM<h1>";
    } else {
        require_once '../controle/liberarUsuario.php';
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

					<select class="selectpicker" data-live-search="true" name="email">

<?php
        if ($dadosUsuariosPre) {

            while ($row = mysqli_fetch_array($dadosUsuariosPre)) {

                echo "<option value=\"" . $row['email'] . "\">" . $row['email'] . "</option>";
            }
        }

        ?>



					</select>
				</div>

				<input type="hidden" name="adm" value="<?=$_SESSION['id_usuario']?>">
				<input type='submit' value='Liberar Usuario'>
			</div>


		</form>



		<br>
		<p>Confirmacao de pagamento da Licenca 90 dias</p>
		<p>Cadastro na IQ option ok</p>
		<p>liberacao do usuario no backoffice</p>
		<p>link do programa MT BRASIL</p>
		<p>liberacao do usuario no backoffice</p>
		<p>envio das informcoes por email</p>




	</div>

</body>
</html>
<?php
    }
}
?>