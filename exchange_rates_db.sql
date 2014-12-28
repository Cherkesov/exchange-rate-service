-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2014 at 07:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exchange_rates_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_idx` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=115 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `active`) VALUES
(1, 'Albania Lek', 'ALL', 0),
(2, 'Afghanistan Afghani', 'AFN', 0),
(3, 'Argentina Peso', 'ARS', 0),
(4, 'Aruba Guilder', 'AWG', 0),
(5, 'Australia Dollar', 'AUD', 0),
(6, 'Azerbaijan New Manat', 'AZN', 0),
(7, 'Bahamas Dollar', 'BSD', 0),
(8, 'Barbados Dollar', 'BBD', 0),
(9, 'Bangladeshi taka', 'BDT', 0),
(10, 'Belarus Ruble', 'BYR', 1),
(11, 'Belize Dollar', 'BZD', 0),
(12, 'Bermuda Dollar', 'BMD', 0),
(13, 'Bolivia Boliviano', 'BOB', 0),
(14, 'Bosnia and Herzegovina Convertible Marka', 'BAM', 0),
(15, 'Botswana Pula', 'BWP', 0),
(16, 'Bulgaria Lev', 'BGN', 0),
(17, 'Brazil Real', 'BRL', 0),
(18, 'Brunei Darussalam Dollar', 'BND', 0),
(19, 'Cambodia Riel', 'KHR', 0),
(20, 'Canada Dollar', 'CAD', 0),
(21, 'Cayman Islands Dollar', 'KYD', 0),
(22, 'Chile Peso', 'CLP', 0),
(23, 'China Yuan Renminbi', 'CNY', 0),
(24, 'Colombia Peso', 'COP', 0),
(25, 'Costa Rica Colon', 'CRC', 0),
(26, 'Croatia Kuna', 'HRK', 0),
(27, 'Cuba Peso', 'CUP', 0),
(28, 'Czech Republic Koruna', 'CZK', 0),
(29, 'Denmark Krone', 'DKK', 0),
(30, 'Dominican Republic Peso', 'DOP', 0),
(31, 'East Caribbean Dollar', 'XCD', 0),
(32, 'Egypt Pound', 'EGP', 0),
(33, 'El Salvador Colon', 'SVC', 0),
(34, 'Estonia Kroon', 'EEK', 1),
(35, 'Euro Member Countries', 'EUR', 1),
(36, 'Falkland Islands (Malvinas) Pound', 'FKP', 0),
(37, 'Fiji Dollar', 'FJD', 0),
(38, 'Ghana Cedis', 'GHC', 0),
(39, 'Gibraltar Pound', 'GIP', 0),
(40, 'Guatemala Quetzal', 'GTQ', 0),
(41, 'Guernsey Pound', 'GGP', 0),
(42, 'Guyana Dollar', 'GYD', 0),
(43, 'Honduras Lempira', 'HNL', 0),
(44, 'Hong Kong Dollar', 'HKD', 0),
(45, 'Hungary Forint', 'HUF', 0),
(46, 'Iceland Krona', 'ISK', 0),
(47, 'India Rupee', 'INR', 0),
(48, 'Indonesia Rupiah', 'IDR', 0),
(49, 'Iran Rial', 'IRR', 0),
(50, 'Isle of Man Pound', 'IMP', 0),
(51, 'Israel Shekel', 'ILS', 0),
(52, 'Jamaica Dollar', 'JMD', 0),
(53, 'Japan Yen', 'JPY', 0),
(54, 'Jersey Pound', 'JEP', 0),
(55, 'Kazakhstan Tenge', 'KZT', 0),
(56, 'Korea (North) Won', 'KPW', 0),
(57, 'Korea (South) Won', 'KRW', 0),
(58, 'Kyrgyzstan Som', 'KGS', 0),
(59, 'Laos Kip', 'LAK', 0),
(60, 'Latvia Lat', 'LVL', 0),
(61, 'Lebanon Pound', 'LBP', 0),
(62, 'Liberia Dollar', 'LRD', 0),
(63, 'Lithuania Litas', 'LTL', 0),
(64, 'Macedonia Denar', 'MKD', 0),
(65, 'Malaysia Ringgit', 'MYR', 0),
(66, 'Mauritius Rupee', 'MUR', 0),
(67, 'Mexico Peso', 'MXN', 0),
(68, 'Mongolia Tughrik', 'MNT', 0),
(69, 'Mozambique Metical', 'MZN', 0),
(70, 'Namibia Dollar', 'NAD', 0),
(71, 'Nepal Rupee', 'NPR', 0),
(72, 'Netherlands Antilles Guilder', 'ANG', 0),
(73, 'New Zealand Dollar', 'NZD', 0),
(74, 'Nicaragua Cordoba', 'NIO', 0),
(75, 'Nigeria Naira', 'NGN', 0),
(76, 'Norway Krone', 'NOK', 1),
(77, 'Oman Rial', 'OMR', 0),
(78, 'Pakistan Rupee', 'PKR', 0),
(79, 'Panama Balboa', 'PAB', 0),
(80, 'Paraguay Guarani', 'PYG', 0),
(81, 'Peru Nuevo Sol', 'PEN', 0),
(82, 'Philippines Peso', 'PHP', 0),
(83, 'Poland Zloty', 'PLN', 0),
(84, 'Qatar Riyal', 'QAR', 0),
(85, 'Romania New Leu', 'RON', 0),
(86, 'Russia Ruble', 'RUB', 1),
(87, 'Saint Helena Pound', 'SHP', 0),
(88, 'Saudi Arabia Riyal', 'SAR', 0),
(89, 'Serbia Dinar', 'RSD', 0),
(90, 'Seychelles Rupee', 'SCR', 0),
(91, 'Singapore Dollar', 'SGD', 0),
(92, 'Solomon Islands Dollar', 'SBD', 0),
(93, 'Somalia Shilling', 'SOS', 0),
(94, 'South Africa Rand', 'ZAR', 0),
(95, 'Sri Lanka Rupee', 'LKR', 0),
(96, 'Sweden Krona', 'SEK', 1),
(97, 'Switzerland Franc', 'CHF', 1),
(98, 'Suriname Dollar', 'SRD', 0),
(99, 'Syria Pound', 'SYP', 0),
(100, 'Taiwan New Dollar', 'TWD', 0),
(101, 'Thailand Baht', 'THB', 0),
(102, 'Trinidad and Tobago Dollar', 'TTD', 0),
(103, 'Turkey Lira', 'TRY', 0),
(104, 'Turkey Lira', 'TRL', 0),
(105, 'Tuvalu Dollar', 'TVD', 0),
(106, 'Ukraine Hryvna', 'UAH', 1),
(107, 'United Kingdom Pound', 'GBP', 1),
(108, 'United States Dollar', 'USD', 1),
(109, 'Uruguay Peso', 'UYU', 0),
(110, 'Uzbekistan Som', 'UZS', 0),
(111, 'Venezuela Bolivar', 'VEF', 0),
(112, 'Viet Nam Dong', 'VND', 0),
(113, 'Yemen Rial', 'YER', 0),
(114, 'Zimbabwe Dollar', 'ZWD', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
