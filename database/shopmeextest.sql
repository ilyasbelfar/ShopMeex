-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 mai 2020 à 03:38
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Structure de la table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Structure de la table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Structure de la table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Structure de la table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Déchargement des données de la table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'shopmeextest', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"phpmyadmin\",\"shopmeextest\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure de la table @TABLE@\",\"latex_structure_continued_caption\":\"Structure de la table @TABLE@ (suite)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenu de la table @TABLE@\",\"latex_data_continued_caption\":\"Contenu de la table @TABLE@ (suite)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Structure de la table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Structure de la table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Structure de la table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Déchargement des données de la table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"shopmeextest\",\"table\":\"admin\"},{\"db\":\"store_db\",\"table\":\"admin\"},{\"db\":\"shopmeextest\",\"table\":\"products\"},{\"db\":\"shopmeextest\",\"table\":\"category\"},{\"db\":\"shopmeextest\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Structure de la table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Structure de la table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Structure de la table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Structure de la table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Structure de la table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Structure de la table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Déchargement des données de la table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-05-29 01:17:25', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"fr\"}');

-- --------------------------------------------------------

--
-- Structure de la table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Structure de la table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Index pour la table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Index pour la table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Index pour la table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Index pour la table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Index pour la table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Index pour la table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Index pour la table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Index pour la table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Index pour la table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Index pour la table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Index pour la table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Index pour la table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Index pour la table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de données : `shopmeextest`
--
CREATE DATABASE IF NOT EXISTS `shopmeextest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shopmeextest`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin1', 'admin@gmail.com', 'shopmeex'),
(2, 'Batnaaa', 'bimo@hotmail.fr', '$$$$$$');

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
(145, 6, 7, 1),
(146, 6, 6, 1),
(147, 6, 5, 1),
(148, 6, 36, 1),
(149, 6, 13, 1),
(150, 6, 8, 1),
(151, 6, 1, 1),
(153, 17, 3, 1),
(155, 17, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'Digital Goods', 'Digital-Goods'),
(2, 'Clothes', 'Clothes'),
(3, 'Health and Care', 'Health-And-Care'),
(4, 'Home Interior', 'Home-Interior'),
(5, 'Toys and Games', 'Toys-And-Games');

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
-- Structure de la table `orders_items`
--

