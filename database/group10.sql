-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 06:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group10`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `createAccount` (IN `fname` VARCHAR(200), IN `lname` VARCHAR(200), IN `mail` VARCHAR(200), IN `pass` VARCHAR(200), IN `utype` VARCHAR(7))   INSERT INTO tbl_account (firstname, lastname, email, password, userType) VALUES (fname, lname, mail, pass, utype)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteReservation` (IN `resId` INT)   DELETE FROM tbl_reservation WHERE res_id = resId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllReservations` ()   SELECT * FROM tbl_reservation ORDER BY res_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllRoom` ()   SELECT * FROM rooms$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoomDetail` (IN `rid` INT)   SELECT * FROM rooms WHERE room_id = rid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginRequest` (IN `email2` VARCHAR(200), IN `password2` VARCHAR(200))   SELECT * FROM tbl_account WHERE email = email2 AND password = password2$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(222) NOT NULL,
  `room_details` varchar(5000) NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_location` varchar(222) NOT NULL,
  `room_link` varchar(222) NOT NULL,
  `room_img` varchar(222) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_details`, `room_price`, `room_location`, `room_link`, `room_img`, `room_no`) VALUES
(69, 'Guest Room 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 2000, 'asd', 'dsdsd', 'room1.png room2.png room4.png ', 1),
(72, 'Guest Room 2 ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', 2500, 'bagusng', 'e', 'room1.png room2.png ', 1),
(73, 'Guest House 3', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"', 50000, 'Cordova', 'dssds', 'guest.png room1.png room2.png room4.png ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(11) NOT NULL,
  `firstname` varchar(222) NOT NULL,
  `lastname` varchar(222) NOT NULL,
  `email` varchar(2222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `userType` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_id`, `firstname`, `lastname`, `email`, `password`, `userType`) VALUES
(1, 'john', 'doe', 'john@doe.com', '123', 'user'),
(2, 'Jane', 'Doe', 'jane@doe.com', '143', 'admin'),
(22, 'Juan', 'Dela Cruz', 'juan@email.com', 'asd', 'user'),
(23, 'Dreamy', 'Bull', 'dreamy@bull.com', 'ambatukam', 'user'),
(25, 'Burdagol', 'Burikitikitk', 'hehe@h.com', '123', 'user'),
(28, 'John2', 'Doe2', 'josdf@dad.com', 'dcf087f55cd12dff4d58c04ecc62c17c', 'user'),
(29, 'John2', 'Doe2', 'asda@dsad.com', 'dcf087f55cd12dff4d58c04ecc62c17c', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `account_id` int(11) NOT NULL,
  `firstname` varchar(222) NOT NULL,
  `email` varchar(244) NOT NULL,
  `password` varchar(244) NOT NULL,
  `userType` varchar(5) NOT NULL,
  `cash` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`account_id`, `firstname`, `email`, `password`, `userType`, `cash`) VALUES
(1, 'jose', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '89893');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `res_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `address` varchar(222) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `payment_process` varchar(111) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`res_id`, `room_id`, `user_id`, `name`, `address`, `contact_no`, `payment_process`, `status`) VALUES
(65, 72, 1, 'd d d', 'd', '232', 'paypal', 'pending'),
(66, 72, 1, 'dsfd df df', 'df', '23', 'paypal', 'pending'),
(67, 72, 29, 'sd sd sd', 'ds', '322', 'paypal', 'approved'),
(68, 72, 29, 'sd sd sd', 'ds', '322', 'paypal', 'pending'),
(69, 72, 29, 'sd sd sd', 'ds', '322', 'paypal', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(25) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `username`, `password`, `email`, `date_created`) VALUES
(21, 'sample', '202cb962ac59075b964b07152d234b70', 'sample@samp.sp', '2022-12-01'),
(22, 'joren', '202cb962ac59075b964b07152d234b70', 'joren@email.com', '2023-04-20'),
(23, 'asdasdas', '7815696ecbf1c96e6894b779456d330e', 'asd@asd.ee', '2023-04-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
