-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 08:12 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyline`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `applicationview`
-- (See below for the actual view)
--
CREATE TABLE `applicationview` (
`driverid` int(11)
,`firstname` varchar(50)
,`lastname` varchar(50)
,`email` varchar(100)
,`mobilenumber` varchar(50)
,`city` varchar(125)
,`address` varchar(255)
,`birthdate` date
,`applydate` timestamp
,`licensedate` date
,`licenseexpiry` tinyint(4)
,`about` text
,`LicenseUrl` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` int(11) NOT NULL,
  `driverid` int(11) NOT NULL,
  `mechanicdate` date NOT NULL,
  `mechanicdue` tinyint(4) NOT NULL DEFAULT 0,
  `insurancenb` varchar(100) NOT NULL DEFAULT '',
  `capacity` int(11) NOT NULL DEFAULT 0,
  `stationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busid`, `driverid`, `mechanicdate`, `mechanicdue`, `insurancenb`, `capacity`, `stationid`) VALUES
(8181, 0, '2062-10-01', 0, '619', 0, 2),
(9191, 230027008, '2024-01-01', 0, '2312313123123122222222222222222222', 20, 1),
(9206, 268469893, '2033-02-22', 0, '1233223', 20, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `busview`
-- (See below for the actual view)
--
CREATE TABLE `busview` (
`busid` int(11)
,`driverid` int(11)
,`firstname` varchar(50)
,`lastname` varchar(50)
,`email` varchar(100)
,`mobilenumber` varchar(50)
,`province` varchar(100)
,`station` varchar(100)
,`mechanicdate` date
,`mechanicdue` tinyint(4)
,`insurancenb` varchar(100)
,`capacity` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverid` int(11) NOT NULL,
  `licensedate` date NOT NULL,
  `licenseexpiry` tinyint(4) DEFAULT 0,
  `LicenseUrl` varchar(255) NOT NULL DEFAULT '',
  `accepted` tinyint(4) NOT NULL DEFAULT 0,
  `isOnline` tinyint(4) NOT NULL DEFAULT 0,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverid`, `licensedate`, `licenseexpiry`, `LicenseUrl`, `accepted`, `isOnline`, `about`) VALUES
(0, '2022-01-01', 1, 'https://example.com/license', 1, 0, 'dlaklsljsdjlksadjkdsajasdjlkasdljkajdsjsadkjsadjasdljkasdljkasdjkasd'),
(216437780, '2023-06-23', 1, 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687624020/onbcglunjr1dkum4xmsr.jpg', 0, 0, 'klkdsadksasdlkadslkasdlkdsa'),
(230027008, '2023-06-20', 1, 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687169881/owfqd691qbnusotopviu.png', 1, 0, 'lklkelkelkerlkrelkerlkerklklreler'),
(242871680, '2023-06-03', 1, 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1686675385/q3nrljuswjixnfctvgyp.png', 1, 0, 'lkdskdslksdkldslkdslksdlksdlksdlk'),
(247632563, '2023-06-15', 1, 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687519388/nqnwxrjxxpy10vlz2cb6.png', 0, 0, 'lsdsasj;dkjapskf;ajopfqsjofd\\\'[as'),
(261952038, '2023-06-23', 1, 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687518494/khly9jmok4fmxqnnnzgk.webp', 0, 0, 'lkslkdkldsklskldsklsd'),
(268469893, '2030-02-23', NULL, 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687770427/hritwb71q1dzxuksaz16.png', 1, 0, 'aasdasdasdas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `driverview`
-- (See below for the actual view)
--
CREATE TABLE `driverview` (
`driverid` int(11)
,`firstname` varchar(50)
,`lastname` varchar(50)
,`email` varchar(100)
,`mobilenumber` varchar(50)
,`city` varchar(125)
,`address` varchar(255)
,`birthdate` date
,`applydate` timestamp
,`licensedate` date
,`licenseexpiry` tinyint(4)
,`about` text
,`LicenseUrl` varchar(255)
,`isOnline` tinyint(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `userid`, `tripid`, `rating`, `comments`) VALUES
(13, 16228296, 5121250, 2, 'it was a bad trip'),
(14, 16228296, 5121239, 4, 'This trip Sucks,fuck this company'),
(15, 129780564, 222232, 4, 'asdasdasd'),
(16, 129780564, 5121251, 4, 'asdadasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `amountpaid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentid`, `userid`, `tripid`, `amountpaid`) VALUES
(23, 16228296, 222232, '20000');

-- --------------------------------------------------------

--
-- Stand-in structure for view `paymentsview`
-- (See below for the actual view)
--
CREATE TABLE `paymentsview` (
`paymentid` int(11)
,`amountpaid` varchar(25)
,`tripid` int(11)
,`UserID` int(11)
,`firstname` varchar(50)
,`lastname` varchar(50)
,`email` varchar(100)
,`mobilenumber` varchar(50)
,`address` varchar(255)
,`tripfrom` varchar(100)
,`tripto` varchar(100)
,`schedule` date
,`busid` int(11)
,`rating` int(11)
,`comments` text
,`time` time
);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `rate`) VALUES
(1, 93000);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationid` int(11) NOT NULL,
  `stationname` varchar(100) NOT NULL,
  `provincename` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationid`, `stationname`, `provincename`, `capacity`) VALUES
(1, 'Cola', 'Beirut', 10),
(2, 'Mainstreet', 'Nabatiye', 10),
(3, 'Antelias', 'Matn', 10),
(4, 'Sahet al nour', 'Tripoli', 10),
(5, 'Kaala', 'Saida', 10),
(6, 'AlRas', 'Baalbak', 10),
(7, 'Bahr', 'Sour', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `statistics`
-- (See below for the actual view)
--
CREATE TABLE `statistics` (
`user_count` bigint(21)
,`driver_count` bigint(21)
,`bus_count` bigint(21)
,`total_revenue` decimal(32,0)
,`yearly_user_count` bigint(21)
,`monthly_user_count` bigint(21)
,`yearly_driver_count` bigint(21)
,`monthly_driver_count` bigint(21)
,`yearly_profit` decimal(32,0)
,`monthly_revenue` decimal(32,0)
,`yearly_trip_count` bigint(21)
,`monthly_trips_count` bigint(21)
,`total_trips` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tripid` int(11) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `receipt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userid`, `customer_name`, `customer_email`, `tripid`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`, `receipt`) VALUES
(42, 129780564, 'Khodor', 'khodorhajjhassan1@gmail.com', 222232, 20000.00, 'lbp', 20000.00, 'lbp', 'pi_3NNDioBC4rKOPGa91MRFcDba', 'succeeded', '2023-06-26 14:37:09', '2023-06-26 14:37:09', 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687779425/d6l3iuh7tf1y1auvmk5b.png'),
(44, 125986963, 'Nou', 'Nour@gmail.com', 5121251, 600000.00, 'lbp', 600000.00, 'lbp', 'pi_3NNWD6BC4rKOPGa91fW6uB5r', 'succeeded', '2023-06-27 10:21:41', '2023-06-27 10:21:41', 'https://res.cloudinary.com/dxzklmc6y/image/upload/v1687850502/ewybk0syqincdmdhcj4b.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactionsview`
-- (See below for the actual view)
--
CREATE TABLE `transactionsview` (
`tripid` int(11)
,`UserID` int(11)
,`firstname` varchar(50)
,`lastname` varchar(50)
,`email` varchar(100)
,`mobilenumber` varchar(50)
,`address` varchar(255)
,`tripfrom` varchar(100)
,`tripto` varchar(100)
,`schedule` date
,`busid` int(11)
,`time` time
,`txn_id` varchar(50)
,`ticketprice` float(10,2)
,`currency` varchar(10)
,`receipt` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripid` int(11) NOT NULL,
  `busid` int(11) NOT NULL,
  `tripfrom` int(11) NOT NULL,
  `tripto` int(11) NOT NULL,
  `schedule` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'onset',
  `movetime` time NOT NULL,
  `arrivetime` time NOT NULL,
  `ticketprice` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `details` text NOT NULL,
  `seats` int(11) DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripid`, `busid`, `tripfrom`, `tripto`, `schedule`, `status`, `movetime`, `arrivetime`, `ticketprice`, `createdAt`, `details`, `seats`) VALUES
(222232, 8181, 1, 2, '2023-06-26', '', '13:24:00', '19:23:00', 20000, '2023-06-30 15:32:03', 'kdflkfdklfdkkdfkdf', 5),
(5121239, 8181, 1, 2, '2046-07-16', 'onset', '19:24:00', '19:23:00', 292922, '2023-06-30 16:21:24', '2929292', -18),
(5121242, 9191, 1, 3, '2036-06-20', 'onset', '19:24:00', '19:23:00', 817171, '2023-06-30 19:32:14', 'jkdsjdsksdk', 19),
(5121250, 8181, 5, 1, '2023-06-26', 'onset', '13:00:00', '16:00:00', 100000, '2023-06-25 16:53:03', 'this is a trip', 20),
(5121251, 9206, 6, 1, '2023-11-22', 'In progress', '10:00:00', '12:00:00', 600000, '2023-06-26 09:09:17', 'No smokng !!!', 19);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tripview`
-- (See below for the actual view)
--
CREATE TABLE `tripview` (
`tripid` int(11)
,`Bus` int(11)
,`driverid` int(11)
,`firstname` varchar(50)
,`lastname` varchar(50)
,`origin` varchar(100)
,`originstationid` int(11)
,`provinaceorigin` varchar(100)
,`destination` varchar(100)
,`destinationstationid` int(11)
,`provinacedestination` varchar(100)
,`schedule` date
,`starttime` time
,`arrivetime` time
,`seats` int(11)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `city` varchar(125) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT current_timestamp(),
  `role` smallint(6) NOT NULL DEFAULT 0,
  `emailapproved` tinyint(4) NOT NULL DEFAULT 0,
  `nboftrips` int(11) NOT NULL DEFAULT 0,
  `isblocked` tinyint(4) NOT NULL DEFAULT 0,
  `verification_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `firstname`, `lastname`, `mobilenumber`, `city`, `address`, `birthdate`, `createAt`, `role`, `emailapproved`, `nboftrips`, `isblocked`, `verification_code`) VALUES
(0, 'null', '$2y$10$XoiRaGUq2F1WwAFUPE.KvOKAmAcjOPHkxDXXv3CpufjEaki.TVdGa', 'Has No', 'Driver', '019292922', 'test', 'test', '2023-06-09', '2023-06-09 19:19:40', 1, 1, 0, 1, NULL),
(11111111, 'user1@example.com', 'Password1234', 'Ali', 'Mantach', '1234567890', 'New York', '123 Main St', '2023-05-05', '2023-05-19 17:45:29', 0, 0, 0, 1, NULL),
(16228296, 'theundertakerss43@gmail.com', '$2y$10$ct61Xk9avwnZejIDaWEaieuVFKBgpZ92F2/g3Rt7.E.GgXyU9JbdC', 'Mohammad Yassine', 'Yassine', '82727267262', 'Beirut', 'Beirut', '2023-06-09', '2023-06-10 07:37:36', 0, 1, 25, 0, NULL),
(19754677, 'test@gmail.com', '$2y$10$D/hncWEzIwpk.edUkQWMvuPMktF74XtuYCk7kpa81wgMBuZ73iYES', 'Mohammad Yassine2', 'Yassine2', '817262227', 'Beirut', 'Beirut', '2023-06-10', '2023-06-10 07:50:51', 2, 1, 0, 0, NULL),
(22222222, 'user2@example.com', 'password2', 'Jane', 'Smith', '9876543210', 'Los Angeles', '456 Elm St', '2023-05-05', '2023-05-19 17:45:58', 0, 0, 0, 1, NULL),
(33333333, 'user3@example.com', 'password3', 'Michael', 'Johnson', '5551234567', 'Chicago', '789 Oak St', '2023-05-05', '2023-05-19 17:46:18', 0, 0, 0, 0, NULL),
(42823386, 'test1@gmail.com', '$2y$10$IoLTAt/D9X1BPHZvvDe8UOnBGq09fzndKr8qDAWsy/jNgYdsEBxdK', 'Ahmad', 'Test', '71654333', 'Saida', 'Sour', '2006-02-10', '2023-06-10 07:53:43', 0, 0, 0, 1, NULL),
(66666666, 'user6@example.com', 'password6', 'Sarah', 'Anderson', '7778889990', 'Seattle', '987 Oak Ave', '2023-05-05', '2023-05-19 17:51:16', 0, 0, 0, 0, NULL),
(77777777, 'new@example.com', 'Password1234', 'Robert', 'Taylor', '5559998887', 'Miami', '654 Palm St', '2023-05-05', '2023-05-19 17:51:56', 9, 0, 0, 0, NULL),
(89695870, 'khodor@gmail.com', '$2y$10$kvoAPvohI6CEihTfXy92he6GyBK6pYyQHmGD3G6RqzFDzmJFlpeBW', 'Mohammad Yassine', 'Yassine', '81653493', 'Beirut', 'Beirut', '2023-06-10', '2023-06-10 08:36:45', 0, 0, 0, 0, NULL),
(110661623, 'hassanb1@gmail.com', '$2y$10$.Mp2Tyyn0lhzslsxKZoMReWA8bhdXzOfMAGvnB8ad1mInSV2CYt92', 'Hassan', 'Barada', '819765432', '', 'Beirut,Lebanon', '1970-07-02', '2023-06-14 08:32:37', 1, 0, 0, 0, NULL),
(115359901, 'theundertakerss53@gmail.com', '$2y$10$NkEzIpepWG0Lb2GuRqkwQuGYkf665ZKbSDgygomr4Vj6JCrmZ9GDK', 'ahmad', 'test', '81653407', 'Beirut', 'Beirut', '2023-06-12', '2023-06-12 06:55:16', 0, 0, 0, 0, NULL),
(115858709, 'theundertakerss4333@gmail.com', '$2y$10$cOQsW/p8lYoXPcBnkc5T0OYJt2afhkTqcdbRCAa2WM7ulNba8LKpO', 'Mohammad Yassine', '', '81762622', 'Beirut', 'Beirut', '2023-06-10', '2023-06-10 09:51:47', 0, 0, 0, 0, NULL),
(123456879, 'theundertakerss3@gmai.com', '$2y$10$bP8tOHsc6e1IQLb4apemP.RCWQU20QX7lY3RagDuV0MoGgyKEJlDa', 'Mohhammad', 'Yassin', '23232322', 'Beirut', 'lol', '2023-02-02', '2023-05-19 17:45:29', 0, 0, 0, 0, NULL),
(123456899, 'theundertakerss4@gmai.com', '$2y$10$yIqFWcbRc7xqkGxLkZIibe1scaLJCEay2NUdMNpX42pgxmYSeLUtC', 'Mohhammad', 'Yassin', '233232322', 'Beirut', 'lol', '2023-02-02', '2023-05-19 17:45:29', 0, 0, 0, 0, NULL),
(125986963, 'hfhjyhz@gmail.com', '$2y$10$ZBw2/oaLsIWHweQ1b5LDe.Qw6KePe08Nr7lImUxWeZ8lSdY2zpEpy', 'Nour', 'asdasd', '12332111', 'asdasd', 'asdasd', '1997-02-21', '2023-06-27 07:20:20', 0, 1, 1, 0, '862258'),
(127934327, '69@gmail.com', '$2y$10$A0Wj2YhtEbf2wFxYDQswnuse01EsQyZ0nx/avfptvCiLOosnyYRc.', 'kdslkldskl', 'kldsklsdkl', '111112222', 'ldskdslkklsd', 'lkdskldslkdskl', '2023-06-07', '2023-06-20 13:28:25', 0, 1, 0, 0, '337103'),
(129780564, 'khodorhajjhassan1@gmail.com', '$2y$10$1ErqGSndF5BYzyx8ktIpreICbCLeIuPv9KQQIgYEaZZWbppmeYsLy', 'khodor', 'hajj hassan', '03784031', 'Beirut', 'Haret-Hreik', '1997-05-24', '2023-06-26 08:35:11', 0, 1, 24, 0, '159712'),
(132136303, 'theundertakerss21@gmail.com', '$2y$10$wFuoUb9b26H818O4saBU1OWlFQuckNUC6q8/GzcGMMUL43g2WtiiK', 'Mohammad', 'Yassine', '81653406', 'Beirut', 'Beirut', '2023-06-12', '2023-06-12 07:12:50', 0, 0, 0, 0, NULL),
(133985233, 'roza12@gmail.com', '$2y$10$uBPIWztXfZw2r5rZrSWAausvSVhjfh27OG3nRMINgqfld5.S/.q2i', 'razan', 'bitar', '7723632632', 'beirut', 'beirut', '2023-06-19', '2023-06-19 10:22:00', 0, 0, 0, 0, '201011'),
(138757760, 'mdmdsmds@gmail.com', '$2y$10$5J91OLl.ogR0g9UM/n/aVOQOfUEDySWezOMZc34cxgbEzVth5Lxhe', 'Mohammad Yassine', '', '394834988934', 'Beirut', 'Beirut', '2023-06-10', '2023-06-10 09:53:18', 0, 0, 0, 0, NULL),
(146109960, 'jsjdkjds@gmail.com', '$2y$10$prvJpMKpEyrswdFnqSjpgOsO14E66tcx0uQf.ph9xOSHF7WxYD3W6', 'Mohammade', 'yassine', '2787823782', '', 'dskksdkjd', '1970-07-02', '2023-06-13 18:15:29', 0, 0, 0, 0, NULL),
(149107687, 'ausmi.natalli1@gmail.com', '$2y$10$Ay/fAqf2kqNCapu2i9cFiu6LO6OAMqWsrk2EBGAq1NRYgw37HiVMW', 'Mohammad', 'Yassine', '81653404', 'beirut', 'beirut', '2023-06-12', '2023-06-12 06:38:34', 0, 0, 0, 0, NULL),
(149688077, 'dsjkjsdkjdsk@gmail.com', '$2y$10$RfUg.nCjmGZib7J2qsCfiesr7YuOiHXpNqE31a1KM.4pvPfmvdu1m', 'fortesting', 'testing', '81765333', '', 'sddsdsds', '1970-07-02', '2023-06-14 09:12:17', 0, 1, 0, 0, NULL),
(156264125, 'khodorhajhassan1@gmail.com', '$2y$10$8dr2rs6wNb2AVUdQ5QERbejfaTY6ojbKzakFRn3mMSG5xIW19oLsW', 'Khodor', 'Hajhassan', '81999993', '', 'Harit hrek', '1970-07-02', '2023-06-13 08:26:08', 1, 0, 0, 0, NULL),
(161310364, '23222223232@gmail.com', '$2y$10$NDduk/y37F49C.lThf4o/OGxdg9fEPsHrmWjs0Fiws.uTuOAh/5Tm', 'fordrivertest', 'testdriver', '7723723732', '', 'Beirut,TRIPLOIU', '1970-07-02', '2023-06-14 09:18:24', 1, 0, 0, 0, NULL),
(168972376, 'khodorhajhassan@gmail.com', '$2y$10$t/nhAoPFS9bmTVCHq4gcHuzO2u0lFumS4hFwZ0RFR2MZTnvh.iaQO', 'Khodor', 'Hajhassan', '81999999', '', 'Harit hrek', '1970-07-02', '2023-06-13 08:18:33', 1, 0, 0, 0, NULL),
(170201664, 'theundertakerss4344@gmail.com', '$2y$10$xQs50U4Lmr0WtQTf5JhT4.bX6KUZD2vWp.SfLmIRzkz8Q2KXNiiEa', 'Mohammad', 'Yassin', '81653403', 'Beirut', 'Beirut', '2023-06-09', '2023-06-10 16:35:02', 0, 0, 0, 0, NULL),
(177625608, 'test122@gmail.com', '$2y$10$PEoKNNba51YsTzSrLvtxq.GnIIe.XotnfDLYXMoiKX5Yh6sB5oCoq', 'Ahmad', 'RAMI', '819761511', '', 'Beirut,TRIPLOIU', '1970-07-02', '2023-06-13 06:23:13', 1, 0, 0, 0, NULL),
(177899328, 'kdfkdfkjdfkjdf@gmail.com', '$2y$10$09KNeexrSnRZV2S2s.Ds7OYAlBRrO6xBpdmDJZVteD424TAnW9oCS', 'Mohammad', 'Yassine', '817262622', 'Beirut', 'Bbeirut', '2023-06-10', '2023-06-10 10:33:23', 0, 0, 0, 0, NULL),
(183831785, 'ausmi.natalli@gmail.com', '$2y$10$7Wn0evQWFTp.KHajm6BsLeTELkbnxd3D..3ezLIa5YyuGje.OkVv2', 'Mohammad', 'Yassine', '81653400', 'Beirut', 'Bbeirut', '2023-06-22', '2023-06-21 08:14:31', 0, 1, 0, 0, '281994'),
(192864340, '', '$2y$10$uvPUjpLxRNDLXeitLJWWoe9u/tPXm1gNbzx2aK52.HUTONa.CJyLG', '', '', '', '', '', '1970-07-02', '2023-06-13 19:05:32', 1, 0, 0, 0, NULL),
(194688189, 'roza@gmail.com', '$2y$10$v5VS0iYL.qbtiigQo2T.fuUWopwSBufxe.pY.4FreYgtimLV5/RJO', 'razan', 'bitar', '81653633', 'Beirut', 'Beirut', '2023-06-19', '2023-06-19 10:21:04', 0, 0, 0, 0, '267391'),
(216437780, 'lkdskldsklds@gmail.com', '$2y$10$mS/jCoI2fedT/Yw1/s1XQuJPqXTr8l4hSukBCNTd5WjGbqMZ2QB3O', 'Mohammad', 'Yassine', '816534053', 'Beirut', 'Beirut', '2023-06-15', '2023-06-24 16:26:57', 1, 0, 0, 0, NULL),
(230027008, 'khodor123@gmail.com', '$2y$10$SuluWG26m7.0NaDCWpUF.eETFpQuU6jdm0xzz4n1qTtKh96EAJy9W', 'khodor', 'hajhassan', '815656565', 'Beirut', 'kdsjkdskjdskj', '2023-06-20', '2023-06-19 10:18:02', 1, 0, 0, 0, NULL),
(230338419, 'yuyu@gmail.com', '$2y$10$8.VrxTZ/7rYUF58QYYqpVOpOc4ThLcftX4H8bURlHlgVcxEVVWJ/a', 'Mohammad', 'Yassine', '876552222', 'Beirut', 'Beirut', '2023-06-15', '2023-06-13 16:59:10', 0, 0, 0, 0, NULL),
(242871680, 'yoyomimi@gmail.com', '$2y$10$Jr.WlvxCkeUh16AJa/DkG.ksb5ByolaItg1B6YLvvBVyyErsqotxy', 'Mohammad', 'Yassine', '81653422', 'Beirut', 'Beirut', '2023-06-03', '2023-06-13 16:56:27', 1, 0, 0, 0, NULL),
(247632563, 'ausmi.natali@gmail.com', '$2y$10$lHw3kFS05fWbZkbmRQVQPu5tOlR6qflYPRtPrm.6QhLa.ziHU1ahK', 'Mido', 'dafif', '23323232', 'dlskkldslk', 'kldslksdkl', '2023-06-23', '2023-06-23 11:23:07', 1, 0, 0, 0, NULL),
(259669359, '699@gmail.com', '$2y$10$YetP8QBhvlh2V.qbRmFB/.nFVDksqGsbcNs2Rajq0kwbbOkNtEcYa', 'Mohammad', 'Yassine', '817662522', 'Beirut', 'Beirut', '2023-06-22', '2023-06-22 11:20:39', 0, 0, 0, 1, NULL),
(261952038, '1619@gmail.com', '$2y$10$z/dzegMGzvBokYIlnOxaa.jaJwh5kTrAqQo//dvyXJF0gyVb2SDjO', 'Mohammad', 'yassine', '619617171', 'ds,sdkdkjs', 'kjdskjsdkjs', '2023-06-20', '2023-06-23 11:08:14', 1, 0, 0, 0, NULL),
(262001810, 'ausmi.natalli2@gmail.com', '$2y$10$DzH/gjR4lqmFurs6agmbs.EPw.EDz0.tc7.dbskRw8k9HUCri9n/u', 'Mohammad', 'Yassine', '8138383483', 'Beirut', 'Beirut', '2023-06-20', '2023-06-20 14:49:01', 1, 0, 0, 0, NULL),
(268469893, 'lebnen88@gmail.com', '$2y$10$sBEoEkChzgMdwrMORsXdxeEReoFeDri9AkOL1TUsEhhaNRL0ogyfa', 'kazem', 'hajj hassan', '12333221', 'beirit', 'Haret-Hreik', '1997-02-22', '2023-06-26 09:07:13', 1, 0, 0, 0, NULL),
(444444444, 'driver@example.com', '$2y$10$D/hncWEzIwpk.edUkQWMvuPMktF74XtuYCk7kpa81wgMBuZ73iYES', 'Emily', 'Brown', '9998887776', 'Houston', '321 Pine St', '2023-05-05', '2023-05-19 17:46:39', 1, 1, 0, 0, NULL),
(555555555, 'admin@example.com', 'Password1234', 'David', 'Wilson', '1112223334', 'San Francisco', '654 Maple St', '2023-05-05', '2023-05-19 17:46:58', 2, 0, 0, 0, NULL),
(876553334, 'theundertakerss1@gmail.com', '$2y$10$L0lw.jcQunQxSRbg6L/lLeb7q2R0SgV0Lomm2GpWWIsnoS5fxbNxu', 'Mohammad', 'Yassine', '81765222', 'Beirut', 'Lebanon', '2023-06-09', '2023-06-09 19:07:38', 0, 0, 0, 0, NULL),
(876553335, 'theundertakerss3@gmail.com', '$2y$10$h2YYBBf7Rlzhd0.ZVKWIouCtQ1kHbB4BMMslFpclqFoFgYemTaXAq', 'Mohammad Yassine', 'Yassine', '81766222', 'Beirut', 'Beirut', '2023-06-09', '2023-06-09 19:14:50', 0, 0, 0, 0, NULL),
(876553336, 'theundertakerss6@gmail.com', '$2y$10$XoiRaGUq2F1WwAFUPE.KvOKAmAcjOPHkxDXXv3CpufjEaki.TVdGa', 'Mohammad Yassine', 'Yassine', '816527282', 'Beirut', 'Bbeirut', '2023-06-09', '2023-06-09 19:19:40', 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_canceled_trips`
--

CREATE TABLE `user_canceled_trips` (
  `canceledid` int(11) NOT NULL,
  `txn_id` varchar(45) NOT NULL,
  `userid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `amountpaid` varchar(45) DEFAULT NULL,
  `refunded` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_canceled_trips`
--

INSERT INTO `user_canceled_trips` (`canceledid`, `txn_id`, `userid`, `tripid`, `amountpaid`, `refunded`, `createdAt`) VALUES
(4, 'pi_3NMtcpBC4rKOPGa90J07eSzX', 16228296, 5121239, '292922', 1, '2023-06-25 14:12:27'),
(5, 'pi_3NMwhFBC4rKOPGa91CkR0k28', 16228296, 5121250, '100000', 0, '2023-06-25 17:32:36'),
(6, 'pi_3NN9fjBC4rKOPGa906pgUj5f', 16228296, 5121239, '292922', 0, '2023-06-26 07:23:39'),
(7, 'pi_3NNW0fBC4rKOPGa91qx6yTQR', 153197783, 5121251, '600000', 0, '2023-06-27 07:11:02'),
(8, 'pi_3NNBS8BC4rKOPGa908HT2fLI', 129780564, 5121251, '600000', 0, '2023-07-26 19:13:31'),
(9, 'pi_3NNvVjBC4rKOPGa90Q2U6Jfs', 129780564, 5121239, '292922', 0, '2023-07-26 19:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_trip_tracking`
--

CREATE TABLE `user_trip_tracking` (
  `trackingid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `cancelled` tinyint(4) NOT NULL DEFAULT 0,
  `amountpaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_trip_tracking`
--

INSERT INTO `user_trip_tracking` (`trackingid`, `tripid`, `userid`, `cancelled`, `amountpaid`) VALUES
(1, 222232, 22222222, 0, 20000),
(2, 2323, 33333333, 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `vacation_request`
--

CREATE TABLE `vacation_request` (
  `vacationid` int(11) NOT NULL,
  `driverid` int(11) NOT NULL,
  `vacation_start` date NOT NULL,
  `vacation_end` date NOT NULL,
  `reason_of_vacation` varchar(255) NOT NULL,
  `vacation_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacation_request`
--

INSERT INTO `vacation_request` (`vacationid`, `driverid`, `vacation_start`, `vacation_end`, `reason_of_vacation`, `vacation_approved`) VALUES
(1, 242871680, '2023-06-20', '2023-06-21', 'dslkdskldskldslkdslk', 2),
(2, 268469893, '2023-06-28', '2023-06-29', 'valentine', 2),
(3, 268469893, '2023-07-04', '2023-07-07', 'wedding', 1);

-- --------------------------------------------------------

--
-- Structure for view `applicationview`
--
DROP TABLE IF EXISTS `applicationview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicationview`  AS SELECT `driver`.`driverid` AS `driverid`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `users`.`email` AS `email`, `users`.`mobilenumber` AS `mobilenumber`, `users`.`city` AS `city`, `users`.`address` AS `address`, `users`.`birthdate` AS `birthdate`, `users`.`createAt` AS `applydate`, `driver`.`licensedate` AS `licensedate`, `driver`.`licenseexpiry` AS `licenseexpiry`, `driver`.`about` AS `about`, `driver`.`LicenseUrl` AS `LicenseUrl` FROM (`users` join `driver` on(`users`.`userid` = `driver`.`driverid`)) WHERE `driver`.`accepted` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `busview`
--
DROP TABLE IF EXISTS `busview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `busview`  AS SELECT `bus`.`busid` AS `busid`, `bus`.`driverid` AS `driverid`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `users`.`email` AS `email`, `users`.`mobilenumber` AS `mobilenumber`, `station`.`provincename` AS `province`, `station`.`stationname` AS `station`, `bus`.`mechanicdate` AS `mechanicdate`, `bus`.`mechanicdue` AS `mechanicdue`, `bus`.`insurancenb` AS `insurancenb`, `bus`.`capacity` AS `capacity` FROM (((`users` join `driver` on(`users`.`userid` = `driver`.`driverid`)) join `bus` on(`bus`.`driverid` = `driver`.`driverid`)) join `station` on(`station`.`stationid` = `bus`.`stationid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `driverview`
--
DROP TABLE IF EXISTS `driverview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `driverview`  AS SELECT `driver`.`driverid` AS `driverid`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `users`.`email` AS `email`, `users`.`mobilenumber` AS `mobilenumber`, `users`.`city` AS `city`, `users`.`address` AS `address`, `users`.`birthdate` AS `birthdate`, `users`.`createAt` AS `applydate`, `driver`.`licensedate` AS `licensedate`, `driver`.`licenseexpiry` AS `licenseexpiry`, `driver`.`about` AS `about`, `driver`.`LicenseUrl` AS `LicenseUrl`, `driver`.`isOnline` AS `isOnline` FROM (`driver` join `users` on(`users`.`userid` = `driver`.`driverid`)) WHERE `driver`.`accepted` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `paymentsview`
--
DROP TABLE IF EXISTS `paymentsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paymentsview`  AS SELECT `p`.`paymentid` AS `paymentid`, `p`.`amountpaid` AS `amountpaid`, `p`.`tripid` AS `tripid`, `u`.`userid` AS `UserID`, `u`.`firstname` AS `firstname`, `u`.`lastname` AS `lastname`, `u`.`email` AS `email`, `u`.`mobilenumber` AS `mobilenumber`, `u`.`address` AS `address`, `s1`.`stationname` AS `tripfrom`, `s2`.`stationname` AS `tripto`, `t`.`schedule` AS `schedule`, `t`.`busid` AS `busid`, `f`.`rating` AS `rating`, `f`.`comments` AS `comments`, `t`.`movetime` AS `time` FROM (((((`payments` `p` join `users` `u` on(`u`.`userid` = `p`.`userid`)) join `trips` `t` on(`t`.`tripid` = `p`.`tripid`)) join `station` `s1` on(`s1`.`stationid` = `t`.`tripfrom`)) join `station` `s2` on(`s2`.`stationid` = `t`.`tripto`)) left join (select `feedback`.`userid` AS `userid`,`feedback`.`rating` AS `rating`,`feedback`.`comments` AS `comments` from `feedback` where (`feedback`.`userid`,`feedback`.`feedbackid`) in (select `feedback`.`userid`,max(`feedback`.`feedbackid`) AS `latest_feedback_id` from `feedback` group by `feedback`.`userid`)) `f` on(`f`.`userid` = `p`.`userid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `statistics`
--
DROP TABLE IF EXISTS `statistics`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `statistics`  AS SELECT (select count(0) from `users`) AS `user_count`, (select count(0) from `driver`) AS `driver_count`, (select count(0) from `bus`) AS `bus_count`, (select sum(`user_trip_tracking`.`amountpaid`) from `user_trip_tracking`) AS `total_revenue`, (select count(0) from `users` where year(`users`.`createAt`) = year(curdate())) AS `yearly_user_count`, (select count(0) from `users` where year(`users`.`createAt`) = year(curdate()) and month(`users`.`createAt`) = month(curdate())) AS `monthly_user_count`, (select count(0) AS `yearly_driver_count` from (`driver` join `users` on(`users`.`userid` = `driver`.`driverid`)) where year(`users`.`createAt`) = year(curdate())) AS `yearly_driver_count`, (select count(0) from (`driver` join `users` on(`users`.`userid` = `driver`.`driverid`)) where year(`users`.`createAt`) = year(curdate()) and month(`users`.`createAt`) = month(curdate())) AS `monthly_driver_count`, (select sum(`user_trip_tracking`.`amountpaid`) from (`user_trip_tracking` join `trips` on(`trips`.`tripid` = `user_trip_tracking`.`tripid`)) where year(`trips`.`createdAt`) = year(curdate())) AS `yearly_profit`, (select sum(`user_trip_tracking`.`amountpaid`) from (`user_trip_tracking` join `trips` on(`trips`.`tripid` = `user_trip_tracking`.`tripid`)) where year(`trips`.`createdAt`) = year(curdate()) and month(`trips`.`createdAt`) = month(curdate())) AS `monthly_revenue`, (select count(0) from `trips` where year(`trips`.`createdAt`) = year(curdate())) AS `yearly_trip_count`, (select count(0) from `trips` where year(`trips`.`createdAt`) = year(curdate()) and month(`trips`.`createdAt`) = month(curdate())) AS `monthly_trips_count`, (select count(0) from `trips`) AS `total_trips` ;

-- --------------------------------------------------------

--
-- Structure for view `transactionsview`
--
DROP TABLE IF EXISTS `transactionsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactionsview`  AS SELECT `trips`.`tripid` AS `tripid`, `users`.`userid` AS `UserID`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `users`.`email` AS `email`, `users`.`mobilenumber` AS `mobilenumber`, `users`.`address` AS `address`, `s1`.`stationname` AS `tripfrom`, `s2`.`stationname` AS `tripto`, `trips`.`schedule` AS `schedule`, `trips`.`busid` AS `busid`, `trips`.`movetime` AS `time`, `transactions`.`txn_id` AS `txn_id`, `transactions`.`item_price` AS `ticketprice`, `transactions`.`paid_amount_currency` AS `currency`, `transactions`.`receipt` AS `receipt` FROM ((((`transactions` join `trips` on(`trips`.`tripid` = `transactions`.`tripid`)) join `station` `s1` on(`s1`.`stationid` = `trips`.`tripfrom`)) join `station` `s2` on(`s2`.`stationid` = `trips`.`tripto`)) join `users` on(`users`.`userid` = `transactions`.`userid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tripview`
--
DROP TABLE IF EXISTS `tripview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tripview`  AS SELECT `trips`.`tripid` AS `tripid`, `bus`.`busid` AS `Bus`, `driver`.`driverid` AS `driverid`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `station`.`stationname` AS `origin`, `station`.`stationid` AS `originstationid`, `station`.`provincename` AS `provinaceorigin`, `station2`.`stationname` AS `destination`, `station2`.`stationid` AS `destinationstationid`, `station2`.`provincename` AS `provinacedestination`, `trips`.`schedule` AS `schedule`, `trips`.`movetime` AS `starttime`, `trips`.`arrivetime` AS `arrivetime`, `trips`.`seats` AS `seats`, `trips`.`status` AS `status` FROM (((((`trips` join `bus` on(`trips`.`busid` = `bus`.`busid`)) join `driver` on(`bus`.`driverid` = `driver`.`driverid`)) join `users` on(`driver`.`driverid` = `users`.`userid`)) join `station` on(`station`.`stationid` = `trips`.`tripfrom`)) join `station` `station2` on(`station2`.`stationid` = `trips`.`tripto`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`),
  ADD UNIQUE KEY `busid_UNIQUE` (`busid`),
  ADD KEY `stationid_index` (`stationid`),
  ADD KEY `driverid_index` (`driverid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverid`),
  ADD UNIQUE KEY `driverid_UNIQUE` (`driverid`),
  ADD KEY `driverid_index` (`driverid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`),
  ADD UNIQUE KEY `feedbackid_UNIQUE` (`feedbackid`),
  ADD KEY `userid_index` (`userid`),
  ADD KEY `tripid_index` (`rating`),
  ADD KEY `tracking_tripid_idx` (`tripid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `userid_index` (`userid`),
  ADD KEY `payment_tripid_idx` (`tripid`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationid`),
  ADD UNIQUE KEY `stationid_UNIQUE` (`stationid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `tripid` (`tripid`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripid`),
  ADD UNIQUE KEY `tripid_UNIQUE` (`tripid`),
  ADD KEY `busid` (`busid`),
  ADD KEY `tripfrom` (`tripfrom`),
  ADD KEY `tripto` (`tripto`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid_UNIQUE` (`userid`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `mobilenumber_UNIQUE` (`mobilenumber`),
  ADD UNIQUE KEY `verification_code_UNIQUE` (`verification_code`);

--
-- Indexes for table `user_canceled_trips`
--
ALTER TABLE `user_canceled_trips`
  ADD PRIMARY KEY (`canceledid`),
  ADD UNIQUE KEY `canceledid_UNIQUE` (`canceledid`),
  ADD UNIQUE KEY `txn_id_UNIQUE` (`txn_id`);

--
-- Indexes for table `user_trip_tracking`
--
ALTER TABLE `user_trip_tracking`
  ADD PRIMARY KEY (`trackingid`),
  ADD UNIQUE KEY `trackingid_UNIQUE` (`trackingid`),
  ADD KEY `userid_index` (`userid`);

--
-- Indexes for table `vacation_request`
--
ALTER TABLE `vacation_request`
  ADD PRIMARY KEY (`vacationid`),
  ADD KEY `driverid` (`driverid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `busid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9207;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5121252;

--
-- AUTO_INCREMENT for table `user_canceled_trips`
--
ALTER TABLE `user_canceled_trips`
  MODIFY `canceledid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_trip_tracking`
--
ALTER TABLE `user_trip_tracking`
  MODIFY `trackingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vacation_request`
--
ALTER TABLE `vacation_request`
  MODIFY `vacationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `driverid_busdriverid` FOREIGN KEY (`driverid`) REFERENCES `driver` (`driverid`),
  ADD CONSTRAINT `stationid_busstationid` FOREIGN KEY (`stationid`) REFERENCES `station` (`stationid`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `userid_driverid` FOREIGN KEY (`driverid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `tracking_tripid` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`),
  ADD CONSTRAINT `tracking_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_tripid` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`),
  ADD CONSTRAINT `payment_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactiontripid` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`),
  ADD CONSTRAINT `transactionuserid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trip_busid` FOREIGN KEY (`busid`) REFERENCES `bus` (`busid`),
  ADD CONSTRAINT `tripfrom_station` FOREIGN KEY (`tripfrom`) REFERENCES `station` (`stationid`),
  ADD CONSTRAINT `tripto_station` FOREIGN KEY (`tripto`) REFERENCES `station` (`stationid`);

--
-- Constraints for table `user_trip_tracking`
--
ALTER TABLE `user_trip_tracking`
  ADD CONSTRAINT `userid_tracking` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `vacation_request`
--
ALTER TABLE `vacation_request`
  ADD CONSTRAINT `vacation_request_ibfk_1` FOREIGN KEY (`driverid`) REFERENCES `driver` (`driverid`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `UpdateMechanicDue` ON SCHEDULE EVERY 1 DAY STARTS '2023-06-06 13:46:35' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE bus SET bus.mechanicdue = 1 WHERE bus.mechanicdate <= CURDATE() AND bus.mechanicdue = 0$$

CREATE DEFINER=`root`@`localhost` EVENT `update_license_expiry_event` ON SCHEDULE EVERY 1 DAY STARTS '2023-06-08 14:46:49' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE driver
  SET licenseexpiry = 1
  WHERE licenseDate <= CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
