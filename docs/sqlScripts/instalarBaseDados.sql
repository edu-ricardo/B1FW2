-- MySQL Workbench Synchronization
-- Generated: 2015-11-26 18:48
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Eduardo

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER SCHEMA `b1fw2`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `b1fw2`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `session_id` VARCHAR(32) NULL DEFAULT NULL,
  `nivel` CHAR(1) NULL DEFAULT NULL COMMENT 'M: master\nP: professor\nA: aluno',
  `sexo` CHAR(1) NULL DEFAULT NULL COMMENT 'M: masculino\nF: feminino',
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`aluno` (
  `id_aluno` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `matricula` VARCHAR(45) NOT NULL,
  `id_usuario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  INDEX `idx_matricula` (`matricula` ASC),
  INDEX `fk_aluno_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_aluno_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `b1fw2`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`professor` (
  `id_professor` INT(11) NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `titulacao` VARCHAR(45) NOT NULL,
  `id_usuario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_professor`),
  INDEX `idx_matricula` (`matricula` ASC),
  INDEX `fk_professor_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_professor_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `b1fw2`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`disciplina` (
  `id_disciplina` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cod_disciplina` VARCHAR(8) NOT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `n_notas` INT(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`),
  INDEX `idx_codd` (`cod_disciplina` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`disciplina_professor` (
  `id_disciplina` INT(11) NOT NULL,
  `id_professor` INT(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`, `id_professor`),
  INDEX `fk_disciplina_has_professor_professor1_idx` (`id_professor` ASC),
  INDEX `fk_disciplina_has_professor_disciplina1_idx` (`id_disciplina` ASC),
  CONSTRAINT `fk_disciplina_has_professor_disciplina1`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `b1fw2`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplina_has_professor_professor1`
    FOREIGN KEY (`id_professor`)
    REFERENCES `b1fw2`.`professor` (`id_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`curso` (
  `id_curso` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `periodo` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id_curso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`curso_professor` (
  `id_curso` INT(11) NOT NULL,
  `id_professor` INT(11) NOT NULL,
  PRIMARY KEY (`id_curso`, `id_professor`),
  INDEX `fk_curso_has_professor_professor1_idx` (`id_professor` ASC),
  INDEX `fk_curso_has_professor_curso1_idx` (`id_curso` ASC),
  CONSTRAINT `fk_curso_has_professor_curso1`
    FOREIGN KEY (`id_curso`)
    REFERENCES `b1fw2`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_professor_professor1`
    FOREIGN KEY (`id_professor`)
    REFERENCES `b1fw2`.`professor` (`id_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`turma` (
  `id_turma` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `id_curso` INT(11) NOT NULL,
  `id_disciplina` INT(11) NOT NULL,
  `dia_semana` INT(11) NULL DEFAULT NULL,
  `id_professor` INT(11) NOT NULL,
  `n_aulas` INT(11) NOT NULL,
  PRIMARY KEY (`id_turma`),
  INDEX `fk_turma_curso1_idx` (`id_curso` ASC),
  INDEX `fk_turma_disciplina1_idx` (`id_disciplina` ASC),
  INDEX `fk_turma_professor1_idx` (`id_professor` ASC),
  CONSTRAINT `fk_turma_curso1`
    FOREIGN KEY (`id_curso`)
    REFERENCES `b1fw2`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_disciplina1`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `b1fw2`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_professor1`
    FOREIGN KEY (`id_professor`)
    REFERENCES `b1fw2`.`professor` (`id_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`turma_aluno` (
  `id_turma` INT(11) NOT NULL,
  `id_aluno` INT(11) NOT NULL,
  PRIMARY KEY (`id_turma`, `id_aluno`),
  INDEX `fk_turma_has_aluno_aluno1_idx` (`id_aluno` ASC),
  INDEX `fk_turma_has_aluno_turma1_idx` (`id_turma` ASC),
  CONSTRAINT `fk_turma_has_aluno_turma1`
    FOREIGN KEY (`id_turma`)
    REFERENCES `b1fw2`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_has_aluno_aluno1`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `b1fw2`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`frequencia` (
  `id_frequencia` INT(11) NOT NULL AUTO_INCREMENT,
  `presenca` TINYINT(1) NULL DEFAULT 0,
  `id_aluno` INT(11) NOT NULL,
  `id_aula` INT(11) NOT NULL,
  PRIMARY KEY (`id_frequencia`),
  INDEX `fk_frequencia_aluno1_idx` (`id_aluno` ASC),
  INDEX `fk_frequencia_aula1_idx` (`id_aula` ASC),
  CONSTRAINT `fk_frequencia_aluno1`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `b1fw2`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_frequencia_aula1`
    FOREIGN KEY (`id_aula`)
    REFERENCES `b1fw2`.`aula` (`id_aula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`aula` (
  `id_aula` INT(11) NOT NULL,
  `id_turma` INT(11) NOT NULL,
  INDEX `fk_turma_has_frequencia_turma1_idx` (`id_turma` ASC),
  PRIMARY KEY (`id_aula`),
  CONSTRAINT `fk_turma_has_frequencia_turma1`
    FOREIGN KEY (`id_turma`)
    REFERENCES `b1fw2`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `b1fw2`.`nota` (
  `id_nota` INT(11) NOT NULL AUTO_INCREMENT,
  `nota` INT(11) NULL DEFAULT NULL,
  `id_disciplina` INT(11) NOT NULL,
  `id_aluno` INT(11) NOT NULL,
  PRIMARY KEY (`id_nota`),
  INDEX `fk_nota_disciplina1_idx` (`id_disciplina` ASC),
  INDEX `fk_nota_aluno1_idx` (`id_aluno` ASC),
  CONSTRAINT `fk_nota_disciplina1`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `b1fw2`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nota_aluno1`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `b1fw2`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