CREATE TABLE `orders_items` (
  `order_id` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders_items`
--

INSERT INTO `orders_items` (`order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `placed_orders`
--

INSERT INTO `placed_orders` (`order_id`, `order_date`, `order_name`, `order_email`) VALUES
(1, '2020-05-14 21:36:28', 'johnioumr147', 'johnmirou91@gmail.com'),
(2, '2020-05-14 21:38:36', 'johnioumr147', 'johnmirou91@gmail.com');

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
  `sold_cmp` int(11) NOT NULL,
  `total_rating` int(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `weight`, `dimensions`, `price`, `slug`, `colors`, `owner_id`, `model`, `photo`, `photo1`, `photo2`, `date_view`, `counter`, `sold_cmp`, `total_rating`, `quantity`) VALUES
(1, 1, 'Dell Laptop 1500 Pavilion', 'one of the best product in the world Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, fa', 0.6, '70 x 60', 200, 'large-dell-inspiron-15-5000-15-6', 'Black White', 4, 'dell pavilion 15', 'dell1.jpg', '12.jpg', '12-1.jpg', '2020-05-20', 2, 0, 4, 0),
(2, 1, 'mouse', 'one of the beset mouse in the world', 0.1, '20 x 30', 400, 'mouse', 'red grey', 4, 'mouse l-120', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-17', 8, 0, 2, 0),
(3, 1, 'smart watch', 'one of the best product in teh world', 0.1, '12 x 13', 1200, 'smart-watch', 'red', 4, 'watch-120-M', '7.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-16', 2, 0, 5, 0),
(4, 1, 'Wirless Mouse', 'one of the best product in teh world', 0.6, '', 13, 'thered', '', 4, '', 'Photo2.jpg', 'Photo2.jpg', '', '2020-05-17', 1, 0, 4, 0),
(5, 1, 'Logitech mouse', 'one of the best product in teh world', 0.3, '30 x 50', 200, 'the-blue', 'black grey wihire', 4, '1200-3', 'Photo1.jpg', 'Photo2.jpg', 'Photo3.jpg', '2020-05-10', 1, 0, 3, 0),
(6, 1, 'wireless speakers', 'omeone of the best product in teh world', 0, '', 13, 'watch-1200', '', 4, '', '9.jpg', 'Photo2.jpg', '', '2020-04-19', 3, 0, 0, 0),
(7, 1, 'Airpods', 'vone of the best product in teh world', 0, '', 13, 'watch-130', '', 4, '', '8.jpg', 'Photo2.jpg', '', '2020-05-12', 2, 0, 5, 0),
(8, 1, 'watch', 'one of the best product in the world', 0, '', 700, 'bimo-tango', '', 4, '', '10.jpg', 'Photo2.jpg', '', '2020-05-17', 2, 0, 4, 0),
(9, 1, 'Go Pro Camera', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', '11.jpg', 'Photo2.jpg', '', '2020-05-17', 1, 0, 5, 0),
(10, 1, 'Tablet', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', 'tab.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(11, 1, 'iPhone X', 'one of the best product in the world', 0, '', 1200, 'safina-t3am', '', 4, '', 'iphonex.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(12, 1, 'VR Box', 'one of the best Top 10 products last year', 0, '', 999.99, 'BEST', 'white', 4, '', 'VR1.jpg', 'Photo2.jpg', '', '2020-05-07', 2, 0, 5, 0),
(13, 2, 'the dark knight', 'best t shirt in the world', 0, '', 1200, 'the-dark', 'black and white ', 13, 'fgfgf', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 1, 5, 0, 15),
(14, 2, 'omega', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'jocker', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-09-10', 0, 0, 0, 0),
(15, 2, 'T-shirt 1', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck2', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(16, 2, 'T-shirt 2', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck3', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 6, 0, 5, 0),
(17, 2, 'T-shirt alph3', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck4', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(18, 2, 'T-shirt alphja4', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck5', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 2, 0, 0, 0),
(19, 2, 'T-shirt alphja5', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck6', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 2, 0, 0, 0),
(20, 2, 'T-shirt alphja6', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck7', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-05-15', 4, 0, 5, 0),
(21, 2, 'T-shirt alphja7', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck8', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '0000-00-00', 0, 0, 0, 0),
(22, 2, 'alpha', 'lerom mijoifj omjdk op oijoijfd ooijfd md kfkj, ', 0, '', 1254, 'the-bad-luck9', '', 13, '', '1.jpg', '1.jpg', '1.jpg', '2020-07-08', 1, 0, 0, 0),
(23, 3, 'bag-12', 'the best bag int the ifidj  ld hidlez o', 0, '', 1200, 'bag-for-life', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(24, 3, 'bag-12', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life1', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-16', 2, 0, 0, 0),
(25, 3, 'bag-13', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life2', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 5, 0),
(26, 3, 'bag-144', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life3', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(27, 3, 'bag-15', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life4', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '0000-00-00', 0, 0, 0, 0),
(28, 3, 'bag-16', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life5', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 6, 0, 5, 0),
(29, 3, 'bag-15', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life6', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 5, 0),
(30, 3, 'bag-16', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life7', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 4, 0, 4, 0),
(31, 3, 'bag-17', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life8', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 3, 0, 0, 0),
(32, 3, 'bag-18', 'the best bag int the ifidj ld hidlez o', 0, '', 1200, 'bag-for-life9', '', 14, '', '4.jpg', '4.jpg', '4.jpg', '2020-05-15', 2, 0, 0, 0),
(33, 4, 'Chair1', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life1', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-17', 4, 0, 0, 0),
(34, 4, 'Chair2', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life2', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(35, 4, 'Chair3', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life3', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '0000-00-00', 0, 0, 0, 0),
(36, 4, 'Chair4', 'good for back oand odj a az joijf \r\nfdjfoi jdjfaoijfj of f', 1120, '10', 412, 'chair-for-life4', 'blue', 15, 'alpha', '6.jpg', '6.jpg', '6.jpg', '2020-05-16', 6, 0, 1, 0),
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
(50, 5, 'Pikachu9', 'good for kids and for lonelyh kids', 5, '9', 4521, 'pikatchu-for-life8', 'yellow', 16, '', 'pika.jpg', 'pika.jpg', 'pika.jpg', '2020-05-16', 5, 0, 3, 0);

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
(109, 42, 6, 5, '2020-05-15', ''),
(110, 50, 6, 3, '2020-05-16', ''),
(111, 36, 6, 1, '2020-05-16', ''),
(112, 8, 17, 4, '2020-05-16', 'good product !');

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
  `address2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `website` varchar(20) DEFAULT NULL,
  `token` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
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
(16, 'toys', 'toys@toys.cp', 'omfgg', 2, 'toys ', 'for life', 0, '', '65464', 'f', '', '', '', '', '', 'toys.com', ''),
(17, 'heeg125', 'he@gmail.com', '06329409289c57c8d752083daa4fda02f1fabbfc', 3, 'he', 'ge', 2, 'he', '456465', '', '', '', '', '', '', NULL, '');

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
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(9, 6, 3),
(10, 6, 2),
(11, 6, 1),
(12, 6, 4),
(13, 6, 7),
(14, 6, 8),
(15, 6, 5),
(16, 8, 5),
(17, 6, 28),
(18, 6, 19),
(19, 17, 8);

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
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `name` (`order_name`),
  ADD KEY `email` (`order_email`),
  ADD KEY `order_date` (`order_date`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Base de données : `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
