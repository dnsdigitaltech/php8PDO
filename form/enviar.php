<?php
    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $mensagem   = $_POST['mensagem'];
    $assunto    = 'E-mail do site';
    $remetente  = 'dnssites@gmail.com';
    
    $conteudo = utf8_decode('Nome'. $nome."\r\n".
                            'E-mail'. $email."\r\n".
                            'Mensagem'. $mensagem."\r\n");

    $cabecalhos = "From: ".$email;
    mail($remetente, $assunto, $mensagem, $cabecalhos);
?>

<meta http-equiv="refresh" content="0; url=./">