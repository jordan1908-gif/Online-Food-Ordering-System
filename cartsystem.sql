-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 02, 2021 at 12:05 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakesales`
--

DROP TABLE IF EXISTS `cakesales`;
CREATE TABLE IF NOT EXISTS `cakesales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ChocolateCake` int(100) NOT NULL,
  `StrawberryCake` int(100) NOT NULL,
  `OreoCake` int(100) NOT NULL,
  `CaramelCake` int(100) NOT NULL,
  `TiramisuCake` int(100) NOT NULL,
  `Cheesecake` int(100) NOT NULL,
  `Macarons` int(100) NOT NULL,
  `YamCupcake` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cakesales`
--

INSERT INTO `cakesales` (`id`, `time`, `ChocolateCake`, `StrawberryCake`, `OreoCake`, `CaramelCake`, `TiramisuCake`, `Cheesecake`, `Macarons`, `YamCupcake`) VALUES
(1, '2021-02-05 18:29:25', 20, 12, 32, 24, 35, 25, 16, 12),
(2, '2021-02-06 18:28:33', 20, 15, 24, 13, 26, 13, 14, 16),
(3, '2021-02-07 13:14:07', 12, 16, 17, 24, 32, 21, 10, 9),
(4, '2021-02-08 13:14:15', 10, 12, 12, 10, 1, 2, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `total_price` int(100) UNSIGNED NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`, `userid`) VALUES
(47, 'Strawberry Cake', 20, 'image/cake3(1).png', 1, 20, 'p19', 3),
(46, 'Oreo Cake', 20, 'image/cake6.png', 1, 20, 'p17', 3),
(45, 'Chocolate Cake', 20, 'image/cake2(1).png', 1, 20, 'p18', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

DROP TABLE IF EXISTS `chatbot`;
CREATE TABLE IF NOT EXISTS `chatbot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi | hello | heyyy | who are you | whats your name? | what is your name?', 'Hello there! I am BakeryBot, here to assist you in your doubts.'),
(2, 'How many staff do you have? | How many staff are there in your bakery store?', 'We have 30 staff currently working in Bake n Take. '),
(3, 'What is your operating hours? | Whats your operating hours? | What are your operating hours | What time does your shop closes? ', 'Monday to Friday         10am - 6pm '),
(4, 'How long will the delivery take? | How long for delivery? | How long is delivery? | delivery timeframe', 'For deliveries within 5km radius, your orders will be delivered within 45 minutes upon placing order!'),
(5, 'Do you offer pick up services? | Do you accept pick ups? | Do you have pick up in your store? | Do you allow pick up?', 'Yes, for pick ups, customers are required to walk in for purchase.'),
(6, 'Are your ingredients fresh? | How fresh are your ingredients? | Do you bake your cakes fresh? | Are your cakes freshly baked?', 'Yes, we bake our cakes and pastries using fresh ingredients everyday.'),
(7, 'How to contact you regarding other enquiry? | Whats your email address? | How to send you an email?', 'You can always contact us at our home page (Contact Us) section by sending us an email =)'),
(8, 'Do you offer membership? | Do you have membership feature?', 'We do not offer any membership feature as of now due to the website still being in development stage. '),
(9, 'Is it possible to order customized cakes? | Can I order customized cakes? | customize cakes', 'No, all cakes are standardized at 1kg. '),
(10, 'Where is your retail store located? | Where is your retail shop? ', 'Our bakery shop is located at 4 different locations which are Sri Petaling, Kuchai Lama, Bukit Jalil and Taman Gembira');

-- --------------------------------------------------------

--
-- Table structure for table `deliveredorders`
--

DROP TABLE IF EXISTS `deliveredorders`;
CREATE TABLE IF NOT EXISTS `deliveredorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deliver_timestamp` timestamp NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deliveredorders`
--

INSERT INTO `deliveredorders` (`id`, `name`, `email`, `phone`, `pmode`, `products`, `amount_paid`, `order_timestamp`, `deliver_timestamp`, `order_status`, `userid`) VALUES
(1, 'jordan_1908', 'jordansahabudin01@hotmail.com', '019-9320191', 'cod', 'Oreo Cake(1),Chocolate Cake(1),Strawberry Cake(1),Caramel Cake(1)', 80, '2021-02-02 04:51:19', '2021-02-02 05:00:11', 'Order has been delivered successfully!', 3),
(2, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'cod', 'Mango Peach Pearl Milk Tea(1),Watermelon Pearl Milk Tea(1),Original Pearl Milk Tea(1),Cheesecake(1)', 38, '2021-02-03 05:03:03', '2021-02-03 05:07:04', 'Order has been delivered successfully!', 1),
(3, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'cod', 'Watermelon Pearl Milk Tea(1),Mango Peach Pearl Milk Tea(1)', 12, '2021-02-04 04:32:16', '2021-02-04 06:14:25', 'Order has been delivered successfully!', 1),
(4, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'cc', 'Chocolate Pearl Milk Tea (1),Original Pearl Milk Tea(1),Indi Beetroot Pearl Milk Tea(1)', 19, '2021-02-05 06:15:37', '2021-02-05 06:23:24', 'Order has been delivered successfully!', 1),
(5, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'cod', 'Watermelon Pearl Milk Tea(1),Mango Peach Pearl Milk Tea(1),Original Pearl Milk Tea(1)', 18, '2021-02-06 06:23:35', '2021-02-06 06:24:07', 'Order has been delivered successfully!', 1),
(6, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'cod', 'Indi Beetroot Pearl Milk Tea(1),Matcha Pearl Milk Tea (1),Original Pearl Milk Tea(1),Watermelon Pearl Milk Tea(1),Mango Peach Pearl Milk Tea(1)', 31, '2021-02-07 06:23:47', '2021-02-07 06:24:15', 'Order has been delivered successfully!', 1),
(7, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'cod', 'Strawberry Cake(1),Caramel Cake(1),Chocolate Cake(1)', 60, '2021-02-08 06:23:59', '2021-02-08 06:24:21', 'Order has been delivered successfully!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deliver_timestamp` timestamp NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `order_timestamp`, `deliver_timestamp`, `order_status`, `userid`) VALUES
(8, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'B-6-6, Residensi Kiara Jalil 1, No2, Jalan Jalil Perwira 1, 58200 KL.', 'cod', 'Chocolate Cake(1),Strawberry Cake(1),Oreo Cake(1)', 60, '2021-02-02 06:28:45', '0000-00-00 00:00:00', '', 1),
(9, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'B-6-6, Residensi Kiara Jalil 1, No2, Jalan Jalil Perwira 1, 58200 KL.', 'cod', 'Watermelon Pearl Milk Tea(1),Mango Peach Pearl Milk Tea(1)', 12, '2021-02-02 06:29:09', '0000-00-00 00:00:00', '', 1),
(10, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'B-6-6, Residensi Kiara Jalil 1, No2, Jalan Jalil Perwira 1, 58200 KL.', 'cod', 'Tiramisu Cake(1),Oreo Cake(1),Cheesecake(1)', 60, '2021-02-02 06:29:19', '0000-00-00 00:00:00', '', 1),
(11, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', 'B-6-6, Residensi Kiara Jalil 1, No2, Jalan Jalil Perwira 1, 58200 KL.', 'cod', 'Caramel Cake(1),Strawberry Cake(1),Yam Cupcake(1)', 65, '2021-02-02 06:29:28', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `verified` int(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `email`, `contact`, `address`, `gender`, `verified`, `token`, `password`) VALUES
(1, 'jordan_1908', 'jordansahabudin01@hotmail.com', '019-9320191', 'Taman Gembira ', 'Male', 1, '8018f45bb18b6422bb76711ab1d8fe8f084a2ce9bd10dcd93ae09df488f4850fb5a64cee56f4c8eeeae45b4e466144f498c8', '$2y$10$MBPd1Mh0.qnSMd3Hs/VqV.WB4mNXWTWBE81GH9uNRgAgykSkrhhhG'),
(2, 'ishhana', 'ishhana@hotmail.com', '019-9320191', 'Taman Jaya ', 'Female', 1, '15084de8b85cc7ff2f2216972f4e7743c69564d16dfa7826e9cb6836f19f0be9c52e02ce9028d1882771bc792d90014f85fc', '$2y$10$FmUv8d9HXiVEoeko4PGJXO3kH4xIrTN8D1nVjtCISBc66qMGKbfrG'),
(3, 'farahelisya', 'farah@hotmail.com', '0182575191', 'Shah Alam ', 'Female', 1, 'cf75e1c072bd1b142ccc0fde17490f08a0e3d4b04e8aecd8c0e535c54ea434405d0a122c22149711c5d492173036a5b452cd', '$2y$10$CBaVU3mcB4A3S8i9Cic89OR6giHNtD.lfTmyqc2ZQBbza6nigPCM.'),
(4, 'jiayu', 'kohjiayu@hotmail.com', '019-9320191', 'Penang Town ', 'Male', 1, 'bf9d8aca2f58648e85300c046df2a520de32853226f12113f920bcbb5434ff11f0f52cdf417facb20c1da3807d04940ff624', '$2y$10$fXJw4CzkvJNBuCEWlFF69u1V3.MH6Xq1G/x.l1Et6qo4nz0wROpye');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `product_code`) VALUES
(1, 'Original Pearl Milk Tea', 6, 'image/originalovepearlmilktea(1).png', 'p01'),
(2, 'Watermelon Pearl Milk Tea', 6, 'image/boba2(1).png', 'p02'),
(3, 'Mango Peach Pearl Milk Tea', 6, 'image/boba3(1).png', 'p03'),
(4, 'Blueberry Pearl Milk Tea ', 6, 'image/boba4(1).png ', 'p04'),
(5, 'Indi Beetroot Pearl Milk Tea', 6, 'image/boba5(1).png', 'p05'),
(6, 'Apricotilas Pearl Milk Tea ', 6, 'image/boba6(1).png', 'p06'),
(7, 'Matcha Pearl Milk Tea ', 7, 'image/boba7(1).png', 'p07'),
(8, 'Green Melon Pearl Milk Tea ', 7, 'image/boba8(1).png', 'p08'),
(9, 'Horlicks Pearl Milk Tea ', 7, 'image/boba9(1).png\r\n', 'p09'),
(10, 'Chocolate Pearl Milk Tea ', 7, 'image/boba10(1).png', 'p10'),
(11, 'Delight Taro Pearl Milk Tea ', 7, 'image/boba11(1).png', 'p11'),
(12, 'Pure Celery Pearl Milk Tea ', 7, 'image/boba12(1).png', 'p12'),
(13, 'Strawberry Pearl Milk Tea ', 8, 'image/boba13(1).png', 'p13'),
(14, 'Honeydew Pearl Milk Tea ', 8, 'image/boba14(1).png', 'p14'),
(15, 'Dragon Fruit Pearl Milk Tea ', 8, 'image/boba1(1).png', 'p15'),
(16, 'Burnt Roasted Pearl Milk Tea ', 8, 'image/burntroastedpearlmilktea(1).png', 'p16'),
(17, 'Oreo Cake', 20, 'image/cake6.png', 'p17'),
(18, 'Chocolate Cake', 20, 'image/cake2(1).png', 'p18'),
(19, 'Strawberry Cake', 20, 'image/cake3(1).png', 'p19'),
(20, 'Caramel Cake', 20, 'image/cake7(1).png', 'p20'),
(21, 'Tiramisu Cake', 20, 'image/cake5(1).png', 'p21'),
(22, 'Cheesecake', 20, 'image/cake4(1).png', 'p22'),
(23, 'Macarons', 30, 'image/cake8(1).png', 'p23'),
(24, 'Yam Cupcake', 25, 'image/cake9(1).png', 'p24');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `original` int(100) NOT NULL,
  `watermelon` int(100) NOT NULL,
  `mango` int(100) NOT NULL,
  `blueberry` int(100) NOT NULL,
  `apricot` int(100) NOT NULL,
  `matcha` int(100) NOT NULL,
  `horlicks` int(100) NOT NULL,
  `chocolate` int(100) NOT NULL,
  `taro` int(100) NOT NULL,
  `roasted` int(100) NOT NULL,
  `strawberry` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `time`, `original`, `watermelon`, `mango`, `blueberry`, `apricot`, `matcha`, `horlicks`, `chocolate`, `taro`, `roasted`, `strawberry`) VALUES
