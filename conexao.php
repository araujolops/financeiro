<?php

/*
 *  Created on : 16 de ago. de 2022, 22:20:36
 *  Author     : Alexandre
 *  Description:
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */
require_once('config.php');

date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Não foi possível conectar ao banco de dados! <br><br>' . $e;
}



