-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           8.0.29 - MySQL Community Server - GPL
-- SE du serveur:                Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour eukles
CREATE DATABASE IF NOT EXISTS `eukles` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eukles`;

-- Listage de la structure de la table eukles. client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table eukles.client : ~2 rows (environ)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `nom_client`, `ville`) VALUES
	(1, 'AMI', 'RBT'),
	(2, 'KOM', 'CBL');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Listage de la structure de la table eukles. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Listage des données de la table eukles.doctrine_migration_versions : ~3 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20220521235704', '2022-05-21 23:57:53', 958),
	('DoctrineMigrations\\Version20220522001621', '2022-05-22 00:19:05', 754),
	('DoctrineMigrations\\Version20220522013957', '2022-05-22 01:40:05', 593);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table eukles. lien
CREATE TABLE IF NOT EXISTS `lien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `materiel_id` int NOT NULL,
  `qte` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A532B4B519EB6921` (`client_id`),
  KEY `IDX_A532B4B516880AAF` (`materiel_id`),
  CONSTRAINT `FK_A532B4B516880AAF` FOREIGN KEY (`materiel_id`) REFERENCES `materiel` (`id`),
  CONSTRAINT `FK_A532B4B519EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table eukles.lien : ~4 rows (environ)
/*!40000 ALTER TABLE `lien` DISABLE KEYS */;
INSERT INTO `lien` (`id`, `client_id`, `materiel_id`, `qte`) VALUES
	(1, 1, 1, 3),
	(2, 1, 2, 60),
	(3, 2, 1, 40),
	(4, 1, 6, 70);
/*!40000 ALTER TABLE `lien` ENABLE KEYS */;

-- Listage de la structure de la table eukles. materiel
CREATE TABLE IF NOT EXISTS `materiel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table eukles.materiel : ~6 rows (environ)
/*!40000 ALTER TABLE `materiel` DISABLE KEYS */;
INSERT INTO `materiel` (`id`, `nom`, `prix`) VALUES
	(1, 'CLVT', 50000),
	(2, 'SRT', 60000),
	(3, 'SOURIS', 60000),
	(4, 'ECRAN', 70000),
	(5, 'CABLE', 389),
	(6, 'PHONE', 80000);
/*!40000 ALTER TABLE `materiel` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
