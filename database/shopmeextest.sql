-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 05:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(66, 8, 1, 1),
(67, 8, 5, 1),
(68, 8, 3, 1),
(69, 8, 2, 1),
(70, 8, 8, 1),
(71, 8, 7, 1),
(72, 8, 6, 1),
(73, 8, 9, 1),
(74, 8, 4, 1),
(75, 9, 1, 1),
(76, 9, 4, 1),
(77, 9, 5, 1),
(78, 9, 8, 1),
(79, 9, 7, 1),
(80, 9, 6, 1),
(81, 9, 9, 1),
(82, 10, 1, 11),
(88, 11, 1, 1),
(89, 11, 4, 1),
(90, 11, 3, 1),
(91, 11, 2, 1),
(92, 11, 8, 1);

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
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `placed_orders`
--

INSERT INTO `placed_orders` (`order_id`, `order_date`, `order_name`, `order_email`) VALUES
(1, '2020-05-14 21:36:28', 'johnioumr147', 'johnmirou91@gmail.com'),
(2, '2020-05-14 21:38:36', 'johnioumr147', 'johnmirou91@gmail.com');

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
  `photo` varchar(200) NOT NULL,
  `photo1` varchar(200) NOT NULL,
  `photo2` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `sold_cmp` int(11) NOT NULL,
  `total_rating` int(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `weight`, `dimensions`, `price`, `slug`, `colors`, `owner_id`, `model`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `sold_cmp`, `total_rating`, `quantity`) VALUES
