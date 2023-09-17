-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 10:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20527306_yey`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `firstname`, `lastname`) VALUES
(62, 'ian', '46c37acf936d40a666303b304b82231f', 'ianbeach.villadarez025@gmail.com', 'Ian Beach', 'Villadarez'),
(63, 'nai', '00f278b08373a7bc2884b1d7a58960d5', 'Nai@gmail.com', 'Nai', 'Dez nutz'),
(64, 'kelayap', '48421df4d599862973d70be629c387b6', 'michaelayap22@gmail.com', 'kel', 'ayap'),
(65, 'mart', '71e41a17623713bb12ee0b3c3b9cd96c', 'martprima@gmail.com', 'mart', 'prima'),
(66, 'Irving', '0410e86c2481c80898deb1c578bebb7a', 'Kyrie@gmail.com', 'Kyrie', 'Irving'),
(67, 'Curry', 'd103cc11b8dbf528c0a3424433b53f7d', 'curryhothand3@gmail.com', 'Stephen', 'Curry'),
(68, 'punch', '107bd78599f344de59ccf227d6bb6ed6', 'oac@gmail.com', 'manny', 'pacquiao'),
(69, 'test', 'e3f6118216cecff37e8a963157a6054d', 'test@gmail.com', 'test', 'test'),
(70, 'raoul', '4ab12c4fd06be1e8f533ed569c75e324', 'raoul@gmail.com', 'raul', 'montefalco'),
(71, 'riza01', 'f646ea6ddc8935d95e7c6be878a30e0b', 'riza@gmail.com', 'Riza Michelle', 'Lapu Lapu');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` float(50,2) NOT NULL,
  `quantity` int(50) NOT NULL,
  `totalprice` float(50,2) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(50) NOT NULL,
  `queries` varchar(250) NOT NULL,
  `replies` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(56, 'available flavors?', 'We offer a variety of flavors, including strawberry, chocolate, caramel, and more. You can check them out in our menu.'),
(57, 'Do you offer vegan cake options?', 'Yes, we offer both gluten-free and vegan cake options. Our gluten-free options include flavors like chocolate and vanilla, and our vegan options include flavors like carrot cake and chocolate.'),
(58, 'How to recover my account?', 'you can recover your account by clicking the forgot password below of login page to recover your account ');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `supplier` varchar(199) NOT NULL,
  `measurement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingredient_name`, `quantity`, `supplier`, `measurement`) VALUES
