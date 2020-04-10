-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 06:16 PM
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
(1, 'laptop-category');

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
  `total_rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `weight`, `dimensions`, `price`, `slug`, `colors`, `owner_id`, `model`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `total_rating`) VALUES
(1, 1, 'laptop', 'one of the best product in the world Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, fa', 0.6, '70 x 60', 200, 'large-dell-inspiron-15-5000-15-6', 'black ,red and green', 4, 'dell pavilion 15', '12.jpg', '12-1.jpg', '', '2020-04-10', 218, 3),
(2, 1, 'mouse', 'one of the beset mouse in the world', 0.1, '20 x 30', 400, 'mouse', 'red, grey  and blue', 4, 'mouse l-120', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-04-22', 0, 2),
(3, 1, 'smart watch', 'one of the best product in teh world', 0.1, '12 x 13', 1200, 'smart-watch', 'red', 4, 'watch-120-M', '7.jpg', '', '', '2020-04-14', 0, 4);

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
(1, 1, 1, 1, '2020-04-13', 'I like product that shomeex provide;'),
(2, 1, 2, 4, '2020-04-01', 'this is the best product int hte world'),
(4, 1, 1, 4, '2020-04-10', 'I like this product this is nnew'),
(5, 1, 1, 5, '2020-04-10', 'sohaib was here'),
(6, 1, 1, 4, '2020-04-10', 'i rm the best'),
(7, 1, 1, 4, '2020-04-10', 'i rm the best'),
(8, 1, 2, 3, '2020-04-10', 'batata comment'),
(9, 1, 2, 4, '2020-04-10', 'batata'),
(10, 1, 2, 4, '2020-04-10', 'batata'),
(11, 1, 2, 3, '2020-04-10', 'this is new review'),
(12, 1, 2, 3, '2020-04-10', 'this is new review'),
(13, 1, 2, 3, '2020-04-10', 'this is new review'),
(14, 1, 2, 5, '2020-04-10', 'this is the last review'),
(15, 1, 2, 4, '2020-04-10', 'this is the best review in the world\r\n'),
(16, 1, 2, 4, '2020-04-10', 'this is the best review in the world\r\n'),
(17, 1, 2, 4, '2020-04-10', 'this is the best review in the world\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `website` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `gender`, `address`, `contact_info`, `photo`, `website`) VALUES
(1, 'red@red.com', '11e0bb710744b9bd55a358fc6263f1eb77cdbe40', 4, 'thered', 'man', 0, 'red', '', 'profile.jpg', ''),
(2, 'batata@gmail.com', '0f2f448a98c1730fd60e80cb9a89028026d94eff', 3, 'batat', 'ba', 0, 'batat', '', 'profile.jpg', ''),
(3, 'hamza@hamza.com', '5ed6d69249a73a3cfeedeffd33ee6e497c8047b5', 3, 'hamza', 'ham', 0, 'haza', '', 'profile.jpg', ''),
(4, 'dell@dell.com', 'password', 2, 'dell', 'for computers', 0, 'usa ', '+213254612', '', ''),
(5, 'galaxy@gmail.com', '93dd52f276ff266d6170a4068a6e8885f0195563', 3, 'galaxy', 's', 0, 'chlef', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
