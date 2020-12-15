-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2019 às 00:10
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capaestagiodb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `codigoAluno` varchar(10) NOT NULL,
  `dataNascimento` varchar(10) DEFAULT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cc` varchar(12) DEFAULT NULL,
  `telefone` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `idTurma`, `codigoAluno`, `dataNascimento`, `morada`, `localidade`, `email`, `cc`, `telefone`) VALUES
(9, 'JoÃ£o Sousa', 1, 'a110634', '2019-07-16', 'Rua 1', 'Gondomar', 'joao@sousa.pt', '000999888123', 123123123),
(10, 'Gustavo Almeida', 1, 'a110635', '2019-07-09', 'Rua 2', 'Gondomar', 'gustavo@almeida.pt', '347685768394', 437685768),
(11, 'Cristiana Campos', 1, 'a110636', '2019-07-15', 'Rua 3', 'Gondomar', 'cristiana@campos.pt', '783645769845', 458796784);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoavaliacao`
--

CREATE TABLE `autoavaliacao` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `IEE` int(11) NOT NULL,
  `AC` int(11) NOT NULL,
  `ANC` int(11) NOT NULL,
  `ITR` int(11) NOT NULL,
  `RET` int(11) NOT NULL,
  `QTR` int(11) NOT NULL,
  `SR` int(11) NOT NULL,
  `AEF` int(11) NOT NULL,
  `FANT` int(11) NOT NULL,
  `RCH` int(11) NOT NULL,
  `RCO` int(11) NOT NULL,
  `RCL` int(11) NOT NULL,
  `AP` int(11) NOT NULL,
  `CI` int(11) NOT NULL,
  `OT` int(11) NOT NULL,
  `ANSHT` int(11) NOT NULL,
  `CF` int(11) NOT NULL,
  `PP` varchar(200) DEFAULT NULL,
  `PN` varchar(200) DEFAULT NULL,
  `COF` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autoavaliacao`
--

INSERT INTO `autoavaliacao` (`id`, `idAluno`, `IEE`, `AC`, `ANC`, `ITR`, `RET`, `QTR`, `SR`, `AEF`, `FANT`, `RCH`, `RCO`, `RCL`, `AP`, `CI`, `OT`, `ANSHT`, `CF`, `PP`, `PN`, `COF`) VALUES
(1, 9, 98, 87, 10, 78, 89, 89, 84, 46, 89, 68, 48, 84, 46, 46, 46, 56, 56, '456', '456', 'asdasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacaofinal`
--

CREATE TABLE `avaliacaofinal` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `IEE` int(11) NOT NULL,
  `AC` int(11) NOT NULL,
  `ANC` int(11) NOT NULL,
  `ITR` int(11) NOT NULL,
  `RET` int(11) NOT NULL,
  `QTR` int(11) NOT NULL,
  `SR` int(11) NOT NULL,
  `AEF` int(11) NOT NULL,
  `FANT` int(11) NOT NULL,
  `RCH` int(11) NOT NULL,
  `RCO` int(11) NOT NULL,
  `RCL` int(11) NOT NULL,
  `AP` int(11) NOT NULL,
  `CI` int(11) NOT NULL,
  `OT` int(11) NOT NULL,
  `ANSHT` int(11) NOT NULL,
  `CF` int(11) NOT NULL,
  `observacoes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacaofinal`
--

INSERT INTO `avaliacaofinal` (`id`, `idAluno`, `IEE`, `AC`, `ANC`, `ITR`, `RET`, `QTR`, `SR`, `AEF`, `FANT`, `RCH`, `RCO`, `RCL`, `AP`, `CI`, `OT`, `ANSHT`, `CF`, `observacoes`) VALUES
(1, 9, 78, 78, 78, 78, 87, 78, 87, 78, 78, 87, 87, 78, 87, 78, 78, 78, 78, '78');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`) VALUES
(1, 'TÃ©cnico de GestÃ£o e ProgramaÃ§Ã£o de Sistemas InformÃ¡ticos'),
(2, 'Turismo'),
(3, 'Frio e climatizaÃ§Ã£o'),
(4, 'InstalaÃ§Ãµes ElÃ©tricas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idEntidadeEstagio` int(11) NOT NULL,
  `idProfessorOrientador` int(11) NOT NULL,
  `idMonitor` int(11) NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `idAluno`, `idEntidadeEstagio`, `idProfessorOrientador`, `idMonitor`, `horas`) VALUES
