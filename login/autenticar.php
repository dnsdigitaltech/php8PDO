<?php
    require_once("../conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = 
            :email AND senha = :senha");
            $query->bindValue(":email", $email);
            $query->bindValue(":senha", $senha);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_res = count($res);

    $nivel = $res[0]['nivel'];
    
    if($total_res > 0){
        echo "<script language='javascript'> 
                window.location='painel-adm'
                </script>";
    }else{
        echo "<script language='javascript'> 
            window.alert('Dados Incorretos')
            </script>";
        echo "<script language='javascript'> 
            window.location='../login'
            </script>";
    }
?>