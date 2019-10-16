<?php
require_once '../controle/dadosConfigurarConta.php';

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


</head>

<style>
.headerdados
{
  background-color: black;
  color: white;
  border-bottom: 1px solid black;
      height: 10%;
      display: flex;
      justify-content: center;
      align-items: center;
  }
.input-group-text
{
  width: 150px;
  justify-content: center;
  padding: 10px;
  background-color: #bb914a;
  color: white;
}
.form-control
{
  height: auto;
}
.btn
{

    padding-left: 10%;
    padding-right: 10%;
  	border-color: white;
  	font-family: "Gotham SSm A","Gotham SSm B","Helvetica Neue",sans-serif !important;
  	color: white;
  	background-color: #bb914a;
}
.dadosuser
{
  font-size: 20px !important;
}
.formdados
{
  background-color: white !important;
  border: 1px solid;
  padding: 4%;
  border-color: gray;
  margin-bottom: 0px !important;
    margin-block-end: 0px !important;
		height: 100%;
}
.formdados h5
{
  font-size: 16px;
}
body {
    background: url("https://i.pinimg.com/originals/0a/63/0b/0a630be2b073f47d06a784ab085d46b1.jpg");
}
.paineluser
{
  background-color: white;
}
.colinfos
{
  padding: 0px !important;
}
footer
{
  color: white;
  background-color: black;
  position: absolute;
bottom: 0;
width: 100%;
}
.paineluser
{
  border: 1px solid;
}
.containerdados .row
{
	height: 75%;
}
</style>
<body>

	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
	    <ul class="navbar-nav mr-auto">
	      <a class="navbar-brand" href="#">
	  <img class="ml-4" src="../images/logosemfundo.png" width="30" height="30" alt="">
	</a>
	    </ul>
	    <?php
	    if ($papel == "cliente") {
	        include_once '../menus/cliente.php';
	    }

	    if ($papel == "consultor") {
	        include_once '../menus/consultor.php';
	    }

	    if ($papel == "consultorM") {
	        include_once '../menus/consultorMaster.php';
	    }

	    if ($papel == "admin") {
	        include_once '../menus/admin.php';
	    }
	    ?>
	  </div>
	</nav>
	<div class="container-fluid">
	<div class="row headerdados">
	  <div class="col text-center">
	    <h1>Dados do Usuario</h1>
	  </div>
	</div>
	</div>


	<div class="container-fluid containerdados">
	<div class="row">
		<div id="menu" class="col-3 paineluser">


			<div class="dadosusuario">
				<ul class="sidebar">
					<li>Dados Pessoais</i>
				<li>E-MAIL: <?=$dados_usuario['email']?></li>
				<li>Nome: <?=$dados_usuario['nome']?></li>
				<li>link Indicacao: https://copytraderbrasil.com.br?a=<?=$dados_usuario['codigoindicacao']?></li>
			</ul>
			</div>

</div>

<div class="col-9 colinfos">

	<form class="formdados" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">



<div class="col-8 mx-auto">
			<?php

if (isset($erro))
    echo '
			<div style="color: #F00">' . utf8_encode($erro) . '</div>
			<br /> <br />';
else if (isset($sucesso))
    echo '
			<div style="color: #00f">' . utf8_encode($sucesso) . '</div>
			<br /> <br />';
?>

			<div>
				<p>Alterar Senha</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Senha atual</span>
					</div>
					<input type="password" class="form-control"
						placeholder="Insira sua senha" aria-label="Senha atual"
						aria-describedby="basic-addon1" name="senhaatual">
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2">Nova senha</span>
					</div>
					<input type="password" class="form-control" minlength="5"
						placeholder="Insira a nova senha" aria-label="Nova senha"
						aria-describedby="basic-addon2" name="novasenha">
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon3">Confirmar senha</span>
					</div>
					<input type="password" class="form-control" minlength="5"
						placeholder="Repita a nova senha"
						aria-label="Repita a nova senha" aria-describedby="basic-addon3"
						name="confirmacaosenhanova">
				</div>
        <div class="col text-center p-0 pt-3">
				<button class="btn" type="submit">Confirmar</button>
      </div>

			</div>

</div>
		</form>
	</div>
  	</div>
    	</div>

      <!-- Footer -->
      <footer class="page-footer font-small special-color-dark pt-4">

        <!-- Footer Elements -->
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright
          <a href="#"> MTBrasil</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->
</body>
</html>
