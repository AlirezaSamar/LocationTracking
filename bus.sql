-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2015 at 08:16 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alirezai_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bussystem`
--

DROP TABLE IF EXISTS `bussystem`;
CREATE TABLE IF NOT EXISTS `bussystem` (
  `busid` int(11) NOT NULL AUTO_INCREMENT,
  `bus_name` varchar(100) NOT NULL,
  `bus_station` varchar(350) NOT NULL,
  PRIMARY KEY (`busid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bussystem`
--

INSERT INTO `bussystem` (`busid`, `bus_name`, `bus_station`) VALUES
(1, 'Zon 2', 'KPZ-KFAB-KBH-KUO-EBHIND PUSANIKA-FPI-DECTAR-PPS-STADUIM-DANAU-FKBA-FSSK-KIZ-KRK-FTSM '),
(2, 'Zon 3', 'KPZ-KFAB-KBH- KUO- EBHIND PUSANIKA-FPI-DECTAR-PPS-STADUIM-DANAU-FKBA-FSSK-KIZ-KRK-FTSM-college kristmas '),
(3, 'Zon 6z-6K', 'KTM UKM-DANAU-KKM-PS-KIZ-KDO-KRK-FSSK-KBH-KUO-FST-KAB-FTSM-KPZ-PSTL-PPS'),
(4, 'Zon 3U', 'KKM-KDO-PPS-KIZ-FSSK-KAB-KUO-KBH-FKAB-FPEND-FUU-BEHIND PUSANIKA-KKM-FTSM');

-- --------------------------------------------------------

--
-- Table structure for table `gcm_users`
--

DROP TABLE IF EXISTS `gcm_users`;
CREATE TABLE IF NOT EXISTS `gcm_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gcm_user_mobile_id` varchar(150) NOT NULL,
  `gcm_regid` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `gcm_user_mobile_id`, `gcm_regid`, `created_at`) VALUES
(49, 'a7c94ea2810c592b', 'APA91bHKIYu3DBLswiU0e7mf4JWwA0syCqAW8Srq7I1u8xXgc2mQuts0yC-7a0aEdu94C3ZN46qr5z8SMkCrFfCaQSDjQ7aDfIzB9bB2Jp09gyH-gr-y6-eAigTR9ku4GyrdE8ovK7Gg', '2015-07-30 02:24:36'),
(46, '94939b96c7f74955', 'APA91bFeOA0QLE3WrxExwgmNoR-S47y9uch-c62c3575kH_855HzZT8uQ_DhEP_aJ-dFNJE0dHXSbeBZ9G4cq3rjXX1A5t4lUviNO9-kKlolRkTsA0TGGMaU--PR06pQfZ-zh31iv94n', '2015-07-29 10:06:02'),
(50, 'a1341c86172a2da9', 'APA91bFsElIQ-O015AUiVdPCZePYObs0JWZNdyyd0F6JVGr2AefDg14iUSyr2DKPz_4Tw5hMCIeyZkyMvh8XEpeWGFnwSq5CwqDr6l026_ue9osbZNnPW-y0z1njfGtL8kRcfVzXU9m9', '2015-07-30 02:41:19'),
(48, 'bca68c05cb3c301', 'APA91bFn3kHgpNpgX0hSShG3RZdNUSJ3Iqyd51sYyofrwx6E1qa17IBS_zzNwrXan8qYhu11HTR5StzdQ59lrc0Qpg6LbWsIwefDOP04vDJ9eR0w0RQFHoffo17KiwEscCdr_4R7Wkiz', '2015-07-29 11:07:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
