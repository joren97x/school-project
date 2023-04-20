-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 11:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bert`
--

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `midname` varchar(15) NOT NULL,
  `birthdate` date NOT NULL,
  `mailadd` varchar(15) NOT NULL,
  `region` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `municipality` varchar(15) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `streetname` varchar(15) NOT NULL,
  `contact` int(11) NOT NULL,
  `fathername` varchar(15) NOT NULL,
  `mothername` varchar(15) NOT NULL,
  `gender` char(6) NOT NULL,
  `age` int(1) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `lastname`, `firstname`, `midname`, `birthdate`, `mailadd`, `region`, `city`, `municipality`, `zipcode`, `streetname`, `contact`, `fathername`, `mothername`, `gender`, `age`, `date_registered`) VALUES
(1, 'casquejo', 'bert', 'bertzkie', '2001-12-02', 'berto@gmail.com', 'region VII', 'cebu', 'municipality', 6018, 'gabigabi', 987654321, 'berto', 'berta', 'male', 20, '2022-11-25'),
(2, 'jomuas', 'alexis', 'meme', '2000-05-05', 'alexis@gg.am', 'region VII', 'cebu', 'cordova', 2345, 'gabigabi', 987654354, 'alexo', 'alexe', 'male', 99, '2022-11-26'),
(6, 'asd', 'asd', 'asd', '2222-04-04', 'asd@d.dasa', 'asd', 'qweqwe', 'qweqwe', 123123, 'qweasd, asdqwe,', 456321032, 'asdqwe', 'qweasd', 'male', 99, '2022-12-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `mailadd` (`mailadd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
