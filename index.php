<?php
    $nome = 'Davi Bernardo';
    $sobrenome = 'Santos';
    $idade = 20;
    $numero = 10;
    $mediaIdade = 30;


    echo $nome.' '.$sobrenome.'<br> tem '.$idade.' anos';
    echo '<p> Total: '.($idade + $numero);

    //TOMADAS DE DECISÃO IF
    if($idade > $mediaIdade){
        echo '<p>Idade maior que '.$mediaIdade.'</p>';
    }elseif($idade == $mediaIdade){
        echo '<p>Idade igual que '.$mediaIdade.'</p>';
    }else{
        echo '<p>Idade menor que '.$mediaIdade.'</p>';
    }

    //LAÇOS DE REPETIÇÃO
    for($i = 0; $i < 5; $i++){
        echo '<br> O valor de i é: '.$i; 
    }
?>