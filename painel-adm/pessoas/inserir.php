<?php

/*
 *  Created on : 23 de ago. de 2022, 20:44:12
 *  Author     : Alexandre
 *  Description: Incluir registro no cadastro de Clientes.
 *  Alterado em: 28/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

/*  Dados vindo do formulário */
$cp1 = filter_input(INPUT_POST, $cmp_Nome1,FILTER_SANITIZE_STRING); //  $_POST[$cmp_Nome1];
$cp2 = filter_input(INPUT_POST, $cmp_TipoFJ2,FILTER_SANITIZE_STRING); //  $_POST[$cmp_TipoFJ2];
$cp3 = filter_input(INPUT_POST, $cmp_CpfCnpj3,FILTER_SANITIZE_STRING); // $_POST[$cmp_CpfCnpj3];
$cp4 = filter_input(INPUT_POST, $cmp_Ativo4,FILTER_SANITIZE_STRING); // $_POST[$cmp_Ativo4];
$cp5 = filter_input(INPUT_POST, $cmp_Fone5,FILTER_SANITIZE_STRING); // $_POST[$cmp_Fone5];
$cp6 = filter_input(INPUT_POST, $cmp_Endereco6,FILTER_SANITIZE_STRING); // $_POST[$cmp_Endereco6];
$cp7 = filter_input(INPUT_POST, $cmp_EndNro7,FILTER_SANITIZE_STRING); // $_POST[$cmp_EndNro7];
$cp8 = filter_input(INPUT_POST, $cmp_Obs8,FILTER_SANITIZE_STRING); // $_POST[$cmp_Obs8];
$cp9 = filter_input(INPUT_POST, $cmp_Data9,FILTER_SANITIZE_STRING); // $_POST[$cmp_Data9];
$cp10 = filter_input(INPUT_POST, $cmp_Banco10,FILTER_SANITIZE_NUMBER_INT); // $_POST[$cmp_Banco10];
$cp11 = filter_input(INPUT_POST, $cmp_Agencia11,FILTER_SANITIZE_STRING); // $_POST[$cmp_Agencia11];
$cp12 = filter_input(INPUT_POST, $cmp_Conta12,FILTER_SANITIZE_STRING); // $_POST[$cmp_Conta12];
$cp13 = filter_input(INPUT_POST, $cmp_Email13,FILTER_SANITIZE_STRING); // $_POST[$cmp_Email13];

$id = @$_POST['id'];

/*
 *  Validar Campo pelo CPF/CNPJ
 */
$query = $pdo->query("SELECT * FROM $pagina WHERE doc='$cp3' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

/*
 *  Verifica se existe registro 
 */
$id_reg = @$result[0]['id'];

if ($total_reg > 0 and $id_reg != $id):
    echo 'Este registro já está cadastrado!!!';
    exit();
endif;

if ($id == ""):
    /*
     *  Insere o nível 
     */
    $query = $pdo->prepare("INSERT INTO $pagina SET " . $ins_upd);

    $query->bindValue(":$cmp_Data9", "curDate()", PDO::PARAM_STR);
else:
    /*
     *  Altera o nível 
     */
    $query = $pdo->prepare("UPDATE $pagina SET " . $ins_upd . " WHERE id = :id ");

    $query->bindValue(":$cmp_Data9", "$cp9", PDO::PARAM_STR);
endif;

$query->bindValue(":$cmp_id", "$id", PDO::PARAM_INT);
$query->bindValue(":$cmp_Nome1", "$cp1", PDO::PARAM_STR);
$query->bindValue(":$cmp_TipoFJ2", "$cp2", PDO::PARAM_STR);
$query->bindValue(":$cmp_CpfCnpj3", "$cp3", PDO::PARAM_STR);
$query->bindValue(":$cmp_Ativo4", "$cp4", PDO::PARAM_STR);
$query->bindValue(":$cmp_Fone5", "$cp5", PDO::PARAM_STR);
$query->bindValue(":$cmp_Endereco6", "$cp6", PDO::PARAM_STR);
$query->bindValue(":$cmp_EndNro7", "$cp7", PDO::PARAM_STR);
$query->bindValue(":$cmp_Obs8", "$cp8", PDO::PARAM_STR);
$query->bindValue(":$cmp_Banco10", "$cp10", PDO::PARAM_INT);
$query->bindValue(":$cmp_Agencia11", "$cp11", PDO::PARAM_STR);
$query->bindValue(":$cmp_Conta12", "$cp12", PDO::PARAM_STR);
$query->bindValue(":$cmp_Email13", "$cp13", PDO::PARAM_STR);

var_dump($cmp_id, $id, $cmp_Nome1, $cp1,
                                                        $cmp_TipoFJ2, $cp2, 
                                                        $cmp_CpfCnpj3, $cp3,
                                                        $cmp_Ativo4, $cp4,
                                                        $cmp_Fone5, $cp5, 
                                                        $cmp_Endereco6, $cp6,
                                                        $cmp_EndNro7, $cp7,
                                                        $cmp_Obs8, $cp8,
                                                        $cmp_Banco10, $cp10,
                                                        $cmp_Agencia11, $cp11,
                                                        $cmp_Conta12, $cp12,
                                                        $cmp_Email13, $cp13, $query);

echo 'Salvo com Sucesso!';
