<?php
include '../controle/cadastrarNovoUsuario.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<link rel='stylesheet'
	href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<!-- bootstrap - link cdn -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149416562-1"></script>
<title>Cadastro MT BRASIL</title>
<link rel="icon" href="../imagens/favicon.png">
</head>

    <style>
    .form-control::placeholder
    {
      color: black !important;
    }
    .form-control:focus::placeholder
    {
      color: black !important;
    }
    .form-control:focus
    {
      border-radius: 0px !important;
      background-color: transparent;
      border-top: 0px;
      border-left: 0px;
      border-right: 0px;
      box-shadow: none !important;
      border-color: black;
    }
.form-control
{
  border-radius: 0px !important;
  background-color: transparent;
  border-top: 0px;
  border-left: 0px;
  border-right: 0px;
}
.titulo
{
  color: black !important;
}
.cadastre
{
    background-color: #f8f9fa;
  background-image: url(imagens/1.jpg) !important;
  background-repeat-y: no-repeat;
  background-position-y: bottom;
}
.titulocadastro
{
  color: #b88b58;
}
body, html
{
  height: 100% !important;
  background-color: #f8f9fa !important;
}
@media screen and (max-width: 990px){
  .pricingTable{ margin-bottom: 25px; }
}
@media (max-width: 575.98px) {
  footer
  {
    position: relative !important;
  }
  .cadastre
  {
    background-color: #f8f9fa;
    background-size: 167% !important;
    background-image: url(imagens/bars.png) !important;
    background-repeat-y: no-repeat;
    background-position-y: bottom;
}
}
.colcontato
{
  margin-bottom: 1rem !important;
}
    </style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand logotipo d-block d-sm-none" href="#">
		<img src="images/logomt.png" alt="logotipo">
		</a>
	<button id="toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse justify-content-md-center row" id="navbarsExample08">
	<div class="col-2">
	<a class="logotipo d-none d-sm-block col text-center" href="#">
	<img class="img-fluid" src="images/logomt.png" alt="logotipo">
	</a></div>
	<div class="col-8 menu">
	<ul class="navbar-nav d-none">
		<li class="nav-item active">
			<a class="nav-link" href="body">INÍCIO</a>
		</li>
			<li class="nav-item">
		<a class="nav-link " href="#festas">DEPOIMENTOS</a>
				</li>
				<li class="nav-item">
			<a class="nav-link " href="#contato">ASSINATURAS</a>
					</li>
						<li class="nav-item">
					<a class="nav-link " href="#contato">CONTATO</a>
							</li>
	</ul>
							</div>
							<div class="col menu">
								<ul class="navbar-nav">
							<li class="nav-item  backofficelink">
						<a class="nav-link " href="https://app.copytraderbrasil.com.br/">BACKOFFICE</a>
								</li>
							</ul>
								</div>
	</div>
	</nav>
	<div id="precos" class="container-fluid cadastre" data-aos="zoom-out-right">
		<div class="row">
			<div class="col colcontato">
				<div class="row center">
					<h1 class="titulo">CADASTRO</h1>
					</div>
					</div>
					</div>

			<div class="container blococadastro">
					<div class="row">
						<div class="col-sm-4 col-12 blococc mx-auto">
							<form id="cadastroform" class="blococontato cadastro" method="post" action="<?=$_SERVER["PHP_SELF"]?>">
								<?php

								if (isset($erro))
								    echo '<div class="erro" style="color:#F00">' . utf8_encode($erro) . '</div><br/>';
								else if (isset($sucesso))
								    echo '<div style="color:#00f">' . utf8_encode($sucesso) . '</div><br/>';

								?>
								<div class="messages"></div>
								<div class="controls mt-2">
									<div class="row mb-3">
										<div class="col titulocadastro">
											<h4>Preencha com seus dados</h1>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div id="formname" class="form-group d-flex">
												<input id="nome" type="text" name="nome" class="form-control" pattern="^[a-zA-Z][a-zA-Z-_\.]{1,15}$" placeholder="Nome:" required="required" data-error="Campo obrigatório.">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="row">
											<div class="col">
												<div id="formname" class="form-group d-flex">
													<input id="nome" type="text" name="sobrenome" class="form-control" placeholder="Sobrenome:" required="required" data-error="Campo obrigatório.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group d-flex">
												<input id="email" type="email" name="emailUser" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="E-mail:" required="required" data-error="Campo obrigatório.">
												<div class="help-block with-errors"></div>
											</div>
										</div>
								</div>
								<div class="row">
										<div class="col">
											<div id="formtel" class="form-group d-flex">
												<input id="telefone"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" type="tel" name="WhatsApp" class="form-control" placeholder="WhatsApp:" required="required" data-error="Campo obrigatório.">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
								</div>
							<div class="row">
									<div class="col">
										<div id="enviar" class="form-group signupcadastro">
											<button class="btn btn-lg btncadastro btnassinar" type="submit">Cadastre-se</button>
											</div>
										</div>
									</div>
								</div>
								</form>
								 </div>
	</div>
	</div>

	<footer class="fixed-bottom page-footer copyright center-on-small-only pt-0 mt-0" style="height: 90px;">
	  <div id="footercel" class="col col-12 col-centered d-flex align-items-center justify-content-center p-0" style="height: auto; color: white;font-size: 18px; font-family: 'Arial';">
	    <div class="col-12 col-md-12 ">
	      <div class="row">
	        <div class="col-12 d-block d-sm-none align-middle">
	          <p>© Copyright 2019 MT BRASIL - Todos os direitos reservados</p>
	        </div>
	        <div class="col-md-5 offset-md-4 copyright d-none d-sm-block">
	          <p>© Copyright 2019 MT BRASIL - Todos os direitos reservados</p>
	        </div>

	      </div>
	    </div>
	  </div>
	</footer>
	<!-- Optional JavaScript -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script type="text/javascript" src="mdbpro/js/mdb.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
