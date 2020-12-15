 

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `idTurma`, `codigoAluno`) VALUES
(1, 'kkk', 1, 'a119055'),
(2, 'Manuel', 2, 'a110634');


--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `idAluno`, `entidadeEstagio`, `horas`, `professorAcompanhante`) VALUES
(1, 1, 'fdfdfd', 2121, 'sdsdsd'),
(2, 2, 'Samsys', 140, 'Ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registosdiarios`
--

CREATE TABLE `registosdiarios` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  `horas` int(11) NOT NULL,
  `atividade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registosdiarios`
--

INSERT INTO `registosdiarios` (`id`, `idAluno`, `data`, `horas`, `atividade`) VALUES
(1, 1, '02/07/2019', 7, 'dormir'),
(2, 1, '02/07/2019', 7, 'comer');

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `curso`) VALUES
(1, '23', 'dwdw'),
(2, '123', 'asdasd');

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `utilizador`, `email`, `pass`) VALUES
(1, 'a110634', 'cristiana-campos@hotmail.com', '123'),
(2, 'f345607', 'eu@gmail.com', '1234');

-- --------------------------------------------------------

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
-- Indexes for table `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registosdiarios`
--
ALTER TABLE `registosdiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`idTurma`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `dados`
--
ALTER TABLE `dados`
  ADD CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `registosdiarios`
--
ALTER TABLE `registosdiarios`
  ADD CONSTRAINT `registosdiarios_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
