-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: May 31, 2024 at 05:19 PM
-- Server version: 8.0.37
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE `estimate` (
  `id` int NOT NULL,
  `estimatedate` datetime NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` int NOT NULL,
  `client_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dresstype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customizations` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric_color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricefabric` int NOT NULL,
  `quantity` int NOT NULL,
  `total_ex_tax` int NOT NULL,
  `tva` int NOT NULL,
  `total_inc_tax` int NOT NULL,
  `balande_due` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_delivery_date` datetime NOT NULL,
  `delivery_mode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `estimatedate`, `client_name`, `client_email`, `client_phone`, `client_address`, `client_city`, `dresstype`, `customizations`, `fabric`, `fabric_color`, `size`, `pricefabric`, `quantity`, `total_ex_tax`, `tva`, `total_inc_tax`, `balande_due`, `expected_delivery_date`, `delivery_mode`) VALUES
(1, '2024-05-31 09:28:03', 'CHANG Toma', 'toma11chang@gmail.com', 686930522, '5 Rue Test', 'Montigny-le-bretonneux', 'Type3', 'test1', 'test1', 'test1', 'Taille1', 125, 1, 123, 4000, 200, '250', '2024-05-24 00:00:00', 'UPS'),
(5, '2024-05-31 16:03:23', 'CHANG Toma', 'toma11chang@gmail.com', 686930522, '5 Rue Test5', 'Montigny-le-bretonneux', 'Robe5', 'Custom5', 'Tissu5', 'Blanc', '45', 200, 1, 500, 50, 550, '900', '2024-06-10 00:00:00', 'UPS'),
(6, '2024-06-01 10:15:00', 'Alice Dupont', 'alice.dupont@example.com', 123456789, '12 Avenue Liberté', 'Paris', 'Robe Soirée', 'Broderie fine', 'Soie', 'Noir', '38', 300, 2, 600, 120, 720, '1200', '2024-07-15 00:00:00', 'DHL'),
(7, '2024-06-02 14:20:00', 'Jean Martin', 'jean.martin@example.com', 987654321, '33 Rue de la Paix', 'Lyon', 'Costume', 'Aucune', 'Laine', 'Bleu', '42', 250, 1, 250, 50, 300, '300', '2024-07-20 00:00:00', 'Colissimo');
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rgpd` tinyint(1) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `rgpd`, `password`, `gender`, `role`) VALUES
(1, 'Tomaaaa', 'CHANG', 'toma11chang@gmail.com', 0, '$2y$13$62QslOpsXg/vP2qE/oZ3KOc.ZNXHTabIM8s3EiuTJDM83VfD0/Rpu', 'Homme', '["admin"]'),
(9, 'Toma3a', 'CHANG', 'tomachangTEST@gmail.com', 1, '$2y$13$Jq3RqZT2Po6focAsFcke1uqtrt1ol8crdtKYI.2ecyJzTANg64pzq', 'Homme', '["admin"]'),
(10, 'Marie', 'Curie', 'marie.curie@example.com', 1, '$2y$10$saltsalt$v2I8VZ/m2yZ/cHJX.aUOMu', 'Femme', '["admin"]'),
(11, 'Rémi', 'Lefebvre', 'remi.lefebvre@example.com', 1, '$2y$10$saltsalt$J.b5.atIiHM3Y.CUjhYrWO', 'Homme', '["user"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimate`
--
ALTER TABLE `estimate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
