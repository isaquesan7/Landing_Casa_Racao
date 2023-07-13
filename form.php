<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/conf/sweetalert2.all.min.js"></script>
    <link href="css/styles-php.css" rel="stylesheet" />
    <title>Pet King - Formulário</title>
</head>
<body>

    <script>
        function alerta(enviado){
                Swal.fire({
                title: 'Mensagem Enviada!',
                text: 'Sua mensagem foi enviada.',
                icon: 'success',
                confirmButtonText: '<a id="ok" href="index.html">OK</a>'
            })
        }
    </script>
    
</body>
</html>

<?php

date_default_timezone_set('America/Sao_Paulo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require 'conf/vendor/autoload.php';

if(isset($_POST['enviar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $data = date('d/m/y H:i:s');

    $mail = new PHPMailer();

    try {
    
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'petking0509@gmail.com';
        $mail->Password   = 'senha';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        
        $mail->setFrom('petking0509@gmail.com', 'Pet King');
        $mail->addAddress('petking0509@gmail.com', 'Pet King');     
       
        $mail->isHTML(true);                                  
        $mail->Subject = 'Contato - Pet King';
        $mail->Body    = "Mensagem enviada através do site Pet King, segue informações abaixo:<br><br>
                        <b>Nome: </b>". $nome."<br>
                        <b>Email: </b>". $email."<br>
                        <b>Mensagem:</b><br>". $mensagem."<br><br>"
                        . $data;

        $mail->AltBody = 'Contato - Pet King';
    
        $mail->send();
        echo "<script>alerta('enviado');</script>";
        

    } catch (Exception $e) {
        echo "Email não enviado. Error: {$mail->ErrorInfo}";
    }
    
}else{
    echo "<center><h1>Pagina acessada de forma invalida. <b><a href='index.html'>Clique aqui</a></b> e volte a pagina inicial do site.</h1></center>";
}