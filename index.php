<?php
    $nome = 'Davi Bernardo';
    $sobrenome = 'Santos';
    $idade = 38;

    $numero = 10;


    echo $nome.' '.$sobrenome.'<br> tem '.$idade.' anos';
    echo '<p> Total: '.($idade + $numero);

    //TOMADAS DE DECISÃO IF
    if($idade > 30){
        echo '<p>Idade maior que 30</p>';
    }
?>