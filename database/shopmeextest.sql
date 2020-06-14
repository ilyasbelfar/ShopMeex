-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 10:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmeextest`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(183, 19, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Digital Goods'),
(2, 'Clothes'),
(3, 'Health and Care'),
(4, 'Home Interior'),
(5, 'Toys and Games');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `usage_limit` int(11) NOT NULL,
  `time_used` int(11) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `discount`, `product_id`, `usage_limit`, `time_used`, `start_time`, `end_time`) VALUES
(1, 'C_USB02', '25', 1, 1000, 10, '2020-06-05 13:51:29', '2020-07-03 16:51:47'),
(2, 'C_LPN45', '75', 2, 1000, 1, '2020-06-05 13:51:29', '2020-06-30 13:51:47'),
(3, 'C_3DcAM01', '45', 3, 1000, 0, '2020-06-05 13:51:29', '2020-06-30 13:51:47'),
(4, 'C_wristWear03', '50', 4, 1500, 0, '2020-06-05 13:51:29', '2020-06-30 13:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `order_id` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `usedcoupon_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`order_id`, `product_id`, `quantity`, `usedcoupon_code`) VALUES
(1, 1, 1, '-1'),
(1, 8, 12, '-1'),
(1, 8, 12, '-1'),
(2, 3, 4, '-1'),
(3, 28, 9, '-1'),
(4, 5, 7, '-1'),
(5, 10, 2, '-1'),
(6, 4, 23, 'C_wristWear03'),
(7, 3, 12, 'C_3DcAM01');

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_status` int(1) NOT NULL DEFAULT 1,
  `coupon_used` varchar(255) NOT NULL DEFAULT '-1',
  `order_notes` text NOT NULL DEFAULT '',
  `payment_method` varchar(20) NOT NULL DEFAULT 'cash on delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `placed_orders`
--

INSERT INTO `placed_orders` (`order_id`, `order_date`, `order_name`, `order_email`, `order_status`, `coupon_used`, `order_notes`, `payment_method`) VALUES
(1, '2020-05-14 21:36:28', 'johnioumr147', 'johnmirou91@gmail.com', 4, '-1', '', 'cash on delivery'),
(2, '2020-05-14 21:38:36', 'johnioumr147', 'johnmirou91@gmail.com', 4, '-1', '', 'cash on delivery'),
(3, '2020-05-16 13:12:52', 'ilyaseflba24', 'jascacj@gmail.com', 3, '-1', '', 'cash on delivery'),
(4, '2020-05-16 13:13:34', 'ilyaseflba24', 'jascacj@gmail.com', 2, '-1', '', 'cash on delivery'),
(5, '2020-05-16 13:15:22', 'ilyaseflba24', 'jascacj@gmail.com', 1, '-1', '', 'cash on delivery'),
(6, '2020-06-02 23:28:49', 'ilyasalfbe66', 'ilyasbelfar28@gmail.com', 4, '1', '', 'cash on delivery'),
(7, '2020-06-03 00:27:03', 'red', 'red@red.com', 4, '1', '', 'cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `weight` double NOT NULL,
  `dimensions` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `slug` varchar(200) NOT NULL,
  `colors` varchar(50) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL DEFAULT '12-1.jpg',
  `photo1` varchar(200) NOT NULL DEFAULT '12-1.jpg',
  `photo2` varchar(200) NOT NULL DEFAULT '12-1.jpg',
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `sold_cmp` int(11) NOT NULL,
  `total_rating` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `publication_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `weight`, `dimensions`, `price`, `slug`, `colors`, `owner_id`, `model`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `sold_cmp`, `total_rating`, `quantity`, `publication_date`) VALUES
