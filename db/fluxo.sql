-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 04-Set-2014 às 21:01
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `fluxo`
--
CREATE DATABASE IF NOT EXISTS `fluxo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci;
USE `fluxo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecategoria`
--

CREATE TABLE IF NOT EXISTS `tecategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NmCategoria` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `FgStatus` char(1) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tecategoria`
--

INSERT INTO `tecategoria` (`idCategoria`, `NmCategoria`, `FgStatus`) VALUES
(1, 'Dota', 'A'),
(2, 'Informática', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tsusuario`
--

CREATE TABLE IF NOT EXISTS `tsusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NmUsuario` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsEmail` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsSenha` varchar(400) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tsusuario`
--

INSERT INTO `tsusuario` (`idUsuario`, `NmUsuario`, `DsEmail`, `DsSenha`) VALUES
(1, 'Brayner', 'brayner@alpha.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Alessandro', 'alessandro@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tumovimento`
--

CREATE TABLE IF NOT EXISTS `tumovimento` (
  `idMovimento` int(11) NOT NULL AUTO_INCREMENT,
  `FgTipo` char(1) NOT NULL,
  `DtMovimento` date NOT NULL,
  `DsMovimento` varchar(255) NOT NULL,
  `NuValor` float NOT NULL,
  `FgStatus` char(1) NOT NULL DEFAULT 'A',
  `tsUsuario_idUsuario` int(11) NOT NULL,
  `teCategoria_idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idMovimento`,`tsUsuario_idUsuario`,`teCategoria_idCategoria`),
  KEY `fk_tuMovimento_tsUsuario_idx` (`tsUsuario_idUsuario`),
  KEY `fk_tuMovimento_teCategoria1_idx` (`teCategoria_idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tumovimento`
--

INSERT INTO `tumovimento` (`idMovimento`, `FgTipo`, `DtMovimento`, `DsMovimento`, `NuValor`, `FgStatus`, `tsUsuario_idUsuario`, `teCategoria_idCategoria`) VALUES
(1, 'D', '2014-09-04', 'Jogar 10 horas direto', 100, 'A', 1, 1),
(2, 'R', '2014-09-30', 'Salário mensal', 900, 'A', 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
