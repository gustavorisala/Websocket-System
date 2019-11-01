<?php
$i = 0;

if (isset($_GET["a"])) {
    $i = $_GET["a"];
}

include '../controle/cadastrarNovoUsuarioCleyton.php';
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
<link rel="stylesheet" href="https://www.copytraderbrasil.com.br/css/backoffice/styleconsultor.css">

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<!-- bootstrap - link cdn -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>Pre Cadastro Reinaldo Duarte MT BRASIL</title>
<link rel="icon" href="../imagens/favicon.png">
</head>
<style>

body {
	background:
		url("../images/background.jpg");
}

html, p {
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
}

.collogin {
	box-shadow: 0 0 100px black;
	background-color: black;
	height: 100%;
}
.box-login img
{
  width: 90%;
}
.box-login {
	padding-top: 5% !important;
	padding: 15%;
}
/*campos texto */
label {
	font-size: 18px;
	color: white;
}
/* botao enviar*/
.btn {
	border-color: white;
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
	font-size: 18px;
	color: white;
	background-color: #bb914a;
}
/* bloco erro*/
.form-control {
	border: 2px solid #bb914a7a
}

.errormsg {
	padding-top: 1%;
}

.rowtxtregister {
	padding-top: 2%;
}

.txtregister {
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
	font-size: 14px;
	color: white;
}

.btn:hover {
	background-color: white;
	color: black;
}
.provedor {
	color: #bb914a;
	margin-bottom: 2rem;
}

input {
  font-family: 'Helvetica', FontAwesome, sans-serif;
}

@media ( max-width : 65rem) {
	.collogin {
		max-width: 100%;
		flex: 100%;
		width: 100%;
	}
}
</style>
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
text-align: center;
color: white !important;
text-shadow: 0 0 2px black;
}
.titulocadastro
{
color: #b88b58;
}
body, html
{
/* height: 100% !important; */
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
background-size: 310vh !important;
background-image: url(imagens/bars.png) !important;
background-repeat-y: no-repeat;
background-position-y: bottom;
}
}
.colcontato
{
margin-bottom: 2rem !important;
}
.assinatura
{
padding-top: 1rem;
padding-bottom: 1rem;
background-color: transparent;
}
#precos
{
background-image: none;
}
.blocopagar
{
border: 1px solid #cc9966;
margin-top: 2rem;
box-shadow: 0 0 0 3px rgb(204, 153, 102);
border-radius: 20px;
background-color: #ffffff;
margin-bottom: 2rem;
}
.etapas p
{
color: white;
font-size: 14px !important;
}
.etapas
{
margin-bottom: 3rem;
}
.etapas li
{
color: white;
font-weight: bold;
font-size: 12px !important;
text-align: left;
}
.titulopag
{
color: white;
font-size: 24px;
text-shadow: 0 0 1px black;
}
</style>
<body>


	<!--/.nav-collapse -->


	<div class="container containerlogin h-100">
		<div class="row rowlogin h-100">
			<div class="col-8 mx-auto collogin">
				<div class="well box-login">
          <div class="col text-center">
					<a href="/"><img class="img-fluid" src="../images/logo.jpeg" /></a>
        </div>
            <div id="precos" class="container-fluid cadastre" data-aos="zoom-out-right">
              <div class="row">
                <div class="col colcontato">
                  <div class="row center">
                    <h1 class="titulo">CADASTRO CONCLUÃ�DO</h1>
                    </div>
                    </div>
                    </div>

                <div class="container blococadastro">
                    <div class="row">
                        <div class="col mx-auto col assinatura blococc text-center divisa">
                          <h4 class="text-center titulopag">Efetue o pagamento da sua assinatura</h1>
                            <div class="col-10 mx-auto blocopagar">
                                   <img class="img-fluid w-50 mb-3 mt-3" src="../images/logosemfundo.png">
                                   <h4>PLANO TRIMESTRAL</h>
                                   <h5 class="marrom valor">R$ 400,00</h>

                          </div>
                          <div class="col-10 mx-auto etapas">
                          <p>Aguardaremos a confirmaÃ§Ã£o do seu pagamento para liberar seu acesso,
                            atenÃ§Ã£o as seguintes informaÃ§Ãµes:</p>
                            <ol>
                              <li>VocÃª recebera em seu e-mail login e senha para acesso do Backoffice.</li>
                              <li>Recebera tambÃ©m em seu email o RobÃ´ MT Brasil, para instalar em seu computador,
                                o login serÃ¡ feito com seu login e senha da IQ Option que serÃ£o enviados juntamente no e-mail.</li>
                          </ol>
                          </div>
                          <div class="col">
                        <a href="javascript:void(0)"
                     onclick="PagSeguroLightbox('9CCB2EA7DBDB719EE45A7FB94E76D128'); return false;" class="btn btn-lg btncadastro btnassinar">EFETUAR PAGAMENTO</a>
                   <script type="text/javascript"
                     src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
                   <!-- FIM DO BOTAO PAGSEGURO -->
               </div>
                          </div>
                          </form>
                           </div>
            </div>
            </div>
        </div>








			</div>
		</div>
	</div>

</body>
</html>