(1, 9, 1, 1, 1, 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `encarregadoseducacao`
--

CREATE TABLE `encarregadoseducacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `telefone` int(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidades`
--

CREATE TABLE `entidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contacto` int(9) DEFAULT NULL,
  `nif` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entidades`
--

INSERT INTO `entidades` (`id`, `nome`, `morada`, `localidade`, `email`, `contacto`, `nif`) VALUES
(1, 'Samsys', 'Rua da Samsys', 'Ermesinde', 'samsys@samsys.pt', 123444555, 2147483647),
(2, 'ESG', 'Rua da ESG', 'Gondomar', 'esg@aeg1.pt', 347586376, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitoresestagio`
--

CREATE TABLE `monitoresestagio` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` int(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `idEntidadeEstagio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `monitoresestagio`
--

INSERT INTO `monitoresestagio` (`id`, `nome`, `telefone`, `email`, `funcao`, `idEntidadeEstagio`) VALUES
(1, 'Andre', 123123123, 'andre@email.pt', 'Monitor', 1),
(2, 'Fernando', 234234534, 'fernando@email.pt', 'Engenheiro', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professoresorientadores`
--

CREATE TABLE `professoresorientadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` int(9) DEFAULT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professoresorientadores`
--

INSERT INTO `professoresorientadores` (`id`, `nome`, `email`, `telefone`, `idCurso`) VALUES
(1, 'David', 'david@email.pt', 143534534, 1),
(2, 'Miguel', 'miguel@email.pt', 213435345, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registosdiarios`
--

CREATE TABLE `registosdiarios` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `horas` int(11) NOT NULL,
  `atividade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `anoLetivo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `idCurso`, `anoLetivo`) VALUES
(1, '12Âº11', 1, '2018/2019'),
(2, '11Âº15', 1, '2018/2019'),
(3, '11Âº10', 2, '2018/2019'),
(4, '10Âº8', 4, '2017/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `utilizador` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `utilizador`, `email`, `pass`) VALUES
(1, 'a110634', 'teste@gmail.com', '123'),
(2, 'f345607', 'eu@gmail.com', '1234'),
(3, 'a110635', 'email@gmail.com', '123'),
(4, 'a110636', 'asdasdaq@gmail.com', '123'),
(6, 'a110639', 'teste@teste.pt', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTurma` (`idTurma`);

--
-- Indexes for table `autoavaliacao`
--
ALTER TABLE `autoavaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `avaliacaofinal`
--
ALTER TABLE `avaliacaofinal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntidadeEstagio` (`idEntidadeEstagio`),
  ADD KEY `idProfessorOrientador` (`idProfessorOrientador`),
  ADD KEY `idMonitor` (`idMonitor`);

--
-- Indexes for table `encarregadoseducacao`
--
ALTER TABLE `encarregadoseducacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoresestagio`
--
ALTER TABLE `monitoresestagio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntidadeEstagio` (`idEntidadeEstagio`);

--
-- Indexes for table `professoresorientadores`
--
ALTER TABLE `professoresorientadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indexes for table `registosdiarios`
--
ALTER TABLE `registosdiarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `autoavaliacao`
--
ALTER TABLE `autoavaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avaliacaofinal`
--
ALTER TABLE `avaliacaofinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `encarregadoseducacao`
--
ALTER TABLE `encarregadoseducacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monitoresestagio`
--
ALTER TABLE `monitoresestagio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professoresorientadores`
--
ALTER TABLE `professoresorientadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registosdiarios`
--
ALTER TABLE `registosdiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`idTurma`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `autoavaliacao`
--
ALTER TABLE `autoavaliacao`
  ADD CONSTRAINT `autoavaliacao_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `avaliacaofinal`
--
ALTER TABLE `avaliacaofinal`
  ADD CONSTRAINT `avaliacaofinal_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `dados`
--
ALTER TABLE `dados`
  ADD CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`idEntidadeEstagio`) REFERENCES `entidades` (`id`),
  ADD CONSTRAINT `dados_ibfk_2` FOREIGN KEY (`idProfessorOrientador`) REFERENCES `professoresorientadores` (`id`),
  ADD CONSTRAINT `dados_ibfk_3` FOREIGN KEY (`idMonitor`) REFERENCES `monitoresestagio` (`id`);

--
-- Limitadores para a tabela `encarregadoseducacao`
--
ALTER TABLE `encarregadoseducacao`
  ADD CONSTRAINT `encarregadoseducacao_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `monitoresestagio`
--
ALTER TABLE `monitoresestagio`
  ADD CONSTRAINT `monitoresestagio_ibfk_1` FOREIGN KEY (`idEntidadeEstagio`) REFERENCES `entidades` (`id`);

--
-- Limitadores para a tabela `professoresorientadores`
--
ALTER TABLE `professoresorientadores`
  ADD CONSTRAINT `professoresorientadores_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `registosdiarios`
--
ALTER TABLE `registosdiarios`
  ADD CONSTRAINT `registosdiarios_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
