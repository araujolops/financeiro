<?php

/*
 *  Created on : 18 de ago. de 2022, 15:07:42
 *  Author     : Alexandre
 *  Description: Editar usuário para alteração.
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */
require_once('../conexao.php');

/*  Dados vindo do formulário */
$nome = $_POST['nome-usuario'];
$email = $_POST['email-usuario'];
$senha = $_POST['senha-usuario'];
$id = $_POST['id_usuario'];

/*  Verifica se o e-mail  já está cadastrado */
$query = $pdo->query("SELECT * FROM usuarios where email='$email' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);
        
/* Verifica se existe registro */
if ($total_reg > 0):
    $id_user = $result[0]['id'];

    if ($total_reg > 0 and $id_user != $id):
        echo $nome . " Este e-mail já está cadastrado para o Usuário: " . $result[0]['nome'] . " !!!";
        exit();
    endif;
endif;

/* Atualiza o usuário */
$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email,  senha = :senha WHERE id = '$id' ");
$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->execute();

echo "Salvo com Sucesso!";
