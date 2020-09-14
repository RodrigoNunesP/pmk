-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/09/2020 às 16:53
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pmk`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `fone1` int(11) NOT NULL,
  `fone2` int(11) NOT NULL,
  `date_birthday` date NOT NULL,
  `date_register` date NOT NULL,
  `interval_donation` int(11) NOT NULL,
  `value` int(20) NOT NULL,
  `payment` int(11) NOT NULL,
  `adress` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `donors`
--

INSERT INTO `donors` (`donor_id`, `name`, `email`, `cpf`, `fone1`, `fone2`, `date_birthday`, `date_register`, `interval_donation`, `value`, `payment`, `adress`) VALUES
(8, 'Rodrigo Nunes', 'rodrigo.tche.rn@gmail.com', 61618441418, 997051533, 26138566, '1975-03-02', '2020-09-14', 1, 100, 1, 'Alameda Glete, 888 apto:93. cep 01215-001');

-- --------------------------------------------------------

--
-- Estrutura para tabela `interval_donations`
--

CREATE TABLE `interval_donations` (
  `interval_id` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `interval_donations`
--

INSERT INTO `interval_donations` (`interval_id`, `type`) VALUES
(1, 'Único'),
(2, 'Bimestral'),
(3, 'Semestral'),
(4, 'Anual');

-- --------------------------------------------------------

--
-- Estrutura para tabela `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `payments`
--

INSERT INTO `payments` (`payment_id`, `type`) VALUES
(1, 'Débito'),
(2, 'Crédito');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`);

--
-- Índices de tabela `interval_donations`
--
ALTER TABLE `interval_donations`
  ADD PRIMARY KEY (`interval_id`);

--
-- Índices de tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `interval_donations`
--
ALTER TABLE `interval_donations`
  MODIFY `interval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
