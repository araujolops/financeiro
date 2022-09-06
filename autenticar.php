<?php

/*
 *  Created on : 17 de ago. de 2022, 18:35:34
 *  Author     : Alexandre
 *  Description: Autenticar o usuário registrado no sistema
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */
@session_start();

require_once( 'conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

/*
 * Pesquisa o Nivel na tabela  
 */
$qry_nivel = $pdo->query("SELECT * FROM niveis where nivel='Administrador' ");
$res_nivel = $qry_nivel->fetchAll(PDO::FETCH_ASSOC);
$nivel_adm = $res_nivel[0]['id'];
/*
 *  Pesquisa pelo Usuário e testa o nivel de acesso.
 */
$query = $pdo->prepare("SELECT * FROM usuarios where email = :email and senha = :senha ");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

if ($total_reg > 0)
{
    /* Nível de acesso do Usuário */
    $nivel = $result[0]['nivel_fk'];

    /*  Variáveis de Sessão */
    $_SESSION['nivel_usuario'] = $result[0]['nivel_fk'];
    $_SESSION['id_usuario'] = $result[0]['id'];
    $_SESSION['nome_usuario'] = $result[0]['nome'];

    /*  Se for Administrador */
    if ($nivel == $nivel_adm)
    {
        /*  Redireciona */
        echo "<script>window.location='painel-adm'</script>";
    }
}
else
{
    echo "<script>window.alert('Dados Incorretos!')</script>";
    echo "<script>window.location='index.php'</script>";
}