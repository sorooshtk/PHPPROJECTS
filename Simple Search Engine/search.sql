-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 01:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `sID` int(11) NOT NULL,
  `contents` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`sID`, `contents`, `url`) VALUES
(1, 'Google', 'http://google.com'),
(2, 'Facebook', 'https://facebook.com'),
(3, 'Gmail', 'https://gmail.com'),
(4, 'Google +', 'https://plus.google.com'),
(5, 'Microsoft', 'https://microsoft.com'),
(6, 'Hotmail', 'https://hotmail.com'),
(7, 'Outlook Live', 'https://outlook.live.com'),
(8, 'StackOverflow', 'https://stackoverflow.com'),
(9, 'W3School', 'https://www.w3schools.com'),
(10, 'YouTube', 'https://youtube.com'),
(11, 'Google Drive', 'https://drive.google.com'),
(12, 'Instagram', 'https://instagram.com'),
(13, 'Soroosh TK', 'https://www.facebook.com/SorooshTK'),
(14, 'Translate', 'https://translate.google.com'),
(15, 'Send-Anywhere', 'https://send-anywhere.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`sID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
