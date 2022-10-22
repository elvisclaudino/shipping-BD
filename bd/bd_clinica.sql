-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 10-Set-2022 às 02:03
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Banco de dados: `shipping`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `carga`

CREATE TABLE `carga` (
  `id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `fk_tipo` int(11) NOT NULL,
  `volume` float NOT NULL

  FOREIGN KEY (`fk_tipo`) 
    REFERENCES `tipo_carga`(`id`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `carga`
  ADD PRIMARY KEY (`id`);
  FOREIGN KEY ('tipo.id')

--
-- Dados da tabela `carga`
--
INSERT INTO `carga` (`id`, `peso`, `fk_tipo`,`volume`) VALUES
(3,50,3,10),
(4,1,4,5),
(5,15,5,10),
(6,10,6,5);
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Estrutura da tabela `funcionario`

CREATE TABLE `funcionario` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`matricula`);

--
-- Dados da tabela `funcionario`
--
INSERT INTO `funcionario` (`matricula`, `nome`, `sobrenome`,`cargo`) VALUES
(5,'Adenor','Tite','Almoxerife'),
(6,'Fabio','Junior','Entregador'),
(7,'Felipe','Luis','Almoxerife'),
(8,'Julia','Puzzuoli','Entregador');
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Estrutura da tabela `transporte`

CREATE TABLE `transporte` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `capacidade_peso` float NOT NULL,
  `capacidade_volume` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id`);

--
-- Dados da tabela `transporte`
--
INSERT INTO `transporte` (`id`, `modelo`, `capacidade_volume`,`capacidade_peso`) VALUES
(9,'Caminhao',10,20000),
(10,'Moto',1.0,300);

-- --------------------------------------------------------
--
-- Estrutura da tabela `destino`

CREATE TABLE `destino` (
  `id` int(11) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `destino`
  ADD PRIMARY KEY (`id`);

--
-- Dados da tabela `destino`
--
INSERT INTO `destino` (`id`, `rua`, `numero`,`complemento`,`cep`) VALUES
(9,'Rua Adenor',666,'Casa','81234-111'),
(10,'Carecas',12,'Apartamento','34567-222')

-- --------------------------------------------------------
--
-- Estrutura da tabela `tipo_carga`

CREATE TABLE `tipo_carga` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tipo_carga`
  ADD PRIMARY KEY (`id`);

--
-- Dados da tabela `tipo`
--
INSERT INTO `tipo_carga` (`id`, `descricao`) VALUES
(1,'Tijolo'),
(2,'Madeira'),
(3,'Cimento'),
(4,'Pregos')

-- -- --------------------------------------------------------

--
-- Estrutura da tabela `entrega`

CREATE TABLE `entrega` (
  `id` int(11) NOT NULL,
  `data_recebimento` date NOT NULL,
  `data_previsao_entrega` date NOT NULL,
  `fk_destino` int(11) NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_carga` int(11) NOT NULL,
  `fk_transporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id`);













-- --
-- -- Dados da tabela `entrega`
-- --
-- INSERT INTO `entrega` (`id`, `data_recebimento`,`data_previsao_entrega`,`fk_destino`,`fk_funcionario`,`fk_carga`,`fk_transporte`) VALUES
-- (1,'2022-1-2','2022-1-2','2022-1-3',1,1),
-- (2,'Madeira'),
-- (3,'Cimento'),
-- (4,'Pregos')

-- -- --------------------------------------------------------

-- -- Índices para tabelas despejadas
-- --

-- --
-- -- Índices para tabela `especialidade`
-- --
-- ALTER TABLE `especialidade`
--   ADD PRIMARY KEY (`ID_Espec`);

-- --
-- -- Índices para tabela `medico`
-- --
-- ALTER TABLE `medico`
--   ADD PRIMARY KEY (`ID_Medico`),
--   ADD UNIQUE KEY `UN_CRM` (`CRM`),
--   ADD KEY `FK_ID_Espec` (`ID_Espec`);


-- -- AUTO_INCREMENT de tabelas despejadas

-- --
-- -- AUTO_INCREMENT de tabela `especialidade`
-- --
-- ALTER TABLE `especialidade`
--   MODIFY `ID_Espec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- --
-- -- AUTO_INCREMENT de tabela `medico`
-- --
-- ALTER TABLE `medico`
--   MODIFY `ID_Medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


-- --
-- -- Restrições para despejos de tabelas
-- --


-- --
-- -- Limitadores para a tabela `medico`
-- --
-- ALTER TABLE `medico`
--   ADD CONSTRAINT `FK_ID_Espec` FOREIGN KEY (`ID_Espec`) REFERENCES `especialidade` (`ID_Espec`);
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
