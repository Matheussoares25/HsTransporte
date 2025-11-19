CREATE DATABASE IF NOT EXISTS HStransporte;
USE HStransporte;

CREATE TABLE IF NOT EXISTS Carga (
  id INT NOT NULL AUTO_INCREMENT,
  produto VARCHAR(100),
  peso DECIMAL(10,2),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS cargos (
  id INT NOT NULL AUTO_INCREMENT,
  nome_cargo VARCHAR(80),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS Destinatario (
  id INT NOT NULL AUTO_INCREMENT,
  cnpj_cli VARCHAR(18),
  cpf_cli VARCHAR(14),
  nome_cli VARCHAR(100),
  endereco_des VARCHAR(150),
  tel_cli VARCHAR(20),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS Motorista (
  id INT NOT NULL AUTO_INCREMENT,
  cpf_motor VARCHAR(14),
  nome_motor VARCHAR(100),
  tel_motor VARCHAR(20),
  idade_motor INT,
  endereco_motor VARCHAR(150),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS Remetente (
  id INT NOT NULL AUTO_INCREMENT,
  cnpj_reme VARCHAR(18),
  cpf_reme VARCHAR(14),
  nome_reme VARCHAR(100),
  end_reme VARCHAR(150),
  tel_reme VARCHAR(20),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS Usuario (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(45) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  cargo VARCHAR(50),
  token_val VARCHAR(64),
  data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY email (email),
  KEY cargo (cargo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS Veiculo (
  id INT NOT NULL AUTO_INCREMENT,
  modelo_vei VARCHAR(50),
  placa_vei VARCHAR(10),
  renavam VARCHAR(15),
  motor_dono INT,
  PRIMARY KEY (id),
  KEY FK_Veiculo_Motorista (motor_dono),
  CONSTRAINT FK_Veiculo_Motorista FOREIGN KEY (motor_dono) REFERENCES Motorista (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS Frete (
  id INT NOT NULL AUTO_INCREMENT,
  frete_val DECIMAL(10,2),
  motorista_frete INT,
  remetente INT,
  destinatario INT,
  partida VARCHAR(150),
  destino VARCHAR(150),
  veiculo_frete INT,
  carga_frete INT,
  PRIMARY KEY (id),
  KEY motorista_frete (motorista_frete),
  KEY remetente (remetente),
  KEY destinatario (destinatario),
  KEY veiculo_frete (veiculo_frete),
  KEY carga_frete (carga_frete),
  CONSTRAINT Frete_ibfk_1 FOREIGN KEY (motorista_frete) REFERENCES Motorista (id),
  CONSTRAINT Frete_ibfk_2 FOREIGN KEY (remetente) REFERENCES Remetente (id),
  CONSTRAINT Frete_ibfk_3 FOREIGN KEY (destinatario) REFERENCES Destinatario (id),
  CONSTRAINT Frete_ibfk_4 FOREIGN KEY (veiculo_frete) REFERENCES Veiculo (id),
  CONSTRAINT Frete_ibfk_5 FOREIGN KEY (carga_frete) REFERENCES Carga (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
