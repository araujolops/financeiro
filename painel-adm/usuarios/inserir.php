<?php
/*
 *  Created on : 23 de ago. de 2022, 20:44:12
 *  Author     : Alexandre
 *  Description: Incluir registro no cadastro de usuários.
 *  Alterado em: 28/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

/*  Dados vindo do formulário */
$cp1 = $_POST[$campo1];
$cp2 = $_POST[$campo2];
$cp3 = $_POST[$campo3];
$cp4 = $_POST[$campo4];

$id = @$_POST['id'];

/*
 *  Validar Campo 
 */
$query = $pdo->query("SELECT * FROM $pagina WHERE email='$cp2' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

/*
 *  Verifica se existe registro 
 */
$id_reg = @$result[0]['id'];

if($total_reg > 0 and $id_reg != $id):
    echo 'Este registro já está cadastrado!!!';
    exit();
endif;

if($id == ""):
       /*
        *  Insere o nível 
        */
      $query = $pdo->prepare("INSERT INTO $pagina SET nome = :campo1, email = :campo2, senha = :campo3, nivel_fk = :campo4");
else:
       /*
        *  Altera o nível 
        */
      $query = $pdo->prepare("UPDATE $pagina SET nome = :campo1, email = :campo2, senha = :campo3, nivel_fk = :campo4 WHERE id = '$id' ");
endif;

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":campo2", "$cp2");
$query->bindValue(":campo3", "$cp3");
$query->bindValue(":campo4", "$cp4");
$query->execute();

echo 'Salvo com Sucesso!';