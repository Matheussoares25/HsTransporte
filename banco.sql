-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           8.0.43-0ubuntu0.24.04.2 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela HStransporte.Carga
CREATE TABLE IF NOT EXISTS `Carga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produto` varchar(100) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.Destinatario
CREATE TABLE IF NOT EXISTS `Destinatario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cnpj_cli` varchar(18) DEFAULT NULL,
  `cpf_cli` varchar(14) DEFAULT NULL,
  `nome_cli` varchar(100) DEFAULT NULL,
  `endereco_des` varchar(150) DEFAULT NULL,
  `tel_cli` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.Frete
CREATE TABLE IF NOT EXISTS `Frete` (
  `id` int NOT NULL AUTO_INCREMENT,
  `frete_val` decimal(10,2) DEFAULT NULL,
  `motorista_frete` int DEFAULT NULL,
  `remetente` int DEFAULT NULL,
  `destinatario` int DEFAULT NULL,
  `partida` varchar(150) DEFAULT NULL,
  `destino` varchar(150) DEFAULT NULL,
  `veiculo_frete` int DEFAULT NULL,
  `carga_frete` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `motorista_frete` (`motorista_frete`),
  KEY `remetente` (`remetente`),
  KEY `destinatario` (`destinatario`),
  KEY `veiculo_frete` (`veiculo_frete`),
  KEY `carga_frete` (`carga_frete`),
  CONSTRAINT `Frete_ibfk_1` FOREIGN KEY (`motorista_frete`) REFERENCES `Motorista` (`id`),
  CONSTRAINT `Frete_ibfk_2` FOREIGN KEY (`remetente`) REFERENCES `Remetente` (`id`),
  CONSTRAINT `Frete_ibfk_3` FOREIGN KEY (`destinatario`) REFERENCES `Destinatario` (`id`),
  CONSTRAINT `Frete_ibfk_4` FOREIGN KEY (`veiculo_frete`) REFERENCES `Veiculo` (`id`),
  CONSTRAINT `Frete_ibfk_5` FOREIGN KEY (`carga_frete`) REFERENCES `Carga` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.Motorista
CREATE TABLE IF NOT EXISTS `Motorista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf_motor` varchar(14) DEFAULT NULL,
  `nome_motor` varchar(100) DEFAULT NULL,
  `tel_motor` varchar(20) DEFAULT NULL,
  `idade_motor` int DEFAULT NULL,
  `endereco_motor` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.Remetente
CREATE TABLE IF NOT EXISTS `Remetente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cnpj_reme` varchar(18) DEFAULT NULL,
  `cpf_reme` varchar(14) DEFAULT NULL,
  `nome_reme` varchar(100) DEFAULT NULL,
  `end_reme` varchar(150) DEFAULT NULL,
  `tel_reme` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.Usuario
CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `token_val` varchar(64) DEFAULT NULL,
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `cargo` (`cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela HStransporte.Veiculo
CREATE TABLE IF NOT EXISTS `Veiculo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modelo_vei` varchar(50) DEFAULT NULL,
  `placa_vei` varchar(10) DEFAULT NULL,
  `renavam` varchar(15) DEFAULT NULL,
  `motor_dono` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Veiculo_Motorista` (`motor_dono`),
  CONSTRAINT `FK_Veiculo_Motorista` FOREIGN KEY (`motor_dono`) REFERENCES `Motorista` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