(1, 1, 'Dell Laptop 1500 Pavilion', 'one of the best product in the world Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, fa', 0.6, '70 x 60', 200, 'large-dell-inspiron-15-5000-15-6', 'Black White', 4, 'dell pavilion 15', 'dell1.jpg', '12.jpg', '12-1.jpg', '2020-05-15', 4, 0, 4, 0),
(2, 1, 'mouse', 'one of the beset mouse in the world', 0.1, '20 x 30', 400, 'mouse', 'red grey', 4, 'mouse l-120', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-15', 1, 0, 2, 0),
(3, 1, 'smart watch', 'one of the best product in teh world', 0.1, '12 x 13', 1200, 'smart-watch', 'red', 4, 'watch-120-M', '7.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-15', 1, 0, 5, 0),
(4, 1, 'Wirless Mouse', 'one of the best product in teh world', 0.6, '', 13, 'thered', '', 4, '', 'Photo2.jpg', 'Photo2.jpg', '', '2020-05-12', 1, 0, 4, 0),
(5, 1, 'Logitech mouse', 'one of the best product in teh world', 0.3, '30 x 50', 200, 'the-blue', 'black grey wihire', 4, '1200-3', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-10', 1, 0, 3, 0),
(6, 1, 'wireless speakers', 'omeone of the best product in teh world', 0, '', 13, 'watch-1200', '', 4, '', '9.jpg', 'Photo2.jpg', '', '2020-04-19', 3, 0, 0, 0),
(7, 1, 'Airpods', 'vone of the best product in teh world', 0, '', 13, 'watch-130', '', 4, '', '8.jpg', 'Photo2.jpg', '', '2020-05-12', 2, 0, 5, 0),
(8, 1, 'watch', 'one of the best product in the world', 0, '', 700, 'bimo-tango', '', 4, '', '10.jpg', 'Photo2.jpg', '', '2020-05-12', 2, 0, 5, 0),
(9, 1, 'Go Pro Camera', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', '11.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(10, 1, 'Tablet', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', 'tab.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(11, 1, 'iPhone X', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', 'iphonex.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(12, 1, 'VR Box', 'one of the best Top 10 products last year', 0, '', 999.99, 'BEST', 'white', 4, '', 'VR1.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(13, 2, 'T-shirt', 'best t shirt in the world', 0, '', 1200, 't-shirt-1', 'black and white ', 13, 'fgfgf', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 1, 5, 0, 15),
(14, 2, 'T-shirt alphja', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck1', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(15, 2, 'T-shirt 1', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck2', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(16, 2, 'T-shirt 2', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck3', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 6, 0, 5, 0),
(17, 2, 'T-shirt alph3', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck4', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(18, 2, 'T-shirt alphja4', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck5', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 2, 0, 0, 0),
(19, 2, 'T-shirt alphja5', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck6', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 2, 0, 0, 0),
(20, 2, 'T-shirt alphja6', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck7', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 4, 0, 5, 0),
(21, 2, 'T-shirt alphja7', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck8', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(22, 2, 'T-shirt alphja8', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck9', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 1, 0, 0, 0),
(23, 3, 'bag-12', 'the best bag int the ifidj  ld hidlez o', 0, '', 1200, 'bag-for-life', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(24, 3, 'bag-12', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life1', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(25, 3, 'bag-13', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life2', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 5, 0),
(26, 3, 'bag-144', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life3', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(27, 3, 'bag-15', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life4', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(28, 3, 'bag-16', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life5', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 5, 0, 5, 0),
(29, 3, 'bag-15', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life6', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 5, 0),
(30, 3, 'bag-16', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life7', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 4, 0),
(31, 3, 'bag-17', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life8', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 3, 0, 0, 0),
(32, 3, 'bag-18', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life9', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 2, 0, 0, 0),
(33, 4, 'Chair1', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life1', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(34, 4, 'Chair2', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life2', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(35, 4, 'Chair3', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life3', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(36, 4, 'Chair4', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life4', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(37, 4, 'Chair5', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life5', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(38, 4, 'Chair6', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life6', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 4, 0, 5, 0),
(39, 4, 'Chair7', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life7', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 2, 0, 5, 0),
(40, 4, 'Chair8', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life8', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 4, 0, 0, 0),
(41, 4, 'Chair9', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life9', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-15', 1, 0, 0, 0),
(42, 5, 'Pikachu1', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '2020-05-15', 4, 0, 5, 0),
(43, 5, 'Pikachu2', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life1', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 0),
(44, 5, 'Pikachu3', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life2', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '2020-05-15', 1, 0, 0, 0),
(45, 5, 'Pikachu4', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life3', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 0),
(46, 5, 'Pikachu5', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life4', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 0),
(47, 5, 'Pikachu6', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life5', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 0),
(48, 5, 'Pikachu87', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life6', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 0),
(49, 5, 'Pikachu8', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life7', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '0000-00-00', 0, 0, 0, 0),
(50, 5, 'Pikachu9', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life8', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '2020-05-15', 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_id`, `rating`, `date`, `comment`) VALUES
(86, 8, 6, 5, '2020-04-19', 'hello there'),
(87, 6, 6, 4, '2020-04-19', 'hello there'),
(88, 3, 6, 5, '2020-04-19', 'i like this watch'),
(89, 1, 6, 4, '2020-04-19', 'i like this kw'),
(90, 4, 6, 4, '2020-04-19', 'This is the best product in the whole world.'),
(91, 2, 6, 1, '2020-04-19', 'not that good things to buy and thank you for sharing.'),
(92, 7, 6, 5, '2020-04-19', 'i like this product so much'),
(93, 1, 7, 4, '2020-04-19', 'j\'aime bien ce produit \r\nmerci shopmeex'),
(94, 2, 7, 4, '2020-04-19', 'I dislike this product'),
(95, 5, 6, 3, '2020-04-19', 'blue'),
(96, 9, 6, 5, '2020-05-07', ' is the best'),
(97, 1, 8, 4, '2020-05-10', 'zzz'),
(98, 4, 8, 5, '2020-05-10', 'nice'),
(99, 5, 8, 4, '2020-05-10', 'nice'),
(100, 22, 6, 5, '2020-05-15', 'goood hf'),
(101, 20, 6, 5, '2020-05-15', ''),
(102, 16, 6, 5, '2020-05-15', ''),
(103, 29, 6, 5, '2020-05-15', ''),
(104, 30, 6, 4, '2020-05-15', ''),
(105, 25, 6, 5, '2020-05-15', ''),
(106, 28, 6, 5, '2020-05-15', ''),
(107, 38, 6, 5, '2020-05-15', ''),
(108, 39, 6, 5, '2020-05-15', ''),
(109, 42, 6, 5, '2020-05-15', '');

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
  `photo` varchar(200) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `firstname`, `lastname`, `gender`, `address`, `contact_info`, `photo`, `country`, `state`, `address2`, `city`, `postal`, `website`, `token`) VALUES
(1, 'red', 'red@red.com', '11e0bb710744b9bd55a358fc6263f1eb77cdbe40', 4, 'thered', 'man', 0, 'red', '', 'profile.jpg', 'algeria', '', '', '', '', 'www.ff.co', ''),
(2, 'batata', 'batata@gmail.com', '0f2f448a98c1730fd60e80cb9a89028026d94eff', 3, 'batat', 'ba', 0, 'batat', '', 'profile.jpg', 'Egypt', '', 'aaaa', '', '1234', 'www.egybest.com', ''),
(3, 'hamza', 'hamza@hamza.com', '5ed6d69249a73a3cfeedeffd33ee6e497c8047b5', 3, 'hamza', 'ham', 0, 'haza', '', 'profile.jpg', '', '', '', '', '', '', ''),
(4, 'dell', 'dell@dell.com', 'password', 2, 'dell', 'for computers', 0, 'usa ', '+213254612', '', 'USA', 'New York', 'Washington', '', '', 'www.dell.com', ''),
(5, 'galaxy', 'galaxy@gmail.com', '93dd52f276ff266d6170a4068a6e8885f0195563', 3, 'galaxy', 's', 0, 'chlef', '012341567', '', '', '', '', '', '', 'www.dell.com', ''),
(6, 'azer', 'azer@gmail.com', '4dcd5d4e35e6c9648f8a4fc62dec48bbd78f337d', 3, 'azer', 'e', 0, 'azer', '', 'profile.jpg', '', '', '', '', '', 'www.azz.zz', ''),
(7, 'omeraffd20', 's@gmail.com', '3dd3bd51d04fc0425bacc389a48a9f678ea9747e', 3, 'omera', 'ffd', 0, 's', '00000000', 'profile.jpg', 'AF', 'New York', 'ffd', 'fd', 'fdf', NULL, ''),
(8, 'reer40', 'z@z.com', 'beea6ab2a05799f82f451d1ab583baa81be40d7a', 3, 're', 're', 0, 'z', '00000000', 'profile.jpg', 'US', 'New York', 'z', 'z', 'z', NULL, ''),
(9, 'aza178', 'az@gmail.com', 'ab13098a3e0c51b5e8574456a78a8188eb791c13', 3, 'az', 'a', 0, 'az', '00000000', 'profile.jpg', 'AF', 'Los Angeles', 'az', 'az', 'az', NULL, ''),
(10, 'azerarze183', 'aze@gmail.com', 'ab13098a3e0c51b5e8574456a78a8188eb791c13', 3, 'azer', 'azer', 0, 'az', '00000000', 'profile.jpg', 'AF', 'New York', 'az', 'az', 'az', NULL, ''),
(11, 'ytty68', 'yt@gmail.com', '5a28eb83e371c75ee91a9879603daae0a3b9ac1b', 3, 'yt', 'yt', 0, 'yt', '00000000', 'profile.jpg', 'AX', 'Los Angeles', 'yt', 'yt', 'yt', NULL, ''),
(12, 'johnioumr147', 'johnmirou91@gmail.com', '9f462e0fc0064ce3eff7c788b602e96e4c387a72', 3, 'john', 'mriou', 0, 'a;lka;lsdka;sl', '00000000', 'profile.jpg', 'US', 'New York', 'alka;lsdkas', 'am;amskdasmdlk', '879876', NULL, ''),
(13, 'Polo', 'Polo@polo.coom', 'fdfdf', 2, 'Polo ', 'TER', 1, 'usa', '546219849', 'photo.jpg', 'usa', '', '', '', '412', 'polo.com', ''),
(14, 'health', 'health@health.com', 'oihjfodih', 2, 'health ', 'im', 1, 'usa', '425421', '4.jpg', 'usa', '', '', '', '757', 'health.com', ''),
(15, 'home', 'home@home.com', 'fdfd', 2, 'Home ', 'for life', 0, 'usa', '456454865', '4.jpg', 'usa', 'usa', 'uysa', 'dfdf', '5345', 'home.com', ''),
(16, 'toys', 'toys@toys.cp', 'omfgg', 2, 'toys ', 'for life', 0, '', '65464', 'f', '', '', '', '', '', 'toys.com', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