(1, '2021-02-05 12:47:32', 10, 20, 30, 20, 10, 30, 40, 20, 30, 50, 20),
(2, '2021-02-06 13:13:35', 10, 12, 22, 33, 22, 15, 25, 52, 26, 20, 34),
(3, '2021-02-07 13:14:59', 10, 20, 20, 15, 24, 34, 23, 25, 52, 45, 26),
(4, '2021-02-08 13:15:07', 10, 20, 20, 23, 43, 25, 26, 32, 45, 22, 10);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `verified` int(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `contact`, `address`, `gender`, `position`, `verified`, `token`, `password`) VALUES
(1, 'ishhana', 'ishhana@hotmail.com', '019-9320191', 'Petaling Jaya ', 'Female', 'Cake Designer', 1, 'bcd0a47b5b4081cdba341429dd280a72e356732883934d1cd929084667e5525d2b9cde061acf573be3b9eb9d19416f4a6c30', '$2y$10$ma2v.kGZwfCQsx/Hlg07i.72KTjY6wRL4tACtzVyTHBBeDLnVRLee'),
(2, 'jiayu', 'kohjiayu@hotmail.com', '019-9320191', 'Petaling Jaya ', 'Male', 'Manager', 1, 'df4b7d87d1b7eab28d63e626393f2e24f0113ba11c0bbce7b1175f641be910d1c4f8eabb82771ae151d519630cd9c61c15cf', '$2y$10$iTVPBZXNxekJGSQ8pTUXmugY7iDw0PoJ9e9ltN5T22UEEmWW2LBwq'),
(3, 'jordan_1908', 'jordansahabudin01@hotmail.com', '019-9320191', 'ihihih', 'Male', 'Cake Designer', 1, '323d05cea38734fa8cd2dd9372b9d32ab99b58438114e7a13eb259fe8ad2e1efaebb171589b1b709415501f0ddb3c2d71c9c', '$2y$10$ZvUqxDxV48h9k4m41jcnL.vP1IT.EOyj0Kzv5th9.uFClIR.1NOgi'),
(4, 'farahelisya', 'farah@hotmail.com', '019-9320191', 'Taman Ismail ', 'Female', 'Cake Designer', 1, '9af40166ab755e4431b41014a716cba60476c032d15202416fa7e6823647caca9400344ba3189bbfb020348ebf0b343b6ad9', '$2y$10$6vgQoym5AN.sRvj8MH9PO.ce4MCLl.Cd.6qIRqS8ttGOV0d2iICSC');

