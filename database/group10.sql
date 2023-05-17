-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 03:32 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteGuestHouse` (IN `roomid` INT)   DELETE FROM `rooms` WHERE `room_id` = roomid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteReservation` (IN `resId` INT)   DELETE FROM tbl_reservation WHERE res_id = resId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllReservations` ()   SELECT * FROM tbl_reservation ORDER BY res_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllRoom` ()   SELECT * FROM rooms$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getReservations` (IN `userid` INT)   SELECT * FROM `tbl_reservation` WHERE `user_id` = userid$$

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
(72, 'Guest Room 2 ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', 2500, 'bagusng', 'e', 'room1.png room2.png ', 1),
(73, 'Guest House 3', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"', 50000, 'Cordova', 'dssds', 'guest.png room1.png room2.png room4.png ', 1),
(74, 'Guest Room 4', 'This is without doubt THE BEST LOCATION you could ever ask for when visiting Sydney. \n2 minute walk to everything that is wonderful and local in the inner-city village of Surry Hills, and a short walk further to Sydney\'s CBD, Hyde Park or Centennial Park. Across the road from the iconic Sydney Cricket Ground and other sporting venues', 5500, 'Sydney', 'asd', 'guest.png room1.png room2.png room4.png rooom.png ', 2),
(75, 'Guest House 5', 'The src property can be changed at any time. However, the new image inherits the height and width attributes of the original image, if not new height and width properties are specified.', 5400, 'Cordova', 'e', 'house5.png house6.png room1.png room2.png room4.png rooom.png ', 1),
(76, 'Guest House 6', 'This guesthouse has 2 floors located in Wirobrajan\'s Residential area, 8mins to city center. All the 3 private rooms located on the 2nd floor, fit for 2 person, and include a private toilet inside (water heater & AC). At the same floor, located the shared facilities; a pantry, dining table, lounge, small gallery, & a view-ing terrace. The 1st floor is where my parents spend their time plus a kitchen, a fish pond, and some shared area that you can use.', 2000, 'Jakarta', 'asd', 'house5.png ', 1),
(77, 'Guest House 9', 'A modern, comfortable room in the charming and peaceful neighbourhood of Seddon, just over fifteen minutes from the centre of Melbourne.\n\nThe space\nThe room has everything you need for a comfortable stay, including a double bed, towels, air conditioning, wardrobe space, and a private en-suite bathroom. There\'s also a des', 3500, 'Japan', 's', 'house6.png room1.png room2.png room4.png rooom.png ', 1);

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
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '292393');

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
  `status` varchar(10) NOT NULL,
  `res_date` date NOT NULL,
  `expire_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`res_id`, `room_id`, `user_id`, `name`, `address`, `contact_no`, `payment_process`, `status`, `res_date`, `expire_time`) VALUES
(77, 77, 1, 'asdasd sadasd asd', 'asd', '051101651', 'paypal', 'cancelled', '2023-04-16', NULL),
(78, 73, 1, 'alexis sd jumaoas', 'nuisabdsfo', '0815113', 'paypal', 'cancelled', '2023-04-16', NULL),
(79, 77, 1, 'joyce s degamo', 'asdasda', '0815165', 'paypal', 'approved', '2023-04-16', NULL),
(80, 73, 1, 'dfd df df', 'dsfs', '45', 'paypal', 'pending', '2023-04-16', NULL),
(81, 77, 1, 'sd sd sds', 'sds', '3', 'paypal', 'pending', '2023-04-16', NULL),
(84, 77, 23, 'dreamy new forgis bull', 'hehe', '23232', 'paypal', 'cancelled', '2023-04-17', '2023-05-16 07:55:12'),
(85, 77, 23, 'dreamy b bull', 'asdas', '34343', 'paypal', 'approved', '2023-04-17', '2023-05-18 00:00:00'),
(86, 77, 23, 'dreamy gwapo hehehahaha', 'buagsong ', '092323233', 'paypal', 'pending', '2023-04-17', '2023-05-18 13:45:27'),
(87, 74, 23, 's ds ds', 'ds', '34', 'paypal', 'pending', '2023-04-17', '2023-05-18 14:17:27'),
(88, 77, 23, 'dream b bull', 'buagsong', '093434343', 'paypal', 'approved', '2023-04-17', '2023-05-18 15:04:33');

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
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
