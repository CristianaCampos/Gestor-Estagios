-- Apaga a base de dados
DROP DATABASE IF EXISTS capaEstagioDB;

-- Cria a base de dados
CREATE DATABASE capaEstagioDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE capaEstagioDB;

CREATE TABLE users
(id INT NOT NULL AUTO_INCREMENT,
utilizador VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
pass VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE turmas
(id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(20) NOT NULL,
curso VARCHAR(100) NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE alunos
(id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(20) NOT NULL,
idTurma INT NOT NULL,
codigoAluno varchar(10) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idTurma) REFERENCES turmas(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE dados
(id INT NOT NULL AUTO_INCREMENT,
idAluno INT NOT NULL,
entidadeEstagio VARCHAR(100) NOT NULL,
horas INT NOT NULL,
professorAcompanhante VARCHAR(50) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idAluno) REFERENCES alunos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- CREATE TABLE atividades
-- (id INT NOT NULL AUTO_INCREMENT,
-- atividade VARCHAR(100) NOT NULL,
-- PRIMARY KEY (id)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE registosDiarios
(id INT NOT NULL AUTO_INCREMENT,
dia VARCHAR(10) NOT NULL,
idAluno INT NOT NULL,
horas INT NOT NULL,
atividade VARCHAR(100) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idAluno) REFERENCES alunos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `turmas` (`id`, `nome`, `curso`) VALUES
(1, '23', 'dwdw'),
(2, '123', 'asdasd');

INSERT INTO `users` (`id`, `utilizador`, `email`, `pass`) VALUES
(1, 'a110634', 'cristiana-campos@hotmail.com', '123'),
(2, 'f345607', 'eu@gmail.com', '1');

INSERT INTO `alunos` (`id`, `nome`, `idTurma`, `codigoAluno`) VALUES
(2, 'kkk', 2, ''),
(5, 'Manuel', 1, 'a110634');

INSERT INTO `dados` (`id`, `idAluno`, `entidadeEstagio`, `horas`, `professorAcompanhante`) VALUES
(26, 2, 'fdfdfd', 2121, 'sdsdsd'),
(27, 5, 'Samsys', 140, 'Ola');

--ADICIONAR DADOS
INSERT INTO `registosDiarios` (`id`, `nome`, `idTurma`, `codigoAluno`) VALUES
(2, 'kkk', 2, ''),
(5, 'Manuel', 1, 'a110634');

INSERT INTO `dados` (`id`, `idAluno`, `entidadeEstagio`, `horas`, `professorAcompanhante`) VALUES
(26, 2, 'fdfdfd', 2121, 'sdsdsd'),
(27, 5, 'Samsys', 140, 'Ola');