-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 20 avr. 2020 à 20:00
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id13360353_shopmeexer`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(25, 12, 7, 9),
(26, 12, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'laptop-category');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
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
-- Structure de la table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_value`) VALUES
(1, 'C_USB02', 100),
(2, 'C_LPN45', 200),
(3, 'C_3DcAM01', 340),
(4, 'C_wristWear03', 50);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `products`
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
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `weight`, `dimensions`, `price`, `slug`, `colors`, `owner_id`, `model`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `total_rating`) VALUES
(1, 1, 'Dell Laptop 1500 Pavilion', 'one of the best product in the world Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, fa', 0.6, '70 x 60', 200, 'large-dell-inspiron-15-5000-15-6', 'Black White', 4, 'dell pavilion 15', '14.jpg', '12.jpg', '12-1.jpg', '2020-04-20', 25, 3),
(2, 1, 'mouse', 'one of the beset mouse in the world', 0.1, '20 x 30', 400, 'mouse', 'red grey', 4, 'mouse l-120', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-04-20', 1, 4),
(3, 1, 'smart watch', 'one of the best product in teh world', 0.1, '12 x 13', 1200, 'smart-watch', 'red', 4, 'watch-120-M', '7.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-04-20', 1, 5),
(4, 1, 'thered', 'one of the best product in teh world', 0.6, '', 13, 'thered', '', 4, '', 'Photo2.jpg', 'Photo2.jpg', '', '2020-04-20', 1, 4),
(5, 1, 'the blue', 'one of the best product in teh world222222222222222222222222222222222222222', 0.3, '30 x 50', 200, 'the-blue', 'black grey wihire', 4, '1200-3', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-04-11', 23, 5),
(6, 1, 'pill', 'omeone of the best product in teh world', 0, '', 13, 'watch-1200', '', 4, '', '9.jpg', 'Photo2.jpg', '', '2020-04-11', 6, 5),
(7, 1, 'watch', 'vone of the best product in teh world', 0, '', 13, 'watch-130', '', 4, '', '8.jpg', 'Photo2.jpg', '', '2020-04-20', 1, 5),
(8, 1, 'bimo', 'one of the best product in teh world', 0, '', 700, 'bimo-tango', '', 4, '', '10.jpg', 'Photo2.jpg', '', '2020-04-11', 12, 1),
(9, 1, 'Safina', 'one of the best product in teh world', 0, '', 1200, 'safina-t3am', '', 4, '', '11.jpg', 'Photo2.jpg', '', '2020-04-18', 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `review`
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
-- Déchargement des données de la table `review`
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
(17, 1, 2, 4, '2020-04-10', 'this is the best review in the world\r\n'),
(18, 1, 2, 4, '2020-04-11', 'hello world php'),
(19, 1, 2, 4, '2020-04-11', 'hello world php'),
(20, 1, 2, 4, '2020-04-11', 'hello world php'),
(21, 1, 2, 4, '2020-04-11', 'w delali'),
(22, 1, 2, 4, '2020-04-11', 'w delali'),
(23, 1, 2, 3, '2020-04-11', 'think '),
(24, 1, 2, 3, '2020-04-11', 'think '),
(25, 1, 2, 4, '2020-04-11', 'grow rich'),
(26, 1, 2, 4, '2020-04-11', 'grow rich'),
(27, 1, 2, 4, '2020-04-11', 'cv'),
(28, 1, 2, 5, '2020-04-11', 'I\'m the best '),
(29, 1, 2, 5, '2020-04-11', 'I\'m the best '),
(30, 1, 2, 5, '2020-04-11', 'I\'m the best '),
(31, 1, 2, 4, '2020-04-11', 'Hello world delete post'),
(32, 1, 2, 4, '2020-04-11', 'Hello world delete post'),
(33, 1, 2, 4, '2020-04-11', 'hello the last'),
(34, 1, 2, 4, '2020-04-11', 'hello the last'),
(35, 1, 2, 4, '2020-04-11', 'the world'),
(36, 1, 2, 4, '2020-04-11', 'the world'),
(38, 1, 6, 5, '2020-04-11', 'this unique review'),
(39, 4, 6, 4, '2020-04-11', 'good'),
(40, 3, 6, 5, '2020-04-11', 'thi is the best product in the woerld'),
(41, 7, 6, 5, '2020-04-11', 'nice product'),
(42, 6, 6, 5, '2020-04-11', 'the best reviews in the world'),
(43, 5, 6, 5, '2020-04-11', 'this is cool'),
(44, 9, 6, 5, '2020-04-11', 'idrab t3am khayi'),
(46, 2, 6, 5, '2020-04-11', 'nice product\r\n'),
(47, 8, 6, 1, '2020-04-11', 'the worst product in the world'),
(48, 5, 2, 5, '2020-04-11', 'good product\r\n'),
(49, 2, 2, 4, '2020-04-11', 'mliha\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `signups`
--

CREATE TABLE `signups` (
  `id` int(11) NOT NULL,
  `signup_email_address` varchar(50) NOT NULL,
  `signup_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
  `address2` varchar(200) NOT NULL DEFAULT '',
  `city` varchar(200) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `website` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `firstname`, `lastname`, `gender`, `address`, `contact_info`, `photo`, `country`, `state`, `address2`, `city`, `postal`, `website`) VALUES
(1, 'red', 'red@red.com', '11e0bb710744b9bd55a358fc6263f1eb77cdbe40', 4, 'thered', 'man', 0, 'red', '', 'profile.jpg', 'algeria', '', '', '', '', 'www.ff.co'),
(2, 'batata', 'batata@gmail.com', '0f2f448a98c1730fd60e80cb9a89028026d94eff', 3, 'batat', 'ba', 0, 'batat', '', 'profile.jpg', 'Egypt', '', 'aaaa', '', '1234', 'www.egybest.com'),
(3, 'hamza', 'hamza@hamza.com', '5ed6d69249a73a3cfeedeffd33ee6e497c8047b5', 3, 'hamza', 'ham', 0, 'haza', '', 'profile.jpg', '', '', '', '', '', ''),
(4, 'dell', 'dell@dell.com', 'password', 2, 'dell', 'for computers', 0, 'usa ', '+213254612', '', 'USA', 'New York', 'Washington', '', '', 'www.dell.com'),
(5, 'galaxy', 'galaxy@gmail.com', '93dd52f276ff266d6170a4068a6e8885f0195563', 3, 'galaxy', 's', 0, 'chlef', '012341567', '', '', '', '', '', '', 'www.dell.com'),
(6, 'azer', 'azer@gmail.com', '4dcd5d4e35e6c9648f8a4fc62dec48bbd78f337d', 3, 'azer', 'e', 0, 'azer', '', 'profile.jpg', '', '', '', '', '', 'www.azz.zz'),
(12, 'ilyasflbae54', 'mabou.diaz21@gmail.com', 'b5dbf50955330141cd87eb2ffda400e6f998ba0d', 3, 'ilyas', 'belfar', 0, '09 Rue Abdesslam Abdellah, Bor', '00000000', 'profile.jpg', 'US', 'New York', '09 Rue Abdesslam Abdellah, Bor', 'Bordj Bou Arreridj', '34000', '');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `signups`
--
ALTER TABLE `signups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
