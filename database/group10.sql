-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 08:25 AM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllReservations` ()   SELECT * FROM tbl_reservation ORDER BY res_id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllRoom` ()   SELECT * FROM rooms$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getReservations` (IN `userid` INT)   SELECT * FROM `tbl_reservation` WHERE `user_id` = userid ORDER BY res_id ASC$$

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
(1, 'Guest House 1', 'The house boasts a spacious open-concept kitchen with gleaming granite countertops and a sleek stainless steel appliance suite. A cozy stone fireplace anchors the inviting living room, creating a perfect spot for relaxation and gatherings.', 2500, 'Cordova', 'e', 'coud.png ehe.png house6.png mytypeofHouse.png ye.png ', 1),
(2, 'Guest House 2', 'Nestled amidst lush greenery, the house showcases a stunning wrap-around porch, offering a picturesque view of the surrounding countryside. Inside, a grand staircase adorned with intricate wrought-iron railings adds an elegant touch to the foyer.\n', 3500, 'Lapu Lapu', 'NA', 'ehe.png mytypeofHouse.png sheesh.png woah.png wow.png ', 0),
(3, 'Guest House 3', 'Tucked away in a quiet cul-de-sac, the house boasts a sprawling backyard with a sparkling swimming pool, providing an ideal oasis for outdoor entertainment and relaxation. Inside, large floor-to-ceiling windows flood the living room with natural light, creating an airy and inviting atmosphere.', 5000, 'Mandaue', 'NA', 'bre.png house5.png house6.png sheesh.png wow.png ', 1),
(4, 'Guest House 4', 'Perched atop a gentle hill, the house commands breathtaking panoramic views of rolling hills and distant mountains. Its meticulously crafted wooden deck, complete with a cozy seating area and a built-in fire pit, invites you to savor tranquil evenings under the starlit sky.', 4300, 'Pampanga', 'NA', 'coud.png fuckwebp.png guest.png hehee.png iwantbackyard.png ', 0),
(5, 'Guest House 5', 'Nestled in a quaint neighborhood, the house showcases a vibrant red front door that adds a pop of color and personality to its facade. Inside, an enchanting sunroom bathed in natural light serves as a serene retreat for relaxation and enjoying the surrounding garden views.', 20000, 'Manila', 'NA', 'bre.png fuckwebp.png hehee.png house6.png ye.png ', 2),
(6, 'Tranquil Haven Retreat', 'Located in a serene coastal town, the house features a charming wrap-around porch with hanging flower baskets, exuding a warm and welcoming ambiance. Inside, a cozy reading nook nestled by a bay window offers the perfect spot to curl up with a book and soak in the natural light.', 15000, 'Sri Lanka', 'NA', 'room1.png sanaall.png sheesh.png wow.png ye.png ', 1),
(7, 'Whispering Pines Cottage', 'The house boasts a stylish open-concept kitchen with sleek quartz countertops and state-of-the-art stainless steel appliances. A spacious backyard patio, adorned with string lights and a cozy seating area, sets the stage for memorable outdoor gatherings and relaxation.', 150000, 'Japan', 'NA', 'house6.png sheesh.png woah.png wow.png ye.png ', 0);

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
(1, 'John', 'Doe', 'john@doe.com', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'Jane', 'Duh', 'jane@duh.com', '202cb962ac59075b964b07152d234b70', 'user');

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
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '311893');

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
(1, 1, 1, 'John Gwapo Doe', 'Buagsong', '09123456789', 'paypal', 'approved', '2023-04-18', '2023-05-19 08:21:47'),
(2, 2, 1, 'John Gwapo Doe', 'Buagsong', '09123456789', 'paypal', 'pending', '2023-04-18', '2023-05-19 08:22:15'),
(3, 3, 2, 'Jane Panget Duh', 'Day-as', '09987654321', 'paypal', 'cancelled', '2023-04-18', '2023-05-19 08:23:03'),
(4, 3, 2, 'Jane Panget Duh', 'Day-as', '09987654321', 'paypal', 'pending', '2023-04-18', '2023-05-19 08:23:32');

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
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