-- --------------------------------------------------------

--
-- Table structure for table `staffproduct`
--

DROP TABLE IF EXISTS `staffproduct`;
CREATE TABLE IF NOT EXISTS `staffproduct` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staffproduct`
--

INSERT INTO `staffproduct` (`product_id`, `product_name`, `product_price`, `product_image`, `product_status`, `product_code`) VALUES
(1, 'Original Pearl Milk Tea', 6, 'image/originalovepearlmilktea(1).png', 'Available', 'p01'),
(2, 'Watermelon Pearl Milk Tea', 6, 'image/boba2(1).png', 'Available', 'p02'),
(3, 'Mango Peach Pearl Milk Tea', 6, 'image/boba3(1).png', 'Available', 'p03'),
(4, 'Blueberry Pearl Milk Tea ', 6, 'image/boba4(1).png ', 'Available', 'p04'),
(5, 'Indi Beetroot Pearl Milk Tea', 6, 'image/boba5(1).png', 'Available', 'p05'),
(6, 'Apricotilas Pearl Milk Tea ', 6, 'image/boba6(1).png', 'Available', 'p06'),
(7, 'Matcha Pearl Milk Tea ', 7, 'image/boba7(1).png', 'Available', 'p07'),
(8, 'Green Melon Pearl Milk Tea ', 7, 'image/boba8(1).png', 'Available', 'p08'),
(9, 'Horlicks Pearl Milk Tea ', 7, 'image/boba9(1).png\r\n', 'Available', 'p09'),
(10, 'Chocolate Pearl Milk Tea ', 7, 'image/boba10(1).png', 'Available', 'p10'),
(11, 'Delight Taro Pearl Milk Tea ', 7, 'image/boba11(1).png', 'Available', 'p11'),
(12, 'Pure Celery Pearl Milk Tea ', 7, 'image/boba12(1).png', 'Available', 'p12'),
(13, 'Strawberry Pearl Milk Tea ', 8, 'image/boba13(1).png', 'Available', 'p13'),
(14, 'Honeydew Pearl Milk Tea ', 8, 'image/boba14(1).png', 'Available', 'p14'),
(15, 'Dragon Fruit Pearl Milk Tea ', 8, 'image/boba1(1).png', 'Available', 'p15'),
(16, 'Burnt Roasted Pearl Milk Tea ', 8, 'image/burntroastedpearlmilktea(1).png', 'Available', 'p16'),
(17, 'Oreo Cake', 20, 'image/cake6.png', 'Available', 'p17'),
(18, 'Chocolate Cake', 20, 'image/cake2(1).png', 'Available', 'p18'),
(19, 'Strawberry Cake', 20, 'image/cake3(1).png', 'Available', 'p19'),
(20, 'Caramel Cake', 20, 'image/cake7(1).png', 'Available', 'p20'),
(21, 'Tiramisu Cake', 20, 'image/cake5(1).png', 'Available', 'p21'),
(22, 'Cheesecake', 20, 'image/cake4(1).png', 'Available', 'p22'),
(23, 'Macarons', 30, 'image/cake8(1).png', 'Available', 'p23'),
(24, 'Yam Cupcake', 25, 'image/cake9(1).png', 'Available', 'p24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `joined` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cardholder` varchar(100) NOT NULL,
  `cardnumber` int(255) NOT NULL,
  `expiryMonth` int(100) NOT NULL,
  `cvv` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `verified` int(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `joined`, `cardholder`, `cardnumber`, `expiryMonth`, `cvv`, `address`, `gender`, `verified`, `token`, `password`) VALUES
