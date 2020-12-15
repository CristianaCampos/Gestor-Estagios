-- Apaga a base de dados
DROP DATABASE IF EXISTS capaEstagioDB;

-- Cria a base de dados
CREATE DATABASE capaEstagioDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE capaEstagioDB;

-- Users
CREATE TABLE users (
  id INT AUTO_INCREMENT,
  utilizador varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  pass varchar(50) NOT NULL,
  PRIMARY KEY(id)
);

-- Cursos
CREATE TABLE cursos (
  id INT AUTO_INCREMENT,
  nome varchar(250) NOT NULL,
  PRIMARY KEY(id)
);

-- Professores Orientadores
CREATE TABLE professoresOrientadores (
  id INT AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  email varchar(100),
  telefone int(9),
  idCurso int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(idCurso) REFERENCES cursos(id)
);

-- Entidades de Estágio
CREATE TABLE entidades (
  id INT AUTO_INCREMENT,
  nome varchar(200) NOT NULL,
  morada varchar(100) NOT NULL,
  localidade varchar(50),
  email varchar(100),
  contacto int(9),
  nif int(9),
  PRIMARY KEY(id)
);

-- Turmas
CREATE TABLE turmas (
  id INT AUTO_INCREMENT,
  nome varchar(20) NOT NULL,
  idCurso int NOT NULL,
  anoLetivo VARCHAR(10),
  PRIMARY KEY(id),
  FOREIGN KEY(idCurso) REFERENCES cursos(id)
);

-- Alunos
CREATE TABLE alunos (
  id INT AUTO_INCREMENT,
  nome varchar(200) NOT NULL,
  idTurma int(11) NOT NULL,
  codigoAluno varchar(10) NOT NULL,
  dataNascimento varchar(10),
  morada varchar(100),
  localidade varchar(50),
  email varchar(50),
  cc varchar(12),
  telefone int(9),
  PRIMARY KEY(id),
  FOREIGN KEY(idTurma) REFERENCES turmas(id)
);

-- Encarregados de Educação
CREATE TABLE encarregadosEducacao (
  id INT AUTO_INCREMENT,
  nome varchar(200) NOT NULL,
  morada varchar(100),
  localidade varchar(50),
  telefone int(9),
  email varchar(100),
  idAluno int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (idAluno) REFERENCES alunos(id)
);

-- Monitores de Estágio
CREATE TABLE monitoresEstagio (
  id INT AUTO_INCREMENT,
  nome varchar(200) NOT NULL,
  telefone int(9),
  email varchar(100),
  funcao varchar(100),
  idEntidadeEstagio int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (idEntidadeEstagio) REFERENCES entidades(id)
);

-- Dados
CREATE TABLE dados (
  id INT AUTO_INCREMENT,
  idAluno int(11) NOT NULL,
  idEntidadeEstagio int NOT NULL,
  idProfessorOrientador int NOT NULL,
  idMonitor int NOT NULL,
  horas int(11) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (idEntidadeEstagio) REFERENCES entidades(id),
  FOREIGN KEY (idProfessorOrientador) REFERENCES professoresOrientadores(id),
  FOREIGN KEY (idMonitor) REFERENCES monitoresEstagio(id)
);

-- Registos Diários
CREATE TABLE registosdiarios (
  id INT AUTO_INCREMENT,
  idAluno int(11) NOT NULL,
  dia varchar(10) NOT NULL,
  horas int(11) NOT NULL,
  atividade varchar(100) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (idAluno) REFERENCES alunos(id)
);

-- AutoAvaliação
CREATE TABLE autoavaliacao (
  id INT AUTO_INCREMENT,
  idAluno int(11) NOT NULL,
  IEE int NOT NULL,
  AC int NOT NULL,
  ANC int NOT NULL,
  ITR int NOT NULL,
  RET int NOT NULL,
  QTR int NOT NULL,
  SR int NOT NULL,
  AEF int NOT NULL,
  FANT int NOT NULL,
  RCH int NOT NULL,
  RCO int NOT NULL,
  RCL int NOT NULL,
  AP int NOT NULL,
  CI int NOT NULL,
  OT int NOT NULL,
  ANSHT int NOT NULL,
  CF int NOT NULL,
  PP VARCHAR(200),
  PN VARCHAR(200),
  COF VARCHAR(200),
  PRIMARY KEY(id),
  FOREIGN KEY (idAluno) REFERENCES alunos(id)
);

-- Avaliação Final
CREATE TABLE avaliacaoFinal (
  id INT AUTO_INCREMENT,
  idAluno int(11) NOT NULL,
    IEE int NOT NULL,
  AC int NOT NULL,
  ANC int NOT NULL,
  ITR int NOT NULL,
  RET int NOT NULL,
  QTR int NOT NULL,
  SR int NOT NULL,
  AEF int NOT NULL,
  FANT int NOT NULL,
  RCH int NOT NULL,
  RCO int NOT NULL,
  RCL int NOT NULL,
  AP int NOT NULL,
  CI int NOT NULL,
  OT int NOT NULL,
  ANSHT int NOT NULL,
  CF int NOT NULL,
  observacoes VARCHAR(200),
  PRIMARY KEY(id),
  FOREIGN KEY (idAluno) REFERENCES alunos(id)
);

----------
-- INSERTS 
INSERT INTO users (id, utilizador, email, pass) VALUES
(1, 'a110634', 'cristiana-campos@hotmail.com', '123'),
(2, 'f345607', 'eu@gmail.com', '1234');