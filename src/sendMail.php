<?php


require_once 'PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer(true);
$alert='';

if(isset($_POST['submit'])){
$nome = utf8_decode($_POST['nome']);
$email = utf8_decode($_POST['email']);
$mensagem = utf8_decode($_POST['mensagem']);
 
try{
    $mail->isSMTP();
    //Configuração do Servidor de e-mail

    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPSecure = "tsl";
    $mail->SMTPAuth=true;
    $mail->Username = "harrison.munguambe17@gmail.com";//Email para receber mensagens
    $mail->Password = "dofqcstcsekvfprc";// password do email

    //Configuração do Email
$mail->setFrom($mail->Username,"Portfolio");// Remetente
$mail->addAddress('harrison.munguambe17@gmail.com');//Email onde queres receber as mensagens-usa-se qualquer email
$mail->Subject = "Front-end Development";//Assunto do Email

$conteudo_email = "

<p><strong>Nome Completo:</strong>$nome</p> 
<p><strong>E-mail:</strong>$email</p>
<br>

<h3><strong>Mensagem:</strong></h3><br>

$mensagem
";

$mail->isHTML(true);
$mail->Body = $conteudo_email;

$mail->send();
$alert='<div class="alert-success">
<span>Mensagem Enviada! Obrigado por contactar.</span>
</div>';

}catch(Exception $e){
    $alert='<div class="alert-error">
    <span>'.$e->getMessage().'</span>
 </div>';
}
}

?>


