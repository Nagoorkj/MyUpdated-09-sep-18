-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for demo
CREATE DATABASE IF NOT EXISTS `demo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `demo`;


-- Dumping structure for table demo.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- Dumping data for table demo.cities: ~104 rows (approximately)
DELETE FROM `cities`;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `country_id`, `city`) VALUES
	(1, 1, 'Kabul'),
	(2, 1, 'Kandahar'),
	(3, 1, 'Herat'),
	(4, 1, 'Jalalabad'),
	(5, 1, 'Kunduz'),
	(6, 1, 'Lashkargah'),
	(7, 1, 'Taloqan'),
	(8, 2, 'Albury'),
	(9, 2, 'Armidale'),
	(10, 2, 'Bathurst'),
	(11, 2, 'Blue Mountains'),
	(12, 2, 'Broken Hill'),
	(13, 2, 'Canberra'),
	(14, 2, 'Cessnock'),
	(15, 2, 'Dubbo'),
	(16, 2, 'Melbourne '),
	(17, 2, 'Sydney'),
	(18, 2, 'Taloqan'),
	(19, 3, 'Altenberg'),
	(20, 3, 'Amstetten'),
	(21, 3, 'Ansfelden'),
	(22, 3, 'Bad Aussee'),
	(23, 3, 'Bad Ischl'),
	(24, 3, 'Lenzing'),
	(25, 3, 'Vienna'),
	(26, 3, 'Villach'),
	(27, 3, 'Wolfsberg'),
	(28, 3, 'Zeltweg'),
	(29, 3, 'Zwettl'),
	(30, 5, 'Dhaka'),
	(31, 5, 'Chittagong'),
	(32, 5, 'Khulna'),
	(33, 5, 'Sylhet'),
	(34, 5, 'Rajshahi'),
	(35, 5, 'Comilla'),
	(36, 5, 'Tongi'),
	(37, 5, 'Bogra'),
	(38, 5, 'Mymensingh'),
	(39, 5, 'Barisal'),
	(40, 7, 'Rio de Janeiro'),
	(41, 7, 'Brasilia'),
	(42, 7, 'Salvador'),
	(43, 7, 'Fortaleza'),
	(44, 7, 'Belo Horizonte'),
	(45, 7, 'Manaus'),
	(46, 7, 'Curitiba'),
	(47, 7, 'Recife'),
	(48, 7, 'Porto Alegre'),
	(49, 7, 'Natal'),
	(50, 8, 'Paris'),
	(51, 8, 'Marseille'),
	(52, 8, 'Lyon'),
	(53, 8, 'Toulouse'),
	(54, 8, 'Nice'),
	(55, 8, 'Nantes'),
	(56, 8, 'Strasbourg'),
	(57, 8, 'Montpellier'),
	(58, 8, 'Bordeaux'),
	(59, 8, 'Lille'),
	(60, 9, 'Mumbai'),
	(61, 9, 'Delhi'),
	(62, 9, 'Kolkata'),
	(63, 9, 'Chennai'),
	(64, 9, 'Bangalore'),
	(65, 9, 'Hyderabad'),
	(66, 9, 'Ahmedabad'),
	(67, 9, 'Pune'),
	(68, 9, 'Surat'),
	(69, 9, 'Jaipur'),
	(70, 9, 'Kanpur'),
	(71, 9, 'Indore'),
	(72, 10, 'Hyderabad'),
	(73, 10, 'Larkana'),
	(74, 10, 'Sukkur'),
	(75, 10, 'Karachi'),
	(76, 10, 'Bahawalpur'),
	(77, 10, 'Faisalabad'),
	(78, 10, 'Lahore'),
	(79, 10, 'Multan'),
	(80, 10, 'Rawalpindi'),
	(81, 10, 'Islamabad'),
	(82, 10, 'Peshawar'),
	(83, 11, 'Aberdeen'),
	(84, 11, 'Belfast'),
	(85, 11, 'Birmingham'),
	(86, 11, 'Bristol'),
	(87, 11, 'Bristol'),
	(88, 11, 'Coventry'),
	(89, 11, 'Durham'),
	(90, 11, 'Leeds'),
	(91, 11, 'Liverpool'),
	(92, 11, 'Manchester'),
	(93, 11, 'London'),
	(94, 12, 'New York'),
	(95, 12, 'Los Angeles'),
	(96, 12, 'Chicago'),
	(97, 12, 'Houston'),
	(98, 12, 'Phoenix'),
	(99, 12, 'Philadelphia'),
	(100, 12, 'San Antonio'),
	(101, 12, 'San Diego'),
	(102, 12, 'Dallas'),
	(103, 12, 'San Jose'),
	(104, 12, 'Austin');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;


-- Dumping structure for table demo.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table demo.country: ~12 rows (approximately)
DELETE FROM `country`;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `country_name`) VALUES
	(1, 'Afghanistan'),
	(2, 'Australia'),
	(3, 'Austria'),
	(4, 'Bahrain'),
	(5, 'Bangladesh'),
	(6, 'Belgium'),
	(7, 'Brazil'),
	(8, 'France'),
	(9, 'India'),
	(10, 'Pakistan'),
	(11, 'United Kingdom'),
	(12, 'United States');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
