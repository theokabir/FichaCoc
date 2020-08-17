-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 07:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fichacoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `armas`
--

CREATE TABLE `armas` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Dano` varchar(30) NOT NULL,
  `BalasTotal` int(11) NOT NULL DEFAULT 0,
  `BalasCarregadas` int(11) NOT NULL DEFAULT 0,
  `Pente` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `armasdefogo`
--

CREATE TABLE `armasdefogo` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Minimo` int(11) NOT NULL DEFAULT 1,
  `Pontos` int(11) NOT NULL DEFAULT 1,
  `Checado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `armasdefogo`
--

INSERT INTO `armasdefogo` (`ID`, `Nome`, `Minimo`, `Pontos`, `Checado`) VALUES
(1, 'Espingarda', 30, 30, 0),
(2, 'Metralhadora', 15, 15, 0),
(3, 'Pistola', 20, 20, 0),
(4, 'Rifle', 25, 25, 0),
(5, 'Submetralhadora', 15, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caracteristica`
--

CREATE TABLE `caracteristica` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `pontos` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caracteristica`
--

INSERT INTO `caracteristica` (`ID`, `Nome`, `pontos`) VALUES
(1, 'FOR', 1),
(2, 'CON', 1),
(3, 'DES', 1),
(4, 'TAM', 1),
(5, 'APA', 1),
(6, 'INT', 1),
(7, 'EDU', 1),
(8, 'POD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golpe`
--

CREATE TABLE `golpe` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Dano` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golpe`
--

INSERT INTO `golpe` (`ID`, `Nome`, `Dano`) VALUES
(1, 'Agarrar', 'especial'),
(2, 'Cabeçada', '1D4+BD'),
(3, 'Chute', '1D6+BD'),
(4, 'Punho/Soco', '1D3+BD');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `NotaText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `NotaText`) VALUES
(1, 'Adicione notas <a href=\"editNota.php\">aqui<a>');

-- --------------------------------------------------------

--
-- Table structure for table `pericia`
--

CREATE TABLE `pericia` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `SubNome` varchar(30) NOT NULL DEFAULT '',
  `Minimo` int(11) NOT NULL DEFAULT 1,
  `Pontos` int(11) NOT NULL DEFAULT 1,
  `Checado` tinyint(1) NOT NULL DEFAULT 0,
  `extra` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pericia`
--

