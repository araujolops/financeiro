<?php
/*
 *  Created on : 28 de ago. de 2022, 17:14:12
 *  Author     : Alexandre
 *  Description: Incluir registro no cadastro de niveis.
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

/*  Dados vindo do formulário */
$cp1 = $_POST[$campo1];

$id = @$_POST['id'];

/*
 *  Validar Campo 
 */
$query = $pdo->query("SELECT * FROM $pagina WHERE nivel='$cp1' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

/*
 *  Verifica se existe registro 
 */
$id_reg = @$result[0]['id'];

if($total_reg > 0 and $id_reg != $id):
    echo ' Este registro já está cadastrado!!!';
    exit();
endif;

if($id == ""):
       /*
        *  Insere o nível 
        */
      $query = $pdo->prepare("INSERT INTO $pagina SET nivel = :campo1");
else:
       /*
        *  Altera o nível 
        */
      $query = $pdo->prepare("UPDATE $pagina SET nivel = :campo1 WHERE id = '$id' ");
endif;

$query->bindValue(":campo1", "$cp1");
$query->execute();

echo 'Salvo com Sucesso!';