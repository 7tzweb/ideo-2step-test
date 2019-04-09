-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: אפריל 09, 2019 בזמן 08:29 AM
-- גרסת שרת: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideotest`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `mydolist`
--

CREATE TABLE `mydolist` (
  `id` int(11) NOT NULL,
  `text` varchar(7500) COLLATE utf8_unicode_ci NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `rdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- הוצאת מידע עבור טבלה `mydolist`
--

INSERT INTO `mydolist` (`id`, `text`, `valid`, `rdate`) VALUES
(11, 't1', 0, '2019-04-08 19:24:50'),
(12, 't2', 0, '2019-04-08 19:24:51'),
(14, 't4', 0, '2019-04-08 19:24:49'),
(16, 't5', 0, '2019-04-08 19:24:45');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `mydolist`
--
ALTER TABLE `mydolist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mydolist`
--
ALTER TABLE `mydolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