INSERT INTO `pericia` (`ID`, `Nome`, `SubNome`, `Minimo`, `Pontos`, `Checado`, `extra`) VALUES
(157, 'Antropologia', '', 1, 1, 0, 0),
(158, 'Arqueologia', '', 1, 1, 0, 0),
(159, 'Arremessar', '', 25, 25, 0, 1),
(160, 'Arte', '---', 5, 5, 0, 0),
(161, 'Artes Marciais', '', 1, 1, 0, 0),
(162, 'Astronomia', '', 1, 1, 0, 0),
(163, 'Barganha', '', 5, 5, 0, 0),
(164, 'Biologia', '', 1, 1, 0, 0),
(165, 'Cavalgar', '', 5, 5, 0, 0),
(166, 'Chaveiro', '', 1, 1, 0, 0),
(167, 'Computação', '', 1, 1, 0, 0),
(168, 'Contabilidade', '', 10, 10, 0, 0),
(169, 'crédito', '', 15, 15, 0, 0),
(170, 'Direito', '', 5, 5, 0, 0),
(171, 'Dirigir Auto.', '', 20, 20, 0, 0),
(172, 'Disfarce', '', 1, 1, 0, 0),
(173, 'Eletrônica', '', 1, 1, 0, 0),
(174, 'Escalar', '', 40, 40, 0, 1),
(175, 'Esconder', '', 10, 10, 0, 0),
(176, 'Escutar', '', 25, 25, 0, 1),
(177, 'Esquiva', '', 1, 1, 0, 1),
(178, 'Farmacia', '', 1, 1, 0, 0),
(179, 'Física', '', 1, 1, 0, 0),
(180, 'Fotografia', '', 10, 10, 0, 0),
(181, 'Furtividade', '', 10, 10, 0, 0),
(182, 'Geologia', '', 1, 1, 0, 0),
(183, 'Historia', '', 20, 20, 0, 0),
(184, 'Historia Natural', '', 10, 10, 0, 0),
(185, 'Lábia', '', 5, 5, 0, 0),
(186, 'Lingua Nativa', '', 1, 1, 0, 0),
(187, 'Localizar', '', 25, 25, 0, 0),
(188, 'Medicina ', '', 5, 5, 0, 1),
(189, 'Nadar', '', 25, 25, 0, 0),
(190, 'Navegar', '', 10, 10, 0, 0),
(191, 'Ocultar', '', 15, 15, 0, 0),
(192, 'Ocultismo', '', 5, 5, 0, 0),
(193, 'Ofício', '', 1, 1, 0, 1),
(194, 'Op. Maq. Pesada', '', 1, 1, 0, 0),
(195, 'Outra Língua', '', 1, 1, 0, 0),
(196, 'Persuadir', '', 15, 15, 0, 0),
(197, 'Pesq. Biblioteca', '', 25, 25, 0, 0),
(198, 'Pilotar', '', 1, 1, 0, 0),
(199, 'Primeiros socorros', '', 30, 10, 0, 1),
(200, 'Psicanálise', '', 1, 1, 0, 0),
(201, 'Psicologia', '', 5, 5, 0, 0),
(202, 'Pular/Saltar', '', 25, 25, 0, 1),
(203, 'Química', '', 1, 1, 0, 0),
(204, 'Rastrear', '', 10, 10, 0, 0),
(205, 'Reparo elétrico ', '', 10, 10, 0, 0),
(206, 'Reparo Mecânico', '', 20, 20, 0, 0),
(208, 'Agarrar', '', 25, 25, 0, 0),
(209, 'Cabeçada', '', 10, 10, 0, 0),
(210, 'Chute', '', 25, 25, 0, 0),
(211, 'Punho/Soco', '', 50, 50, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personagem`
--

CREATE TABLE `personagem` (
  `id` int(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `jogador` varchar(30) NOT NULL,
  `ocupacao` varchar(30) NOT NULL DEFAULT 'indefinido',
  `localnascimento` varchar(60) NOT NULL,
  `datanascimento` date NOT NULL,
  `idade` int(30) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `bd` varchar(30) NOT NULL DEFAULT 'NONE',
  `vidatotal` int(11) NOT NULL DEFAULT 1,
  `vidaatual` int(11) NOT NULL DEFAULT 1,
  `sorte` int(11) NOT NULL DEFAULT 1,
  `sanidade` int(11) NOT NULL DEFAULT 99,
  `morrendo` tinyint(1) NOT NULL DEFAULT 0,
  `lesaograve` tinyint(1) NOT NULL DEFAULT 0,
  `historia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personagem`
--

INSERT INTO `personagem` (`id`, `nome`, `jogador`, `ocupacao`, `localnascimento`, `datanascimento`, `idade`, `sexo`, `bd`, `vidatotal`, `vidaatual`, `sorte`, `sanidade`, `morrendo`, `lesaograve`, `historia`) VALUES
(1, 'Indefinido', 'Indefinido', 'Indefinido', 'Indefinido', '9999-09-09', 18, 'Indefinido', 'ERRO', 0, 0, 1, 1, 0, 0, 'Insira a história do seu personagem');

-- --------------------------------------------------------

--
-- Table structure for table `renda`
--

CREATE TABLE `renda` (
  `ID` int(11) NOT NULL,
  `Renda` int(11) NOT NULL,
  `Diario` int(11) NOT NULL,
  `Economia` int(11) NOT NULL,
  `Posse` text NOT NULL,
  `Imoveis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renda`
--

INSERT INTO `renda` (`ID`, `Renda`, `Diario`, `Economia`, `Posse`, `Imoveis`) VALUES
(1, 1, 1, 1, 'Insira as posses de seu personagem', 'Insira os imoveis do personagem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armas`
--
ALTER TABLE `armas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `armasdefogo`
--
ALTER TABLE `armasdefogo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `golpe`
--
ALTER TABLE `golpe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pericia`
--
ALTER TABLE `pericia`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nome` (`nome`);

--
-- Indexes for table `renda`
--
ALTER TABLE `renda`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armas`
--
ALTER TABLE `armas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `armasdefogo`
--
ALTER TABLE `armasdefogo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `golpe`
--
ALTER TABLE `golpe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pericia`
--
ALTER TABLE `pericia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `renda`
--
ALTER TABLE `renda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
