<?php 
    @session_start();
    //VERIFICA SE O USUÁRIO ESTÁ LOGADO E SE É DIFERENTE DE ADMINISTRADOR
    if(@$_SESSION['nivel_usuario'] != 'Administrador'){
        echo "<script language='javascript'> 
                window.location='../../login'
            </script>";
    }
?>

Painel administrativo

<p> <?php

    echo 'nome: '.$_SESSION['nome_usuario']. ' e nivel ' .$_SESSION['nivel_usuario']?>

<a href="../../logout.php">Sair</a>