(1, 1, 'Dell Laptop', 'one of the best product in the world Praesent dapibus, neque id cursus ucibus.', 0.6, '70 x 60', 412, 'large-dell-inspiron', 'Black White', 19, 'dell pavilion 15', 'dell.jpg', 'dell2.jpg', 'galaxy-fi-799x799.jpg', '2020-06-13', 11, 0, 4, 5, '2020-06-13 21:19:16'),
(2, 1, 'Mouse', 'one of the beset mouse in the world.', 0.1, '20 x 30', 350, 'mouse', 'red grey', 19, 'mouse l-120', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-06-13', 1, 0, 2, 25, '2020-06-13 13:52:06'),
(3, 1, 'smart watch', 'one of the best product in teh world', 0.1, '12 x 13', 1200, 'smart-watch', 'red', 19, 'watch-120-M', '7.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-06-13', 4, 0, 5, 16, '2020-06-13 21:10:30'),
(4, 1, 'Wirless Mouse', 'one of the best product in teh world', 0.6, '', 13, 'thered', '', 19, '', 'Photo2.jpg', 'Photo2.jpg', '', '2020-06-13', 1, 0, 4, 18, '2020-06-13 21:19:32'),
(5, 1, 'Logitech mouse', 'one of the best product in teh world', 0.3, '30 x 50', 200, 'the-blue', 'black grey wihire', 19, '1200-3', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-06-02', 1, 0, 3, 21, '2020-06-02 07:33:52'),
(7, 1, 'Airpods', 'vone of the best product in teh world', 0, '', 13, 'watch-130', '', 19, '', '8.jpg', 'Photo2.jpg', '', '2020-06-08', 1, 0, 5, 23, '2020-06-08 13:22:49'),
(8, 1, 'Watch', 'one of the best product in the world', 0, '', 700, 'bimo-tango', '', 19, '', '10.jpg', 'Photo2.jpg', '', '2020-06-13', 1, 0, 5, 23, '2020-06-13 11:00:27'),
(10, 1, 'Tablet', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 19, '', 'tab.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 17, '2020-05-29 01:00:12'),
(11, 1, 'iPhone X', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 19, '', 'iphonex.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 15, '2020-05-29 01:00:12'),
(12, 1, 'VR Box', 'one of the best Top 10 products last year', 0, '', 999.99, 'BEST', 'white', 19, '', 'VR1.jpg', 'Photo2.jpg', '', '2020-06-05', 1, 0, 0, 15, '2020-06-05 15:20:16'),
(13, 2, 'T-shirt', 'best t shirt in the world', 0, '', 1200, 't-shirt-1', 'black and white ', 19, 'fgfgf', '1.jpg', '1.jpg', '1.jpg', '2020-06-08', 6, 5, 0, 21, '2020-06-08 18:08:41'),
(14, 2, 'T-shirt alphja', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck1', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 15, '2020-05-29 01:00:12'),
(15, 2, 'T-shirt 1', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck2', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 16, '2020-05-29 01:00:12'),
(16, 2, 'T-shirt 2', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck3', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 6, 0, 5, 17, '2020-05-29 01:00:12'),
(17, 2, 'T-shirt alph3', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck4', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 17, '2020-05-29 01:00:12'),
(18, 2, 'T-shirt alphja4', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck5', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 2, 0, 0, 15, '2020-05-29 01:00:12'),
(19, 2, 'T-shirt alphja5', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck6', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 2, 0, 0, 14, '2020-05-29 01:00:12'),
(20, 2, 'T-shirt alphja6', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck7', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '2020-06-05', 1, 0, 5, 15, '2020-06-05 21:11:17'),
(21, 2, 'T-shirt alphja7', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck8', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 17, '2020-05-29 01:00:12'),
(22, 2, 'T-shirt alphja8', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck9', '', 19, '', '1.jpg', '1.jpg', '1.jpg', '2020-06-03', 1, 0, 5, 12, '2020-06-03 13:01:27'),
(23, 3, 'bag-12', 'the best bag int the ifidj  ld hidlez o', 0, '', 1200, 'bag-for-life', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 18, '2020-05-29 01:00:12'),
(24, 3, 'bag-12', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life1', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 17, '2020-05-29 01:00:12'),
(25, 3, 'bag-13', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life2', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 5, 13, '2020-05-29 01:00:12'),
(26, 3, 'bag-144', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life3', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 13, '2020-05-29 01:00:12'),
(27, 3, 'bag-15', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life4', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 15, '2020-05-29 01:00:12'),
(28, 3, 'bag-16', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life5', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 5, 0, 5, 4, '2020-06-04 12:28:12'),
(29, 3, 'bag-15', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life6', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 5, 14, '2020-05-29 01:00:12'),
(30, 3, 'bag-16', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life7', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 4, 9, '2020-06-04 12:28:21'),
(31, 3, 'bag-17', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life8', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 3, 0, 0, 11, '2020-05-29 01:00:12'),
(32, 3, 'bag-18', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life9', '', 19, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 2, 0, 0, 16, '2020-05-29 01:00:12'),
(33, 4, 'Chair1', 'good for back oand odj a az joijf.', 1120, '10', 411, 'chair-for-life1', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 18, '2020-06-02 01:01:59'),
(34, 4, 'Chair2', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life2', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 14, '2020-05-29 01:00:12'),
(35, 4, 'Chair3', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life3', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 18, '2020-05-29 01:00:12'),
(36, 4, 'Chair4', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life4', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 17, '2020-05-29 01:00:12'),
(37, 4, 'Chair5', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life5', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 14, '2020-05-29 01:00:12'),
(38, 4, 'Chair6', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life6', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 4, 0, 5, 18, '2020-05-29 01:00:12'),
(39, 4, 'Chair7', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life7', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 2, 0, 5, 5, '2020-06-04 12:28:29'),
(40, 4, 'Chair8', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life8', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 4, 0, 0, 17, '2020-05-29 01:00:12'),
(41, 4, 'Chair9', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life9', 'blue', 19, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 1, 0, 0, 14, '2020-05-29 01:00:12'),
(43, 5, 'Pikachu2', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life1', 'yellow', 19, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 11, '2020-05-29 01:00:12'),
(45, 5, 'Pikachu4', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life3', 'yellow', 19, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 13, '2020-05-29 01:00:12'),
(47, 5, 'Pikachu6', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life5', 'yellow', 19, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '2020-06-05', 1, 0, 0, 16, '2020-06-05 14:41:11'),
(48, 5, 'Pikachu87', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life6', 'yellow', 19, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 17, '2020-05-29 01:00:12'),
(49, 5, 'Pikachu8', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life7', 'yellow', 19, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 17, '2020-06-10 21:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_id`, `rating`, `date`, `comment`) VALUES
(86, 8, 6, 5, '2020-02-07 23:00:00', 'hello there'),
(87, 6, 6, 4, '2019-10-22 23:00:00', 'hello there'),
(88, 3, 6, 5, '2020-04-24 23:00:00', 'i like this watch'),
(89, 1, 6, 4, '2019-09-25 23:00:00', 'i like this kw'),
(90, 4, 6, 4, '2020-04-24 23:00:00', 'This is the best product in the whole world.'),
(91, 2, 6, 1, '2019-12-17 23:00:00', 'not that good things to buy and thank you for sharing.'),
(92, 7, 6, 5, '2019-06-13 23:00:00', 'i like this product so much'),
(93, 1, 7, 4, '2019-12-11 23:00:00', 'j\'aime bien ce produit \r\nmerci shopmeex'),
(94, 2, 7, 4, '2019-12-21 23:00:00', 'I dislike this product'),
(95, 5, 6, 3, '2019-08-11 23:00:00', 'blue'),
(97, 1, 8, 4, '2020-05-22 23:00:00', 'zzz'),
(98, 4, 8, 5, '2020-05-12 23:00:00', 'nice'),
(99, 5, 8, 4, '2020-03-22 23:00:00', 'nice'),
(100, 22, 6, 5, '2019-08-17 23:00:00', 'goood hf'),
(101, 20, 6, 5, '2020-01-17 23:00:00', ''),
(102, 16, 6, 5, '2019-12-10 23:00:00', ''),
(103, 29, 6, 5, '2020-02-26 23:00:00', ''),
(104, 30, 6, 4, '2019-07-17 23:00:00', ''),
(105, 25, 6, 5, '2019-10-29 23:00:00', ''),
(106, 28, 6, 5, '2020-02-03 23:00:00', ''),
(107, 38, 6, 5, '2019-07-30 23:00:00', ''),
(108, 39, 6, 5, '2020-03-11 23:00:00', ''),
(109, 10, 7, 2, '2020-06-05 13:34:50', 'This is a good product, Thank You!'),
(111, 4, 19, 4, '2020-06-08 12:21:54', 'This is a good product, Thank You!');

-- --------------------------------------------------------

--
-- Table structure for table `signups`
--

CREATE TABLE `signups` (
  `id` int(11) NOT NULL,
  `signup_email_address` varchar(50) NOT NULL,
  `signup_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT 0,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `website` varchar(20) DEFAULT NULL,
  `token` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `firstname`, `lastname`, `gender`, `address`, `contact_info`, `picture`, `country`, `state`, `address2`, `city`, `postal`, `website`, `token`) VALUES
(1, 'red', 'red@red.com', '11e0bb710744b9bd55a358fc6263f1eb77cdbe40', 4, 'thered', 'man', 0, 'red', '12345', 'avatar-profile.jpg', 'algeria', 'M\'sila', '', '', '', 'www.ff.co', ''),
(2, 'batata', 'batata@gmail.com', '0f2f448a98c1730fd60e80cb9a89028026d94eff', 3, 'batat', 'ba', 0, 'batat', '111111', 'avatar-profile.jpg', 'Egypt', 'Cairo', 'aaaa', '', '1234', 'www.egybest.com', ''),
(3, 'hamza', 'hamza@hamza.com', '5ed6d69249a73a3cfeedeffd33ee6e497c8047b5', 3, 'hamza', 'ham', 0, 'haza', '222222', 'avatar-profile.jpg', 'Germany', 'Berlin', '', '', '', '', ''),
(4, 'dell', 'dell@dell.com', 'e94654dbf60f987b422d366e88c776c786aae044', 2, 'dell', 'for computers', 0, 'usa ', '213254612', 'avatar-profile.jpg', 'USA', 'New York', 'Washington', '', '', 'www.dell.com', ''),
(5, 'galaxy', 'galaxy@gmail.com', '93dd52f276ff266d6170a4068a6e8885f0195563', 3, 'galaxy', 's', 0, 'chlef', '012341567', 'avatar-profile.jpg', 'Algeria', 'Sidi Bel Abbes', '', '', '', 'www.dell.com', ''),
(6, 'azer', 'azer@gmail.com', '4dcd5d4e35e6c9648f8a4fc62dec48bbd78f337d', 3, 'azer', 'e', 0, 'azer', '57447', 'avatar-profile.jpg', 'England', 'London', '', '', '', 'www.azz.zz', ''),
(7, 'omeraffd20', 's@gmail.com', '3dd3bd51d04fc0425bacc389a48a9f678ea9747e', 3, 'omera', 'ffd', 0, 's', '3333', 'avatar-profile.jpg', 'USA', 'New York', 'ffd', 'fd', 'fdf', NULL, ''),
(8, 'reer40', 'z@z.com', 'beea6ab2a05799f82f451d1ab583baa81be40d7a', 3, 're', 're', 0, 'z', '32425', 'avatar-profile.jpg', 'USA', 'New York', 'z', 'z', 'z', NULL, ''),
(9, 'aza178', 'az@gmail.com', 'ab13098a3e0c51b5e8574456a78a8188eb791c13', 3, 'az', 'a', 0, 'az', '234234', 'avatar-profile.jpg', 'USA', 'Los Angeles', 'az', 'az', 'az', NULL, ''),
(10, 'azerarze183', 'aze@gmail.com', 'ab13098a3e0c51b5e8574456a78a8188eb791c13', 3, 'azer', 'azer', 0, 'az', '234524', 'avatar-profile.jpg', 'USA', 'New York', 'az', 'az', 'az', NULL, ''),
(11, 'ytty68', 'yt@gmail.com', '5a28eb83e371c75ee91a9879603daae0a3b9ac1b', 3, 'yt', 'yt', 0, 'yt', '234523', 'avatar-profile.jpg', 'USA', 'Los Angeles', 'yt', 'yt', 'yt', NULL, ''),
(12, 'johnioumr147', 'johnmirou91@gmail.com', '9f462e0fc0064ce3eff7c788b602e96e4c387a72', 3, 'john', 'mriou', 0, 'a;lka;lsdka;sl', '43523', 'avatar-profile.jpg', 'USA', 'New York', 'alka;lsdkas', 'am;amskdasmdlk', '879876', NULL, ''),
(13, 'Polo', 'polo@polo.coom', '20d1416328b468ec55735c90500db796fb19246d', 2, 'Polo ', 'TER', 1, 'usa', '546219849', 'avatar-profile.jpg', 'USA', 'illinois', '', '', '412', 'polo.com', ''),
(14, 'health', 'health@health.com', '2425eb5c42fdacaf0439e318252768d7c9a52b3c', 2, 'health ', 'im', 1, 'usa', '425421', 'avatar-profile.jpg', 'Algeria', 'Algiers', '', '', '757', 'health.com', ''),
(15, 'home', 'home@home.com', '44cf9eb7c0ddd2ffd6285f082e664eb730740812', 2, 'Home ', 'for life', 0, 'usa', '456454865', 'avatar-profile.jpg', 'Canada', 'Quebec', 'uysa', 'dfdf', '5345', 'home.com', ''),
(16, 'toys', 'toys@toys.cp', '979faa7bf37592bd84b48fe5774b2d05dbeb726c', 2, 'toys ', 'for life', 0, 'bouhali aid 13', '65464', 'avatar-profile.jpg', 'USA', 'New York', '', '', '', 'toys.com', ''),
(17, 'ilyaseflba24', 'jascacj@gmail.com', '6c4d5da494a97c739dac2cb1dbff4c2ae1ad3a00', 3, 'ilyas', 'belfar', 2, '897897 jhkjh', '897897987', 'avatar-profile.jpg', 'Algeria', 'M\'sila', '', '', '', NULL, ''),
(18, 'ilyasalfbe66', 'ilyasbelfar28@gmail.com', '8b2e5d9d2061671b5f89d498d14c1440cb66a39b', 3, 'ilyas', 'belfar', 2, '89789 jllkjkl', '90890809890', 'avatar-profile.jpg', 'USA', 'New York', '', '', '', NULL, ''),
(19, 'jeremyrdior190', 'serifed@waikikieasthotel.com', '482bebef5580ebe482dc27c6f1203048cfedbe84', 4, 'jeremy', 'rodríguez', 2, '33874 Collen Hydrate', '779812141', '5.jpg', 'US', 'state', '', 'M\'sila', 'M\'sila', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(9, 6, 3),
(10, 6, 2),
(11, 6, 1),
(12, 6, 4),
(13, 6, 7),
(14, 6, 8),
(15, 6, 5),
(16, 8, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `name` (`order_name`),
  ADD KEY `email` (`order_email`),
  ADD KEY `order_date` (`order_date`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signups`
--
ALTER TABLE `signups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
