-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2015 às 00:37
-- Versão do servidor: 5.6.26
-- Versão do PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `b1fw2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `aluno`:
--   `id_usuario`
--       `usuario` -> `id_usuario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_frequencia`
--

CREATE TABLE IF NOT EXISTS `aluno_frequencia` (
  `id_aluno` int(11) NOT NULL,
  `id_frequencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `aluno_frequencia`:
--   `id_aluno`
--       `aluno` -> `id_aluno`
--   `id_frequencia`
--       `frequencia` -> `id_frequencia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_nota`
--

CREATE TABLE IF NOT EXISTS `aluno_nota` (
  `id_nota` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `aluno_nota`:
--   `id_aluno`
--       `aluno` -> `id_aluno`
--   `id_nota`
--       `nota` -> `id_nota`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `periodo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `curso`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_professor`
--

CREATE TABLE IF NOT EXISTS `curso_professor` (
  `id_curso` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `curso_professor`:
--   `id_curso`
--       `curso` -> `id_curso`
--   `id_professor`
--       `professor` -> `id_professor`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cod_discplina` varchar(8) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `disciplina`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina_professor`
--

CREATE TABLE IF NOT EXISTS `disciplina_professor` (
  `id_disciplina` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `disciplina_professor`:
--   `id_disciplina`
--       `disciplina` -> `id_disciplina`
--   `id_professor`
--       `professor` -> `id_professor`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `frequencia`
--

CREATE TABLE IF NOT EXISTS `frequencia` (
  `id_frequencia` int(11) NOT NULL,
  `semana` int(11) DEFAULT NULL,
  `presenca` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `frequencia`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `nota`:
--   `id_disciplina`
--       `disciplina` -> `id_disciplina`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `titulacao` varchar(45) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `professor`:
--   `id_usuario`
--       `usuario` -> `id_usuario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `dia_semana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `turma`:
--   `id_curso`
--       `curso` -> `id_curso`
--   `id_disciplina`
--       `disciplina` -> `id_disciplina`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_aluno`
--

CREATE TABLE IF NOT EXISTS `turma_aluno` (
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `turma_aluno`:
--   `id_aluno`
--       `aluno` -> `id_aluno`
--   `id_turma`
--       `turma` -> `id_turma`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_frequencia`
--

CREATE TABLE IF NOT EXISTS `turma_frequencia` (
  `id_turma` int(11) NOT NULL,
  `id_frequencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `turma_frequencia`:
--   `id_frequencia`
--       `frequencia` -> `id_frequencia`
--   `id_turma`
--       `turma` -> `id_turma`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `session_id` varchar(32) DEFAULT NULL,
  `nivel` char(1) DEFAULT NULL COMMENT 'M: master\nP: professor\nA: aluno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONAMENTOS PARA TABELAS `usuario`:
--

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `idx_matricula` (`matricula`),
  ADD KEY `fk_aluno_usuario_idx` (`id_usuario`);

--
-- Índices de tabela `aluno_frequencia`
--
ALTER TABLE `aluno_frequencia`
  ADD PRIMARY KEY (`id_aluno`,`id_frequencia`),
  ADD KEY `fk_aluno_has_frequencia_frequencia1_idx` (`id_frequencia`),
  ADD KEY `fk_aluno_has_frequencia_aluno1_idx` (`id_aluno`);

--
-- Índices de tabela `aluno_nota`
--
ALTER TABLE `aluno_nota`
  ADD PRIMARY KEY (`id_nota`,`id_aluno`),
  ADD KEY `fk_aluno_has_nota_nota1_idx` (`id_nota`),
  ADD KEY `fk_aluno_has_nota_aluno1_idx` (`id_aluno`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `curso_professor`
--
ALTER TABLE `curso_professor`
  ADD PRIMARY KEY (`id_curso`,`id_professor`),
  ADD KEY `fk_curso_has_professor_professor1_idx` (`id_professor`),
  ADD KEY `fk_curso_has_professor_curso1_idx` (`id_curso`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `idx_codd` (`cod_discplina`);

--
-- Índices de tabela `disciplina_professor`
--
ALTER TABLE `disciplina_professor`
  ADD PRIMARY KEY (`id_disciplina`,`id_professor`),
  ADD KEY `fk_disciplina_has_professor_professor1_idx` (`id_professor`),
  ADD KEY `fk_disciplina_has_professor_disciplina1_idx` (`id_disciplina`);

--
-- Índices de tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`id_frequencia`);

--
-- Índices de tabela `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `fk_nota_disciplina1_idx` (`id_disciplina`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `idx_matricula` (`matricula`),
  ADD KEY `fk_professor_usuario1_idx` (`id_usuario`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_turma_curso1_idx` (`id_curso`),
  ADD KEY `fk_turma_disciplina1_idx` (`id_disciplina`);

--
-- Índices de tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD PRIMARY KEY (`id_turma`,`id_aluno`),
  ADD KEY `fk_turma_has_aluno_aluno1_idx` (`id_aluno`),
  ADD KEY `fk_turma_has_aluno_turma1_idx` (`id_turma`);

--
-- Índices de tabela `turma_frequencia`
--
ALTER TABLE `turma_frequencia`
  ADD PRIMARY KEY (`id_turma`,`id_frequencia`),
  ADD KEY `fk_turma_has_frequencia_frequencia1_idx` (`id_frequencia`),
  ADD KEY `fk_turma_has_frequencia_turma1_idx` (`id_turma`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `aluno_frequencia`
--
ALTER TABLE `aluno_frequencia`
  ADD CONSTRAINT `fk_aluno_has_frequencia_aluno1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_has_frequencia_frequencia1` FOREIGN KEY (`id_frequencia`) REFERENCES `frequencia` (`id_frequencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `aluno_nota`
--
ALTER TABLE `aluno_nota`
  ADD CONSTRAINT `fk_aluno_has_nota_aluno1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_has_nota_nota1` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `curso_professor`
--
ALTER TABLE `curso_professor`
  ADD CONSTRAINT `fk_curso_has_professor_curso1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_has_professor_professor1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `disciplina_professor`
--
ALTER TABLE `disciplina_professor`
  ADD CONSTRAINT `fk_disciplina_has_professor_disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disciplina_has_professor_professor1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_curso1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD CONSTRAINT `fk_turma_has_aluno_aluno1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_has_aluno_turma1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `turma_frequencia`
--
ALTER TABLE `turma_frequencia`
  ADD CONSTRAINT `fk_turma_has_frequencia_frequencia1` FOREIGN KEY (`id_frequencia`) REFERENCES `frequencia` (`id_frequencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_has_frequencia_turma1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
