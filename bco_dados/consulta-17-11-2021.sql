-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2021 às 15:05
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consulta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `exame` varchar(30) DEFAULT NULL,
  `medico` varchar(30) DEFAULT NULL,
  `laboratorio` varchar(20) DEFAULT NULL,
  `Pessoas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `dtnasc` date DEFAULT NULL,
  `mae` varchar(45) DEFAULT NULL,
  `logradouro` varchar(70) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `compl` varchar(20) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `dtnasc`, `mae`, `logradouro`, `numero`, `compl`, `bairro`, `cidade`, `uf`, `cep`) VALUES
(1, 'LUAN DE LIMA MARANGON', '37969546854', '1990-09-21', 'VANDA MARIA DE LIMA', 'RUA A', 10, 'CASA', 'CENTRO', 'MARTINOPOLIS', 'SP', '19500-000'),
(2, 'Luany', '111111111111', '1111-11-11', '111', '11', 1, '111', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `carteirinha` varchar(20) DEFAULT NULL,
  `plano` varchar(45) DEFAULT NULL,
  `Pessoas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `carteirinha`, `plano`, `Pessoas_id`) VALUES
(1, '2000000021001', 'Master', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Exames_Pessoas1_idx` (`Pessoas_id`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Planos_Pessoas1_idx` (`Pessoas_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `exames`
--
ALTER TABLE `exames`
  ADD CONSTRAINT `fk_Exames_Pessoas1` FOREIGN KEY (`Pessoas_id`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `planos`
--
ALTER TABLE `planos`
  ADD CONSTRAINT `fk_Planos_Pessoas1` FOREIGN KEY (`Pessoas_id`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
