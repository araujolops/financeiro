-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31-Ago-2022 às 11:07
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeiro`
--
CREATE DATABASE IF NOT EXISTS `financeiro` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `financeiro`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancos`
--

DROP TABLE IF EXISTS `bancos`;
CREATE TABLE IF NOT EXISTS `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bancos`
--

INSERT INTO `bancos` (`id`, `nome`) VALUES
(1, 'Bradesco'),
(2, 'Itaú'),
(3, 'Santander'),
(4, 'Nubank'),
(5, 'Banco do Brasil'),
(6, 'Caixa Econômica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat_despesas`
--

DROP TABLE IF EXISTS `cat_despesas`;
CREATE TABLE IF NOT EXISTS `cat_despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cat_despesas`
--

INSERT INTO `cat_despesas` (`id`, `nome`) VALUES
(1, 'Folha de Pagamento'),
(2, 'Empresa'),
(3, 'Residência'),
(6, 'Despesa Pessoal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat_produtos`
--

DROP TABLE IF EXISTS `cat_produtos`;
CREATE TABLE IF NOT EXISTS `cat_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cat_produtos`
--

INSERT INTO `cat_produtos` (`id`, `nome`) VALUES
(1, 'Sapatos'),
(2, 'Bermudas'),
(3, 'Calças'),
(4, 'Sungas'),
(7, 'Biquines'),
(8, 'Camisas'),
(9, 'Camisetas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

DROP TABLE IF EXISTS `despesas`;
CREATE TABLE IF NOT EXISTS `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cat_despesa_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_despesas_cat_despesa` (`cat_despesa_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `nome`, `cat_despesa_fk`) VALUES
(1, 'Luz', 2),
(2, 'Água', 2),
(3, 'Telefone', 2),
(4, 'Vale Transporte', 1),
(5, 'PGTO', 1),
(6, 'Internet', 3),
(10, 'Água', 3),
(12, 'Aluguel', 6),
(13, 'Compras', 6),
(14, 'Supermercado', 6),
(15, 'Outra', 6),
(16, 'Viagem', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pgtos`
--

DROP TABLE IF EXISTS `formas_pgtos`;
CREATE TABLE IF NOT EXISTS `formas_pgtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formas_pgtos`
--

INSERT INTO `formas_pgtos` (`id`, `nome`) VALUES
(1, 'Boleto'),
(2, 'Carnê'),
(3, 'Cartão de Débito'),
(4, 'Cartão de Crédito'),
(5, 'Cheque'),
(6, 'Dinheiro'),
(7, 'Transferência'),
(8, 'Pix');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencias`
--

DROP TABLE IF EXISTS `frequencias`;
CREATE TABLE IF NOT EXISTS `frequencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `dias` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `frequencias`
--

INSERT INTO `frequencias` (`id`, `nome`, `dias`) VALUES
(1, 'Uma Vez', 0),
(2, 'Diária', 1),
(3, 'Semanal', 7),
(4, 'Mensal', 30),
(5, 'Trimestral', 90),
(6, 'Semestral', 180),
(7, 'Anual', 365);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

DROP TABLE IF EXISTS `niveis`;
CREATE TABLE IF NOT EXISTS `niveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `niveis`
--

INSERT INTO `niveis` (`id`, `nivel`) VALUES
(1, 'Administrador'),
(2, 'Nível 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_FJ` char(1) DEFAULT 'F' COMMENT 'Pessoa Física ou Jurídica',
  `ecliente` char(1) DEFAULT 'S' COMMENT 'Cliente (S/N)',
  `efornecedor` char(1) DEFAULT 'S' COMMENT 'Fornecedor (S/N)',
  `etransportadora` char(1) NOT NULL DEFAULT 'S' COMMENT 'Transportadora (S/N)',
  `nome` varchar(50) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `endereco_nr` varchar(10) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco_fk` int(11) DEFAULT NULL,
  `agencia` varchar(15) DEFAULT NULL,
  `conta_bancaria` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pessoas_banco` (`banco_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `tipo_FJ`, `ecliente`, `efornecedor`, `etransportadora`, `nome`, `doc`, `telefone`, `endereco`, `endereco_nr`, `ativo`, `obs`, `data`, `banco_fk`, `agencia`, `conta_bancaria`, `email`) VALUES
(1, 'F', 'S', 'N', 'N', 'Paula Campos', '458.555.555-55', '(45) 55555-5555', 'Rua A', NULL, 'Sim', 'Nenhuma', '2021-04-13', 5, '1', '', 'paula@hotmail.com'),
(2, 'F', 'S', 'N', 'N', 'Marcos Freitas', '485.555.555-55', '(59) 22522-2222', 'Rua C', NULL, 'Não', '', '2021-04-13', NULL, NULL, '', 'marcos@hotmail.com'),
(3, 'F', 'S', 'N', 'N', 'Empresa A', '44.455.555/5555-52', '(55) 88888-8888', 'Rua D', NULL, 'Sim', 'Nenhuma', '2021-04-13', 4, '3', '', 'empresax@hotmail.com'),
(4, 'F', 'N', 'S', 'N', 'Kamila Silva', '455.555.555-55', '(48) 81222-2222', 'Rua DDDDD', NULL, 'Sim', 'Nenhuma', '2021-04-14', 6, '2', '', 'kamila@hotmail.com'),
(5, 'J', 'N', 'S', 'N', 'Paula Marta', '66.455.555/5555-55', '(15) 54555-5555', 'Rua 6', NULL, 'Sim', '', '2021-04-14', NULL, NULL, '', 'paula@hotmail.com'),
(6, 'F', 'N', 'S', 'N', 'Matheus Silva', '151.555.555-55', '(15) 45555-5555', 'Rua A', NULL, 'Sim', '', '2021-04-14', NULL, NULL, '', 'mateus@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `categoria_fk` int(11) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produtos_cat_produtos` (`categoria_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `descricao`, `estoque`, `valor_compra`, `valor_venda`, `categoria_fk`, `foto`, `ativo`) VALUES
(6, '123', 'Bermuda Jeans', 'Bermuda xxxxxxxx', 0, '0.00', '69.99', 2, '14-04-2021-13-19-01-bermuda.jpg', 'Sim'),
(7, '12345', 'Sapato Social', 'Sapato Social de Couro', 0, '0.00', '120.00', 1, '14-04-2021-13-19-18-cat-6.jpg', 'Sim'),
(10, '0236', 'Camisa Polo', 'Camisa Polo Diversos Tamanhos', 125, '25.00', '49.99', 8, '14-04-2021-13-20-29-camisa-masc.jpg', 'Sim'),
(11, '589222', 'Calça Masculina', 'Calça Masculina Jeans', 13, '30.00', '130.00', 3, '14-04-2021-13-21-06-calca-masc.jpg', 'Sim'),
(12, '4586223', 'Camisa Feminina', 'Camisa Feminina ', 36, '50.00', '79.99', 8, '14-04-2021-13-24-18-camisa-femin.jpg', 'Sim'),
(13, '58555', 'Regata Masculina', 'Camiseta Regata Masculina', 45, '5.00', '50.00', 9, '14-04-2021-13-27-09-regata-masculina.jpg', 'Sim'),
(14, '5855589', 'Regata Feminina', 'Camiseta Feminina', 54, '4.00', '59.99', 9, '14-04-2021-13-28-27-regata-feminina.jpg', 'Sim'),
(15, '688955566', 'Sapato Feminino', 'Sapato', 7, '80.00', '59.99', 1, '14-04-2021-13-29-25-sapato-feminino.jpg', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `nivel_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_nivel` (`nivel_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_fk`) VALUES
(1, ' araujolops', 'araujolops@gmail.com', '123', 1),
(3, 'Teste', 'teste@teste.com', '123', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas` ADD FULLTEXT KEY `agencia_fk` (`agencia`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `fk_despesas_cat_despesa` FOREIGN KEY (`cat_despesa_fk`) REFERENCES `cat_despesas` (`id`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `fk_pessoas_banco` FOREIGN KEY (`banco_fk`) REFERENCES `bancos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_cat_produtos` FOREIGN KEY (`categoria_fk`) REFERENCES `cat_produtos` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_nivel` FOREIGN KEY (`nivel_fk`) REFERENCES `niveis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
