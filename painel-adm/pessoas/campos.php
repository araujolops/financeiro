<?php

/*
 *  Created on : 26 de ago. de 2022, 26:13:31
 *  Author     : Alexandre
 *  Description: Listar usuários
 *  Alterado em: 30/08/2022, 19:52
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

$pagina = 'pessoas';
/*
 *  Variáveis de Input
 */
$cmp_id = 'id'; /* Obrigatório*/
$cmp_Nome1 = 'nome'; /* Obrigatório*/
$cmp_TipoFJ2 = 'tipo_FJ';
$cmp_CpfCnpj3 = 'doc'; /* Obrigatório*/
$cmp_Ativo4 = 'ativo'; /* Obrigatório*/
$cmp_Fone5 = 'telefone'; /* Obrigatório*/
$cmp_Endereco6 = 'endereco';
$cmp_EndNro7 = 'endereco_nr';
$cmp_Obs8 = 'obs';
$cmp_Data9 = 'data'; /* Obrigatório*/
$cmp_Banco10 = 'banco_fk';
$cmp_Agencia11 = 'agencia';
$cmp_Conta12 = 'conta_bancaria';
$cmp_Email13 = 'email';

$cmp_eTransportadora = 'etransportadora'; /* Obrigatório*/

$ins_upd = "nome = :nome, tipo_FJ = :tipo_FJ, doc = :doc, ativo = :ativo, telefone = :telefone, endereco = :endereco, endereco_nr = :endereco_nr, obs = :obs, banco_fk = :banco_fk, agencia = :agencia, conta_bancaria = :conta_bancaria, email = :email, data = :data ";


/*
$cmp_id = 'id';
$cmp_TipoFJ2 = 'tipo_FJ';
$cmp_eCliente = 'ecliente';
  `efornecedor` char(1) DEFAULT 'S' COMMENT 'Fornecedor (S/N)',
  `etransportadora` char(1) NOT NULL DEFAULT 'S' COMMENT 'Transportadora (S/N)',
  `nome` varchar(50) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `endereco_nr` varchar(10) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco_fk` int(11) DEFAULT NULL,
  `agencia` varchar(15) DEFAULT NULL,
  `conta_bancaria` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
*/