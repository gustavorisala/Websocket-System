<?php
 // Adiciona o arquivo class.phpmailer.php - você deve especificar corretamente o caminho da pasta com o este arquivo.
 require_once("PHPMailer/PHPMailerAutoload.php");
 // Inicia a classe PHPMailer
 $mail = new PHPMailer();
 // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
 $mail->IsSMTP(); // Define que a mensagem será SMTP
 $mail->Host = "smtp.copytraderbrasil.com.br"; // Seu endereço de host SMTP
 $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
 $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
 $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
 $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
 $mail->Username = 'contato@copytraderbrasil.com.br'; // Conta de email existente e ativa em seu domínio
 $mail->Password = 'Forex@2019'; // Senha da sua conta de email
 // DADOS DO REMETENTE
 $mail->Sender = "contato@copytraderbrasil.com.br"; // Conta de email existente e ativa em seu domínio
 $mail->From = "contato@copytraderbrasil.com.br"; // Sua conta de email que será remetente da mensagem
 $mail->FromName = "MTBrasil"; // Nome da conta de email
 // DADOS DO DESTINATÁRIO
 $mail->AddAddress('magnatadoforex@gmail.com', 'Magnata do Forex'); // Define qual conta de email receberá a mensagem
 //$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
 //$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
 $mail->AddBCC($email); // Define qual conta de email receberá uma cópia oculta
 // Definição de HTML/codificação
 $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
 $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 // DEFINIÇÃO DA MENSAGEM
     $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
     $mensagem = $_POST['mensagem'];

$conteudo = 'Cadastro confirmado, Aguarde o lançamento!';

 $mail->Subject  = "MTBrasil"; // Assunto da mensagem
 $mail->Body .= $conteudo; // Texto da mensagem
 $mail->Body .= "Cadastro Efetuado" . "<br>";
 $mail->Body .= $email . "<br>"; // Texto da me
 // ENVIO DO EMAIL
 $enviado = $mail->Send();
 // Limpa os destinatários e os anexos
 $mail->ClearAllRecipients();
 // Exibe uma mensagem de resultado do envio (sucesso/erro)
 if ($enviado) {
   echo "<script>alert('Mensagem enviada com sucesso.');</script>";
 } else {
   echo "Não foi possível enviar o e-mail.";
   echo "Detalhes do erro: " . $mail->ErrorInfo;
 }
?>
