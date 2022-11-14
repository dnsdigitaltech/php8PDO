<?php
    require_once("conexao.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');

?>