(1, 'jordano', 'jordanxiaoyang@gmail.com', '018-2575191', '2021-02-02 06:34:35', 'Jordan', 2147483647, 20, 2, 'B-6-6, Residensi Kiara Jalil 1, No2, Jalan Jalil Perwira 1, 58200 KL.', 'Male', 1, '0153d90a9bd3f7b48753a1e7c62b28111f13409045ee08d826157b8323e9fdced28cff2fb2501175f142a177dab1da0c6152', '$2y$10$p4s7lR73wGXv.0vp7mPWuubRLrJUCTjsYDKZG1htba5g25PN1OfzW'),
(3, 'jordan_1908', 'jordansahabudin01@hotmail.com', '019-9320191', '2021-02-02 07:02:24', 'jordan', 4012, 20, 2, 'Taman Gembira ', 'Male', 1, '7008e17597ce492c1c260be1d5bed3869ac047d9e3b5c01c0855f63238d6e2c358d475054c59e7a510ff9f6ebac7177a5bbd', '$2y$10$7kK.YYeq3Ps7WZjAwcujMe9r35AsGi3dRcIDOQHSw38/xG0T8u..2'),
(9, 'ishhana', 'ishhana@hotmail.com', '0199320191', '2021-02-02 06:35:09', '', 2781, 20, 2, 'B-6-6, Residensi Kiara Jalil 1,', 'Male', 1, '2e067397f29b1ff7e1349672fdd4b829b976626845419b50fe23958645e1f34c312a9565bee7d0aa7f804f4ef982187e587b', '$2y$10$hJygfuQ7rIW9Ts.KjPHhHORyARc7vMdmLgnkKYqqneXVT3HopLEv2'),
(12, 'farahelisya', 'farah@hotmail.com', '0182575191', '2021-02-02 06:40:36', '', 0, 0, 0, 'Tanjung Malim ', 'Female', 1, '5468cc1a07cdfd6705fd045ebcae4e73c0e943686e0016411000828ed68f9cd831d19dfb88a17e4ab8605f97f3856e1d1e41', '$2y$10$6cPvlyzkCQRO9404zOJ7qu/ICoNA8RqHHhjpTPY0loDSd85m9o8LO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
