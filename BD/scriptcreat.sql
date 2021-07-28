-- drop database mydb;
--
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS mydb DEFAULT CHARACTER SET utf8 ;
USE mydb ;

-- -----------------------------------------------------
-- Table mydb.cargo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.cargo (
  id_cargo INT NOT NULL AUTO_INCREMENT unique,
  descricao VARCHAR(255) NULL,
  atribuicao VARCHAR(45) NOT NULL unique,
  PRIMARY KEY (id_cargo));


-- -----------------------------------------------------
-- Table mydb.funcionario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.funcionario (
  cpf VARCHAR(11) NOT NULL,
  nome VARCHAR(45) NULL,
    email VARCHAR(255) NOT NULL,
  telefone VARCHAR(255) NOT NULL,
  digital VARCHAR(255) NULL unique,
  cargo_id_cargo INT NOT NULL,
  PRIMARY KEY (cpf),
  CONSTRAINT fk_funcionario_cargo
    FOREIGN KEY (cargo_id_cargo)
    REFERENCES mydb.cargo (id_cargo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table mydb.administrador
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.administrador (
  login VARCHAR(45) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  funcionario_cpf VARCHAR(11) NOT NULL,
  PRIMARY KEY (funcionario_cpf),
  CONSTRAINT fk_administrador_funcionario1
    FOREIGN KEY (funcionario_cpf)
    REFERENCES mydb.funcionario (cpf)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table mydb.tipo_ponto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.tipo_ponto (
  id INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table mydb.tipo_registro
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.tipo_registro (
  id INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(45) NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table mydb.ponto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.ponto (
id INT NOT NULL AUTO_INCREMENT,
  momento DATETIME NOT NULL default current_timestamp,
  tipo_ponto_id INT NOT NULL,
  tipo_registro_id INT NOT NULL,
  funcionario_cpf VARCHAR(11) NOT NULL,
  PRIMARY KEY (id,momento),
  CONSTRAINT fk_ponto_tipo_ponto1
    FOREIGN KEY (tipo_ponto_id)
    REFERENCES mydb.tipo_ponto (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ponto_tipo_registro1
    FOREIGN KEY (tipo_registro_id)
    REFERENCES mydb.tipo_registro (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_ponto_funcionario1
    FOREIGN KEY (funcionario_cpf)
    REFERENCES mydb.funcionario (cpf)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
