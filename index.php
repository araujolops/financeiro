<?php
/*
 *  Created on : 16 de ago. de 2022, 22:20:36
 *  Author     : Alexandre
 *  Description:
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once( 'conexao.php');

/*
 * Criar o Nível Administrador se não existir 
 */
$qry_nivel = $pdo->query("SELECT * FROM niveis where nivel='Administrador' ");
$res_nivel = $qry_nivel->fetchAll(PDO::FETCH_ASSOC);
$totalNivel_reg = @count($res_nivel);

$nivel_adm =   $res_nivel[0]['id'];     

if ($totalNivel_reg == 0):
    $pdo->query("INSERT INTO niveis SET nivel='Administrador ");
endif;

/*
 * Criar o usuário Administrador se não existir 
 */
$qry_user = $pdo->query("SELECT * FROM usuarios where nivel_fk=$nivel_adm ");
$res_user = $qry_user->fetchAll(PDO::FETCH_ASSOC);
$totalUser_reg = @count($res_user);

if ($totalUser_reg == 0)
{
    $pdo->query("INSERT INTO usuarios SET nome=' $nome_adm', email = '$email_adm', senha='123', nivel_fk=$nivel_adm ");
}
?>

<!DOCTYPE html>
<!--  
    Created on : 16 de ago. de 2022, 20:14:34
    Author     : Alexandre
        Description:
    @copyright (c) 2022, Alexandre - Ensist Sistemas
-->

<html lang="pt-br">
        <head>
                <link href="img/logo.ico" rel="shortcut icon" type="image/x-icon">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link href="css/estilo-login.css"  rel="stylesheet" >
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    

                <meta charset="UTF-8">
                <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title><?php echo $nome_sistema ?></title>
        </head>
        <body class="bg-light">
                <!------ Include the above in your HEAD tag ---------->

                <div class="container">
                        <div class="row">
                                <div class=""> <!-- Altera o back-ground da tela de login    col-sm-6 col-md-4 col-md-offset-4" -->

                                        <div class="account-wall">
                                                <img class="profile-img" src="img/logo.png"
                                                     alt="">
                                                <!-- O Form vai ser disparado nessa linha com método post -->
                                                <form class="form-signin" method="post" action="autenticar.php">
                                                        <input type="email" name='email' class="form-control mb-2" placeholder="E-mail" required autofocus> <!--  mb-3  afasta os quadros de e-mail e senha -->
                                                        <input type="password" name='senha' class="form-control" placeholder="Senha" required>
                                                        <div class="d-grid gap-2 mt-2">
                                                                <button class="btn btn-primary" type="submit">Entrar</button>
                                                        </div>

                                                </form>
                                        </div>

                                </div>
                        </div>
                </div>
        </body>
</html>