(201, 'Flour', '9000', 'Pilmico Foods Corporation', 'Grams'),
(206, 'Cocoa', '9500', 'Cocoa Supplier', 'Grams');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(120) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `status`, `date`) VALUES
(87, 'The chocolate cake is out of stock', 'manufacturer', '2023-03-21 12:45:21'),
(88, 'The chocolate cake is out of stock', 'manufacturer', '2023-03-21 12:49:20'),
(89, 'The admin is Requesting to update because the caramel cake is Expire. Please Update it Immediately.', 'manufacturer', '2023-03-21 16:11:37'),
(90, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 16:12:01'),
(91, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 16:13:46'),
(92, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 19:16:29'),
(93, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 19:16:34'),
(94, 'The admin is added a new product please update the ingredients of the Vanila Cake', 'manufacturer', '2023-03-21 19:21:17'),
(95, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 19:26:17'),
(96, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 19:26:23'),
(97, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 19:27:18'),
(98, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 20:11:18'),
(99, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 20:11:21'),
(100, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 20:11:24'),
(101, 'The manufacturer is updated the product quantity', 'admin', '2023-03-21 20:11:27'),
(102, 'The admin is added a new product please update the ingredients of the Row', 'manufacturer', '2023-04-02 08:25:21'),
(103, 'The admin is added a new product please update the ingredients of the Row', 'manufacturer', '2023-04-02 08:26:56'),
(104, 'The admin is added a new product please update the ingredients of the wew', 'manufacturer', '2023-04-02 08:27:31'),
(105, 'The admin is Requesting to update because the wew is Expire. Please Update it Immediately.', 'manufacturer', '2023-04-02 08:27:36'),
(106, 'The manufacturer is updated the product quantity', 'admin', '2023-04-11 11:40:12'),
(107, 'The manufacturer is updated the product quantity', 'admin', '2023-04-11 11:40:24'),
(108, 'The manufacturer is updated the product quantity', 'admin', '2023-04-11 11:40:30'),
(109, 'The manufacturer is updated the product quantity', 'admin', '2023-04-13 05:58:25'),
(110, 'The manufacturer is updated the product quantity', 'admin', '2023-04-13 06:00:17'),
(111, 'The admin is added a new product please update the ingredients of the Strawberry Cake', 'manufacturer', '2023-04-13 06:03:14'),
(112, 'The manufacturer is updated the product quantity', 'admin', '2023-04-13 06:03:37'),
(113, 'The admin is added a new product please update the ingredients of the Choco Cookies', 'manufacturer', '2023-04-20 10:25:31'),
(114, 'The manufacturer is updated the product quantity', 'admin', '2023-04-20 10:27:42'),
(115, 'The manufacturer is updated the product quantity', 'admin', '2023-04-20 10:28:28'),
(116, 'The admin is added a new product please update the ingredients of the Sponge Cake', 'manufacturer', '2023-04-20 10:30:05'),
(117, 'The manufacturer is updated the product quantity', 'admin', '2023-04-20 10:30:48'),
(118, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 02:17:52'),
(119, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:29:29'),
(120, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:29:51'),
(121, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:29:58'),
(122, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:30:04'),
(123, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:30:52'),
(124, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:32:02'),
(125, 'The admin is added a new product please update the ingredients of the Brownie Dessert Cake', 'manufacturer', '2023-04-21 06:38:50'),
(126, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:39:44'),
(127, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:40:16'),
(128, 'The manufacturer is updated the product quantity', 'admin', '2023-04-21 06:40:20'),
(129, 'The manufacturer is updated the product quantity', 'admin', '2023-04-23 08:00:46'),
(130, 'The manufacturer is updated the product quantity', 'admin', '2023-04-25 14:21:37'),
(131, 'The admin is added a new product please update the ingredients of the Choco Browness', 'manufacturer', '2023-05-06 16:55:09'),
(132, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:31:07'),
(133, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:31:22'),
(134, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:33:01'),
(135, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:34:11'),
(136, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 18:35:15'),
(137, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:46:14'),
(138, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:46:27'),
(139, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 18:53:57'),
(140, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:54:23'),
(141, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 18:54:32'),
(142, 'The admin is added a new product please update the ingredients of the Strawberry Cake', 'manufacturer', '2023-05-06 19:09:30'),
(143, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:12:44'),
(144, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:13:02'),
(145, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 19:13:43'),
(146, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:16:04'),
(147, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:16:06'),
(148, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:16:10'),
(149, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:16:13'),
(150, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 19:16:28'),
(151, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 19:16:33'),
(152, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:18:13'),
(153, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:18:16'),
(154, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:22:55'),
(155, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:22:58'),
(156, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:28:07'),
(157, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:28:11'),
(158, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 19:28:58'),
(159, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 19:30:15'),
(160, 'The manufacturer is updated the product quantity', 'admin', '2023-05-06 19:30:37'),
(161, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:35:37'),
(162, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:35:41'),
(163, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:40:00'),
(164, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:40:02'),
(165, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:45:03'),
(166, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:45:07'),
(167, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:45:52'),
(168, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:46:01'),
(169, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-06 19:48:31'),
(170, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-07 14:37:22'),
(171, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-07 14:37:27'),
(172, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-07 14:37:39'),
(173, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-07 14:37:43'),
(174, 'The manufacturer is updated the product quantity', 'admin', '2023-05-07 14:38:02'),
(175, 'The manufacturer is updated the product quantity', 'admin', '2023-05-07 14:38:17'),
(176, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-07 17:08:59'),
(177, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-07 17:09:04'),
(178, 'The manufacturer is updated the product quantity', 'admin', '2023-05-07 17:09:16'),
(179, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 11:40:55'),
(180, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 11:41:04'),
(181, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 11:41:25'),
(182, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:11:11'),
(183, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:11:34'),
(184, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:12:21'),
(185, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:16:03'),
(186, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:16:10'),
(187, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:16:13'),
(188, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:16:48'),
(189, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:22:10'),
(190, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:22:48'),
(191, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:23:30'),
(192, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:23:54'),
(193, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:24:13'),
(194, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:24:28'),
(195, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:26:45'),
(196, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:27:19'),
(197, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:28:05'),
(198, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:28:45'),
(199, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:29:54'),
(200, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:30:02'),
(201, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:32:45'),
(202, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:32:54'),
(203, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:32:59'),
(204, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:37:11'),
(205, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:47:22'),
(206, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:49:40'),
(207, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:49:59'),
(208, 'The admin is added a new product please update the ingredients of the Browness Choco', 'manufacturer', '2023-05-10 12:53:28'),
(209, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:53:55'),
(210, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:54:00'),
(211, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 12:57:36'),
(212, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:57:41'),
(213, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 12:58:09'),
(214, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 13:31:53'),
(215, 'The admin is Requesting to update because the  is . Please Update it Immediately.', 'manufacturer', '2023-05-10 13:31:57'),
(216, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 13:32:02'),
(217, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 13:32:26'),
(218, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 14:06:43'),
(219, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 16:48:09'),
(220, 'The admin is added a new product please update the ingredients of the Strawberry Cake', 'manufacturer', '2023-05-10 21:23:39'),
(221, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 21:25:46'),
(222, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 21:25:52'),
(223, 'The manufacturer is updated the product quantity', 'admin', '2023-05-10 21:27:52'),
(224, 'The manufacturer is updated the product quantity', 'admin', '2023-05-11 10:42:49'),
(225, 'The admin is added a new product please update the ingredients of the Ube Cheese Desal', 'manufacturer', '2023-05-13 20:48:46'),
(226, 'The admin is added a new product please update the ingredients of the Cheese Desal', 'manufacturer', '2023-05-13 20:50:08'),
(227, 'The admin is added a new product please update the ingredients of the Banana Bread', 'manufacturer', '2023-05-13 20:51:01'),
(228, 'The admin is added a new product please update the ingredients of the Creamy Vanilla Donut', 'manufacturer', '2023-05-13 20:52:13'),
(229, 'The admin is added a new product please update the ingredients of the Peanut Butter Glaze', 'manufacturer', '2023-05-13 20:53:14'),
(230, 'The admin is added a new product please update the ingredients of the Cream Bavarian Donut', 'manufacturer', '2023-05-13 20:54:22'),
(231, 'The admin is added a new product please update the ingredients of the Choco Cookies', 'manufacturer', '2023-05-13 20:55:55'),
(232, 'The admin is added a new product please update the ingredients of the Choco Brownies', 'manufacturer', '2023-05-13 20:57:07'),
(233, 'The admin is added a new product please update the ingredients of the Leche Flan', 'manufacturer', '2023-05-13 20:58:51'),
(234, 'The admin is added a new product please update the ingredients of the Choco Cake', 'manufacturer', '2023-05-13 21:00:30'),
(235, 'The admin is added a new product please update the ingredients of the Caramel Cake', 'manufacturer', '2023-05-13 21:01:07'),
(236, 'The admin is added a new product please update the ingredients of the Strawberry Cake', 'manufacturer', '2023-05-13 21:02:10'),
(237, 'The admin is added a new product please update the ingredients of the wew', 'manufacturer', '2023-05-14 15:14:24'),
(238, 'The admin is added a new product please update the ingredients of the Ube Cheese Desal', 'manufacturer', '2023-05-14 15:18:19'),
(239, 'The admin is added a new product please update the ingredients of the Cheese Desal', 'manufacturer', '2023-05-14 15:19:31'),
(240, 'The admin is added a new product please update the ingredients of the Banana Bread', 'manufacturer', '2023-05-14 15:19:57'),
(241, 'The admin is added a new product please update the ingredients of the Choco Pudding', 'manufacturer', '2023-05-14 15:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` longblob NOT NULL,
  `product_catn` varchar(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `image`, `product_catn`, `Quantity`, `status`, `description`) VALUES
(245, 'Choco Pudding', 10.00, 0xffd8ffe000104a46494600010100000100010000ffdb0084000a0708161515181616151819181a1a1a1c18191c1a1a1a1c181a1c181a1a1a1a1a1c1c212e251c1e2b2118182638262b2f313535351a243b403b343f2e343531010c0c0c100f101e12121e342424243434343434343434343434343434343434343434313434343434343434343434343434343434343434343434343434343434ffc000110800f600cd03012200021101031101ffc4001c0000010403010000000000000000000000040203050600010708ffc4003a10000103020404030605040202030000000100021103210405123106415161227181133291a1b1f00742c1d1e1142352f172921662155382ffc4001801000301010000000000000000000000000001020304ffc4002111000301000203010003010000000000000001021103311221415113226104ffda000c03010002110311003f00e758ac33a99d2e4312ac9c694e2a480ab04ab11bd49256a5689480d928dcb3347d076a61b730762802569302f94b8fc86c165d5773bcfdf89307c2de9d7cd42ac0502c46d744e00e0a6e259ed6a0904d8765cea57a2ff0ec346119a45b4840c8b77e1c61c1b342d62bf0db0e5b66c1ecaf45d74d626b42058727c4fe181be9795098bfc3dc4b3dd208f25dbd95a528bc74408f3962f86712cdd84f928e7d3a8cb16387a2f4857a6c76ed0a271792517eec1f040f4f3ec3ba1f82c87743f05d9b17c234cfba026f01c041ee9260792034e3ba92c95d9f33fc3c63878403e90a9f9b7013d8096b488f5080d292c7c253df29188a2e638b5c2e139470951feeb1c7d1031b2564292a3905777e484a764354182102d2283a12b5a931903d2bff001e7a065978c709a8cc2a5be8ae95c4b4e42a36229414d929914ea491ecd18f6a6dcd5385023a9a496225c92980396ad694416ac0100325965e8fe0360184a7ff0010b80e02907d4630ec5c015e8cca29b69e1da058068fa205f43693b538a4e269cade0369443c206034d894f443405a73250046bd974dbd854a1a09268205846fb352b970b264e1e51f429e91093048774a43a93488202702c2a4a28198fe1fb2a624d590187f2c7353185e0dc3b3f2cab32d12ab58b0896f0fd11b3026dfc3944df40531a8a5146b0c29b8ce1966a3a6c83770c77567c43a1c5326aa64942ce592152f18cbabce6a2c552b1ecb94d891115130f29eac137430cf7bb4b44a452052b415df03c22346a7baf0a1f30ca1ac983b28f34de16e5a5a4142d3827484dbd5922b09534bd8eda1c0fcd7a1328c731f41b0efca3e8bcea5597863885f47c0e71d1cbb7642133bae071200894f3f13dd737a7c5ac6df57aca24719d389d413c1697e6574b15d503ff39a2d1770423bf10a94c4a583d3a61ae167f50a9182e29655f74a94663dc76ba3034b3e1ea0251b0aab85c796ba4a9fa189d42424d02618b1321e941e96142cad2d4ac9480dc2c2b52b4e7084c089c501a8a85c5e2a1d014c55aecd46e9a34a99bd95a20a3664641552c70bab5e35fba83380754741040ef649822bf4300faafd2c12aeb966594f0cc97887775946a53c30b005cabfc439e9aa60596354dbc5d1b4ca4b58f6659cb8b886b8e9e406cab98bcc266eb6dd4fb045e03849f55dce1399155107ae524aea195fe1db2c5f7567c170461d9f907c16a67a70da7857bb6638fa152985c86bbfdda4ef510bbbe1f20a2cd983e0a4198363766840bd9c29bc0d8978f763b27f09f86d59c7c6e80bb7d57b182f0142663c4d87a5bbdb280282dfc2811771f8a12a7e1816ab533f11a96b821da7fca2cacb81cfe85700b5e0cf740f1a39961f846ad132d26ca5a8e2eb53f79930ba21a0d76d098a99734f208d1151c37113367823cd5df2bc5b1cc05a4289ab905377e509a6e43a7dc716f914016cd4dea9ac4566b0124aac9c2576ed50faa631186acea6f0f7c982a5fa5a54ff006782331e36631c5adbfd10cde396ee440eab9663ab963cb5def029c763cb99a63d563e6ce85c499d7f0fc5cc7ece0a44e67ad84b6eb87502f170558f24e247d321afbb50b9585707e160c5e64fd64774e52c53c8dca33453c480591abe7ea9babfda3a5c3c8f55bcda66150e7b2df8ca787a2c2f786b40e76541e29ceb0a585d4dedd7ca3747f1ee5b8b7bb531bae901b34dc1e7239ae3798b9c1e5b041e8b3a4d95388271b99b9e62527098773c8809795e52fa8458ae8dc3dc361905cdbaa9926a80387b86260b82e8197e56d6010027e961d94db2600556ceb8e9949fa183546f1b055d129365e69d384e06ae63987e2490c8633c5df6080cb7f12aab4ff719a8751fb25a8af17f875e58aaf94f1b61ab0f7c077436560c36358fbb1c0f914c440715e5b5aab7fb6f2dea0735ccb31c91ec275b5c0f5b90bbaa17138163c439a1034f0f3ed6c2b9bca4266957730cb5c5a7b2ebb9bf06b5d269d8f4e4a8b99f0cbd84eb611dc29c2d5266655c735a9407f8dbf357dc9b8d28d6805c01e86cb92d7cb9cddae10c1a41e60a7a272be1e8aa18863c4b4829e85c2f2acfebd18d2f24742ae995fe2032c2af87e89e92e5a3a16943e229084ce5f9932b34398e041e88a75c21af5824f1e942e21e0c66265ec21af1f3f35ceb33cb2b61dda2a308e8791f55d831c1ec7ea69840e3f18cacdd35983cd727f876fbefe1cad8f214951d1a64eea631bc3cc3763e3b216a70f3e241054b468a90770fe3e0f80c1076570ad5db543491062eb9de5b97546540eda0dd5db43e0784edd1526fe114a5f65ef31c5369d373dc6c02e3ece1d38aaeeaa5b01ce263a056fcff00187155bd930ff6d861c791773f4085c7f10d1c1b3433c6f8d87ebd175a47076fd0760b27a186602f2d1e70a56a663418cd7adb004ee171bce739ab8974bdc639346c3f74031ae2235ba3a498f821d16a0b5f13713d4ae4b5874b3e647e8a05efa4e003c41ebfca09f44ff9216b537050de9a2581cfca66ec7823a206ae15ccf79a52f04fa8e2431ae24726a370f98d624b5f45c4776909606a00c2bdb2a430f9ed4c39fed3ccf4dc143e65872f82c6169e764fe5391bdce07492534993548eb7c159a56ad443ab001ddba2b4032a9fc3d817b1a24dba2b5d2985a19263c026b118563c439a0a7414a48654f34e1163e4b2c553335e187b265923a85d71c0a4566348f147aa4c69b3ce55a9d42f2c631c7d14d657c135eb105e481d175ea985c330c9d00fa4a6df9c506585fc828770bb668a2eba409c35917f4cc0c04a9f6b9576b7138fc8cf53c90588cf9e4ef13d028ae795d7b2e7fe5b7dfa2c5983010a99993dd25a1b29da99939db924f3ba6462c123efd1615cbe4f523aa381cac6caf62aa386f2df9205d9abd8603cab2e3aad3703ae2239a85c364d4aa3f4b1f7dc02ae2957a667cbc6e56af6665f8b7b9c0ea5d232ae23a46981506970b6d20f70aab47212c45b72d3d175285870bb6d86e3f2da986c21753bbf7775eea83531cc718a8d87755deaad10e6969120ae5bc61c2ad9302372d3fa24cb9c5e8aa3b2f63c4b1e3c8a0ea611ec376923b202a30b0901fb724fe1b3e7b2c6e3bdd4e9a0b655ea1078cc68738319b9312979be66da8c1a603b9c7350b468389901c4f6053136760fc3fc9e9d005ef7873de05ba2bbbf2aa4f33a07c1737e03f68f23531c00e6574e657006ea93462d3d04a990d227dc0974327633600222a639ad43d4ccd8d0493b024c7613fa24ed22971b7d20f653013c173f1c5d55eff0b1ad6fe599248ee54c6038a184e9a83d9b87fd4f7051e43f068b4ea5059a67c58e2c6016dc9bfc1653e25a4f04b4c8b89ebe4a9b8ac543c927724fc4ac79793d649bf0f0ebda44be2339ace061e67b401e4a1eb66954eb2e26044ea33b9e57e8b1f53620a462e807b4ef201803998200239f65cae9bed9dca252f4850c5ee5ce9006c3a9ebf2f8a71b57c3327b7928220825910622e475bcc1ec47a279955c664b6fcafe53dec9345261f52bc0b983bdf98ec3d131fd4b9c64349defb0f8943070001b07738006fc893263d563eb4eee3f0f9cfe88c0d1c73df7bb5bb1e6e33f20997d326eea8f3d74c3447509bf6bbc0ef722479dd25d5279f9dfe89e13a2aa61191705c6def129d63c30cb035a7a8b1433eadb7e7cfe407c521ce1bf2b7f3f44c5e8bdf0ce6cdac3d9bcf8c6c7fc87eeac3fd28e8b91d1c53d8e0e69820cb4f48e6ba7e479bfb7a41c002e1678e87f9dd75f1727ac670f370add9e8b7a0335cbc56639a6c48b1e851e92e72d0e73919fc2b79712faa0c926c148617f0be837df739cba455aa1a24eca1f1998e992c123ea93c454aaa2069f03e1182cc1eab065386a360c6c9ec98c5e74e719169311cca1ce29c5ae2e16602e713cc0d87a981eab1ae55f0e89ff009df6c7b33cee96185802e22cc6c6dd4f40ab678d1e5f269b409ea54362dee7b9cf75dce327f61d86c847d2b29f36cd3c12e8e8180cf9b59da7490e3b0dc79cf2522fa6030b6675021df08552e07700f7ea37004794998f92b581a8ba081a44f9181323ff00d4f92c7929bac46fc5094eb2a982a5a5e58ff798608edc9c3b294c66003d849830267b24e7185d60d463b4bd8406da43c4fba5dd8cfc4a1b139aebc39805aef75c3a2e88b4d1cdc9c6d50ce5b9a31e1b44801e274bb60e03f2f9aac54cdc9aaf693eeb88f2829188a6770608b83b4735039abdc2a6b88263511cddd7d5249531ba729174c2e36ca670f5c10a8380c6c817561c0e33658dc61bc5e92b99618682f02e3a017bf95f9a8d63c81ef5c9b9e841edf7cca9bc3560e10762a1331c39a6f3fe244b4927e9cef36f252bf0bafd30d5049e71dbee09dd25cfbed79dadd814332a45b547bd27d2de5c967b41a67b0331f7f15584e8fd578ea3689edf54d7b43cb71ccfec9b353fdfc7af6849d6790ee677dec98b47b5fd4f4fa246a1b4f24d38f7ee76fac243dd164f05a3cd79dfe48ac0669528ead0e8d5123b89fdd4739c93a8f5f8042f44bf7e8f4617a0f1388d27c56e87a9497e2c03706d69dd0353125f060813627942eb74704cb6378fc53e2003750399621c078c9db60a53158a3fca83cc2fbdff004585d69d7c518459adcc083c8f352188c2b998279265ef1accdfc22e00f40a39ecb8f30ad18c7021ade506de4222de6173d3c3a92d39d864a43e9292c760fd9bcb40b02609e626c6c98d32ab48f105cbf1268540f1e4eff89dcf98dfd15df50d1209221be23b1900cdb754d7d3446031fecc863ddfdb265a7fc0ff008927661ebcbe8a96952f3d13f5de5da49f746c0fe720189bfba249da4a8ec66183dc49201ebb175ad23d23a845e22a977bb1ef4cdb60df58bfc814ce276769f7bdd9e93717ed312a5334693457719852d37f8ee3a7e8544e2f0c1c22159ab308bf28824ed2648b19de4dfbf651f8aa0d931237b1e926e27d3e2b49a30b9296e61a4eedc94be0717dd118dc1ea04428221d4dd076e456bbe48c31cbff000bb607190a4333a7ed29ea025cdb8fa9fa2a8607152ac79762f91d8ac6a71e9d3369ac21de7ff69dacde4601fdbec2c73dbb00394cdffda5e634431e5b7eaddb6e7b20db5205a6f7f874f8aa48cdbc613ed371de491bfdee92e79ed794339f237ec96ea9f7cc2782d1c2ff002fdee92e2990eb2d177df9a303479cf5a4cea4b0e54909b3d19897c030142d671dba7cd48e246904c904f2fd94439cb5a673f1cfad06c4b41054256ad06085355dd0542639937e9f35851d500b5099f985354f11acb4833e013b6e4817e9b3be05426a9b27b2eaa18f2d27df800f71361e72b1a5a6f2c331b87d4093ccc8da4586c3973f92857e1a2e2fb1306e27a8170a6f1a64581bc6917fca277da36f87351956d2262e248dcddb0001e4449fd912caa5a00e6cf24875191052f4fbce9b0307a837fcdcefd7a24b6bb6773b8bc5afd3a8ef0a8cf00d956a508006ba62fa3f337a692771b58a35b8e655697076ad8c4005a6f63265a7ee1617b0fe61d3e1fe946e2f2fbeb612c7f51b11bc386ce1e68f4fb0f6ba0ec4548201326648b9b826c45b6226f7b041b007126f1ce67c4606f02e2d31fca12a662e6daa0d27fc87ba6e4f3923de3636ee9cab5a7a44e91c8f2b9b77f9955e384f926655aba8824cf84c0ff8f5bdbcd038cc235e3b9db95fb279d576326e049e90609bf33285aaf9d8d8dc89ef3cfd7d5524453dec8621d4dda5de8a6f018b98ba1ab43dba5f7e879b7c8f3f24000ea6e126472775fd8f656d792324fc5ff85a33487d30fdcb77f23fcc2859fbf8ff000a472fc407b4b3a823d62ca38b54cacf45d3df666afbf8ac7396a1642ac2345b0eff007d5242d80b6d6a3034c0d4f01dd360ad6b468cf42e6aeb340b78be507f8510f08fe21aae6d3796c48048ff0090048fa28cc1bcbe9b1c48d45a0bbcc804c04e9ff6c278d7f5d1aab70543e26c483cee0a97c488bdcfcbe9fba8bc70b02d8f41b8faace8da48a7149aacd4d8f9a76a8dfee121a564cd50d53cddcc786d69d3101f1d80f17416dc27f5c80416f505bcef00c9f44dd6a0d70b812a26b605ec334dd179d26ed27ae94b10fc9a0c7b406b812605ef78b6de56f89083af704739bf2824dc7770911ebead37362df0d56165a3534173772498dc6fdc253f14c7b406bc380d44c6fc88d5d398ef0ab18bc9319acc04df6b86c46c41e637dbe486f6ce690438813244db972d93f887c036ee07426e45b7841e222679c1ff00b5cde771fb2b44518fc79367343875d8906236b73284730364d3747563fdd3e5d16aaee477f22534ad233a62ff00ab24c105afe60c0b768dc7eeb60cfdfdf7497375082247d3c8f24d1f06e4c77dc799e615611a3a56cb2441120f24a58e74040305c338d2a804d89b1fd3cd1954439de67eaa3717524b7b3827f1189f11f329fd04fd6044a49780823884c9c4194612e9126c3dd66a40517982402e3db61e689c3e1cb8cbc98e8dfb84b07bf82df890001ba6bdb1e8548e129b193e0d64ff0099b0f40a4f0ded63c018d6f21013fea27e4cebd9c611c5ae971988034cc9e6601f7a3b2aee5b897318c91cb49041fcae2db74dbe6a438bcd57b61a0b44d9c5be231265a5a76226f6e439a81c1d42d1a1ef738c920b8f88c9991306075ff4b3e6fd5f0db817ac7f49c7e21af6f84dfa1b1f50a1ab13a9cd360760857d51ada1a6fe233cecd31fba555c7490d789dfc437100ee167e5bd9af878f425edbc268b51a0b1e2cf13fe3307e090fa29343432c096e64a436c9e6a918157c235db851589e1f63ae041ea2c558dd082c463e933df7b476993f0174d36ba06a5f640bb24a8df72a123a3c6a1f1dfe686ad97d46832d07b8fadf65238be2560b536177feceb0f86e7e4abf8ecc1f5275bc9e8059a3d02d2553ecc6aa5743188a9e22d91a86f041efb8df749685118f27da12246c472213986c7b9b67891d79ff2b7f0f5e8e6fe45b8c9894162aa482169f88076290dc23ea4068305249b6374921bc0e2c8769fca76ec7f64f57ae88c364ba5c75546340def27bc0e651270b4da7c1ade7a9b0f28e69b4b452db5841eb923cd48e1b00e7dde431bd5db9f26ee7cd4a61f06e791b366d6113d05b7473327325a5b7100c9820bb63044dfe2a5d7e14a1bed906dc05213e27bcf220068f9a229b0e9d0d6868e76971f32a7e9e501bef888e5a4dfaef7b73b594c53e1f6e999266234b6c604900937d92da63c99ecaa61b2d26da605af1613d54951c94b9b22798db623c95bb0d97b6da7dcd3b11b1208933b9da4fcb9a2a9e5ad6110df3d3bc401e2837db754a7497ca9745530dc3cf2d1208323c26d23aa3a86425a22e0c99870f4b1d95bd9869111eb69eb096da31bd968b8d193e661f8ac23c09f79c4c0127c22c3720b8986c9037bae779f61ded79786cc3b70d8d3b733368b7afc7a56578c38ac3b6a30869734dc5f43f6703dc191f3e6a233fc068a65ee2e78d73a22c01379e679acee7e9af15fbc28752a16bd85c7b8e520b487083d27e4926a788409f03ef16931fca91a545ce6686b0169bf89cd83b47716816bef3ba8cc6502092d9689234904ec76077988ebbf25cee4ec9bf8c19f79f21fec7cd04dc4bc6b2d7beda46e63624a539ef124b1cd1d48904017d89d3bf3415177f6c1e6e25de93d9352d09d2638ecd2b89f19b6f307f4e8997e715fff00b0fc00fd1306395ae79ef6dbe610ee6fd3afcd5a4886d8e55c5d47fbcf79f3718f821f4adc8497bfa02ab0cdb364ad3dfdd69ac73ce96824f4024fc0279b963ec5fe1067a498dfc93102e1b085efd6480cea76b0521530987e8f71eadb27e8e09c48107a81ca3e9b295a391eab4c75234910003c8cc99d82af37f0cff8d6ed102ca0c886d33df519fa221949d11702361656ac3f0e992e025906350871b7f8c5b7ef08f1c3fa1cdb1236dbac9bdb7bb44f3ba97e4cb5e28a751c14cf6f4bf69dd4c60326d6d059e270370410008ec391e4ad781c800825a3707dd1d239473ba96a59769f74c03cac06dbf7f3dd130c55ca97454b0596e9310e71b8b18e578321c773cae6ca5b0d940043430b84497cde5a25a1cddc09eb26615870f850d2ef746c7c2226d327a9443298b9005f98dcdade7bad1418d72b64361f2cddcebb9d6991b44904800ee4edd9154304247874c4e9d24f5e931c86ea4e9d3fbfd12c531d3efa7d55a948cddb647d0c3900360401781027e3fa944d3a31b8fbe68a6b528315612de831a7bf4d927d98e88cd29069f44c4517f0eb3af6554d07bbc1548d33b0a9103fed11e602e839b61cbda009b4ed371171037f25c28bc870831a61c08b198b7a89b2ed7c2d9c7f558763cd9e3c3507478e71d0efeaa6a4b979ec8fff00e21ac1a58d87104493e30db0b729b0f354fce304f863400e6b753b480e9682493f963b6ab1baea7529cfdec817609ad2486de0df9c9ff6b3ae3de8de799cf673169aac97398e877bd22d78807bc4231d95507bbc6190f0de465aeda350e463b73576a18016d72e2279c81cb6d8d8f44cbf87e903ab44ba4104de08d85c446cb35c6d1a3e697d948a9c14c3177b4137875d9201882d71f4defd90b87e06617b98e7d569170e86169076be91dbe2ba3e1f05101e4ba220f4ee08f2d91a689993de215a933ae4673867e1ed2dcbde474968f8c04fbb81a968706b1bab939c5ce8bdb72afbeca3d7ea94ea5baaf1467e74532964ad0437480e03c247845fb089d8285cdf87ded76a76b7024c696cc6dca6fb1f45d11d485ec398b082074b6fbf649751911db73cbf7dd4b9d2e6da653f23c9011201239b88104f68123bdc110a6d994c8ff1b836bcc1b4c8d8c7ec8ec261fd91317638cc137dbcae67cca921481870b5a3bc1ebd554cac22e9b645e1b02d02cd6c76eb7f9c928c6617bc743fbca2cb212035c018b9e536f4b2bc33d076d0ebe904edd4f4f9a74b089fa27bb24b99298b4683005859329dd2b4d6a0469ad5b0d5b78748888e7333da0a70140d2334ad3425909b0988d1590b6e0b03503c384fb43e53d02b0f047107f4f8a01e629d401afe8093e079f236f227a288cd3081865865a4033b09e6075836516c0493d07cc9ea804cf483826c9559e01ce8e2280a6f3356900d7757363c2efd0f70ad619090c1bd9ad18f9c225e120b518319316fbe7b251685b6b3aa5425800ef62d109da85360a400750193f61384784f484baade690d7f28fe52280dd51b3a49dee07afbdf3129ec354886933036edcbe89752835d723911e8771dc2135e97069b003c277db7052e86fda25e52033bcf4ec9bc2d50e1170475fdd1218b4464f46746e7aacd2955e9ea04025b2371b8ee16a9d3200049740dcee5018642d14ec2c84060d425e95b2b450315a920858b6981a016d69c9328038be735b94785b6ff00d89dcc9e9748c161c7b33539c8b722260058b157d202726cc5f84c4b2a03336781f99baa08f9cfa05dd1a6403d562c5145212e092b1620a10122aba1696204360ceeb6f0b4b148c6de6c98d1cd62c49948d879bc253a8cf49fd5696210c668b8811cc1b147d1a9362b162689a164c5964ac58a89344022eb2562c400972c958b10020a537658b1312132b162c40cffd9, 'Breads', 0, 'Not Available', 'Choco Pudding\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `id` int(11) NOT NULL,
  `product_catn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`id`, `product_catn`) VALUES
(18, 'Breads'),
(19, 'Donuts'),
(20, 'Sweet & Delicacies'),
(21, 'Cakes');

-- --------------------------------------------------------

--
-- Table structure for table `prod_ingre`
--

CREATE TABLE `prod_ingre` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_ingre`
--

INSERT INTO `prod_ingre` (`id`, `product_id`, `ingredient_id`, `quantity`) VALUES
(212, 242, 205, '500'),
(213, 245, 206, '500'),
(214, 245, 201, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `number` varchar(20) NOT NULL,
  `dateofpickup` datetime NOT NULL,
  `productname` varchar(1000) NOT NULL,
  `quantity` int(250) NOT NULL,
  `producttotal` float(50,2) NOT NULL,
  `username` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `firstname`, `lastname`, `email`, `number`, `dateofpickup`, `productname`, `quantity`, `producttotal`, `username`, `date`, `status`) VALUES
(227, 'Ian Beach', 'Villadarez', 'ianbeach.villadarez025@gmail.com', '09213213213', '2023-05-17 15:52:00', 'Choco Pudding', 1, 10.00, 'ian', '2023-05-14 15:52:50', 'Cancelled by user'),
(228, 'Ian Beach', 'Villadarez', 'ianbeach.villadarez025@gmail.com', '09123213213', '2023-05-15 16:11:00', 'Choco Pudding', 1, 10.00, 'ian', '2023-05-14 16:11:15', 'Cancelled by user'),
(229, 'Ian Beach', 'Villadarez', 'ianbeach.villadarez025@gmail.com', '09213213213', '2023-05-16 16:20:00', 'Choco Pudding', 1, 10.00, 'ian', '2023-05-14 16:21:00', 'Cancelled by user'),
(230, 'Ian Beach', 'Villadarez', 'ianbeach.villadarez025@gmail.com', '09123213213', '2023-05-15 16:28:00', 'Choco Pudding', 1, 10.00, 'ian', '2023-05-14 16:28:28', 'Cancelled by user'),
(231, 'Ian Beach', 'Villadarez', 'ianbeach.villadarez025@gmail.com', '09213213213', '2023-05-16 16:30:00', 'Choco Pudding', 1, 10.00, 'ian', '2023-05-14 16:30:17', 'Cancelled by user'),
(232, 'Ian Beach', 'Villadarez', 'ianbeach.villadarez025@gmail.com', '09123213213', '2023-05-15 16:35:00', 'Choco Pudding', 1, 10.00, 'ian', '2023-05-14 16:35:27', 'Cancelled by user');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `contact`, `type`) VALUES
(12, 'Pilmico Foods Corporation', 'Metro Manila', '09123526234', 'Flour'),
(16, 'Cocoa Supplier', 'Metro Manila', '093457123213', 'Cocoa');

-- --------------------------------------------------------

--
-- Table structure for table `transacing`
--

CREATE TABLE `transacing` (
  `id` int(11) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `totaldeduct` int(250) NOT NULL,
  `totalremain` int(250) NOT NULL,
  `totaladd` int(250) NOT NULL,
  `measurement` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transacing`
--

INSERT INTO `transacing` (`id`, `ingredients`, `date`, `totaldeduct`, `totalremain`, `totaladd`, `measurement`) VALUES
(24, 'Cocoa', '2023-05-14', 500, 9500, 0, 'Grams'),
(25, 'Flour', '2023-05-14', 1000, 9000, 0, 'Grams');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `customer_fname` varchar(250) NOT NULL,
  `customer_lname` varchar(250) NOT NULL,
  `datee` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `permission`) VALUES
(10, 'ian', 'a71a448d3d8474653e831749b8e71fcc', 'ianbeach@gmail.com', 'ian', 'villadarez', 1),
(21, 'kel', 'd37aebc5ce74fd9e4e744bdb9a9ba06b', 'kel@gmail.com', 'kel', 'kel', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_ingre`
--
ALTER TABLE `prod_ingre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transacing`
--
ALTER TABLE `transacing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prod_ingre`
--
ALTER TABLE `prod_ingre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transacing`
--
ALTER TABLE `transacing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
