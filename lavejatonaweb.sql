-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jun-2015 às 17:07
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lavejatonaweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_mensagens`
--

CREATE TABLE IF NOT EXISTS `t_mensagens` (
  `nome` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `assunto` varchar(40) NOT NULL,
  `duvida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_pagamento`
--

CREATE TABLE IF NOT EXISTS `t_pagamento` (
  `titular_cartao` varchar(40) NOT NULL,
  `numero_cartao` varchar(16) NOT NULL,
  `data_valid` varchar(10) NOT NULL,
  `cod_seg` varchar(3) NOT NULL,
  `id_pedido` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_pagamento`
--

INSERT INTO `t_pagamento` (`titular_cartao`, `numero_cartao`, `data_valid`, `cod_seg`, `id_pedido`) VALUES
('jose da silva', '0000000000000000', '11111', '123', 1),
('juninhoz duda', '1111111111111111', '1111', '123', 4),
('bianca duda', '1111111111111111', '112233', '321', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_servico`
--

CREATE TABLE IF NOT EXISTS `t_servico` (
  `id_usuario` int(11) NOT NULL,
`id_pedido` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_usuarios`
--

CREATE TABLE IF NOT EXISTS `t_usuarios` (
`cod_usuario` int(10) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_usuarios`
--

INSERT INTO `t_usuarios` (`cod_usuario`, `nome_usuario`, `senha`, `nome`, `email`, `sexo`) VALUES
(1, 'Junior', '12345', '', 'juniorrock007@gmail.com', 'M'),
(6, 'Neto duda', 'testando', '', 'testando@gmail.com', 'M'),
(7, 'Bianca duda', 'testando', '', 'teste@gmail.com', 'M'),
(8, 'Admin', 'admin', '', 'admin@gmail.com', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_mensagens`
--
ALTER TABLE `t_mensagens`
 ADD PRIMARY KEY (`nome`);

--
-- Indexes for table `t_pagamento`
--
ALTER TABLE `t_pagamento`
 ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `t_servico`
--
ALTER TABLE `t_servico`
 ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
 ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_servico`
--
ALTER TABLE `t_servico`
MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
MODIFY `cod_usuario` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
