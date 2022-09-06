<?php
/*
 *  Created on : 25 de ago. de 2022, 20:25:12
 *  Author     : Alexandre
 *  Description: Excluir Registro
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

/*
 *   Dados vindo do formulário 
 */
$id = @$_POST['id-excluir'];

$pdo->query("DELETE FROM $pagina WHERE id = '$id' ");
echo 'Excluído com Sucesso!';