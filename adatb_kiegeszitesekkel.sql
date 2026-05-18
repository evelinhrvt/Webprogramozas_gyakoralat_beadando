CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vezeteknev` varchar(80) NOT NULL,
  `keresztnev` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `jelszo_hash` varchar(40) NOT NULL,
  `jogosultsag` varchar(30) NOT NULL DEFAULT 'vasarlo',
  `regisztracio_ideje` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `felhasznalok` (`id`, `vezeteknev`, `keresztnev`, `email`, `jelszo_hash`, `jogosultsag`, `regisztracio_ideje`) VALUES
(1, 'Kovács', 'Péter', 'kovacs.peter@minta.hu', 'hashed_password_123', 'admin', NOW()),
(2, 'Nagy', 'Anna', 'nagy.anna@minta.hu', 'hashed_password_456', 'vasarlo', NOW()),
(3, 'Szabó', 'Gábor', 'szabo.gabor@minta.hu', 'hashed_password_789', 'vasarlo', NOW()),
(4, 'Tóth', 'Krisztina', 'toth.kriszti@minta.hu', 'hashed_password_012', 'vasarlo', NOW());

CREATE TABLE IF NOT EXISTS `oprendszerek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `oprendszerek` (`id`, `nev`) VALUES
(1, 'FreeDOS'),
(2, 'Linux'),
(3, 'Microsoft Vista Business'),
(4, 'Microsoft Vista Home Basic HU'),
(5, 'Microsoft Vista Home Premium'),
(8, 'nincs'),
(9, 'Windows 7 Home Premium HU 32Bit'),
(10, 'Windows 7 Home Premium HU 64Bit'),
(11, 'Windows 7 Starter Edition HU'),
(12, 'Windows XP Home Magyar');

CREATE TABLE IF NOT EXISTS `processzorok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gyarto` varchar(80) NOT NULL,
  `tipus` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `processzorok` (`id`, `gyarto`, `tipus`) VALUES
(1, 'AMD', 'Athlon 64 X2 QL64'),
(4, 'AMD', 'Athlon TM Neo MV-40'),
(5, 'AMD', 'Mobil Sempron SI-40'),
(6, 'AMD', 'Turion64 X2 TL60'),
(8, 'AMD', 'Turion64 X2 TL62'),
(10, 'Intel', 'Celeron 900'),
(12, 'Intel', 'Celeron Dual-Core T1600'),
(13, 'Intel', 'Celeron Dual-Core T1700'),
(14, 'Intel', 'Celeron Dual-Core T3000'),
(23, 'Intel', 'Core Duo T3400');

CREATE TABLE IF NOT EXISTS `laptopok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gyarto` varchar(80) NOT NULL,
  `tipus` varchar(120) NOT NULL,
  `kijelzo` decimal(3,1) NOT NULL,
  `memoria` int(11) NOT NULL,
  `merevlemez` int(11) NOT NULL,
  `videovezerlo` varchar(160) NOT NULL,
  `ar` int(11) NOT NULL,
  `processzorid` int(11) NOT NULL,
  `oprendszerid` int(11) NOT NULL,
  `db` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `processzorid` (`processzorid`),
  KEY `oprendszerid` (`oprendszerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO `laptopok` (`id`, `gyarto`, `tipus`, `kijelzo`, `memoria`, `merevlemez`, `videovezerlo`, `ar`, `processzorid`, `oprendszerid`, `db`) VALUES
(1, 'HP', 'COMPAQ 615 NX556EA', 15.6, 1024, 160, 'ATI Mobility Radeon HD3200 256MB', 95120, 1, 1, 0),
(2, 'ASUS', 'K51AC-SX001D', 15.6, 2048, 250, 'ATI Mobility Radeon HD3200 256MB', 101200, 1, 8, 0),
(3, 'HP', 'COMPAQ 615 NX560EA', 15.6, 2048, 320, 'ATI Mobility Radeon HD3200 256MB', 114800, 1, 4, 0),
(4, 'HP', 'Pavilion DV6-1110EH NL956EA', 15.6, 3072, 250, 'ATI Mobility Radeon HD4530 512MB', 167920, 1, 6, 3),
(5, 'ACER', 'Aspire 5536G-642G25MN', 15.6, 2048, 250, 'ATI Mobility Radeon HD4570 512MB', 111920, 1, 2, 3);

CREATE TABLE IF NOT EXISTS `uzenetek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bejelentkezes` varchar(50) DEFAULT NULL,
  `nev` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `szoveg` text NOT NULL,
  `idopont` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
