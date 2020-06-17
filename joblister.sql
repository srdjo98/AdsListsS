-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2020 at 08:40 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblister`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'masinstvo'),
(2, 'trgovina'),
(77, 'informatika');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `salery` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_user` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `id_category`, `id_user`, `company`, `job_title`, `description`, `salery`, `location`, `contact_user`, `contact_email`, `created_at`) VALUES
(58, 2, 3, 'Kod Bfka', 'Prodavac', 'Mesar', '230', 'Beograd', '+91231239', 'bfko@gmail.com', '2020-06-10 14:00:01'),
(59, 77, 3, 'Sungubungu', 'Administrativni radnik', 'Rad na kompjuteru', '400', 'Subotica', '+91231239', 'bfko@gmail.com', '2020-06-13 08:06:45'),
(60, 77, 3, 'Kod Bfka', 'Administrativni radnik', 'radnik u kancelariji', '300', 'Beograd', '+91231239', 'bfko@gmail.com', '2020-06-10 13:31:58'),
(61, 2, 3, 'Kod Bfka', 'Prodavac', 'Rad na kasi', '300', 'Beograd, BeÄej, Novi Sad, PanÄevo, Sremska Mitrovica', '+91231239', 'bfko@gmail.com', '2020-06-10 13:54:05'),
(62, 2, 3, 'Kod Bfka', 'Trgovac', 'Radnik na stovariÅ¡tu', '400', 'PaliÄ‡, PoÅ¾arevac, Subotica, ÄŒaÄak, Å abac, Batajnica', '+91231239', 'bfko@gmail.com', '2020-06-10 13:58:42'),
(63, 1, 3, 'Kod Bfka', 'Radnik', 'Rad na racunaru', '600', 'Beograd', '+91231239', 'bfko@gmail.com', '2020-06-10 14:00:43'),
(64, 1, 3, 'Test N', 'HR and Payroll Team Lead', 'Test', '1000', 'Sukungu', '+91231239', 'bfko@gmail.com', '2020-06-10 14:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `pib` varchar(255) NOT NULL,
  `ind_number` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `lastname`, `password`, `company`, `admin`, `pib`, `ind_number`, `postal_code`, `country`, `city`, `address`, `contact_email`, `contact_phone`) VALUES
(3, 'bfko', '', '4a7d1ed414474e4033ac29ccb8653d9b', 'Kod Bfka', 0, '', '', '', '', '', '', 'bfko@gmail.com', '+91231239'),
(4, 'Nikola', 'Petrovic', '099ce5b0c8d94fee1c9486ad95fcea8b', 'Infostud grupa', 0, '123454329', '123445679', '2400', 'Srbija', 'Subotica', 'Marka Kizica 32', 'info@gmail.com', '0644421234'),
(5, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '', 1, '', '', '', '', '', '', '', ''),
(90, 'Milanko', 'Pikolic', 'ff4d342023088bba6b02ea597704c094', 'DTD Ribarstvo d.o.o.', 0, '123456789', '12344567', '2400', 'Srbija', 'Subotica', 'Pikolic123', 'ribarstvo@gmail.com', '045123123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
