-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2018 às 13:24
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automovel`
--

CREATE TABLE `automovel` (
  `idCarro` int(11) NOT NULL,
  `marca` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `km` int(11) NOT NULL,
  `combustivel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `portas` int(11) NOT NULL,
  `cambio` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `preco` int(10) NOT NULL,
  `idFilial` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `automovel`
--

INSERT INTO `automovel` (`idCarro`, `marca`, `modelo`, `cor`, `ano`, `placa`, `km`, `combustivel`, `portas`, `cambio`, `preco`, `idFilial`) VALUES
(2, 'asfahjk', 'afhsj', 'asjhfjk', 2378, 'asfjhj', 23, 'Gasolina', 2, 'Manual', 0, 0),
(3, 'chevrolet', 'vectra', 'vermelha', 2010, 'iii2222', 50000, 'flex', 4, 'automatico', 20000, 1),
(4, 'fiat', 'uno', 'branca', 2005, 'ccc3333', 80000, 'gasolina', 2, 'manual', 8000, 2),
(5, 'ford', 'fiesta', 'preta', 2012, 'aaa5050', 10000, 'flex', 4, 'manual', 22000, 3),
(6, 'citroen', 'aircross', 'vermelha', 2017, 'bbb0112', 10000, 'flex', 4, 'automatico', 53900, 4),
(7, 'volkswagen', 'fox', 'azul', 2018, 'ccc2325', 11000, 'flex', 4, 'automatico', 44800, 5),
(8, 'hyundai', 'hb20s', 'preta', 2015, 'abc2206', 120000, 'flex', 4, 'manual', 35000, 6),
(9, 'chevrolet', 'vectra', 'vermelha', 2010, 'iii2222', 50000, 'flex', 4, 'automatico', 20000, 1),
(10, 'fiat', 'uno', 'branca', 2005, 'ccc3333', 80000, 'gasolina', 2, 'manual', 8000, 2),
(11, 'ford', 'fiesta', 'preta', 2012, 'aaa5050', 10000, 'flex', 4, 'manual', 22000, 3),
(12, 'citroen', 'aircross', 'vermelha', 2017, 'bbb0112', 10000, 'flex', 4, 'automatico', 53900, 4),
(13, 'volkswagen', 'fox', 'azul', 2018, 'ccc2325', 11000, 'flex', 4, 'automatico', 44800, 5),
(14, 'hyundai', 'hb20s', 'preta', 2015, 'abc2206', 120000, 'flex', 4, 'manual', 35000, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `idFilial` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`idFilial`, `nome`, `cidade`, `endereco`, `fone`, `email`) VALUES
(1, 'sdg', 'Sgdsg', 'sdgs', '3423', 'sdgsd'),
(2, 'ze', 'canoas', 'rua xingu, 544', '4778889', 'ze@gmail.com'),
(3, 'aguia carros', 'porto alegre', 'av. bento, 22', '13451535', 'aguia@carros.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `idVendedor` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idFilial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`idVendedor`, `nome`, `sobrenome`, `fone`, `email`, `idFilial`) VALUES
(1, 'ajshdj', 'jhasjkdhj', 'dhsajkhj', 'dsjkahjk', 1),
(3, 'asjhdj', 'jksahdjk', 'sahdjh', 'ajshdjk', 1),
(4, 'ze', 'sukcva', '2378', 'dsahj', 1),
(5, 'João', 'Silva', '3774888', 'joao@gmail.com', 1),
(6, 'Diego', 'José', '23487841', 'diego@yahoo.com.br', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automovel`
--
ALTER TABLE `automovel`
  ADD PRIMARY KEY (`idCarro`);

--
-- Indexes for table `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`idFilial`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idVendedor`),
  ADD KEY `idFilial` (`idFilial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automovel`
--
ALTER TABLE `automovel`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `filial`
--
ALTER TABLE `filial`
  MODIFY `idFilial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `idVendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `vendedor_ibfk_1` FOREIGN KEY (`idFilial`) REFERENCES `filial` (`idFilial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
