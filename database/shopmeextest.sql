-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2020 at 09:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

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
(92, 11, 8, 1),
(100, 6, 8, 1),
(101, 6, 2, 1),
(102, 6, 1, 1),
(103, 6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'laptop-category');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `order_id` int(11) NOT NULL DEFAULT '1',
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

DROP TABLE IF EXISTS `placed_orders`;
CREATE TABLE IF NOT EXISTS `placed_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `name` (`order_name`),
  KEY `email` (`order_email`),
  KEY `order_date` (`order_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `total_rating` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `weight`, `dimensions`, `price`, `slug`, `colors`, `owner_id`, `model`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `total_rating`, `quantity`) VALUES
(1, 1, 'Dell Laptop 1500 Pavilion', 'one of the best product in the world Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, fa', 0.6, '70 x 60', 200, 'large-dell-inspiron-15-5000-15-6', 'Black White', 4, 'dell pavilion 15', '14.jpg', '12.jpg', '12-1.jpg', '2020-05-14', 15, 4, 0),
(2, 1, 'mouse', 'one of the beset mouse in the world', 0.1, '20 x 30', 400, 'mouse', 'red grey', 4, 'mouse l-120', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-08', 1, 2, 0),
(3, 1, 'smart watch', 'one of the best product in teh world', 0.1, '12 x 13', 1200, 'smart-watch', 'red', 4, 'watch-120-M', '7.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-07', 1, 5, 0),
(4, 1, 'Wirless Mouse', 'one of the best product in teh world', 0.6, '', 13, 'thered', '', 4, '', 'Photo2.jpg', 'Photo2.jpg', '', '2020-05-12', 1, 4, 0),
(5, 1, 'Logitech mouse', 'one of the best product in teh world', 0.3, '30 x 50', 200, 'the-blue', 'black grey wihire', 4, '1200-3', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-10', 1, 3, 0),
(6, 1, 'wireless speakers', 'omeone of the best product in teh world', 0, '', 13, 'watch-1200', '', 4, '', '9.jpg', 'Photo2.jpg', '', '2020-04-19', 3, 0, 0),
(7, 1, 'Airpods', 'vone of the best product in teh world', 0, '', 13, 'watch-130', '', 4, '', '8.jpg', 'Photo2.jpg', '', '2020-05-12', 2, 5, 0),
(8, 1, 'watch', 'one of the best product in the world', 0, '', 700, 'bimo-tango', '', 4, '', '10.jpg', 'Photo2.jpg', '', '2020-05-12', 2, 5, 0),
(9, 1, 'Go Pro Camera', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', '11.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 5, 0),
(10, 1, 'Tablet', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', 'tab.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 5, 0),
(11, 1, 'iPhone X', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', 'iphonex.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 5, 0),
(12, 1, 'VR Box', 'one of the best Top 10 products last year', 0, '', 999.99, 'BEST', 'white', 4, '', 'VR1.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;

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
(99, 5, 8, 4, '2020-05-10', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `signups`
--

DROP TABLE IF EXISTS `signups`;
CREATE TABLE IF NOT EXISTS `signups` (
  `id` int(11) NOT NULL,
  `signup_email_address` varchar(50) NOT NULL,
  `signup_date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `website` varchar(20) DEFAULT NULL,
  `token` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
(12, 'johnioumr147', 'johnmirou91@gmail.com', '9f462e0fc0064ce3eff7c788b602e96e4c387a72', 3, 'john', 'mriou', 0, 'a;lka;lsdka;sl', '00000000', 'profile.jpg', 'US', 'New York', 'alka;lsdkas', 'am;amskdasmdlk', '879876', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
