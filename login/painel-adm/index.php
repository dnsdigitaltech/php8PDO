<?php 
    ini_set("display_errors", "on");
    require_once("../../conexao.php");
    @session_start();
    //VERIFICA SE O USUÁRIO ESTÁ LOGADO E SE É DIFERENTE DE ADMINISTRADOR
    if(@$_SESSION['nivel_usuario'] != 'Administrador'){
        echo "<script language='javascript'> 
                window.location='../../login'
            </script>";
    }
?> 
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Painel Administrativo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Administrador</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Usuários</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><?=$_SESSION['nome_usuario']?></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
                <form method="GET" class="d-flex">
                    <input name="txtBuscar" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
        <div class="container">
            <button class="btn btn-info mt-4" type="submit" data-bs-toggle="modal" data-bs-target="#modalCadastrar">Novo Cadastro</button>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Nível</th>
                    <th scope="col">Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $txtBuscar = '%' .@$_GET['txtBuscar']. '%';
                        $query = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :nome OR  email LIKE :email");
                        $query->bindValue(":nome", $txtBuscar);
                        $query->bindValue(":email", $txtBuscar);
                        $query->execute();
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $totalRes = @count($res);
                        if($totalRes > 0){
                            foreach ($res as $key => $total) {
                                echo '
                                    <tr>
                                        <td>'.$total['nome'].'</td>
                                        <td>'.$total['email'].'</td>
                                        <td>'.$total['senha'].'</td>
                                        <td>'.$total['nivel'].'</td>
                                        <td>
                                            <a href="index.php?funcao=editar&id='.$total['id'].'" title="Editar Registro" class="mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </a>
                                            <a href="" title="Remover Registro" class="mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive text-danger" viewBox="0 0 16 16">
                                                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>';
                            }
                            
                        }else{
                            echo '<tr>
                                    <td colspan="4">Não existem dados</td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="modalCadastrarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCadastrarLabel">Cadastrar Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST">
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label for="NomeCad">Nome</label>
                                    <input type="text" name="nomeCad" class="form-control" id="NomeCad" aria-describedby="emailHelp" required>                    
                                </div>
                                <div class="form-group mb-2">
                                    <label for="emailCad">Email</label>
                                    <input type="email" name="emailCad" class="form-control" id="emailCad" aria-describedby="emailHelp" required>                    
                                </div>
                                <div class="form-group mb-2">
                                    <label for="senhaCad">Senha</label>
                                    <input type="password" name="senhaCad" class="form-control" id="senhaCad" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="senhaCad">Nível</label>
                                    <select class="form-select" aria-label="Default select" name="nivelCad">
                                        <option value="Cliente">Cliente</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Vendedor">Vendedor</option>
                                        <option value="Tesoureiro">Tesoureiro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="btnCadastrar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
    if(isset($_POST['btnCadastrar'])){

        $queryV = $pdo->prepare("SELECT * FROM usuarios WHERE email = 
            :email");
            $queryV->bindValue(":email", $_POST['emailCad']);
            $queryV->execute();
            $resV = $queryV->fetchAll(PDO::FETCH_ASSOC);
        $total_resV = @count($resV);
        if($total_resV > 0){
            echo "<script language='javascript'> 
                window.alert('O Usuário já está cadastrado!')
            </script>";
            exit();
        }

        $query = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) 
                        VALUES(:nome, :email, :senha, :nivel)");
            $query->bindValue(":nome", $_POST['nomeCad']);
            $query->bindValue(":email", $_POST['emailCad']);
            $query->bindValue(":senha", $_POST['senhaCad']);
            $query->bindValue(":nivel", $_POST['nivelCad']);
            $query->execute();
        echo "<script language='javascript'> 
            window.alert('Cadastrado com Sucesso!')
        </script>";
        echo "<script language='javascript'> 
            window.location='./'
            </script>";
    }

    if(isset($_GET['editar'])){
        echo "<script> 
                $('#modalCadastrar').modal('show')
            </script>";
    }
?>