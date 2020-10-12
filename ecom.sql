-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 oct. 2020 à 00:21
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorieName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorieName`, `created_at`, `updated_at`) VALUES
(1, 'LapTops', NULL, NULL),
(3, 'SmatPhones', NULL, NULL),
(4, 'SmartWatch', NULL, NULL),
(5, 'HeadPhones', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `conatct_us`
--

CREATE TABLE `conatct_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conatct_us`
--

INSERT INTO `conatct_us` (`id`, `name`, `email`, `message`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Said Aoussar', 'said@gmail.com', 'we glad that we dealt with you', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `details`
--

INSERT INTO `details` (`id`, `product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2550, '2020-09-21 21:32:55', '2020-09-21 21:32:55'),
(2, 11, 1, 2, 14880, '2020-09-21 21:32:55', '2020-09-21 21:32:55'),
(3, 10, 2, 1, 16000, '2020-09-21 21:35:48', '2020-09-21 21:35:48'),
(4, 7, 2, 5, 5100, '2020-09-21 21:35:48', '2020-09-21 21:35:48'),
(5, 5, 2, 2, 4000, '2020-09-21 21:35:48', '2020-09-21 21:35:48'),
(6, 8, 3, 2, 1200, '2020-09-21 21:36:38', '2020-09-21 21:36:38'),
(7, 7, 3, 2, 5100, '2020-09-21 21:36:38', '2020-09-21 21:36:38'),
(8, 1, 4, 3, 2550, '2020-09-22 20:51:08', '2020-09-22 20:51:08'),
(9, 9, 4, 1, 16000, '2020-09-22 20:51:08', '2020-09-22 20:51:08'),
(10, 5, 4, 2, 4000, '2020-09-22 20:51:08', '2020-09-22 20:51:08'),
(11, 1, 5, 4, 2550, '2020-09-23 09:08:03', '2020-09-23 09:08:03'),
(12, 9, 5, 1, 16000, '2020-09-23 09:08:03', '2020-09-23 09:08:03'),
(13, 1, 6, 3, 2550, '2020-09-23 09:42:13', '2020-09-23 09:42:13'),
(14, 9, 6, 2, 16000, '2020-09-23 09:42:13', '2020-09-23 09:42:13');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `imagename`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1600712311.1-removebg-preview.png', 1, '2020-09-21 17:18:31', '2020-09-21 17:18:31'),
(2, '1600712311.5-removebg-preview.png', 1, '2020-09-21 17:18:31', '2020-09-21 17:18:31'),
(3, '1600712311.6-removebg-preview.png', 1, '2020-09-21 17:18:31', '2020-09-21 17:18:31'),
(4, '1600712311.apple-watch-premium-design-vs-pebble-time-round-classic-design-removebg-preview.png', 1, '2020-09-21 17:18:31', '2020-09-21 17:18:31'),
(5, '1600725436.2-removebg-preview.png', 2, '2020-09-21 20:57:16', '2020-09-21 20:57:16'),
(6, '1600725436.3-removebg-preview.png', 2, '2020-09-21 20:57:16', '2020-09-21 20:57:16'),
(7, '1600725436.7-removebg-preview.png', 2, '2020-09-21 20:57:16', '2020-09-21 20:57:16'),
(8, '1600725436.black-corded-headset-205926-removebg-preview.png', 2, '2020-09-21 20:57:16', '2020-09-21 20:57:16'),
(9, '1600725593.2-removebg-preview.png', 3, '2020-09-21 20:59:53', '2020-09-21 20:59:53'),
(10, '1600725593.3-removebg-preview.png', 3, '2020-09-21 20:59:53', '2020-09-21 20:59:53'),
(11, '1600725593.7-removebg-preview.png', 3, '2020-09-21 20:59:53', '2020-09-21 20:59:53'),
(12, '1600725593.3-4-removebg-preview.png', 3, '2020-09-21 20:59:53', '2020-09-21 20:59:53'),
(13, '1600725871.2-removebg-preview.png', 4, '2020-09-21 21:04:31', '2020-09-21 21:04:31'),
(14, '1600725871.3-removebg-preview.png', 4, '2020-09-21 21:04:31', '2020-09-21 21:04:31'),
(15, '1600725871.2-removebg-preview.png', 4, '2020-09-21 21:04:31', '2020-09-21 21:04:31'),
(16, '1600725871.3-removebg-preview.png', 4, '2020-09-21 21:04:31', '2020-09-21 21:04:31'),
(17, '1600726185.1-removebg-preview.png', 5, '2020-09-21 21:09:45', '2020-09-21 21:09:45'),
(18, '1600726185.5-removebg-preview.png', 5, '2020-09-21 21:09:45', '2020-09-21 21:09:45'),
(19, '1600726185.6-removebg-preview.png', 5, '2020-09-21 21:09:45', '2020-09-21 21:09:45'),
(20, '1600726185.apple-watch-premium-design-vs-pebble-time-round-classic-design-removebg-preview.png', 5, '2020-09-21 21:09:45', '2020-09-21 21:09:45'),
(21, '1600726308.1-removebg-preview.png', 6, '2020-09-21 21:11:48', '2020-09-21 21:11:48'),
(22, '1600726308.5-removebg-preview.png', 6, '2020-09-21 21:11:48', '2020-09-21 21:11:48'),
(23, '1600726308.6-removebg-preview.png', 6, '2020-09-21 21:11:48', '2020-09-21 21:11:48'),
(24, '1600726308.gtb-removebg-preview.png', 6, '2020-09-21 21:11:48', '2020-09-21 21:11:48'),
(25, '1600726472.1-removebg-preview.png', 7, '2020-09-21 21:14:32', '2020-09-21 21:14:32'),
(26, '1600726472.5-removebg-preview.png', 7, '2020-09-21 21:14:32', '2020-09-21 21:14:32'),
(27, '1600726472.6-removebg-preview.png', 7, '2020-09-21 21:14:32', '2020-09-21 21:14:32'),
(28, '1600726472.apple-watch-premium-design-vs-pebble-time-round-classic-design-removebg-preview.png', 7, '2020-09-21 21:14:32', '2020-09-21 21:14:32'),
(29, '1600726843.6-removebg-preview.png', 8, '2020-09-21 21:20:43', '2020-09-21 21:20:43'),
(30, '1600726843.1-removebg-preview.png', 8, '2020-09-21 21:20:43', '2020-09-21 21:20:43'),
(31, '1600726843.5-removebg-preview.png', 8, '2020-09-21 21:20:43', '2020-09-21 21:20:43'),
(32, '1600726843.gtb-removebg-preview.png', 8, '2020-09-21 21:20:43', '2020-09-21 21:20:43'),
(33, '1600727255.1.jpg', 9, '2020-09-21 21:27:36', '2020-09-21 21:27:36'),
(34, '1600727256.2.jpg', 9, '2020-09-21 21:27:36', '2020-09-21 21:27:36'),
(35, '1600727256.1.jpg', 9, '2020-09-21 21:27:36', '2020-09-21 21:27:36'),
(36, '1600727256.2.jpg', 9, '2020-09-21 21:27:36', '2020-09-21 21:27:36'),
(37, '1600727280.1.jpg', 10, '2020-09-21 21:28:00', '2020-09-21 21:28:00'),
(38, '1600727280.2.jpg', 10, '2020-09-21 21:28:00', '2020-09-21 21:28:00'),
(39, '1600727280.1.jpg', 10, '2020-09-21 21:28:00', '2020-09-21 21:28:00'),
(40, '1600727280.2.jpg', 10, '2020-09-21 21:28:00', '2020-09-21 21:28:00'),
(41, '1600727352.1.jpg', 11, '2020-09-21 21:29:12', '2020-09-21 21:29:12'),
(42, '1600727352.2.jpg', 11, '2020-09-21 21:29:12', '2020-09-21 21:29:12'),
(43, '1600727352.1.jpg', 11, '2020-09-21 21:29:12', '2020-09-21 21:29:12'),
(44, '1600727352.2.jpg', 11, '2020-09-21 21:29:12', '2020-09-21 21:29:12');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2017_06_26_000000_create_shopping_cart_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_05_04_180214_create_products_table', 1),
(11, '2020_05_04_213355_create_promotions_table', 1),
(12, '2020_05_05_200338_create_categories_table', 1),
(13, '2020_05_10_013927_create_details_table', 1),
(14, '2020_05_12_044600_create_images_table', 1),
(15, '2020_05_12_071211_create_orders_table', 1),
(16, '2020_07_09_120234_create_conatct_us_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `total`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '32,310.00', 'lot el fillaha 2  nr 45 errachidia', '2020-09-21 21:32:55', '2020-09-21 21:37:44'),
(2, 1, 1, '49,500.00', 'lot el fillaha 2  nr 45 errachidia', '2020-09-21 21:35:48', '2020-09-23 09:44:21'),
(3, 1, 0, '12,600.00', 'lot el fillaha 2  nr 45 errachidia', '2020-09-21 21:36:38', '2020-09-21 21:36:38'),
(4, 1, 0, '31,650.00', 'lot el fillaha 2 nr 45 errachidia', '2020-09-22 20:51:08', '2020-09-22 20:51:08'),
(5, 1, 0, '26,200.00', 'lot el fillaha 2  nr 45 errachidia', '2020-09-23 09:08:03', '2020-09-23 09:08:03'),
(6, 1, 0, '39,650.00', 'lot el fillaha 2  nr 45 errachidia', '2020-09-23 09:42:13', '2020-09-23 09:42:13');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `prix`, `cover`, `categorie_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'apple smart watch 4 blue', 'apple smart watch 4 blue removable', 3000, '1600712311.png', 4, 15, '2020-09-21 17:18:31', '2020-09-21 17:18:31'),
(2, 'Sony Bluetooth  headphone red color', 'Sony Bluetooth  headphone red color up 3hour', 400, '1600725436.png', 5, 10, '2020-09-21 20:57:16', '2020-09-21 20:57:16'),
(3, 'Black Bluetooth headphone BeatsByDre', 'Black Bluetooth headphone BeatsByDre  ultra save power up to 20h using', 1000, '1600725593.png', 5, 20, '2020-09-21 20:59:53', '2020-09-21 20:59:53'),
(4, 'Red Black Bluetooth headphone', 'Red Black Bluetooth headphone up to 12h of using', 200, '1600725871.png', 5, 12, '2020-09-21 21:04:31', '2020-09-21 21:04:31'),
(5, 'Red Galaxy watch active 2', 'the Galaxy Watch Active2 Bluetooth Smartwatch from Samsung', 4000, '1600726185.png', 4, 10, '2020-09-21 21:09:45', '2020-09-21 21:09:45'),
(6, 'Sony Bluetooth  headphone black color', 'Sony Bluetooth  headphone black color', 3000, '1600726308.png', 4, 12, '2020-09-21 21:11:48', '2020-09-21 21:11:48'),
(7, 'apple  watch premium blue color', 'apple watch premium design pebble time round classic design', 6000, '1600726472.png', 4, 10, '2020-09-21 21:14:32', '2020-09-21 21:14:32'),
(8, 'gtb watch', 'gtb watch', 1200, '1600726843.png', 4, 12, '2020-09-21 21:20:43', '2020-09-21 21:20:43'),
(9, 'Microsoft Surface 2 14 inch', 'Microsoft Surface 3 14 Specs: ✓NVIDIA® GeForce® MX250 ✓512GB SATA SSD ✓8GB DDR4 RAM', 16000, '1600727280.jpeg', 1, 5, '2020-09-21 21:27:35', '2020-09-21 21:27:35'),
(10, 'Microsoft Surface 3', 'Microsoft Surface 3 14 Specs: ✓NVIDIA® GeForce® MX250 ✓512GB SATA SSD ✓8GB DDR4 RAM', 16000, '1600727280.jpeg', 1, 5, '2020-09-21 21:28:00', '2020-09-21 21:28:00'),
(11, 'Microsoft Surface 4', 'Microsoft Surface 3 14 Specs: ✓NVIDIA GeForce® MX250 ✓512GB SATA SSD ✓8GB DDR4 RAM', 16000, '1600727352.jpeg', 1, 5, '2020-09-21 21:29:12', '2020-09-21 21:29:12');

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_expires` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `product_id`, `value`, `date_start`, `date_expires`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '2019-12-31 23:00:00', '2021-02-01 23:00:00', '2020-09-21 17:18:31', '2020-09-21 17:18:31'),
(2, 2, 10, '2019-12-31 23:00:00', '2020-12-31 23:00:00', '2020-09-21 20:57:16', '2020-09-21 20:57:16'),
(3, 4, 15, '2019-12-31 23:00:00', '2020-12-31 23:00:00', '2020-09-21 21:04:31', '2020-09-21 21:04:31'),
(5, 7, 10, '2020-01-08 23:00:00', '2020-10-09 23:00:00', '2020-09-21 21:14:32', '2020-09-21 21:37:25');

-- --------------------------------------------------------

--
-- Structure de la table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `email`, `email_verified_at`, `password`, `phone`, `type`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oubani', 'Ayoub', 'said@gmail.com', NULL, '$2y$10$Kaefnq4jc8DAOluka1omw.qmRzTOPkGSWJUX/3VQxSLLDqJizcuaS', '5555555555', 1, 'lot el fillaha 2  nr 45 errachidia', NULL, '2020-09-21 17:12:00', '2020-09-21 17:12:00'),
(2, 'Said Aoussar', 'Said Aoussar', 'test@gmail.com', NULL, '$2y$10$f1FJjQ5u3HIO9Gcn45CmO.8O/aS0x5dSDHo9mQaQ.cF95z5Nj.MxO', '5555555555', 0, 'poezf ef zefzpoze ezfz e', NULL, '2020-09-23 08:54:44', '2020-09-23 08:54:44');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conatct_us`
--
ALTER TABLE `conatct_us`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`,`instance`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `conatct_us`
--
ALTER TABLE `conatct_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
