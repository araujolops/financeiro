<?php

/*
 *  Created on : 25 de ago. de 2022, 20:25:12
 *  Author     : Alexandre
 *  Description: Excluir Registro
 *  Alterado em: 28/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

require_once("../../conexao.php");
require_once("campos.php");

/*
 *   Dados vindo do formulário 
 */
$id = @$_POST['id-excluir'];

/*
 * Verifica se o nível existe na tabela de Usuários.
 */
$query = $pdo->query("SELECT * from usuarios where nivel_fk = '$id'");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

if ($total_reg == 0):
    $pdo->query("DELETE FROM $pagina WHERE id = '$id' ");
    echo 'Excluído com Sucesso!';
else:
    echo 'Este nível possui usuários associados a ele, primeiro exclua estes usuários e depois exclua o nível!';
endif;
