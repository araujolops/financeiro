<?php

/*
 *  Created on : 18 de ago. de 2022, 12:06:00
 *  Author     : Alexandre
 *  Description:
 *  Alterado em: 29/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */
@session_start();
/*
 * Pesquisa o Nivel na tabela  
 *  Alexandre em 29/08/2022 - Adicionei a pesquisa de Nível para fazer a comparação.
 */
$qry_nivel = $pdo->query("SELECT * FROM niveis where nivel='Administrador' ");
$res_nivel = $qry_nivel->fetchAll(PDO::FETCH_ASSOC);
$nivel_adm = $res_nivel[0]['id'];

if (@$_SESSION['nivel_usuario'] != $nivel_adm):
    echo "<script>window.location='../index.php'</script>";
endif;