-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2024 às 00:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `voluntariado`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `id_oportunidade` int(11) NOT NULL,
  `id_voluntario` int(11) NOT NULL,
  `status` enum('aguardando','aprovado','rejeitado') NOT NULL,
  `data_criacao` date NOT NULL,
  `data_ultima_modificacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `id_oportunidade`, `id_voluntario`, `status`, `data_criacao`, `data_ultima_modificacao`) VALUES
(1, 1, 1, 'aguardando', '2024-01-01', NULL),
(2, 2, 2, 'aprovado', '2024-01-01', NULL),
(3, 3, 1, 'aprovado', '2024-01-02', NULL),
(4, 4, 2, 'aprovado', '2024-01-03', NULL),
(5, 5, 1, 'rejeitado', '2024-01-04', NULL),
(6, 6, 2, 'aprovado', '2024-01-05', NULL),
(7, 7, 1, 'aguardando', '2024-01-06', NULL),
(8, 8, 2, 'aguardando', '2024-01-07', NULL),
(9, 9, 1, 'aguardando', '2024-01-08', NULL),
(10, 10, 2, 'aprovado', '2024-01-09', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `oportunidade`
--

CREATE TABLE `oportunidade` (
  `id` int(11) NOT NULL,
  `id_organizacao` int(11) NOT NULL,
  `titulo` tinytext NOT NULL,
  `descricao` tinytext NOT NULL,
  `data_evento` date NOT NULL,
  `localizacao` tinytext NOT NULL,
  `data_criacao` date NOT NULL,
  `data_ultima_modificacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `oportunidade`
--

INSERT INTO `oportunidade` (`id`, `id_organizacao`, `titulo`, `descricao`, `data_evento`, `localizacao`, `data_criacao`, `data_ultima_modificacao`) VALUES
(1, 1, 'Oportunidade A', 'Descrição da Oportunidade A', '2024-12-01', 'Local A', '2024-01-01', NULL),
(2, 2, 'Oportunidade B', 'Descrição da Oportunidade B', '2024-12-02', 'Local B', '2024-01-01', NULL),
(3, 1, 'Oportunidade C', 'Descrição da Oportunidade C', '2024-12-03', 'Local C', '2024-01-02', NULL),
(4, 1, 'Oportunidade D', 'Descrição da Oportunidade D', '2024-12-04', 'Local D', '2024-01-03', NULL),
(5, 2, 'Oportunidade E', 'Descrição da Oportunidade E', '2024-12-05', 'Local E', '2024-01-04', NULL),
(6, 2, 'Oportunidade F', 'Descrição da Oportunidade F', '2024-12-06', 'Local F', '2024-01-05', NULL),
(7, 1, 'Oportunidade G', 'Descrição da Oportunidade G', '2024-12-07', 'Local G', '2024-01-06', NULL),
(8, 1, 'Oportunidade H', 'Descrição da Oportunidade H', '2024-12-08', 'Local H', '2024-01-07', NULL),
(9, 2, 'Oportunidade I', 'Descrição da Oportunidade I', '2024-12-09', 'Local I', '2024-01-08', NULL),
(10, 2, 'Oportunidade J', 'Descrição da Oportunidade J', '2024-12-10', 'Local J', '2024-01-09', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `organizacao`
--

CREATE TABLE `organizacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `data_ultima_modificacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `organizacao`
--

INSERT INTO `organizacao` (`id`, `nome`, `cnpj`, `telefone`, `endereco`, `email`, `senha`, `descricao`, `data_criacao`, `data_ultima_modificacao`) VALUES
(1, 'Organização A', '12.345.678/0001-99', '1234567890', 'Rua A, 123', 'contato@organizacaoa.com', 'senhaA', 'Descrição da Organização A', '2024-01-01', NULL),
(2, 'Organização B', '98.765.432/0001-88', '0987654321', 'Rua B, 456', 'contato@organizacaob.com', 'senhaB', 'Descrição da Organização B', '2024-01-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `voluntario`
--

CREATE TABLE `voluntario` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_criacao` date NOT NULL,
  `data_ultima_modificacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `voluntario`
--

INSERT INTO `voluntario` (`id`, `nome`, `telefone`, `cpf`, `email`, `senha`, `data_criacao`, `data_ultima_modificacao`) VALUES
(1, 'Voluntário A', '1231231234', '111.222.333-44', 'voluntarioA@example.com', 'senhaVA', '2024-01-01', NULL),
(2, 'Voluntário B', '3213214321', '555.666.777-88', 'voluntarioB@example.com', 'senhaVB', '2024-01-01', NULL),
(3, 'joao', '11999352780', '12345678910', 'jo@gmail.com', '12345678', '2024-10-31', '2024-11-05'),
(4, 'luiz', '41983746634', '14572638901', 'luiz@gmail.com', '87654321', '2024-10-31', NULL),
(6, 'patricia', '42936738219', '12345678901', 'pat@gmail.com', '12344321', '2024-10-31', '2024-11-05'),
(7, 'jose', '11999352780', '12345678910', 'jose@gmail.com', '12345678', '2024-11-01', '2024-11-05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_oportunidade` (`id_oportunidade`),
  ADD KEY `id_voluntario` (`id_voluntario`);

--
-- Índices de tabela `oportunidade`
--
ALTER TABLE `oportunidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organizacao` (`id_organizacao`);

--
-- Índices de tabela `organizacao`
--
ALTER TABLE `organizacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `voluntario`
--
ALTER TABLE `voluntario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `oportunidade`
--
ALTER TABLE `oportunidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `organizacao`
--
ALTER TABLE `organizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `voluntario`
--
ALTER TABLE `voluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`id_oportunidade`) REFERENCES `oportunidade` (`id`),
  ADD CONSTRAINT `inscricao_ibfk_2` FOREIGN KEY (`id_voluntario`) REFERENCES `voluntario` (`id`);

--
-- Restrições para tabelas `oportunidade`
--
ALTER TABLE `oportunidade`
  ADD CONSTRAINT `oportunidade_ibfk_1` FOREIGN KEY (`id_organizacao`) REFERENCES `organizacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
