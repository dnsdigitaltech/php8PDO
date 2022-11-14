<?php @session_start();?>
Painel administrativo

<p> <?php

    echo 'nome: '.$_SESSION['nome_usuario']. ' e nivel ' .$_SESSION['nivel_usuario']?>