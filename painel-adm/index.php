<?php
/*
 *  Created on : 17 de ago. de 2022, 19:59:01
 *  Author     : Alexandre
 *  Description: Painel Administrativo
 *  Alterado em: 28/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

@session_start();
require_once('../conexao.php');
require_once('verificar.php');

/* Recuperar dados do Usuário */
$id_usuario = $_SESSION['id_usuario'];

$query = $pdo->query("SELECT * FROM usuarios where id='$id_usuario' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$nome_usuario = $result[0]['nome'];
$email_usuario = $result[0]['email'];
$senha_usuario = $result[0]['senha'];
$nivel_usuario = $result[0]['nivel_fk'];

/* Menus do Painel */
$menu1 = 'home';
$menu2 = 'Pessoas';
$menu3 = 'niveis';
$menu4 = 'usuarios';
$menu5 = 'bancos';

if (@$_GET['pag'] == ""):
    $pag = $menu1;
else:
    $pag = @$_GET['pag'];
endif;
?>

<html>
        <head>
                <link href="../img/logo.ico" rel="shortcut icon" type="image/x-icon">

                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/> 
                <script type="text/javascript" src="../DataTables/datatables.min.js"></script>                                     
                <link rel="stylesheet" type="text/css" href="../css/style.css"/>

                <title><?php echo $nome_sistema ?></title>
        </head>
        <body>

                <nav class="navbar navbar-expand-lg bg-light">
                        <div class="container-fluid">
                                <a class="navbar-brand" href="index.php?pag=<?php echo $menu1 ?>"><img src="../img/logo.png" width="60px"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="index.php?pag=<?php echo $menu1 ?>">Home</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Cadastros
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu2 ?>">Clientes</a></li>
                                                                <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu4 ?>">Usuários</a></li>
                                                                <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu3 ?>">Níveis de Acesso</a></li>
                                                                <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu5 ?>">Bancos</a></li>
                                                        </ul>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link disabled">Disabled</a>
                                                </li>
                                        </ul>
                                        <div class="d-flex mr-4">
                                                <img class="img-profile rounded-circle" src="../img/usuario.png" width="40px" height="40px"/>
                                                <ul class="navbar-nav">

                                                        <li class="nav-item dropdown">
                                                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <?php echo @$nome_usuario; ?>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#" data-bs-target="#modalPerfil">Editar Dados</a></li>
                                                                        <li><hr class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
                                                                </ul>
                                                        </li>

                                                </ul>
                                        </div>
                                </div>
                        </div>
                </nav>                

                <!-- Mascaras JS -->
                <script type="text/javascript" src="../js/mascara.js"></script>

                <!-- Ajax para funcionar Mascaras JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 

                <div class="container-fluid mb-4 mx-4">
                    <?php
                    require_once($pag . '.php');
                    ?>
                </div>

        </body>
</html>

<!-- modalPerfil -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Editar Dados Usuário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="form-perfil" method="post">
                                <div class="modal-body">
                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome-usuario" placeholder="Nome" value="<?php echo $nome_usuario ?>">
                                        </div> 
                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" name="email-usuario" placeholder="E-mail" value="<?php echo $email_usuario ?>">
                                        </div> 
                                        <div class="mb-3">
                                                <label for="formControlInput" class="form-label">Senha</label>
                                                <input type="text" class="form-control" name="senha-usuario" placeholder="Senha" value="<?php echo $senha_usuario ?>">
                                        </div> 

                                        <small><div id="mensagem-perfil" align="center"></div></small>
                                        <input type="hidden" class="form-control" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                        </form>
                </div>
        </div>
</div>
